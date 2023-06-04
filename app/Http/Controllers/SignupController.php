<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Lecturer;
use App\Models\Student;

class SignupController extends Controller
{
    //
    public function index() {
        return view('signup', [
            'title' => 'Sign Up'
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|max:10|unique:students|unique:lecturers',
            'email' => 'required|email:dns|max:255|unique:students|unique:lecturers',
            'password' => 'required|min:5|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        if(substr($validatedData['code'], 0, 1) === 'D') {
            Lecturer::insert([
                'name' => $validatedData['name'],
                'code' => $validatedData['code'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password']
            ]);
        }
        else {
            Student::insert([
                'name' => $validatedData['name'],
                'code' => $validatedData['code'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password']
            ]);
        }

        return redirect('/')->with('success', 'Registration successfull! Please login');
    }
}
