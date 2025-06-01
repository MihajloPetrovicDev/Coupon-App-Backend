<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'uuid',
        'coupon_template_id',
        'user_id',
        'used_at',
    ];


    public function couponTemplate() {
        return $this->belongsTo(CouponTemplate::class, 'coupon_template_id');
    }
}
