@props(['listing'])

<x-card>
    <div class="flex relative">
        <img
            class="hidden w-48 mr-6 md:block mx-auto bg-white dark:bg-gray-900 rounded-lg shadow-lg transition duration-500 hover:scale-125"
            src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('Images/no-image.png')}}"
            alt=""
        />
        <div class="card-body">
            <h3 class="text-2xl">
                <a href="/listings/{{$listing->id}}">{{$listing->title}}</a>
            </h3>

            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
        </div>
    </div>
</x-card>
