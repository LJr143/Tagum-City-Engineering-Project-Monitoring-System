<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $currentPage = $request->query('page', 1);

        $users = User::paginate(10);

        return view('layouts.user.manageUser', compact('users', 'currentPage'));
    }


    public function changeInf(Request $rq)
    {
        $fname = $rq->fname;
        $mname = $rq->mname;
        $lname = $rq->lname;

        $bdate = $rq->bdate;

        $user = User::where('id', '=', Auth::user()->id)->pluck('id');

        User::where('id', '=', $user[0])->update([
            'first_name' => $fname,
            'last_name' => $lname,
            'middle_initial' => $mname,
            'birth_date' => $bdate,
        ]);

        return redirect()->route('userProfile');
    }

    public function updateContact(Request $rq)
    {
        $email = $rq->email;
        $phone = $rq->phone;

        $user = User::where('id', '=', Auth::user()->id)->pluck('id');
        User::where('id', '=', $user[0])->update([
            'email' => $email,
            'contact_number' => $phone,
        ]);

        return redirect()->route('userProfile');
    }

    public function updatePassword(Request $rq)
    {
        // dd(Auth::user()->password);
        // $id = $rq->id;
        $oldPassword = $rq->oldPassword;
        $newPassword = $rq->newPassword;
        $confirmPassword = $rq->confirmPassword;

        // Fetch the authenticated user
        $user = Auth::user();

        // Check if the old password matches
        // $user = User::find($id);
        if (Hash::check($oldPassword, $user->password)) {
            if ($newPassword === $confirmPassword) {
                // Update the user's password
                User::where('id', '=', Auth::user()->id)->update([
                    'password' => Hash::make($newPassword),
                ]);

                return redirect()->route('userProfile')->with('success', 'Password updated successfully.');
            } else {
                return redirect()->back()->withErrors(['confirmPassword' => 'New password and confirmation do not match.']);
            }
        } else {
            return redirect()->back()->withErrors(['oldPassword' => 'The old password is incorrect.']);
            // $request->validate([
            //     'userId' => 'required',
            //     'current_password' => 'required',
            //     'new_password' => 'required|min:6|confirmed',
            // ]);




            // $user = Auth::user();

            // if (!Hash::check($request->current_password, $user->password)) {
            //     return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            // }

            // $user->password = Hash::make($request->new_password);
            // // $user->save();



            // return redirect()->route('userProfile')->with('success', 'Password updated successfully.');
        }
    }

    public function upload(Request $request)
    {

        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // Max size: 2MB
        ]);

        if ($request->file('file')) {
            // Store the file using the Storage facade
            $path = Storage::put('public/profile-images', $request->file('file'));
            $fname = Str::remove('public/', $path);

            User::where('id', '=', Auth::user()->id)->update([
                'profile_photo_path' => $fname,
            ]);
            return back()
                ->with('success', 'File uploaded successfully!')
                ->with('filePath', $path);
        }

        return back()->withErrors('File upload failed.');
    }
}
