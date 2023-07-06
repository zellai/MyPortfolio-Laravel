<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{


    // Show Create Form
    // public function create($id){
    //     $comment = Comment::find($id);  

    //     return view('listings.create-comment')->with('comment', $comment);
    // }

    // Comment
    public function store(Request $request,$id, Comment $comment) {
      
        $formFields['user_id'] = auth()->user()->id;
        $formFields['listing_id'] = $id;
        $formFields['userComment'] = $request->userComment;
        $formFields['name'] = auth()->user()->name; 


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
        // if($listing->user_id != auth()->id()) {
        //     abort(403, 'Unauthorized Action');
        // }

    $comment = Comment::findOrFail($id);
    $comment->userComment = $request->input('userComment');
    // ... additional validation or updates as needed
    $comment->save();

    return back()->with('message', 'Comment updated successfully!');

    }

     // Delete Comment
     public function destroy($id, Listing $listing){
    

        $comment = Comment::findOrFail($id);
        
        $listing->user_id = auth()->user()->id;
        // dd(auth()->user()->id);
    
        // Check if the authenticated user owns the comment and the listing
        if ((Auth::user()->id === $comment->user_id)||(Auth::user()->id === $listing->user_id)) {
            $comment->delete();
    
            return back()->with('message', 'Comment deleted successfully.');

        } else {
            return back()->with('message', 'You are not authorized to delete this comment.');
        }
    }
}
