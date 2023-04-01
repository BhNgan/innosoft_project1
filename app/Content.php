<?php

namespace App;

use App\CRUD;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use CRUD;
    use SoftDeletes;
    
    protected $fillable = [
        'content_id',
        'user_id',
        'avatar',
        'title',
        'alias',
        'summary',
        'content',
        'is_show',
        'is_draft',
        'is_featured',
        'sort',
        'tags',
        'description',
        'lang',
        'views',
        'note',
        'video',
        'embed',
    ];
    
    public static $search = [
        'title',
        'content_id',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'content_categories');
    }

    public function content_categories()
    {
        return $this->hasMany('App\ContentCategory');
    }

    public function getContentId()
    {
        return (self::where('lang', app()->getLocale())->get()->last()->id ?? 0) + 1;
    }

    public function firstAlias($alias)
    {
        return self::where('lang', app()->getLocale())->where('alias', $alias)->where('is_show', 1)->firstOrFail();
    }

    public function language()
    {
        return $this->belongsTo('App\Language', 'lang');
    }
}
