<div class="d-flex flex-row user-info">
    <img 
        class="rounded-circle border border-dark" 
        src="{{$listing->image ? asset('storage/' . $listing->image) : asset('images/default-image.jpg')}}" 
        width="40"
    >
    <div class="d-flex flex-column justify-content-start ml-2">
        <span class="d-flex d-block font-weight-bold name">{{$comment->user->name}}</span>
    </div>
</div>