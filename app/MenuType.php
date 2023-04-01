<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuType extends Model
{
    protected $fillable = [
        'menu_id',
        'type_id',
    ];

    protected $primaryKey = ['menu_id', 'type_id'];
    public $incrementing = false;

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
}
