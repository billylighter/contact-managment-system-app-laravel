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

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="shadow-sm sm:rounded-lg">

                    <form action="{{route('contacts.index')}}" method="GET"
                          class="flex max-w-2xl mx-auto mb-10 bg-gray-800 px-20 py-5">

                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="title" id="title"
                                   class="color-black block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                   value="{{request('title')}}"
                                   placeholder=""/>
                            <label for="title"
                                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                                {{__('Search')}}
                            </label>
                        </div>
                        <button type="submit"
                                class="ml-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            {{__('Search')}}
                        </button>

                    </form>

                    <div class="relative overflow-x-auto">

                        @if(count($contacts) !== 0)

                            <table
                                class=" mb-4 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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

                                @foreach($contacts as $contact)
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
                                @endforeach

                                </tbody>
                            </table>
                    </div>

                    {{$contacts->links()}}

                    @else

                        <div
                            class="text-center p-8 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                            role="alert">
                            {{__('Your list is empty.')}}
                        </div>

                    @endif

                </div>
            </div>
        </div>
    </main>
</x-app-layout>
