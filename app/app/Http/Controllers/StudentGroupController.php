<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentGroupRequest;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function index()
    {

        $studentGroups = StudentGroup::all();

        return view('studentGroups.index',[
            'studentGroups'=>$studentGroups,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
    //     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('studentGroups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //     * @return \Illuminate\Http\Response
     */
    public function store(StudentGroupRequest $request)
    {
        StudentGroup::create($request->validated());

        return redirect()->route('studentGroups.index')
                        ->with('message', 'Success, studentGroup inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentGroup $studentGroup
     * @return \Illuminate\Http\Response
     */
    public function show(StudentGroup $studentGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentGroup $studentGroup
    //     * @return \Illuminate\Http\Response
     */
    public function edit(StudentGroup $studentGroup)
    {
        return view('studentGroups.edit', [
            'studentGroup'=>$studentGroup
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentGroup $studentGroup
    //     * @return \Illuminate\Http\Response
     */
    public function update(StudentGroupRequest $request, StudentGroup $studentGroup)
    {
        $studentGroup->update($request->validated());

        return redirect()->route('studentGroups.index')
                        ->with('message', 'Success, studentGroup info updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentGroup $studentGroup
    //     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentGroup $studentGroup)
    {
        $name = $studentGroup->name;

        if ($studentGroup->teachers()->count() || $studentGroup->students()->count()) {
            return redirect()->route('studentGroups.index')
                            ->with('info_message', 'Oooops! You can no delete who still has grades!!!!');
        }

        $studentGroup->delete();

        return redirect()->route('studentGroups.index')
                        ->with('message', 'Success! StudentGroup ' . $name . ' is deleted');
    }

}
