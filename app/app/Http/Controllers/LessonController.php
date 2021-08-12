<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonRequest;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {

        $lessons = Lesson::all();

        return view('lessons.index',[
            'directionName'=>'lessons',
            'models'=>$lessons,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
    //     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('lessons.create', [
            'directionName'=>'lessons',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
    //     * @return \Illuminate\Http\Response
     */
    public function store(LessonRequest $request)
    {
        Lesson::create($request->validated());

        return redirect()->route('lessons.index')
            ->with('message', 'Success, lesson inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson $lesson
    //     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return view('lessons.edit', [
            'directionName'=>'lessons',
            'model'=>$lesson
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Lesson $lesson
    //     * @return \Illuminate\Http\Response
     */
    public function update(LessonRequest $request, Lesson $lesson)
    {
        $lesson->update($request->validated());

        return redirect()->route('lessons.index')
            ->with('message', 'Success, lesson info updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson $lesson
    //     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $name = $lesson->name;

        if ($lesson->groups()->count()) {
            return redirect()->route('lessons.index')
                ->with('info_message', 'Oooops! You can not delete who still has group!!!!');
        }

        $lesson->delete();

        return redirect()->route('lessons.index')
            ->with('message', 'Success! Lesson ' . $name . ' is deleted');
    }

}
