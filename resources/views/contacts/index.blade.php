<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Contacts') }}
            </h2>
            <a href="{{route('contacts.create')}}"
               class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                {{__('Add new contact')}}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">


                    <div class="relative overflow-x-auto">
                        <table class=" mb-4 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    {{__('Name')}}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{__('Email')}}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{__('Phone')}}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{__('Actions')}}
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($contacts as $contact)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$contact->name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$contact->email}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$contact->phone}}
                                    </td>
                                    <td class="flex pt-3">

                                        <a href="{{ route('contacts.edit', $contact) }}"
                                           class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                            {{ __('Edit') }}
                                        </a>
                                        <form method="POST" action="{{ route('contacts.destroy', $contact) }}">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>

                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <div
                                        class="text-center p-8 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                                        role="alert">
                                        {{__('Your list is empty.')}}
                                    </div>
                                </tr>

                            @endforelse

                            </tbody>
                        </table>
                    </div>




                    {{$contacts->links()}}


            </div>
        </div>
    </div>
</x-app-layout>
