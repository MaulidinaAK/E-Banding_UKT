<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{

  public function show(Request $request): View
{
    return view('profile.index', [
        'user' => $request->user(),
    ]);
}
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
   public function update(Request $request): RedirectResponse
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',

        'nim' => 'nullable|string|max:30',
        'nip' => 'nullable|string|max:30',
        'prodi' => 'nullable|string|max:100',
        'fakultas' => 'nullable|string|max:100',
        'semester' => 'nullable|string|max:20',
        'no_hp' => 'nullable|string|max:20',

        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $user = $request->user();

    // default update data
    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'nim' => $request->nim,
        'nip' => $request->nip,
        'prodi' => $request->prodi,
        'fakultas' => $request->fakultas,
        'semester' => $request->semester,
        'no_hp' => $request->no_hp,
    ];

    // 🔥 FIX UPLOAD FOTO
 if ($request->hasFile('photo')) {

    $file = $request->file('photo');
    $filename = time().'_'.$file->getClientOriginalName();

    Storage::disk('public')->makeDirectory('photo');

    Storage::disk('public')->putFileAs(
        'photo',
        $file,
        $filename
    );

    $data['photo'] = 'photo/'.$filename;
}

    $user->update($data);

    return redirect()->route('profile.show')
        ->with('success', 'Profil berhasil diperbarui.');
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
