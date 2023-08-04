<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CWallet extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'address',
        'pkey',
    ];
}
