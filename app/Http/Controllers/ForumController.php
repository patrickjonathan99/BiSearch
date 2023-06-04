<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Department;
use App\Models\Type;
use Carbon\Carbon;

class ForumController extends Controller
{
    //
    public function myforum() {
        $user = Auth::guard('lecturer')->user();
        $post = Post::where('lecturer_id', $user->id)->where('status', 'Ongoing')->get();
        $pastpost = Post::where('lecturer_id', $user->id)->where('status', 'Past')->paginate(3);

        return view('myforum', [
            'title' => 'My Forum',
            'users' => $user,
            'posts' => $post,
            'pastposts' => $pastpost
        ]);
    }

    public function forum() {
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
        }
        elseif (Auth::guard('lecturer')->check()) {
            $user = Auth::guard('lecturer')->user();
        }

        $post = Post::orderByDesc('id')->where('status', 'Ongoing')->paginate(9);

        return view('forum', [
            'title' => 'Forum',
            'users' => $user,
            'posts' => $post
        ]);
    }

    public function breakdown($id) {
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
        }
        elseif (Auth::guard('lecturer')->check()) {
            $user = Auth::guard('lecturer')->user();
        }

        $post = Post::where('id', $id)->first();

        $comment = Comment::where('student_id', $user->id)->where('post_id', $id)->first();
        $allcomment = Comment::orderByRaw("CASE WHEN status = 'Accepted' THEN 1 WHEN status = 'Pending' THEN 2 ELSE 3 END")->where('post_id', $id)->get();

        $currentDate = Carbon::now();

        if ($currentDate >= $post->due_date) {
            Post::where('id', $post->id)->update([
                'status' => 'Past'
            ]);

            Comment::where('post_id', $post->id)->where('status', 'Pending')->update([
                'status' => 'Full Slot'
            ]);
        }

        return view('forumBD', [
            'title' => 'Forum',
            'users' => $user,
            'posts' => $post,
            'comments' => $comment,
            'allcomments' => $allcomment
        ]);
    }

    public function editForum($id) {
        $post = Post::where('id', $id)->first();
        $department = Department::orderBy('id')->get();
        $type = Type::orderBy('id')->get();

        return view('editForum', [
            'title' => 'Forum',
            'posts' => $post,
            'departments' => $department,
            'types' => $type
        ]);
    }

    public function updateForum(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'reqStudent' => 'required|integer',
            'topic' => 'required|max:255',
            'description' => 'required|max:255',
            'duedate' => 'required|date|after:today',
            'department' => 'required',
            'type' => 'required'
        ]);

        Post::where('id', $request->post_id)->update([
            'title' => $validatedData['title'],
            'topic' => $validatedData['topic'],
            'required_student' => $validatedData['reqStudent'],
            'description' => $validatedData['description'],
            'due_date' => $validatedData['duedate'],
            'department_id' => $validatedData['department'],
            'type_id' => $validatedData['type'],
        ]);

        return redirect('/myforum')->with('updateSuccess', 'Post has been successfully updated!');
    }

    public function storeComment(Request $request) {
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
        }
        elseif (Auth::guard('lecturer')->check()) {
            $user = Auth::guard('lecturer')->user();
        }

        $validatedData = $request->validate([
            'reason' => 'required|max:255'
        ]);

        Comment::insert([
            'comment' => $validatedData['reason'],
            'status' => 'Pending',
            'student_id' => $user->id,
            'post_id' => $request->post_id
        ]);

        return back()->with('refresh', true);
    }

    public function updateComment(Request $request) {
        $validatedData = $request->validate([
            'editField' => 'required|max:255'
        ]);

        Comment::where('id', $request->comment_id)->update([
            'comment' => $validatedData['editField']
        ]);

        return back()->with('refresh', true);
    }

    public function acceptComment(Request $request) {
        Comment::where('id', $request->comment_id)->update([
            'status' => 'Accepted'
        ]);

        $post = Post::where('id', $request->post_id)->first();
        $accepted = Comment::where('post_id', $request->post_id)->where('status', 'Accepted')->get();
        $currentStudent = count($accepted);

        if ($currentStudent >= $post->required_student) {
            Post::where('id', $request->post_id)->update([
                'status' => 'Past'
            ]);

            Comment::where('post_id', $request->post_id)->where('status', 'Pending')->update([
                'status' => 'Full Slot'
            ]);
        }

        return back()->with('refresh', true);
    }
}
