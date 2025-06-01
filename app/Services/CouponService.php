<?php

namespace App\Services;

use App\Models\User;
use App\Models\Coupon;

class CouponService
{
    public function getUserCoupons(User $user) {
        return Coupon::where('user_id', $user->id)->with(['couponTemplate.couponType', 'couponTemplate.menuItems'])->get();
    }
}