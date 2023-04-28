@extends('layouts.admin')

@section('main')
    <form
        action="{{route('admin.annonce.store')}}"
        method="POST" enctype="multipart/form-data">
        {{-- !empty($editAnnonce) ? route('admin.annonce.edit', $annonce->id) : route('admin.annonce.ajouter') --}}
        @csrf

        <div class="mb-5">
            <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                Titre
            </label>
            <input type="text" name="name" placeholder="Saisissez une annonce"
                value="Mon annonce"
                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
        </div>

        <label for="categorie" class="mb-3 block text-base font-medium text-[#07074D]">
            Categorie
        </label>
        <select name="categorie"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @foreach ($categories as $itemCategory)

        @if (!empty($annonce) && $itemCategory->id == $annonce->category_id)

        <option value="{{$itemCategory->id}}"selected>{{$itemCategory->name}}</option>

        @else

        <option value="{{$itemCategory->id}}">{{$itemCategory->name}}</option>

        @endif


        @endforeach

    </select>

        <div class="mb-5">
            <label for="image" class="mb-3 block text-base font-medium text-[#07074D]">
                Image
            </label>
                <div class="relative h-20 w-20">
                    <img class="h-full w-full object-cover object-center" src="#"
                        alt="" />
                </div>
            <input type="file" name="image" placeholder="Ajoutez une image"
                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
        </div>

        <div class="mb-5">
            <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">
                Description
            </label>
            <textarea rows="4" name="description" placeholder="Description"
                class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">ceci est ma description</textarea>
        </div>
        <div class="mb-5">
            <label for="prix" class="mb-3 block text-base font-medium text-[#07074D]">
                Prix
            </label>
            <input type="number" name="prix" placeholder="Saisissez un prix"
                value="10"
                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
        </div>
        <div class="mt-3">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ !empty($editAnnonce) ? 'Modifier' : 'Ajouter' }}</button>
        </div>
        {{-- @dd($categories) --}}
    </form>
@endsection
