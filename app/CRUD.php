<?php

namespace App;
/**
 * CRUD Trait
 */
trait CRUD
{
    public static function read($paginate = true)
    {
        $query = self::select();
        $query->where('id', '>', '0');
        if (\Request::has('search'))
        {
            if (\Request::has('fields'))
                $fields = \Request::get('fields');
            else $fields = self::$search;
            $query->where(function($query) use ($fields)
            {
                foreach ($fields as $field)
                    $query->orWhere($field, 'like', '%' . \Request::get('search') . '%');
            });
        }
        if (\Request::has('filters'))
        {
            $filters = \Request::get('filters');
            foreach ($filters as $val)
            {
                if (isset($val['operator']) && $val['operator'] != '')
                    $query->where($val['name'], $val['operator'], $val['value']);
                else $query->where($val['name'], $val['value']);
            }
        }
        if (\Request::has('lang')) $query->where('lang', \Request::get('lang'));
        if (\Request::has('offset') && \Request::has('limit'))
            \Request::merge(['page' => \Request::get('offset') / \Request::get('limit') + 1]);
        $query->orderBy(\Request::get('sort', 'id'), \Request::get('order', 'desc'));
        return  $paginate ?
                $query->paginate(\Request::get('paginate', \Request::get('limit', 10))) :
                $query->get();
    }
}
