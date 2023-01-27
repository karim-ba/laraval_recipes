<div x-data="{showModal :false }">
    <button @click="showModal =! showModal"
        class="bg-white hover:bg-gray-100 text-gray-500 font-semibold px-4 border-transparent  border-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
            <path fill-rule="evenodd"
                d="M11.828 2.25c-.916 0-1.699.663-1.85 1.567l-.091.549a.798.798 0 01-.517.608 7.45 7.45 0 00-.478.198.798.798 0 01-.796-.064l-.453-.324a1.875 1.875 0 00-2.416.2l-.243.243a1.875 1.875 0 00-.2 2.416l.324.453a.798.798 0 01.064.796 7.448 7.448 0 00-.198.478.798.798 0 01-.608.517l-.55.092a1.875 1.875 0 00-1.566 1.849v.344c0 .916.663 1.699 1.567 1.85l.549.091c.281.047.508.25.608.517.06.162.127.321.198.478a.798.798 0 01-.064.796l-.324.453a1.875 1.875 0 00.2 2.416l.243.243c.648.648 1.67.733 2.416.2l.453-.324a.798.798 0 01.796-.064c.157.071.316.137.478.198.267.1.47.327.517.608l.092.55c.15.903.932 1.566 1.849 1.566h.344c.916 0 1.699-.663 1.85-1.567l.091-.549a.798.798 0 01.517-.608 7.52 7.52 0 00.478-.198.798.798 0 01.796.064l.453.324a1.875 1.875 0 002.416-.2l.243-.243c.648-.648.733-1.67.2-2.416l-.324-.453a.798.798 0 01-.064-.796c.071-.157.137-.316.198-.478.1-.267.327-.47.608-.517l.55-.091a1.875 1.875 0 001.566-1.85v-.344c0-.916-.663-1.699-1.567-1.85l-.549-.091a.798.798 0 01-.608-.517 7.507 7.507 0 00-.198-.478.798.798 0 01.064-.796l.324-.453a1.875 1.875 0 00-.2-2.416l-.243-.243a1.875 1.875 0 00-2.416-.2l-.453.324a.798.798 0 01-.796.064 7.462 7.462 0 00-.478-.198.798.798 0 01-.517-.608l-.091-.55a1.875 1.875 0 00-1.85-1.566h-.344zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z"
                clip-rule="evenodd" />
        </svg>

    </button>


    <!-- Modal -->
    <div class="border w-full h-full fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
        x-show="showModal" x-transition:enter="ease-out duration-100" x-transition:enter-start="opacity-0 "
        x-transition:enter-end="opacity-100 " x-transition:leave="ease-in duration-100"
        x-transition:leave-start="opacity-100 " x-transition:leave-end="opacity-0 " x-cloak>

        <div class="text-gray-900 w-full md:w-1/3 h-full md:h-4/5 duration-200 absolute text-xs mx-auto text-left bg-gray-100  rounded-lg overflow-hidden shadow-lg"
            @click.away="showModal = false" x-transition>
            <div class="w-full text-lg p-3 flex justify-between">
                @foreach ($errors->all() as $error)
                {{ $error }}<br />
                @endforeach
                <span class="text-lg">Editer <span class="font-bold capitalize italic">{{ $recipe->name }}</span>
                </span>
                <button type="button" class="z-50 cursor-pointer transition" @click="showModal = false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        class="w-5 h-5 hover:text-red-500" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="w-full flex flex-col pb-20 h-4/5 overflow-y-scroll bg-gray-50">
                <div class="w-full p-5 flex flex-col">
                    <div class="flex align-middle">
                        <div class="m-2 w-1/2">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                image
                            </label>
                            <input
                                class=" appearance-none border  border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="name{{$recipe->id}}" type="file" wire:model="image" placeholder="titre">
                        </div>
                        <div class="m-2 w-1/2">
                            @if ($image)
                            Photo Preview:
                            <img class="rounded-lg bg-gray-300 max-h-28" src="{{ $image->temporaryUrl() }}">
                            @else
                            <img class="rounded-lg bg-gray-300 max-h-28" src="{{asset('storage/image/'.$recipe->image)}}">

                            @endif
                        </div>
                       
                    </div>
                    <div class="m-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Nom
                        </label>
                        <input
                            class=" appearance-none border  border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="name{{$recipe->id}}" wire:model="recipe.name" type="text" placeholder="titre">
                    </div>
                    <div class=" flex text-lg ">
                        <div class="m-2 w-full md:w-1/2 relative">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Durée de preparation
                            </label>
                            <input
                                class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline"
                                id="name{{$recipe->preparation_time}}" wire:model="recipe.preparation_time"
                                type="numeric" placeholder="0">
                            <span class="absolute text-md text-gray-400 italic left-24 mt-2">minutes</span>
                        </div>
                        <div class="m-2  w-full md:w-1/2 relative">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Prix
                            </label>
                            <input
                                class=" appearance-none  border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline"
                                id="name{{$recipe->price}}" wire:model="recipe.price" type="numeric"
                                placeholder="titre">
                            <span class="absolute text-md text-gray-400 italic left-20 mt-2">dt</span>
                        </div>
                    </div>
                    <div class="m-2">
                        <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <textarea wire:model="recipe.description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                            placeholder="Write your thoughts here..."></textarea>

                    </div>

                </div>

                <div class="m-4 flex flex-col">
                    <div class="flex justify-between w-full relative h-10 my-1" x-data="{ newIngredient : false}">
                        <h3 class="text-lg">Ingredients</h3>
                        <button class="border rounded border-indigo-500 text-indigo-500  p-2 my-auto" type="button"
                            x-show="!newIngredient" @click="newIngredient=true">ajouter ingredient</button>

                        <div x-show="newIngredient" x-transition @click.away="newIngredient = false"
                            class="right-10 border absolute bg-white rounded flex p-1">
                            <div class="flex h-8 overflow-hidden space-x-2 w-9/10 py-0 text-sm">
                                <select id="ingredients" wire:model="ingredient_id"
                                    class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  w-full">
                                    <option selected>Choissisez Ingredient</option>
                                    @foreach($this->ingredients as $ingredient)
                                    <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                    @endforeach
                                </select>
                                <input class="rounded w-20 border border-gray-400" wire:model="ingredient_quantity"
                                    placeholder="0.0" type="number">


                                <span class="my-auto w-20 text-xs text-italic">
                                    @if($this->ingredient_id>0)
                                    {{$this->selected_ingredient->unit}}
                                    @endif

                                </span>


                            </div>
                            <div class="flex space-x-1">
                                <button type="button" class="p-1" wire:click="addIngredient()"
                                    @click="newIngredient = false"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </button>
                                <button type="button" class="p-1" @click="newIngredient = false"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <ul class=" w-full flex flex-col border rounded-lg bg-white">
                        @foreach($recipe->ingredients as $ingredient)
                        <li class="py-2 px-4 border-b flex justify-between">
                            <div class="flex ">
                                <span class="">
                                    {{ number_format($ingredient->pivot->quantity, 1,'.',' ') }}
                                    {{$ingredient->unit}}
                                </span><span class="text-gray-400">&nbsp;de &nbsp;</span>
                                <span class="capitalize">{{$ingredient->name}} </span>
                            </div>
                            <button type="button" class="bg-transparent text-red-400 hover:text-red-500"
                                onclick="confirm('Vous allez supprimer cette ingredient de cette recette ?') || event.stopImmediatePropagation()"
                                wire:click="deleteIngredient({{$ingredient->id}})">Supprimer</button>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>
            <div class="h-20  flex w-full align-middle absolute bottom-0 space-x-1 p-2">
                <button
                    class="w-1/2 h-10 md:w-2/3 bg-gray-50 my-5 border border-gray-400 hover:bg-gray-100  duration-150 text-lg text-gray-900 py-1 rounded"
                    type="button" wire:click="resetData">
                    annuler
                </button>
                <button
                    class="w-1/2  h-10 md:w-1/3 bg-teal-500 my-5 hover:bg-teal-700 border-teal-500 hover:border-teal-700 duration-150 text-lg border-4 text-white py-1 rounded"
                    type="button" wire:click="submit">
                    enregistrer
                </button>
            </div>
        </div>
    </div>
</div>
</div>