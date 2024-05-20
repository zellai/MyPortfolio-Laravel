@props(['comment'])
@props(['listing'])

<x-card>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endunless
</x-card>

