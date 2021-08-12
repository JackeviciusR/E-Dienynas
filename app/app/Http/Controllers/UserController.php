<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Person;
use App\Models\Role;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
    //     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $persons = Person::all();
        $roles = Role::all();
//        $users = User::query()->orderBy('usrename')->get();
        return view('users.index',[
            'models'=>$users,
            'directionName'=>'users',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
    //     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $persons = Person::query()->orderBy('surname')->get();
        $roles = Role::query()->orderBy('name')->get();
        $schools = School::query()->orderBy('name','asc')->orderBy('city','asc')->get();
        return view('users.create', [
            'persons'=>$persons,
            'roles'=>$roles,
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

        $userArray = $request->validated();
        $userArray['password'] = bcrypt($userArray['password']);
        User::create($userArray);

//        $user = new User();
//        $user->username = $request->username;
//        $user->email = $request->email;
//        $user->role = $request->role;
//        $user->password = $request->password;
////        $user->person_id = $request->person_id;
//        $user->save();

        return redirect()->route('users.index')
            ->with('message', 'Success, users added to store!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
    //     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $persons = Person::orderBy('surname')->get();
        $roles = Role::orderBy('name')->get();

        return view('users.edit', [
            'user'=>$user,
            'persons'=>$persons,
            'roles'=>$roles,
            'schools'=>School::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\User $user
    //     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {

        $userArray = $request->validated();
//        dd($userArray);
        $userArray['password'] = bcrypt($userArray['password']);
//        dd($userArray);
        $user->update($userArray);


//        $user->username = $userArray['username'];
//        $user->email = $userArray['email'];
//        $user->role = $userArray['role'];
//        $user->password = $userArray['password'];
//        $user->person_id = $userArray['person_id'];

//        $user->username = $request->username;
//        $user->email = $request->email;
//        $user->role = $request->role;
//        $user->password = $request->password;
//        $user->person_id = $request->person_id;
//        $user->save();



        return redirect()->route('users.index')
            ->with('message', 'Success, users info updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
    //     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $username = $user->username;

        if(auth()->user()->id == $user->id) {
            return redirect()->route('users.index')
                ->with('info_message', 'Hmmmm, ' . $username . '. You can not delete yourself!!');
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('message', 'Success! users ' . $username . 'is deleted');
    }



}
