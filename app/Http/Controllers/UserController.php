<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        return view('users.index', [
            'users' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:users,nis',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'level' => 'required'
        ]);
        $array = $request->only([
            'nis', 'name', 'email', 'password', 'level', 'aktif'
        ]);
        $array['password'] = Hash::make($array['password']);
        $user = User::create($array);
        return redirect()->route('users.index')->with('success_message', 'Berhasil menambah user baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Menampilkan Form Edit
        $user = User::find($id);
        if (!$user) return redirect()->route('users.index')->with('error_message', 'User dengan id'. $id .' tidak ditemukan');
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Mengedit Data User
        $request->validate([
            'nis' => 'required|unique:users,nis,'.$id,
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'sometimes|nullable|confirmed',
            'level' => 'required',
            'aktif' => 'required'
        ]);
        $user = User::find($id);
        $user->nis = $request->nis;
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $user->aktif = $request->aktif;
        $user->save();

        return redirect()->route('users.index')->with('success_message', 'Berhasil mengubah user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // Menghapus user
        $user = User::find($id);
        if($user->id == $request->user()->id) return redirect()->route('users.index')->with('error_message', 'Tidak bisa menghapus diri sendiri');
        if($user->level == 'admin') return redirect()->route('users.index')->with('error_message', 'Tidak bisa menghapus admin');
        if($user) $user->delete();

        return redirect()->route('users.index')->with('success_message', 'Berhasil menghapus user');
    }
}
