<?php


namespace App\Http\Filters\FiltersTypes;


class CreatedDataAfterThisDateTypeFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereDate('created_at', '<', $value);
    }
}
