<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\CRUD;

class Product extends Model
{
    use CRUD;
    use SoftDeletes;

    protected $fillable = [
        'avatar',
        'alias',
        'detail',
        'description',
        'product_code',
        'product_name',
        'receipt_price',
        'bill_price',
        'stock',
        'is_show',
        'is_featured',
        'unit',
        'origin',
        'note',
        'warranty',
    ];
    
    public static $search = [
        'product_name',
        'bill_price',
    ];

    public function types()
    {
        return $this->belongsToMany('App\Type','product_types', 'product_id', 'type_id' );
    }
    
    public function type()
    {
        return $this->types->first();
    }
    
    public function firstAlias($alias)
    {
        return self::where('alias', $alias)->where('is_show', 1)->firstOrFail();
    }

    public function receipt_products()
    {
        return $this->hasMany('App\ReceiptProduct');
    }
}
