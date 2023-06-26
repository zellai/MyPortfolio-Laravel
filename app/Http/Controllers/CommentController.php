<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    // Show Comment
    public function show(Comment $comment){
        // dd($listing);
        return view('listings.show  ', [
            'comments' => Comment::all()
        ]);
    }
    // Comment
    public function store(Request $request) {
        $formFields = $request->validate([
            'userComment' => 'required'
        ]);
 

        $formFields['user_id'] = auth()->id();

        Comment::create($formFields); 


        return redirect('/')->with('message', 'Comment created successfully!');
    }
}
