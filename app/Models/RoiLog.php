<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoiLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'amount',
        'roi_date',
        'user_plan_id'
    ];
     protected $dates = [
        'created_at',
        'updated_at',
        'roi_date',
    ];

    public function userInfo()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
