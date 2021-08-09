<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();

        return view('profile.show', compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function password()
    {
        $user = Profile::find(Auth::user()->id);
        return view('profile.password', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Profile::find(Auth::user()->id);
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function update_password(Request $request, Profile $profile)
    {

        $request->validate([
            'current_password' => 'required|password',
            'password' => 'required|min:6|max:8|confirmed',
        ]);

        $request->only('password');

        $request->merge(['password' => Hash::make($request->password)]);

        $profile->update($request->all());

        Auth::logout();

        return redirect()
            ->route('login')
            ->with('success', 'Kata Laluan telah berjaya dikemaskini');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $profile->update($request->all());

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Maklumat user telah berjaya dikemaskini');
    }
}
