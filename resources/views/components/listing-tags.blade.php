@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);
@endphp

<ul class="flex p-0">
    @foreach($tags as $tag)
    <li class="flex items-center justify-center bg-black rounded-xl py-1 px-3 mr-2 text-xs relative">
        <a class=" text-white" href="/listings/projects?tag={{$tag}}">{{$tag}}</a>
    </li>
    @endforeach
</ul>
