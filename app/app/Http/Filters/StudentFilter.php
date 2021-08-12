<?php


namespace App\Http\Filters;


class StudentFilter
{
    protected $filters = [
        'name' => NameTypeFilter::class,
        'surname' => SurnameTypeFilter::class,
        'dataByDate' => CreatedDataByDateTypeFilter::class,
        'dataBeforeDate' => CreatedDataBeforeThisDateTypeFilter::class,
        'dataAfterDate' => CreatedDataAfterThisDateTypeFilter::class,
        'withThisRole' => RoleOfPersonTypeFilter::class,
        'withoutThisRole' =>WithoutThisRoleOfPersonTypeFilter::class,
    ];
}
