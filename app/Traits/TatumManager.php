<?php 

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;

trait TatumManager{
  
  public function generateBscWallet(){
   return $this->getCurl("/v3/bsc/wallet");
  }
  
  public function generateBscAccountAddressFromXpub($xpub,$index){
    return $this->getCurl("/v3/bsc/address/$xpub/$index");
   }
   public function generateBscPrivateKey($index,$mnemonic){
    return $this->postCurl("/v3/bsc/wallet/priv",json_encode(['index'=>$index,'mnemonic'=>$mnemonic]));
   }
 public function getAccountBalance($address){
    return $this->getCurl("/v3/bsc/account/balance/$address");

 }
 public function sendBscFromAcToAc($toAddress,$fromPrivAddres,$currency,$amount){
    return $this->postCurl("/v3/bsc/transaction",json_encode([
        'data'=>1,
        'nonce'=>'',
        'to'=>$toAddress,
        'currency'=>$currency,
        'amount'=>$amount,
        'fromPrivateKey'=>$fromPrivAddres
    ]));

 }


 

public function getWalletBalance($walletAddress,$withdrawalIn){
  $jsonDAta=json_encode([
  'contractAddress' => $withdrawalIn=='USDT'?config('constants.contract_address.USDT'):config('constants.contract_address.CAKE_VERSE'),
  'methodName' => 'balanceOf',
  'methodABI' => [
    'inputs' => [
      0 => [
        'internalType' => 'address',
        'name' => 'account',
        'type' => 'address',
      ],
    ],
    'name' => 'balanceOf',
    'outputs' => [
      0 => [
        'internalType' => 'uint256',
        'name' => '',
        'type' => 'uint256',
      ],
    ],
    'stateMutability' => 'view',
    'type' => 'function',
  ],
  'params' => [
    $walletAddress
  ],
]);
    return $this->postCurl("/v3/bsc/smartcontract?type=testnet",$jsonDAta);

}

public function transferTokenToAdmin($toAddress,$amount,$fromPrivateKey,$withdrawalIn){
  $amt=bcmul($amount, '1000000000000000000');
  \Log::info($amt);
  $jsonData=json_encode([
  'contractAddress' => $withdrawalIn=='USDT'?config('constants.contract_address.USDT'):config('constants.contract_address.CAKE_VERSE'),
  'methodName' => 'transfer',
  'methodABI' => [
    'inputs' => [
      0 => [
        'internalType' => 'address',
        'name' => 'recipient',
        'type' => 'address',
      ],
      1 => [
        'internalType' => 'uint256',
        'name' => 'amount',
        'type' => 'uint256',
      ],
    ],
    'name' => 'transfer',
    'outputs' => [
      0 => [
        'internalType' => 'bool',
        'name' => '',
        'type' => 'bool',
      ],
    ],
    'payable' => false,
    'stateMutability' => 'nonpayable',
    'type' => 'function',
  ],
  "fromPrivateKey"=>$fromPrivateKey,
  'params' => [$toAddress,$amt],
]);
      return $this->postCurl("/v3/bsc/smartcontract?type=testnet",$jsonData);

}

  public function getCurl($endPoint){
    $curl = curl_init();
    curl_setopt_array($curl, [
      CURLOPT_URL => env('TATUM_API_BASE_URL')."".$endPoint,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => [
        "x-api-key: ".env('TATUM_API_KEY')
      ],
    ]);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      return ['error'=> json_decode($err,true)];
    } else {
      return ['data'=>json_decode($response,true)];
    }
  }

  public function postCurl($endpoint,$data){
    $curl = curl_init();
    
    curl_setopt_array($curl, [
      CURLOPT_URL => env('TATUM_API_BASE_URL')."".$endpoint,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $data,
      CURLOPT_HTTPHEADER => [
        "content-type: application/json",
        "x-api-key: ".env('TATUM_API_KEY')
      ],
    ]);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      //dd($err);
      return ['error'=> json_decode($err,true)];
    } else {
      return ['data'=>json_decode($response,true)];
    }
  }
}