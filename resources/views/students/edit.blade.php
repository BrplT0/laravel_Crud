<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('students.update', $student) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="name" :value="__('Name')" class="text-blue-300 font-medium" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-gray-700 border-gray-600 text-gray-200 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm" :value="old('name', $student->name)" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" class="text-blue-300 font-medium" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full bg-gray-700 border-gray-600 text-gray-200 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm" :value="old('email', $student->email)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div>
                            <x-input-label for="city_id" :value="__('City')" class="text-blue-300 font-medium" />
                            <select id="city_id" name="city_id" class="mt-1 block w-full bg-gray-700 border-gray-600 text-gray-200 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ old('city_id', $student->city_id) == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('city_id')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                                {{ __('Save Changes') }}
                            </button>
                            <a href="{{ route('students.index') }}" class="bg-gray-600 hover:bg-gray-500 text-gray-200 font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 