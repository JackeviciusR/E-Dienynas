<?php


namespace App\Http\Filters\FiltersTypes;


class CreatedDataByDateTypeFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereDate('created_at', $value);
    }
}
