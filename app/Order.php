<?php

namespace App;
use App\CRUD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use CRUD;
    use Notifiable;
    
    protected $fillable = [
        'address',
        'content',
        'email',
        'first_name',
        'last_name',
        'phone',
        'sum',
    ];

    public static $search = [
        'email',
        'address',
        'last_name',
        'first_name',
        'phone',
    ];

    // public function city()
    // {
    //     return $this->belongsTo('App\City');
    // }
    
    // public function district()
    // {
    //     return $this->belongsTo('App\District');
    // }

    // public function ward()
    // {
    //     return $this->belongsTo('App\Ward');
    // }

    public function orderProduct()
    {
        return $this->hasMany('App\OrderProduct', 'product_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_products', 'order_id', 'product_id')->withPivot('quantity', 'bill_price');
    }

    public function sumProductPrices()
    {
        $sum = 0;
        // dd($this->products);
        foreach ($this->products as $key => $product) {
            $sum += $product->bill_price * $product->pivot->quantity;
        }
        // dd($sum);
        return $sum;
    }
}
