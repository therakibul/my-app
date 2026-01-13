<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-4xl mx-auto p-6">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Employee Details</h1>
            <p class="text-sm text-gray-600 mt-1">
                View employee information
            </p>
        </div>

        <div class="mt-4 sm:mt-0 space-x-2">
            <a
                href="{{route('employees.index')}}"
                class="px-4 py-2 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300"
            >
                Back
            </a>
            <a
                href="#"
                class="px-4 py-2 rounded-md bg-indigo-600 text-white hover:bg-indigo-700"
            >
                Edit
            </a>
        </div>
    </div>

    <!-- Employee Card -->
    <div class="bg-white shadow rounded-lg p-6">

        <!-- Name -->
        <div class="border-b pb-4 mb-4">
            <h2 class="text-xl font-semibold text-gray-800">
                {{$employee->name}}
            </h2>
            <p class="text-sm text-gray-500">
                Employee Profile
            </p>
        </div>

        <!-- Details -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

            <!-- Email -->
            <div>
                <p class="text-sm text-gray-500">Email</p>
                <p class="text-base text-gray-800 font-medium">
                    {{$employee->email}}
                </p>
            </div>

            <!-- Role -->
            <div>
                <p class="text-sm text-gray-500">Role</p>
                <span
                    class="inline-block mt-1 px-3 py-1 text-sm rounded-full bg-indigo-100 text-indigo-700"
                >
                    Manager
                </span>
            </div>

        </div>

    </div>

    <!-- Action Section -->
    <div class="mt-6 bg-white shadow rounded-lg p-6 flex justify-between items-center">
        <p class="text-sm text-gray-600">
            Need to make changes?
        </p>

        <div class="flex space-x-2">
            <button
                class="px-4 py-2 rounded-md bg-indigo-600 text-white hover:bg-indigo-700"
            >
                Edit Employee
            </button>
            <form action="{{route('employees.destroy', $employee->id)}}" method="POST" class="inline">
                @csrf
                @method("DELETE")
                <button
                    class="px-4 py-2 rounded-md bg-red-600 text-white hover:bg-red-700"
                >
                    Delete Employee
                </button>
            </form>
        </div>
    </div>

</div>

</body>
</html>
