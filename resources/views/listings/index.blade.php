<x-layout>
@include('partials._hero')
@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
<!-- <h1>{{$heading}}</h1> -->

@unless(count($listings) == 0)

@foreach($listings as $listing)
<!-- @include('components.listing-card') -->
<x-listing-card :listing="$listing" />
@endforeach
<div>
@else
<p>No listings found</p>
@endunless
</div>

</x-layout>