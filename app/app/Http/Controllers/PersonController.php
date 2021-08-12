<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Person;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PersonController extends Controller
{

//    public function __construct(protected PersonManager $personManager)
//    {
//
//    }

    public function index()
    {
        $persons = Person::all();
        $users = User::all();

//        $this->personManager->getRoles();

//        $persons = Person::query()->whereNotIn(
//            'id',
//            User::query()->where('role_id','=',3)
//                ->select('person_id')
//                ->get())
//            ->get();


        $roles=Role::all();

        return view('person.index',[
            'persons'=>$persons,
            'users'=>$users,
            'roles'=>$roles,
        ]);

        //return new JsonResponse($persons);
    }

    /**
     * Show the form for creating a new resource.
     *
//     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person.create');
//            return new JsonResponse(['message'=>'send to create person']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
//     * @return \Illuminate\Http\Response
     */
    public function store(PersonRequest $request)
    {
//        dd($request);
        Person::create($request->validated());

//        return redirect()->route('person.index')
//                         ->with('message', 'Success, person added to store!');

        return new JsonResponse(['message'=>'new person stored']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person $person
//     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {

        return view('person.edit', [
            'person'=>$person
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Person  $person
//     * @return \Illuminate\Http\Response
     */
    public function update(PersonRequest $request, Person $person)
    {
        $person->update($request->validated());

        return redirect()->route('person.index')
                         ->with('message', 'Success, person info updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person $person
//     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $name = $person->name;
        $surname = $person->surname;

//        $data = $person->users()->get();
//        dd($data->first()->username);

//        $x = [];
//        $x['labas']=0;
//        dd($x['sds']);
//        $data2 = User::with('persons')->get();
//        $data2->first()->username;

//        $data2->first()->username;
//
//        dd( $data2->first()->id );
//        dd($person->users()->count());

        if( (auth()->user())->person_id == $person->id ) {
            return redirect()->route('person.index')
                ->with('info_message', 'Oooops! You, ' . $name . ' ' . $surname . ', can not delete yourself!!!!');
        }

        if ($person->users()->count()) {
            return redirect()->route('person.index')
                ->with('info_message', 'Oooops! You can no delete who still has user profile!!!!');
        }

        $person->delete();

        return redirect()->route('person.index')
                         ->with('message', 'Success! Person ' . $name . ' ' . $surname . ' is deleted');
    }
}
