<x-layout>
    @include('partials._search')

    <a href="/listings/projects" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i>
        Back
    </a>
    <div class="mx-4">
        <div class="max-w-lg mx-auto border px-6 py-4 rounded-lg">
            <form method="POST" action="/comment/{{$comment->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex items-center mb-6">
                    <img
                    src="{{ auth()->user()->userImage ? asset('storage/' . auth()->user()->userImage) : asset('Images/default-image.jpg') }}"
                        alt="Avatar" class="w-12 h-12 rounded-full mr-4" />
                    <div>
                        <div class="text-lg font-medium text-gray-800">{{$comment->user->name}}</div>
                        <div class="text-gray-500">2 hours ago</div>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-start">
                    <textarea class="form-control ml-1 shadow-none textarea"
                        name="userComment"
                        rows="2">{{$comment->userComment}}
                    </textarea>

                    @error('userComment')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mt-2 text-right">
                    <button class="btn btn-primary btn-sm shadow-none">
                        Update comment
                    </button>
                </div>
            </form>
        </div>
    </div>
    </x-layout>
