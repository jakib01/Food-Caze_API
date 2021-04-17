<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 */
class ShopPost extends Model
{
    use HasFactory;
    protected $table = 'shop_posts';
    protected $fillable = [
        'title',
        'category',
        'sub_category_1',
        'sub_category_2',
        'description',
        'shop_id',
        'image',
        'slug',
        'price',
        'offer_price',
        'discount_price',
        'unit',
        'quantity'
    ];


    /**
     * @var mixed
     */

}
