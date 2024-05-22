<x-layout>
<!-- @include('partials._search') -->

<a href="/listings/projects" class="inline-block text-black ml-4 mb-4 mt-4">
    <i class="fa-solid fa-arrow-left"></i>
    Back
</a>
<div class="mx-4">
    <x-card class="p-10" bg-black>
        <div class="row">
        {{-- {{$listing}} --}}

            <div class="col col-lg-1">
                <img
                    class="rounded-circle border border-dark mb-3"
                    src="{{$listing->user->userImage ? asset('storage/' . $listing->user->userImage) : asset('images/default-image.jpg')}}"
                    width="80">
                </div>
                <div class="col">
                    <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
                    <div class="text-xl font-bold mb-4">{{$listing->company}}</div>

                    <x-listing-tags :tagsCsv="$listing->tags" />

                    <div class="text-lg my-4">
                        <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                        <span class="d-flex d-block font-weight-bold name mt-3">Author: {{$listing->user->name}}</span>
                    </div>
                    <h3 class="text-3xl font-bold mb-4">
                        Project Description
                    </h3>
                    {{$listing->description}}
                </div>
            <div class="col-md-auto mb-3">
                <!-- {{$listing->website}} ?  -->
                    <iframe width="650" height="315" src="{{$listing->website}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

            </div>
            <div class="border border-gray-200 w-full mb-6 mt-3"></div>
            <div class="w-fullbg-white rounded-lg border p-1 md:p-3 me-10">
                <h3 class="font-semibold p-1">Discussion</h3>
                <div class="flex flex-col gap-5 m-3">
                    @unless(count($comments)==0)
                    @foreach ($comments as $comment)
                    @if($listing->id === $comment->listing_id)
                    <div>
                        <div class="flex w-full justify-between border rounded-md">

                            <div class="p-3">
                                <div class="flex gap-3 items-center">
                                    <img
                                        class="rounded-circle border border-dark"
                                        src="{{$comment->user->userImage ? asset('storage/' . $comment->user->userImage) : asset('Images/default-image.jpg')}}"
                                        width="40"
                                    >
                                    <div class="d-flex flex-column justify-content-start ml-2">
                                        <span class="d-flex d-block font-weight-bold name">{{$comment->user->name}}</span>
                                    </div>
                                </div>
                                <div class="mt-2 mb-3">
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
                                        @elseif(Auth::user()->id === $listing->user_id)
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
                            <div class="flex flex-col items-end gap-3 pr-3 py-3">
                                <div>
                                    <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                    </svg>
                                </div>
                                <div>
                                    <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endunless
                    <form method="POST" action="/listings/{{$listing->id}}/comment" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col gap-2 m-3">
                            <div class="d-flex flex-row align-items-start">
                                <img class="rounded-circle border border-dark ms-3 me-6"
                                    src="{{auth()->user()->userImage ? asset('storage/' . auth()->user()->userImage) : asset('Images/default-image.jpg')}}"
                                    width="50"
                                >
                                <div class="w-full me-11">
                                    <input
                                        class="ps-3 bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-1 font-medium placeholder-gray-400 focus:outline-none focus:bg-white"
                                        name="userComment"
                                        placeholder="Comment" required>
                                        {{old('userComment')}}
                                    </input>
                                </div>

                                @error('userComment')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="w-full flex justify-end px-3">
                                <button class="px-2.5 py-1.5 rounded-md text-white bg-indigo-500 text-lg me-8">
                                    Post comment
                                </button>
                            </div>
                        </div>
                    </form>
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
