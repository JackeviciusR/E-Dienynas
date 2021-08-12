<?php


namespace App\Http\Filters\FiltersTypes;


class CityTypeFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('city', $value);
    }
}
