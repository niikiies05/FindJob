<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\Users\CreateUserRequest;
use App\Models\City;
use App\Models\Neighbourhood;
use App\Models\Sector;
use App\Models\User;
use App\Notifications\AddClient;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $userRepository;

    function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

        $this->middleware(['role:Admin']);
    }

    public function indexAdmin()
    {
        return view('welcomeAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request, User $user)
    {
        // $cities= City::all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        $roles = Role::pluck('name', 'name')->all();

        foreach (Auth::user()->roles as $role) {
            if ($role->name == "Admin") {
                $users = User::all();
            } elseif ($role->name == "Commerciaux") {
                $users= User::where('creator', Auth::user()->id)->get();
            } else{
                // dd('nothing');
            }
            
        }

        return view('users.index', compact('users', 'roles', 'userRole'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function showThisUser($id)
    {
        $user = User::find($id);
        // dd($user);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all(); 
        // dd($input);
        $input['password'] = Hash::make($input['password']);

        // if ($request->profile_photo_path) {

        //     $imgpath = $request->profile_photo_path->store('profile', 'public');

        //     $users = User::create(array_merge( 
        //         [
        //             'username' => $request->username,
        //             'email' => $request->email,
        //             'password' => bcrypt($request->password),
        //             'phone_number' => $request->phone_number,
        //             'web_site' => $request->web_site,
        //             'sector_id' => $request->sector,
        //             'neighbourhood_id' => $request->neighbourhood,
        //             'creator' => Auth::user()->id,
        //         ],
        //         ['profile_photo_path' => $imgpath]
        //     ));
        //     $users->assignRole($request->input('roles'));
            
        //     // if($request->roles == 'Client')
        //     // {
        //     //     $users->notify(new AddClient($users));
        //     // }

        // } else {
            // $users = User::find(1);

            $users = User::create([
                'name' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'mobile' => $request->phone_number,
                'about_yourself' => $request->about,
                'status' => 1,
                // 'creator' => Auth::user()->id,
            ]);
            // dd($users);
            // if($request->input('roles') == "Client")
            // {     
            //     $users->notify(new AddClient($users));
            // }

            $users->assignRole($request->input('roles'));
            // if($request->input('roles') == "Client")
            // {     
            //     $users->notify(new AddClient($users));
            // }

        // }
        
        return back()->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->getById($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $user = $this->userRepository->getById($user);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'confirmed',
            'password_confirmation' => '',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone_number' => 'required',
            'roles' => 'required',
            'about' => 'required',
        ]);
        // TEST POUR CORRIGER ET AJOUTER LA PHOTO DE PROFIL

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        $user = User::find($id);
        $user->update([
            'uname' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'mobile' => $request->phone_number,
            'about_yourself' => $request->about,
            'status' => 1,

        ]);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return back()->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function updateUserStatus(Request $request){
        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();
    }

}
