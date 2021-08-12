<?php


namespace App\Http\Filters\FiltersTypes;


class SurnameTypeFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('surname', $value);
    }
}
