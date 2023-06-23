<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    //Create comment
    public function store(Request $request) {
    $formFields = $request->validate([
        'comments' => 'required',
    ]);

    if($request->hasFile('logo')) {
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }

    Comment::create($formFields); 


    return redirect('/')->with('message', 'Listing created successfully!');
    }
}