<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Mail\ApiTokenEmail;
use ErrorException;
use Exception;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;

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
        $request->user()->fill($request->validated());

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

    /**
     * Generate a API token for user use.
     */
    public function tokenGenerate(Request $request) : View
    {

        $data = array();

        if (Auth::user()->tokens->first() !== null) {

            $data['message'] = 'You cannot generate a API token more than once';

        } else {

            try {

                $user = $request->user();

                $token = $user->createToken('AuthToken')->plainTextToken;

                Mail::to(Auth::user()->email)->send(new ApiTokenEmail(['token' => $token]));

                $data['token'] = $token;

            } catch (Exception $e) {

                $data['message'] = $e->getMessage();

            } 

        }

        return view('token', $data);
    }
}
