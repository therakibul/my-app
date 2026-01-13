<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-7xl mx-auto p-6">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Employee List</h1>
        <a href="{{route('employees.create')}}" class="mt-3 sm:mt-0 bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
            + Add Employee
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <!-- Search -->
    <div class="bg-white p-4 rounded-lg shadow mb-4">
        <input
            type="text"
            placeholder="Search by name or email..."
            class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
        >
    </div>

    <!-- Table -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Role</th>
                    <th class="px-6 py-3 text-right text-sm font-medium text-gray-600">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($employees as $employee)
                    <!-- Row -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-800">
                            <a href="{{route('employees.show', $employee->id)}}"> {{$employee->name}}</a>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{$employee->email}}</td>
                        <td class="px-6 py-4">{{$employee->role}}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{route('employees.edit', $employee->id)}}" class="text-indigo-600 hover:underline">Edit</a>
                            <form action="{{route('employees.destroy', $employee->id)}}" method="POST" class="inline">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="text-red-600 hover:underline">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($employees->hasPages())
    <!-- Pagination -->
    <div class="flex justify-end mt-6">
        {{ $employees->links() }}
    </div>
    @endif

</div>

</body>
</html>
