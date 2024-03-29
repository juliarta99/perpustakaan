<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
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
        return view('login', 
        [
            'title' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'kode' => 'required',
            'password' => 'required'
        ]);
        
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if(Auth::user()->is_petugas != 0 || Auth::user()->is_admin != 0) {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        return Redirect::back()->withErrors(['error' => 'Id Pengguna atau Password salah!']);
    }

    public function all()
    {
        return view('dashboard.user.index',
        [
            'title' => 'Dashboard User',
            'users' => User::latest()->where('is_admin', 0)->paginate(8)
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.create', 
        [
            'title' => 'Dashboard User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kode' => 'required|unique:users',
            'name' => 'required|max:255',
            'jk' => 'required|max:1',
            'no_telp' => 'required',
            'alamat' => 'required',
            'is_petugas' => 'nullable',
            'password' => ['required', Password::min(8)->numbers()->symbols() ],
        ]);

        $validateData['password'] = Hash::make($request->password);

        User::create($validateData);
        return redirect('/dashboard/user/all')->with('succes', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profile', 
        [
            'title' => "Profile $user->name",
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit',
        [
            'title' => "Edit $user->name",
            'user' => $user,
        ]);
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
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'jk' => 'required|max:1',
            'is_petugas' => 'nullable',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        if($request->is_petugas == null) {
            $validateData['is_petugas'] = 0;
        };

        User::where('id', $user->id)->update($validateData);
        return redirect('/dashboard/user/all')->with('succes', 'User berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy('id', $user->id);
        return redirect('/dashboard/user/all')->with('succes', 'User berhasil dihapus');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
