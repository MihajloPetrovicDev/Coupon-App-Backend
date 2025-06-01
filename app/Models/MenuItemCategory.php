<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItemCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
    ];


    public function menuItems() {
        return $this->hasMany(MenuItem::class, 'category_id');
    }
}
