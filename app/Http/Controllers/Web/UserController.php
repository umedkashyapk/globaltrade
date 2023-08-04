<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Traits\TatumManager;
use App\Models\CWallet;
use DB;
use App\Models\ActivityLog;
use Log;



class UserController extends Controller
{
    use TatumManager;
    private $user;
    public function __construct(UserRepositoryInterface $user){
        $this->user=$user;
    }

     public function index(Request $request){
      
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
       Auth::logout();
        return view('auth.login', []);
    }
    public function checkUser(Request $request){   
        $errors = [
            'email' => 'required|email|exists:users,email',
             'password'=>'bail|required|string|min:8',
        ];
        $this->validate($request, $errors);

        if (!Auth::check())
        {
            $email=$request->get('email');
            $password=$request->get('password');
    
            if (Auth::attempt(['email' => $email, 'password' => $password,'account_status'=>config('constants.account_status.VERIFIED')])){
                $user=Auth::user();
                   $this->ActivityLogCreate($user->id,$request->ip(),$request->server('HTTP_USER_AGENT'),config('constants.activityLogType.LOGIN'));
                $cwalletInfo=CWallet::where('user_id',$user->id)->first();
                if(is_null($cwalletInfo)){
                    $response=$this->generateBscWallet();
                    $walletAddress=$this->generateBscAccountAddressFromXpub($response['data']['xpub'],$user->id);
                    $walletPKey=$this->generateBscPrivateKey($user->id,$response['data']['mnemonic']);
                   
                   CWallet::create([
                    'user_id'=>$user->id,
                    'address'=>$walletAddress['data']['address'],
                    'pkey'=>$walletPKey['data']['key']
                    ]);
                  }
                return redirect()->route('dashboard');
            }else{
                return redirect()->back()->with('error', 'Your Password is not valid') ;
            }
        }else{
            return redirect()->route('dashboard');
        }

    }
     public function register(Request $request){
        if (Auth::check()) {
            //echo"hello"; die;
            return redirect()->route('dashboard');
        }
       Auth::logout();
       $referalCode=$request->token??'';
        return view('auth.register',compact('referalCode'));
    }
   
    public function userCreate(Request $request){  
        $errors = [
            'first_name'  => 'required',
            'last_name'  => 'required',
            'mobile_no' =>  'required',
            'refer_by'  => 'required|exists:users,referral_code',
            'email'=>'required|unique:users,email',
             'password'=>'bail|required|string|min:8',
             'terms_checkbox'=>'bail|required',
        ];
        $this->validate($request, $errors);
        $size="12";
        $referalCode = strtoupper(substr(md5(time().rand(10000,99999)), 0, $size));
        try{
            $referredUser=User::where('referral_code',$request->refer_by)->first();
        DB::beginTransaction();
        $user=User::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'password'=>\Hash::make($request->password),
            'account_status'=>config('constants.account_status.VERIFIED'),
            'user_type'=>config('constants.role.USER'),
            'referred_by'=>$referredUser->id,
            'referral_code'=>$referalCode,
            'mobile_number'=>$request->mobile_no

        ]);
    //    dd($user);
        $cwalletInfo=CWallet::where('user_id',$user->id)->first();
      if(is_null($cwalletInfo)){
        $response=$this->generateBscWallet();
        //dd($response);

        $walletAddress=$this->generateBscAccountAddressFromXpub($response['data']['xpub'],$user->id);
        $walletPKey=$this->generateBscPrivateKey($user->id,$response['data']['mnemonic']);
       
         CWallet::create([
          'user_id'=>$user->id,
          'address'=>$walletAddress['data']['address'],
          'pkey'=>$walletPKey['data']['key']
          ]);
        }
            auth()->login($user, true);
            $this->ActivityLogCreate($user->id,$request->ip(),$request->server('HTTP_USER_AGENT'),config('constants.activityLogType.REGISTER'));
            DB::commit();
            // dd(auth);

            return redirect()->route('dashboard');
       }catch(\Exception $e){
        DB::rollback();
        Log::info('testing');
        log::info($e);
        
           return redirect()->back()->with('error',"Database error");
       }

    }



    public function logout(Request $request){
         $this->ActivityLogCreate($request->user()->id,$request->ip(),$request->server('HTTP_USER_AGENT'),config('constants.activityLogType.LOGOUT'));
        \Auth::logout();
        return redirect(\URL::previous());
    }

    public function forgotPassword(Request $request)
    {
        if($request->isMethod('post'))
        {
            $this->validate($request, [
                'email'=>'bail|required|email|exists:users',
            ],['email.exists'=>'The selected email does not exist.']);
            if(isset($request->email))
            {
                $check = $this->user->checkUserByEmail($request->email);
                if($check && !is_null($check))
                {
                    $token = md5(time().rand(0,1000).$check->id);
                    $update = $this->user->updateToken($token,$check->id);
                    $user = $this->user->getUserById($check->id);
                    // dd(env('MAIL_USERNAME'),env('MAIL_PASSWORD'),env('MAIL_FROM_ADDRESS'));
                   // Mail::to($user->email)->send(new sendForgotPasswordLink($user));

                    return redirect()->back()->with('success', 'We have send an email to reset Password.') ;
                }
                return redirect()->back()->with('error', 'Please pass valid email address');
            }else{
                return redirect()->back()->with('error', 'Please enter valid email');
            }
        }
        return view('auth.forgot-password');
    }
    public function resetPassword(Request $request)
    {

        if($request->isMethod('post'))
        {
            $this->validate($request, [
                'password'=>'required|min:8',
                'confirm_password'=>'required|min:8|same:password',
                'email_token' => 'required'
            ]);
            $user = $this->user->getUserByToken($request->email_token);
            $update = $this->user->resetPassword([
                'email_token' => $request->email_token,
                'password' => $request->password
            ]);
            if (Auth::attempt(['email' => $user->email, 'password' => $request->password]))
            {
                // \Session::put('passwordChanged', 1);
                return redirect()->route('dashboard');
            }
        }

        $tkn = $request->tkn;
        $user = $this->user->getUserByToken($request->tkn);
        if($user && !is_null($user))
        {
            return view('auth.reset-password',['tkn'=>$tkn]);
        }
        else
        {
            return redirect()->route('Error-401', ['message'=>'The verification link expired.']);
        }
    }
    // redirect to custom site error page.
    public function error401($message){
        return view('error.401', compact('message'));
    }
    public function resetSuccess(Request $request){
        return view('auth.reset-success');
    }

  private function ActivityLogCreate($user_id,$ip,$deviceName,$type){
       return  ActivityLog::create([
            'user_id'=>$user_id,
            'ip_address'=>$ip,
            'device_name'=>$deviceName,
            'type'=>$type
        ]);
    }
}
