<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
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
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        if ($request->hasFile('image')) {
            // Get the uploaded file
            $image = $request->file('image');

            // Define the filename and storage path
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = storage_path('app/public/uploads/' . $filename);

            // Move the file to the desired location
            $image->move(storage_path('app/public/uploads'), $filename);

            // Optionally, store the file path in the database
            $request->user()->image = 'uploads/' . $filename;
        }

        // Update user profile as usual
        $request->user()->fill($request->validated());
        // Invalidate the email verification if the email was changed
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

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
