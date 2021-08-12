<?php


namespace App\Http\Filters\FiltersTypes;


class RoleOfUserTypeFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('name', $value);
    }
}
