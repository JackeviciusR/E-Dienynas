<?php

namespace App\Http\Filters;

use App\Http\Filters\FiltersTypes\CreatedDataAfterThisDateTypeFilter;
use App\Http\Filters\FiltersTypes\CreatedDataByDateTypeFilter;
use App\Http\Filters\FiltersTypes\CreatedDataBeforeThisDateTypeFilter;
use App\Http\Filters\FiltersTypes\GroupTypeFilter;
use App\Http\Filters\FiltersTypes\NameTypeFilter;
use App\Http\Filters\FiltersTypes\RoleOfUserTypeFilter;
use App\Http\Filters\FiltersTypes\SurnameTypeFilter;
use App\Models\Role;

class UserFilter extends AbstractFilter
{
    protected $filters = [
        'group'=> GroupTypeFilter::class,
        'role' => RoleOfUserTypeFilter::class,
        'name' => NameTypeFilter::class,
        'surname' => SurnameTypeFilter::class,
        'dataByDate' => CreatedDataByDateTypeFilter::class,
        'dataBeforeDate' => CreatedDataBeforeThisDateTypeFilter::class,
        'dataAfterDate' => CreatedDataAfterThisDateTypeFilter::class,
    ];
}
