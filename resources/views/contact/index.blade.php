<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Contact Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @if (session('success'))
                        <div class="bg-blue-900 border-l-4 border-blue-500 text-white p-4 mb-6" role="alert">
                            <p class="font-bold">Success</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="student_id" class="block text-sm font-medium text-white">Select Student</label>
                            <select name="student_id" id="student_id" class="mt-1 block w-full bg-gray-700 border-gray-600 text-blue-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="" class="bg-gray-700 text-blue-300">Select a student</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}" class="bg-gray-700 text-blue-300" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                        {{ $student->name }} ({{ $student->email }}) - {{ $student->city->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-white">Subject</label>
                            <input type="text" name="subject" id="subject" class="mt-1 block w-full bg-gray-700 border-gray-600 text-blue-300 placeholder-gray-400 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('subject') }}" required>
                            @error('subject')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-white">Message</label>
                            <textarea name="message" id="message" rows="6" class="mt-1 block w-full bg-gray-700 border-gray-600 text-blue-300 placeholder-gray-400 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                                Send Message
                            </button>
                            <a href="{{ route('students.index') }}" class="bg-gray-600 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 