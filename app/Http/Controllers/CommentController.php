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

    // Show Create Form
    public function create(Listing $listing, $id){
        return view('listings.show', [
            'listing' => $listing,
        ]);
    }

    // Comment
    public function store(Request $request,$id, Comment $comment) {
    
        $formFields['user_id'] = auth()->id();
        $formFields['listing_id'] = $id;
        $formFields['userComment'] = $request->userComment;



        Comment::create($formFields); 


        return redirect('/')->with('message', 'Comment created successfully!');
    }

    public function edit(Comment $comment,$id, Listing $listing){
        $comment = $comment->find($id);
        return view('listings.edit-comment', [
            'comment' => $comment,
            'listing' => $listing
        ]);
    }


    // Update Listing Data
    public function update(Request $request, $id, Comment $comment) {

        // // Make sure logged in user is owner
        // if($comment->user_id != auth()->id()) {
        //     abort(403, 'Unauthorized Action');
        // }

    $comment = Comment::findOrFail($id);
    $comment->userComment = $request->input('userComment');
    // ... additional validation or updates as needed
    $comment->save();

    return back()->with('message', 'Comment updated successfully!');

    }

     // Delete Comment
     public function destroy(Comment $comment, $id){
        $comment = $comment->find($id);
        $comment->delete();
        return redirect('/')->with('message', 'Comment Deleted Successfully');
    }
}
