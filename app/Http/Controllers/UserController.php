<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function index(Request $request)
    {
       $data['title'] = 'Data User';
    $data['q'] = $request->q;

    $query = User::where('name', 'like', '%' . $request->q . '%')
        ->orWhere('email', 'like', '%' . $request->q . '%')
        ->orWhere('username', 'like', '%' . $request->q . '%')
        ->orWhere('role', 'like', '%' . $request->q . '%');

    $perPage = 5;
    $currentPage = $request->query('page', 1); // Get current page or default to 1
    $startingIndex = ($currentPage - 1) * $perPage;

    $data['rows'] = $query->paginate($perPage);
    $data['startingIndex'] = $startingIndex;

        return view('profile.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['title'] = 'Tambah User';
        $data['roles'] = Role::all();
        return view('profile.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'username' => 'required|unique:users',
        'password' => 'required',
        'roles' => 'required|array',
        'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);



    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->username = $request->username;
    $user->password = Hash::make($request->password);


    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/profile_images'), $imageName);
        $user->profile_image = $imageName;
    }

    $user->save();

    return redirect('user')->with('success', 'Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id){
    $user = User::find($id);
    if(!$user) {
        abort(404);
    }
        return view('profile.user.detail', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['title'] = 'Ubah User';
        $data['row'] = $user;
        $data['roles'] = Role::all();
               return view('profile.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'roles' => 'required|array',

        ]);


        // Pengecekan apakah pengguna yang sedang diupdate adalah superadmin
        if ($user->id === 1) {
            $request->validate([
                'roles' => 'required|array|in:superadmin',
            ]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        if ($request->password)
            $user->password = Hash::make($request->password);

        $user->save();
        $user->syncRoles($request->input('roles'));


        if ($request->hasFile('profile_image')) {

            $image = $request->file('profile_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/profile_images'), $imageName);
            $request->user()->profile_image = $imageName;
            $user->profile_image = $imageName;
            $user->save();
        }
        return redirect('user')->with('success', 'Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   $user = User:: find($id);
        if($user && $user->id == 1) {
            return redirect('user')->with('error', 'Hapus Data gagal');
        }

        if($user) {
            $user->delete();
            return redirect('user')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('user')->with('error', 'User tidak ditemukan');
        }
    }



   // activity log


}
