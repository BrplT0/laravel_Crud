@props(['student' => null, 'cities'])

<form method="POST" action="{{ $student ? route('students.update', $student) : route('students.store') }}" class="space-y-6">
    @csrf
    @if($student)
        @method('PUT')
    @endif

    <div>
        <label for="name" class="block text-sm font-medium text-white">Name</label>
        <input type="text" name="name" id="name" class="mt-1 block w-full bg-gray-700 border-gray-600 text-blue-300 placeholder-gray-400 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('name', $student?->name) }}" required autofocus>
        @error('name')
            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="email" class="block text-sm font-medium text-white">Email</label>
        <input type="email" name="email" id="email" class="mt-1 block w-full bg-gray-700 border-gray-600 text-blue-300 placeholder-gray-400 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('email', $student?->email) }}" required>
        @error('email')
            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="city_id" class="block text-sm font-medium text-white">City</label>
        <select name="city_id" id="city_id" class="mt-1 block w-full bg-gray-700 border-gray-600 text-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            <option value="" class="bg-gray-700 text-blue-300">Select a city</option>
            @foreach($cities as $city)
                <option value="{{ $city->id }}" class="bg-gray-700 text-blue-300" {{ old('city_id', $student?->city_id) == $city->id ? 'selected' : '' }}>
                    {{ $city->name }}
                </option>
            @endforeach
        </select>
        @error('city_id')
            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center gap-4">
        <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
            {{ $student ? 'Update' : 'Create' }}
        </button>
        <a href="{{ route('students.index') }}" class="bg-gray-600 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
            Cancel
        </a>
    </div>
</form> 