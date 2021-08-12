<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\UserRequest;
use App\Models\Person;
use App\Models\Role;
//use App\Models\Student;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {

        $students=User::query()->where(
            'role_id',
            Role::query()->where('name', '=', 'STUDENT')
                        ->value('id')
        )->get();

        $schools = School::query()->orderBy('name')->orderBy('city')->get();


        return view('students.index',[
            'directionName'=>'students',
            'models'=>$students,
            'schools'=>$schools,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
    //     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $students = Person::query()->whereNotIn(
            'id',
            User::query()->where('role_id','=',
                Role::query()->where('name', '=', 'STUDENT')
                    ->value('id')
                )
                ->select('person_id')
                ->get())
            ->get();

        $schools = School::query()->orderBy('name')
                                ->orderBy('city')->get();

        $roles = Role::query()->orderBy('name','asc')->get();


        return view('students.create',[
            'directionName'=>'students',
            'roles'=>$roles,
            'persons'=>$students,
            'schools'=>$schools,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
    //     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

//        dd($request);
        User::create($request->validated());

        return redirect()->route('students.index')
            ->with('message', 'Success, student inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $student
//     * @return \Illuminate\Http\Response
     */
    public function show(User $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $student
//         * @return \Illuminate\Http\Response
     */
    public function edit(User $student)
    {

        $userIndex = User::query()->where('person_id','=', $student->person->id)
            ->Where('person_id','!=', null)
            ->value('person_id');

        $person = Person::query()->where('id','=',$userIndex)->get();

        $roles = Role::query()->orderBY('name','asc')->get();

        return view('students.edit', [
            'directionName'=>'students',
            'model'=>$student,
            'roles'=>$roles,
            'persons'=>$person,
            'schools'=>School::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\User $student
    //     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $student)
    {
        $student->update($request->validated());

        return redirect()->route('students.index')
            ->with('message', 'Success, student info updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
//         * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {
        $person = $student->person;

        if ($student->grades()->count() || $student->school()->count()) {
            return redirect()->route('students.index')
                ->with('info_message', 'Oooops! You can no delete who still has grades or school!!!!');
        }

        $student->delete();

        return redirect()->route('students.index')
            ->with('message', 'Success! student ' . $person->surname . ' is deleted');
    }


}
