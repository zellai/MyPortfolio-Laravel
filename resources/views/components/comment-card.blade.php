@props(['listing'])

<x-card>
    <form method="POST" action="/listings" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-8">
                    <div class="d-flex flex-column comment-section">
                        <div class="bg-white p-2">
                            <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                                <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">{{auth()->user()->name}}</span><span class="date text-black-50">Shared publicly - Jan 2020</span></div>
                            </div>
                            <div class="mt-2">
                                <p class="comment-text">{{$listing->userComment}}</p>
                            </div>
                        </div>
                        <div class="bg-white">
                            <div class="d-flex flex-row fs-12">
                                <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                                <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span class="ml-1">Comment</span></div>
                                <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                            </div>
                        </div>
                        <div class="bg-light p-2">
                            <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                                <textarea class="form-control ml-1 shadow-none textarea"
                                    name="userComment"
                                    rows="10">{{old('comments')}}</textarea></div>
                            <div class="mt-2 text-right">
                                <button class="btn btn-primary btn-sm shadow-none" 
                                    >Post comment</button>
                                <button href="/"class="btn btn-outline-primary btn-sm ml-1 shadow-none" 
                                    >Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-card>