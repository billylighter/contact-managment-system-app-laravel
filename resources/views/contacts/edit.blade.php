<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('contacts.update', $contact) }}">
                    @csrf
                    @method('patch')
                    <textarea
                        name="name"
                        placeholder="{{ __('The name of contact') }}"
                        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    >{{ old('name', $contact->name) }}</textarea>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    <textarea
                        name="email"
                        placeholder="{{ __('The email of contact') }}"
                        class="mt-4 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    >{{ old('email', $contact->email) }}</textarea>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <textarea
                        name="phone"
                        placeholder="{{ __('The phone of contact') }}"
                        class="mt-4 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    >{{ old('phone', $contact->phone) }}</textarea>
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />

                    <div class="text-end">
                        <x-primary-button class="mt-4">{{ __('Update contact') }}</x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
