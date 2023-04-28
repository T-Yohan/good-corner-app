@extends('layouts.admin')

@section('main')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Image</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    Produit
                </th>
                <th scope="col" class="px-6 py-3">
                    Categorie
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Prix
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Action</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($annonces as $itemAnnonce )

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-32 p-4">
                    <img src="{{Storage::url($itemAnnonce->image)}}" alt="Apple Watch">
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$itemAnnonce->name}}
                </td>

                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$itemAnnonce->category->name}}

                </td>

                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div>
                            <input type="text" name="description"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </td>

                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$itemAnnonce->Prix}}
                </td>
                <td class="px-6 py-4">
                    <a href={{route('admin.annonce.edit',$itemAnnonce->id)}} class="font-medium text-red-600 dark:text-red-500 hover:underline">Edit</a>
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('admin.annonce.delete',$itemAnnonce->id)}}" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                </td>
            </tr>
            @empty


            @endforelse




        </tbody>
    </table>
</div>

@endsection
