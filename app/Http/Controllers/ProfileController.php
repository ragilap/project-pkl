<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function edit(Request $request): View
    {
        return view('profile', [
            'user' => $request->user(),
        ]);
    }

    public function useredit(Request $request): View
    {
        return view('profile.edit-user', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validatedData = $request->validated();


        if ($request->hasFile('profile_image')) {

            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profile_images'), $imageName);
            $request->user()->profile_image = $imageName;
            $user->profile_image = $imageName;
            $user->save();
        }
        // Mengganti username jika ada perubahan
        if ($user->username !== $validatedData['username']) {
            // Periksa apakah username sudah digunakan sebelumnya
            $existingUser = User::where('username', $validatedData['username'])->first();
            if ($existingUser) {
                return redirect()->route('profile.edit')->with('error', 'Username already exists. Please choose a different one.');
            }
            $user->username = $validatedData['username'];
        }


        if ($request->current_password != null) {
            // dd(Hash::check($request->current_password, $user->password));
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'The current password is incorrect.']);
            } else {
                $user->password = Hash::make($request->password);
                $user->save(); // Simpan perubahan ke database
            }
        }

        // Mengganti email dan mereset verifikasi jika ada perubahan
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Mengisi data lainnya
        $user->fill($validatedData);
        $user->save();
// dd($user);
        return redirect('dashboard')->with('success', 'Ubah Data Berhasil');
    }
    public function uploadImage(Request $request): RedirectResponse
    {
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profile_images'), $imageName);
            $request->user()->profile_image = $imageName;
            $request->user()->save();
        }
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
