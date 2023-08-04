<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'plan_id',
        'total_cakes',
        'expire_date',
        'usd_price',
        "txId"
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'expire_date',
        'roi_until_date'
    ];

    public function planInfo()
    {
        return $this->belongsTo(Plan::class,'plan_id','id');
    }
}
