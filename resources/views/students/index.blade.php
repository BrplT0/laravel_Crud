<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Home</a>
            <a class="nav-link" href="{{ route('students.index') }}">Students</a>
            @auth
                <span class="nav-link">Hello, {{ Auth::user()->name }}</span>
            @endauth
        </div>
    </nav>

    <main class="container">
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-white leading-tight">
                    {{ __('Students') }}
                </h2>
            </x-slot>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-xl font-semibold text-white">Student List</h3>
                                <div class="space-x-4">
                                    <a href="{{ route('students.create') }}" class="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                                        Add Student
                                    </a>
                                    <a href="{{ route('students.export.pdf') }}" class="bg-gradient-to-r from-blue-500 to-blue-400 hover:from-blue-400 hover:to-blue-300 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                                        Export PDF
                                    </a>
                                </div>
                            </div>

                            @if (session('success'))
                                <div class="bg-blue-900 border-l-4 border-blue-500 text-white p-4 mb-6" role="alert">
                                    <p class="font-bold">Success</p>
                                    <p>{{ session('success') }}</p>
                                </div>
                            @endif

                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-700">
                                    <thead class="bg-gray-700">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Name</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Email</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">City</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                                        @foreach ($students as $student)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-white">{{ $student->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-white">{{ $student->email }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-white">{{ $student->city->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <a href="{{ route('students.show', $student) }}" class="text-white hover:text-blue-300 mr-3">View</a>
                                                    <a href="{{ route('students.edit', $student) }}" class="text-white hover:text-blue-300 mr-3">Edit</a>
                                                    <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-white hover:text-red-300" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-6">
                                {{ $students->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
