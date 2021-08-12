<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Http\Requests\UserRequest;
use App\Models\Person;
use App\Models\Role;
use App\Models\School;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {

        $students=User::query()->where(
            'role_id',
            Role::query()->where('name', '=', 'Teacher')
                ->value('id')
        )->get();
//        );

        $schools = School::query()->orderBy('name')->orderBy('city')->get();

        return view('teachers.index',[
            'models'=>$students,
            'schools'=>$schools,
            'directionName'=>'teachers',

        ]);
//        return new JsonResponse($teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
    //     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Person::query()->whereNotIn(
            'id',
            User::query()->where('role_id','=',
                Role::query()->where('name', '=', 'TEACHER')
                    ->value('id')
            )
                ->select('person_id')
                ->get())
            ->get();

        $schools = School::query()->orderBy('name')
            ->orderBy('city')->get();
        $roles = Role::query()->orderBy('name','asc')->get();

        return view('teachers.create',[
            'schools'=>$schools,
            'directionName'=>'teachers',
            'roles'=>$roles,
            'persons'=>$teachers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        Teacher::create($request->validated());

        return redirect()->route('teachers.index')
                        ->with('message', 'Success, teacher inserted!');
//        return new JsonResponse($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(User $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $teacher
    //     * @return \Illuminate\Http\Response
     */
    public function edit(User $teacher)
    {
        $userIndex = User::query()->where('person_id','=', $teacher->person_id)
            ->Where('person_id','!=', null)
            ->value('person_id');
        $person = Person::query()->where('id','=',$userIndex)->get();
        $roles = Role::query()->orderBy('name', 'asc')->get();
//        dd('labas');

        $schools = School::query()->orderBy('name')
            ->orderBy('city')->get();

        return view('teachers.edit', [
            'directionName'=>'teachers',
            'model'=>$teacher,
            'roles'=>$roles,
            'persons'=>$person,
            'schools'=>$schools,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $teacher
    //     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $teacher)
    {
        $teacher->update($request->validated());

        return redirect()->route('teachers.index')
                        ->with('message', 'Success, teacher info updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $teacher
    //     * @return \Illuminate\Http\Response
     */
    public function destroy(User $teacher)
    {
        $person = $teacher->user()->person();

        if ($teacher->grades()->count() || $teacher->schools()->count()) {
            return redirect()->route('teachers.index')
                            ->with('info_message', 'Oooops! You can no delete who still has grades or schools!!!!');
        }

        $teacher->delete();

        return redirect()->route('teachers.index')
                        ->with('message', 'Success! teacher ' . $person->surname . ' is deleted');
    }

}
