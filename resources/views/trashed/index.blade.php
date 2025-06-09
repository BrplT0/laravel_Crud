<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Trashed Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-blue-900 border-l-4 border-blue-500 text-white p-4 mb-6" role="alert">
                    <p class="font-bold">Success</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <!-- Deleted Students -->
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Deleted Students</h3>
                    @if($deletedStudents->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-700">
                                <thead class="bg-gray-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">Deleted At</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-800 divide-y divide-gray-700">
                                    @foreach($deletedStudents as $student)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $student->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $student->email }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $student->deleted_at->format('Y-m-d H:i:s') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <form action="{{ route('trashed.restore.student', $student->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="text-blue-400 hover:text-blue-300 mr-3">Restore</button>
                                                </form>
                                                <form action="{{ route('trashed.force-delete.student', $student->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-400 hover:text-red-300" onclick="return confirm('Are you sure you want to permanently delete this student?')">Delete Permanently</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-300">No deleted students found.</p>
                    @endif
                </div>
            </div>

            <!-- Deleted Cities -->
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Deleted Cities</h3>
                    @if($deletedCities->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-700">
                                <thead class="bg-gray-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">Deleted At</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-blue-300 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-800 divide-y divide-gray-700">
                                    @foreach($deletedCities as $city)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $city->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $city->deleted_at->format('Y-m-d H:i:s') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <form action="{{ route('trashed.restore.city', $city->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="text-blue-400 hover:text-blue-300 mr-3">Restore</button>
                                                </form>
                                                <form action="{{ route('trashed.force-delete.city', $city->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-400 hover:text-red-300" onclick="return confirm('Are you sure you want to permanently delete this city?')">Delete Permanently</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-300">No deleted cities found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 