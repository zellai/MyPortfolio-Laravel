<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Listing;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;

class CommentController extends Controller
{

    // Show Comment
    public function show(Comment $comment){
        // dd($listing);
        return view('listings.show  ', [
            'comments' => Comment::latest()
        ]);
    }
    // Comment
    public function store(Request $request,$id) {
        // dd($id);
        // dd($request->userComment);
        // $formFields = $request->validate([
        //     'userComment' => 'nullable',
        // ]);
 
        $formFields['user_id'] = auth()->id();
        $formFields['listing_id'] = $id;
        $formFields['userComment'] = $request->userComment;



        Comment::create($formFields); 


        return redirect('/')->with('message', 'Comment created successfully!');
    }
}
