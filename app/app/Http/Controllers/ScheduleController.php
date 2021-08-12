<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
//     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $schedules = Schedule::all();

        return view('schedules.index',[
            'schedules'=>$schedules,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
    //     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
    //     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request)
    {
        Schedule::create($request->validated());

        return redirect()->route('schedules.index')
            ->with('message', 'Success, schedule inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule $schedule
    //     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        return view('schedules.edit', [
            'schedule'=>$schedule
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Schedule $schedule
    //     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequest $request, Schedule $schedule)
    {
        $schedule->update($request->validated());

        return redirect()->route('schedules.index')
            ->with('message', 'Success, schedule info updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule $schedule
    //     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $name = $schedule->name;

        if ($schedule->grades()->count()) {
            return redirect()->route('schedules.index')
                ->with('info_message', 'Oooops! You can no delete who still has students or teachers!!!!');
        }

        $schedule->delete();

        return redirect()->route('schedules.index')
            ->with('message', 'Success! Schedule ' . $name . ' is deleted');
    }

}
