<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'category_id',
        'description',
    ];

    public function category() {
        return $this->belongsTo(MenuItemCategory::class, 'category_id');
    }

    public function couponTemplates() {
        return $this->belongsToMany(CouponTemplate::class, 'coupon_template_menu_item', 'menu_item_id', 'coupon_template_id');
    }
}
