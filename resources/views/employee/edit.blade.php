<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-3xl mx-auto p-6">

    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Edit Employee</h1>
        <p class="text-sm text-gray-600 mt-1">
            Update employee information
        </p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow p-6">

        <form method="POST" action="{{route('employees.update', $employee->id)}}">
            @csrf
            @method('PUT')
            
            <!-- Name -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Name
                </label>
                <input
                    type="text"
                    name="name"
                    value="{{old('name', $employee->name)}}"
                    placeholder="Enter full name"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                >
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input
                    type="email"
                    name="email"
                    value="{{old('email', $employee->email)}}"
                    placeholder="Enter email address"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                >
            </div>

            <!-- Role -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Role
                </label>
                <select
                    name="role"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 bg-white focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                >
                    <option value="">Select role</option>
                    <option value="admin" {{old('role', $employee->role) == 'admin' ? 'selected' : ''}}>Admin</option>
                    <option value="manager" {{old('role', $employee->role) == 'manager' ? 'selected' : ''}}>Manager</option>
                    <option value="employee" {{old('role', $employee->role) == 'employee' ? 'selected' : ''}}>Employee</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end space-x-3">
                <a
                    href="{{route('employees.index')}}"
                    class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-100"
                >
                    Cancel
                </a>
                <button
                    type="submit"
                    class="px-4 py-2 rounded-md bg-indigo-600 text-white hover:bg-indigo-700"
                >
                    Update Employee
                </button>
            </div>

        </form>

    </div>

</div>

</body>
</html>