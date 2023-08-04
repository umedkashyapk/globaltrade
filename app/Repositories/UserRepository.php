<?php namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Auth;
use DB;
class UserRepository implements UserRepositoryInterface
{
    
    public function all(){

    }
    public function create(array $data){
       
    }
    public function update(array $data, $id){

    }
    public function delete($id){
        $user=User::where('id',$id)->first();
        $user->first_name= $user->id.''.str_repeat( "x", strlen(  $user->first_name) );
        $user->email=$user->id.''.str_repeat( "x", strlen(  $user->email) );
        $user->phone_number=$user->id.''.str_repeat( "x", strlen(  $user->phone_number) );
        $user->save();

        return User::where('id',$id)->delete();
    }
    public function show($id){

    }
    public function checkUserByEmail($email)
    {
        return User::where('email',$email)->first();
    }
    public function updateToken($tkn,$id)
    {
        return User::where('id',$id)->update([
            'email_token' => $tkn
        ]);
    }
    public function getUserById($id)
    {
        return User::where('id',$id)->first();
    }
    public function getUserByToken($tkn)
    {
        return User::where('email_token',$tkn)->first();
    }
    public function resetPassword($data)
    {
        return User::where('email_token',$data['email_token'])->update([
            'password'  => \Hash::make($data['password']),
            'email_token' => null
        ]);
    }

    public function getCurrentUser(){
       return Auth::user();
    }

     
}