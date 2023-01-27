<x-guest-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('recipe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border flex space-x-1">

            @forelse ($recipes as $recipe)
            <div class="rounded border md:w-1/2 lg:w-1/4 p-3  h-[60vh] flex flex-col ">
                @if($recipe->image)
                <img src="{{asset('storage/image/'.$recipe->image)}}" class="w-full">
                @else

                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyjrgj-649qcfS0TeRPIPoOuBV4LMj6alNRQ&usqp=CAU"
                    class="w-full">
                @endif
                <div class="flex w-full justify-between">
                    <span class="text-lg italic">{{$recipe->name}}</span>
                    <span class="text-lg italic">{{$recipe->price}}dt</span>
                </div>
                <div class="flex flex-col text-xs">
                    @forelse($recipe->ingredients as $ingredient)
                    <span>{{$ingredient->name}}</span>
                    @empty

                    @endforelse
                </div>
            </div>
            @empty
            <p>No recipes</p>
            @endforelse


        </div>
    </div>
</x-guest-layout>