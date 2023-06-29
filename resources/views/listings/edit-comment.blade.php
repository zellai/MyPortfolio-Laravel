<x-layout>
@props(['comments'])


    <x-card>
        <form method="POST" action="/listings/{{$listing->id}}/comment" enctype="multipart/form-data">
        {{-- <form method="POST" action="{{ route('comments.store', $listing->id) }}" enctype="multipart/form-data"> --}}
            @csrf
            <div class="bg-light p-2">
                <label
                    for="userComment"
                    class="inline-block text-lg mb-2"> 
                    Comment
                </label>
                <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                    <textarea class="form-control ml-1 shadow-none textarea"
                        name="userComment"
                        rows="1">{{$comment->userComment}}
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
    </x-card>
</x-layout>

