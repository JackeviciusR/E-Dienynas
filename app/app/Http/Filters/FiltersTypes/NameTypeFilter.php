<?php


namespace App\Http\Filters\FiltersTypes;


class NameTypeFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('name', $value);
    }
}
