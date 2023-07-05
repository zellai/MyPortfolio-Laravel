<x-layout>
@include('partials._search')

<a href="/listings/projects" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
    <x-card class="p-10" bg-black>
        <div
            class="flex flex-col items-center justify-center text-center"
        >
        {{-- {{$listing}} --}}
            <img
                class="w-48 mr-6 mb-6"
                src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}"
                alt=""
            />

            <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
            
            <x-listing-tags :tagsCsv="$listing->tags" />
            
            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
            <div class="text-lg my-4">
                <p>Author: {{$listing->user->name}} </p> 
            </div>

            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Project Description
                    
                </h3>
                <div class="text-lg space-y-6">
                    {{$listing->description}}
                    <hr>
                    {{-- {{$listing->id}} --}}
                    <form method="POST" action="/listings/{{$listing->id}}/comment" enctype="multipart/form-data">
                    {{-- <form method="POST" action="{{ route('comments.store', $listing->id) }}" enctype="multipart/form-data"> --}}
                        @csrf
                        <div class="bg-light p-2">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a><i class="fa fa-message"></i> Comment  
                                </a>
                            </td>
                             <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                                <textarea class="form-control ml-1 shadow-none textarea"
                                    name="userComment"
                                    rows="1">{{old('userComment')}}
                                </textarea>

                                @error('userComment')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mt-2 text-right">
                                <button class="btn btn-primary btn-sm shadow-none" 
                                    >Post comment</button>
                            </div>
                        </div>
                    </form>
                        
                        @unless(count($comments)==0)
                        @foreach ($comments as $comment)
                        <div>
                            <div class="container mt-5">
                                <div class="d-flex justify-content-center row">
                                    <div class="col-md-8">
                                        <div class="d-flex flex-column comment-section">
                                            <div class="bg-white p-2">
                                                <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                                                    <div class="d-flex flex-column justify-content-start ml-2">
                                                        <span class="d-flex d-block font-weight-bold name">{{$comment->user->name}}</span>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <p class="d-flex comment-text">{{$comment->userComment}}</p>    
                                                </div>
                                                <div class="bg-white">
                                                    <div class="d-flex flex-row fs-12">
                                                        @if(Auth::user()->id === $comment->user_id)
                                                        <form>
                                                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                                            <a href="/edit-comment/{{$comment->id}}" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                                                class="fa-solid fa-pen-to-square"></i>
                                                              Edit</a>
                                                        </td>
                                                        </form>
                                                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                                        <form method="POST" action="/comment/{{$comment->id}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                                                        </form>
                                                        </td>
                                                        @endif                              
                                                    </div>
                                                </div>                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endunless
                   

                    <a
                        href="mailto:{{$listing->email}}"
                        class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-envelope"></i>
                        Contact Me</a
                    >

                    <a
                        href="{{$listing->website}}"
                        target="_blank"
                        class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-globe"></i> Visit
                        Website</a
                    >
                </div>
            </div>
            
        </div>
    </x-card>
    

    {{-- <x-card class="mt-4 p-2 flex space-x-6">
        <a href="/lsapp/public/listings/{{$listing->id}}/edit">
            <i class="fa-solid fa-pencil"></i> Edit
        </a>

        <form method="POST" action="/lsapp/public/listings/{{$listing->id}}">
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete </button>
    </x-card> --}}
</div>
</x-layout>