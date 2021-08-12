<?php


namespace App\Http\Filters\FiltersTypes;


class SchoolTypeFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('name', $value);
    }
}
