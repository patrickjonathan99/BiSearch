<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Models\Type;
use App\Models\Post;

class NewRecruitmentController extends Controller
{
    //
    public function index() {
        $user = Auth::guard('lecturer')->user();
        $department = Department::orderBy('id')->get();
        $type = Type::orderBy('id')->get();

        return view('newFormRecruit', [
            'title' => 'New Recruitment',
            'users' => $user,
            'departments' => $department,
            'types' => $type
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'reqStudent' => 'required|integer',
            'topic' => 'required|max:255',
            'description' => 'required|max:255',
            'duedate' => 'required|date|after:today',
            'department' => 'required',
            'type' => 'required'
        ]);

        Post::insert([
            'title' => $validatedData['title'],
            'topic' => $validatedData['topic'],
            'required_student' => $validatedData['reqStudent'],
            'description' => $validatedData['description'],
            'due_date' => $validatedData['duedate'],
            'status' => 'Ongoing',
            'department_id' => $validatedData['department'],
            'type_id' => $validatedData['type'],
            'lecturer_id' => $request->lecturer_id
        ]);

        return redirect('/myforum')->with('postCreated', 'Post has been successfully created!');
    }
}
