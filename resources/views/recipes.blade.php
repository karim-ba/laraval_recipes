<x-guest-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('recipe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="top-0 fixed w-screen z-10" x-data="{ showMessage: true }" x-transition x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
            @if (session()->has('message'))
            <div class="p-3 text-green-700 bg-green-300 rounded">
                {{ session()->get('message') }}
            </div>
            @endif
            @if (session()->has('alert'))
            <div class="p-3 text-orange-700 bg-orange-300 rounded">
                {{ session()->get('message') }}
            </div>
            @endif
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border flex space-x-1">
            <table class="mx-auto table-auto border-red-600 text-sm text-left rounded-lg  text-gray-500 mb-5 ">
                <thead class="text-xs text-white bg-teal-700 uppercase ">
                    <tr class="px-3">
                        <th class=" px-3 py-2">Name</th>
                        <th class=" px-3 py-2">prix</th>
                        <th class=" px-3 py-2">preparation time</th>
                        <th class=" px-3 py-2">ingredient</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recipes as $recipe)

                    <tr class="border-b border-x">
                        <td class=" px-3 py-2">{{$recipe->name}}</td>
                        <td class=" px-3 py-2">{{$recipe->price}}</td>
                        <td class=" px-3 py-2">{{
                            Carbon\CarbonInterval::seconds($recipe->preparation_time)->cascade()->forHumans() ?? '' }}
                        </td>
                        <td class="px-3 py-2">
                            <div class="flex w-full justify-center">
                                @livewire('edit-recipe',['recipe_id'=>$recipe->id,key($product['id'])])
                            </div>
                        </td>
                    </tr>
                    {{-- <div class="rounded border md:w-1/2 lg:w-1/4 p-3  h-[60vh] flex flex-col ">
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
                    </div> --}}

                    @empty
                    
                    @endforelse

                </tbody>
            </table>

        </div>
    </div>
</x-guest-layout>