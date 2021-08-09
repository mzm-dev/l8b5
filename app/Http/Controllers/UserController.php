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
        //Select berserta pagination
        $users = User::paginate(5);
        //$userArray = User::simplePaginate(5);

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /** Mula Blok Validation*/
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:8|confirmed',
        ];//Rules

        $params = [];//Message

        $rename = [
            'nama' => 'Nama User',
            'email' => 'E-mel',
            'password' => 'Kata Laluan',
        ];//Rename Label

        // Validate
        $request->validate($rules, $params, $rename);
        /** Tamat Blok Validation*/

        //Merge lain-lain field sebelum simpan
        //field yang tiada dari form
        $request->merge(['password' => Hash::make($request->password)]); //insert requst fields

        //simpan semua field termasuk yang di merge
        User::create($request->all());

        //Rediect ke route name alias url
        //Rediect dengan message success
        return redirect()
            ->route('user.index')
            ->with('success', 'Maklumat user telah berjaya disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
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
        /** Mula Blok Validation*/
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|max:8|confirmed',
        ];//Rules

        $params = [];//Message

        $rename = [
            'nama' => 'Nama User',
            'email' => 'E-mel',
            'password' => 'Kata Laluan',
        ];//Rename Label

        // Validate
        $request->validate($rules, $params, $rename);
        /** Tamat Blok Validation*/

        //Jika ada kemasukkan input passord
        if ($request->has('password')) {

            //Merge lain-lain field sebelum simpan
            //contoh ubah value baharu dari field form
            $request->merge(['password' => Hash::make($request->password)]);
        }

        //kemaskini semua field termasuk yang di merge
        $user->update($request->all());

        //Rediect ke route name alias url
        //Rediect dengan message success
        return redirect()
            ->route('user.index')
            ->with('success', 'Maklumat user telah berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //Hapus maklumat user
        $user->delete();

        //Rediect ke route name alias url
        //Rediect dengan message success
        return redirect()
            ->route('user.index')
            ->with('success', 'Maklumat user telah berjaya dihapuskan');
    }
}
