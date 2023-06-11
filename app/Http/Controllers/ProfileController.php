<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Comment;
use App\Models\Lecturer;
use App\Models\Student;

class ProfileController extends Controller
{
    //
    public function index() {
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
        }
        elseif (Auth::guard('lecturer')->check()) {
            $user = Auth::guard('lecturer')->user();
        }

        $commentFlag = Comment::orderByDesc('id')->where('student_id', $user->id)->first();
        $comment = Comment::orderByDesc('id')->where('student_id', $user->id)->paginate(5);

        return view('profile', [
            'title' => 'Profile',
            'users' => $user,
            'comments' => $comment,
            'commentFlag' => $commentFlag
        ]);
    }

    public function editProfile() {
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
        }
        elseif (Auth::guard('lecturer')->check()) {
            $user = Auth::guard('lecturer')->user();
        }

        return view('editProfile', [
            'title' => 'Profile',
            'users' => $user
        ]);
    }

    public function updateProfile(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('profile-images');
        }
        else {
            if($request->oldImage) {
                $validatedData['image'] = $request->oldImage;
            }
            else {
                $validatedData['image'] = NULL;
            }
        }

        if (Auth::guard('student')->check()) {
            Student::where('id', $request->user_id)->update([
                'name' => $validatedData['name'],
                'pic' => $validatedData['image']
            ]);
        }
        elseif (Auth::guard('lecturer')->check()) {
            Lecturer::where('id', $request->user_id)->update([
                'name' => $validatedData['name'],
                'pic' => $validatedData['image']
            ]);
        }

        return redirect('/profile')->with('profileUpdated', 'Profile has been successfully updated!');
    }
}
