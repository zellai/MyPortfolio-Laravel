@props(['comments'])

<x-layout>
    @include('partials._search')
    
    <a href="/listings/projects" class="inline-block text-black ml-4 mb-4"
                    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        

<x-card>
    <form method="POST" action="/comments" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-8">
                    <div class="d-flex flex-column comment-section">
                        <div class="bg-white p-2">
                            <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                                <div class="d-flex flex-column justify-content-start ml-2">
                                    <span class="d-flex d-block font-weight-bold name">{{auth()->user()->name}}</span>
                                    <span class="d-flex date text-black-50">Shared publicly - Jan 2020</span>
                                </div>
                            </div>
                            <div class="mt-2">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-card>

</x-layout>