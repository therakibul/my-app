<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-3xl mx-auto p-6">

    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Add Employee</h1>
        <p class="text-sm text-gray-600 mt-1">
            Fill in the details to create a new employee
        </p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow p-6">

        <form method="POST" action="{{route('employees.store')}}">
            @csrf
            <!-- Name -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Name
                </label>
                <input
                    type="text"
                    name="name"
                    value="{{old('name')}}"
                    placeholder="Enter full name"
                    class="{{$errors->first("name") ? "border-red-500" : ""}} w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                >
            
                @error('name')
                    <p class="text-red-500 text-sm mt-5">
                        {{$message}}
                    </p>
                @enderror
              
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input
                    type="email"
                    name="email"
                    value="{{old('email')}}"
                    placeholder="Enter email address"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                >

                @error('email')
                    <p class="text-red-500 text-sm mt-5">
                        {{$message}}
                    </p>
                @enderror
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
                    <option value="admin" {{old('role') == 'admin' ? 'selected' : ''}}>Admin</option>
                    <option value="manager" {{old('role') == 'manager' ? 'selected' : ''}}>Manager</option>
                    <option value="employee" {{old('role') == 'employee' ? 'selected' : ''}}>Employee</option>
                </select>

                @error('role')
                    <p class="text-red-500 text-sm mt-5">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex justify-end space-x-3">
                <a
                    href="#"
                    class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-100"
                >
                    Cancel
                </a>
                <button
                    type="submit"
                    class="px-4 py-2 rounded-md bg-indigo-600 text-white hover:bg-indigo-700"
                >
                    Save Employee
                </button>
            </div>

        </form>

    </div>

</div>

</body>
</html>
