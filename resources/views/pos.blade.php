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
                <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MTB8fHxlbnwwfHx8fA%3D%3D&w=1000&q=80"
                    class=" w-full">
                <div class="flex space-">
                    <span class="text-lg italic">Salade viennienne de marie</span>
                    <span class="text-lg italic">Salade viennienne de marie</span>
                </div>
                <div class="flex flex-col">
                    @forelse($recipe->ingredients as $ingredient)
                    <span> {{$ingredient->name}}</span>
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