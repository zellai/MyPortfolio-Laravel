<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class ListingController extends Controller
{
    // show all listings
    public function index(){
        // dd($user);
        return view('listings.projects', [
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(6)
        ]);
    }

    //Show single listing
    public function show(Listing $listing, Comment $comment){
      
        // $comments = Comment::all();
        
        return view('listings.show  ', [
            'listing' => $listing,
            'comments' => Comment::all()
            

        ]);

    }

    // Show Create Form
    public function create(){
        return view('listings.create');
    }

     // Store Listing Data
     public function store(Request $request) {  
        // dd($request->file('image')); 
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
 
        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields); 


        return redirect('/')->with('message', 'Listing created successfully!');
    }
    
    // Show Edit Form
    public function edit(Listing $listing){
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update Listing Data
    public function update(Request $request, Listing $listing) {

        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }


    $formFields = $request->validate([
        'title' => 'required',
        'company' => ['required'],
        'location' => 'required',
        'website' => 'required',
        'email' => ['required', 'email'],
        'tags' => 'required',
        'description' => 'required'
    ]);

    if($request->hasFile('logo')) {
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }


    // $formFields['user_id'] = auth()->id();
 
    $listing->update($formFields); 

    return back()->with('message', 'Listing updated successfully!');
    }
    
    // Delete Listing
    public function destroy(Listing $listing){
        $listing->delete();
        return redirect('/')->with('message', 'Listing Deleted Successfully');
    }

    // Manage Listings
    public function manage() {
        $userId = User::find((auth()->user()->id));
        return view('listings.manage', ['listings' =>  $userId->listings()->get()]);
    }

    // Experience
    public function experience() {
        return view('listings.experience');
    }

    // About
    public function about() {
        return view('listings.about');
    }

    // Projects
    public function projects(){
        return view('listings.projects', [
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(6)
        ]);
    }
}
