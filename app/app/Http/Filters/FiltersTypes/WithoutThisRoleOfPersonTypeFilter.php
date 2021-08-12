<?php


namespace App\Http\Filters\FiltersTypes;


use App\Models\User;

class WithoutThisRoleOfPersonTypeFilter
{
    public function filter($builder, $value)
    {
        return $builder->query()->whereNotIn(
            'id',
            User::query()->where('role_id','=',$value)
                ->select('person_id')
                ->get())
            ->get();
    }
}
