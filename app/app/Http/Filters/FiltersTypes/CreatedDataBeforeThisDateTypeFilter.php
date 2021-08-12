<?php


namespace App\Http\Filters\FiltersTypes;


class CreatedDataBeforeThisDateTypeFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereDate('created', '>', $value);
    }
}
