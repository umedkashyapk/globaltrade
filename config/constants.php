<?php 
return [
    'role' =>   [
        'ADMIN' => 'admin',
        'USER' => 'user',
        'SUPER_ADMIN'=>'super_admin'
    ],
    'account_status'=>[
        'NO_VERIFIED'=>0,
        'VERIFIED'=>1,
    ],
    'config'=>[
        'ADMIN_PRIVATE_KEY'=>"ADMIN_PRIVATE_KEY",
        'ADMIN_WITHDRAWAL_CHARGES'=>'ADMIN_WITHDRAWAL_CHARGES',
        'ADMIN_WALLET_ADDRESS_KEY'=>"ADMIN_WALLET_ADDRESS_KEY",
        'CAKE_VERSE_PRICE'=>"CAKE_VERSE_PRICE"

    ],
    'activityLogType'=>[
        'LOGIN'=>'login',
        'LOGOUT'=>'logout',
        'REGISTER'=>'register',
    ],
    'ticket_status'=>[
        "PENDING"   => 0,
        "COMPLETED" =>1
    ],
    'withdrawal_status'=>[
        'PENDING'=>0,
        'COMPLETED'=>1,
        'REJECTED'=>2
    ],
    'income_types'=>[
        'TWI'=>1,
        'ROI'=>2
    ],
    "contract_address"=>[
        'CAKE_VERSE' => "0x924f060F887384A31bDce42e8e6f49C5e59D7246",
        'USDT'       => '0x337610d27c682E347C9cD60BD4b3b107C9d34dDd'
    ]

];


    

    