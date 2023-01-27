<x-guest-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('recipe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <h2 class="text-xl mx-auto w-full text-center">Gérer Recette</h2>
        <div class="top-0 fixed w-screen z-10" x-data="{ showMessage: true }" x-transition x-show="showMessage"
            x-init="setTimeout(() => showMessage = false, 3000)">
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
                        <th class=" px-3 py-2">ingredients</th>
                        <th class=" px-3 py-2">action</th>
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
                        <td class="px-3 py-2 ">
                            {{ count($recipe->ingredients) }}
                            
                        </td>
                        <td class="px-3 py-2 flex border">
                            <div class="flex  justify-center">
                                @livewire('edit-recipe',['recipe_id'=>$recipe->id,key($recipe->id)])
                            </div>
                            
                        </td>
                    </tr>


                    @empty

                    @endforelse

                </tbody>
            </table>

        </div>
    </div>
</x-guest-layout>