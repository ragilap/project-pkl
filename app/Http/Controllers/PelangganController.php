<?php

namespace App\Http\Controllers;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {  $data['title'] = 'Data User';
       $data['q'] = $request->q;

       $query = Pelanggan::where('kode', 'like', '%' . $request->q . '%')
           ->orWhere('name', 'like', '%' . $request->q . '%')
           ->orWhere('alamat','like','%' . $request->q . '%')
           ->orWhere('phone', 'like', '%' . $request->q . '%')
           ->orWhere('email', 'like', '%' . $request->q . '%');

       $perPage = 5;
       $currentPage = $request->query('page', 1); // Get current page or default to 1
       $startingIndex = ($currentPage - 1) * $perPage;

       $data['rows'] = $query->paginate($perPage);
       $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
       $data['startingIndex'] = $startingIndex;

        return view('pelanggan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah User';
        $data['roles'] = ['admin' => 'Admin'];
        return view('pelanggan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:pelanggans',
            'name' => 'required',
            'email' => 'required|unique:pelanggans',
            'phone' => 'required|unique:pelanggans',
            'alamat' => 'required',

    ]);


        $pelanggan = new Pelanggan();
        $pelanggan->kode = $request->kode;
        $pelanggan->name = $request->name;
        $pelanggan->email = $request->email;
        $pelanggan->phone = $request->phone;
        // $user->password = Hash::make($request->password);
        $pelanggan->alamat = $request->alamat;

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profile_images'), $imageName);
            $pelanggan->profile_image = $imageName;
        }

        $pelanggan->save();
        return redirect('pelanggan')->with('success', 'Tambah Data Berhasil');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        $data['title'] = 'Ubah User';
        $data['row'] = $pelanggan;
    //     if ($pelanggan->id==1){
    //         $data['role'] = ['superadmin' => 'SuperAdmin',];
    //     }else{
    //         $data['role'] = ['admin' => 'Admin',
    //      'superadmin' => 'SuperAdmin',
    // ];}
               return view('pelanggan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Pelanggan $pelanggan)
    {
        $request->validate([
            'kode'=> 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',


        ]);
// dd($user);
        $pelanggan->kode = $request->kode;
        $pelanggan->name = $request->name;
        $pelanggan->email = $request->email;
      if($request->alamat)
       $pelanggan->alamat = $request->alamat;
        // if ($request->password)
            // $pelanggan->password = Hash::make($request->password);
        // $pelanggan->role = $request->role;
        $pelanggan->save();



        if ($request->hasFile('profile_image')) {

            $image = $request->file('profile_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/profile_images'), $imageName);
            $request->user()->profile_image = $imageName;
            $pelanggan->profile_image = $imageName;
            $pelanggan->save();
        }
        return redirect('pelanggan')->with('success', 'Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect('pelanggan')->with('success', 'Data berhasil dihapus');
    }
}
