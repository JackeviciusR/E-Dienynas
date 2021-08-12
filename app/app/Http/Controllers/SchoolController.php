<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {

        $schools = School::all();

        return view('schools.index',[
            'directionName'=>'schools',
            'models'=>$schools,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
    //     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('schools.create', [
            'directionName'=>'schools',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
    //     * @return \Illuminate\Http\Response
     */
    public function store(SchoolRequest $request)
    {
        School::create($request->validated());

        return redirect()->route('schools.index')
            ->with('message', 'Success, school inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\School $school
    //     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view('schools.edit', [
            'directionName'=>'schools',
            'model'=>$school
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\School $school
    //     * @return \Illuminate\Http\Response
     */
    public function update(SchoolRequest $request, School $school)
    {
        $school->update($request->validated());

        return redirect()->route('schools.index')
            ->with('message', 'Success, school info updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\School $school
    //     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $name = $school->name;
//        dd($school);
//        if ($school->students()->count() || $school->teachers()->count()) {
//            return redirect()->route('schools.index')
//                ->with('info_message', 'Oooops! You can not delete who still has students or teachers!!!!');
//        }

        $school->delete();

        return redirect()->route('schools.index')
            ->with('message', 'Success! School ' . $name . ' is deleted');
    }

}
