<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponTemplate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'coupon_type_id',
        'value',
        'is_global',
        'description'
    ];


    public function couponType() {
        return $this->belongsTo(CouponType::class, 'coupon_type_id');
    }


    public function menuItems() {
        return $this->belongsToMany(MenuItem::class, 'coupon_template_menu_item', 'coupon_template_id', 'menu_item_id');
    }
}
