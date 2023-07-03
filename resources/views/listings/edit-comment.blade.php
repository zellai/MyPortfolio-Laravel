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
                {{-- <img
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
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Project Description
                        
                    </h3>
                    <div class="text-lg space-y-6">
                        {{$listing->description}}
                        <hr> --}}
                        
                       <form method="POST" action="/comment/{{$comment->id}}" enctype="multipart/form-data">
                        {{-- <form method="POST" action="{{ route('comments.store', $listing->id) }}" enctype="multipart/form-data"> --}}
                            @csrf
                            @method('PUT')
                            <div class="bg-light p-2">
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a><i class="fa fa-message"></i> Comment  
                                    </a>
                                </td>
                                
                                <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                                    <textarea class="form-control ml-1 shadow-none textarea"
                                        name="userComment"
                                        rows="2">{{$comment->userComment}}
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
    
                    {{-- </div>
                </div> --}}
                
            </div>
        </x-card>
    </div>
    </x-layout>