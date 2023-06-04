<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HistoryController extends Controller
{
    //
    public function index() {
        $history = Post::where('status', 'Past')->paginate(5);

        return view('history', [
            'title' => 'History',
            'histories' => $history
        ]);
    }
}
