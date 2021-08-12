<?php


namespace App\Http\Filters\FiltersTypes;


use App\Models\StudentGroup;
use App\Models\StudentGroupConnection;

class GroupTypeFilter
{
    public function filter($builder, $value)
    {
        return $builder->query()->whereIn(
            'id',
            StudentGroupConnection::query()->where('student_group_id',
                StudentGroup::query()->where('name','=',$value)
                    ->select('id')
                    ->get()
            )
            ->select('student_id')->get()
        )
        ->get();
    }
}
