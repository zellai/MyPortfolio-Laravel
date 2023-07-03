@props(['comments'])

<x-card>
    @unless(count($comments)==0)
    @foreach ($comments as $comment)
    <form method="get" action="/listings" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-8">
                    <div class="d-flex flex-column comment-section">
                        <div class="bg-white p-2">
                            <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                                <div class="d-flex flex-column justify-content-start ml-2">
                                    <span class="d-flex d-block font-weight-bold name">{{auth()->user()->name}}</span>
                                </div>
                            </div>
                            <div class="mt-2">
                                <p class="d-flex comment-text">{{$comment->userComment}}</p>    
                            </div>
                            <div class="bg-white">
                                <div class="d-flex flex-row fs-12">
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                        <a href="/edit-comment/{{$comment->id}}" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                            class="fa-solid fa-pen-to-square"></i>
                                          Edit</a>
                                      </td>
                                      <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                        <form method="POST" action="/listings">
                                          @csrf
                                          @method('DELETE')
                                          <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                                        </form>
                                      </td>                              
                                </div>
                            </div>                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endforeach
    @endunless
</x-card>

