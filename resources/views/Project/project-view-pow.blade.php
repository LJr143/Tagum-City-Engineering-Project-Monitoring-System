<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>
<body>

<!-- Main Content -->
<main>
    @section('content')
        <div class="container mx-auto p-6">
            <!-- Project Header -->
            <div class="flex items-center justify-between mb-4">
                <div>
                    <span class="bg-green-500 text-white px-2 py-1 rounded">#PRJ2023-03-19789</span>
                    <h1 class="text-2xl font-bold">POW 1</h1>
                </div>
                <div class="w-1/4">
                    <div class="p-4 bg-white shadow rounded">
                        <img src="image-link.png" alt="Project Image" class="rounded mb-2">
                        <h3 class="font-semibold">Constructive and destructive waves</h3>
                        <p>Project Cost: 1,000,000,000</p>
                    </div>
                </div>
            </div>

            <!-- Material Cost Section -->
            <div class="bg-white shadow rounded p-6 mb-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold">Material Cost</h2>
                    <div class="flex items-center space-x-2">
                        <button class="btn">Choose File</button>
                        <button class="btn bg-green-500 text-white">Import Excel</button>
                    </div>
                </div>
                <!-- Table -->
                <table class="w-full mt-4">
                    <thead>
                    <tr class="bg-gray-100">
                        <th>#</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Loop through data -->
                    @foreach ($materials as $material)
                        <tr>
                            <td>{{ $material->id }}</td>
                            <td>{{ $material->name }}</td>
                            <td>{{ $material->position }}</td>
                            <td>{{ $material->email }}</td>
                            <td>{{ $material->date }}</td>
                            <td>
                                <button @click="editMaterial({{ $material->id }})" class="text-blue-500">Edit</button>
                                <button @click="deleteMaterial({{ $material->id }})" class="text-red-500">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Labor Cost Section -->
            <div class="bg-white shadow rounded p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold">Labor Cost</h2>
                    <div class="flex items-center space-x-2">
                        <button class="btn">Choose File</button>
                        <button class="btn bg-green-500 text-white">Import Excel</button>
                    </div>
                </div>
                <!-- Table -->
                <table class="w-full mt-4">
                    <thead>
                    <tr class="bg-gray-100">
                        <th>#</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Loop through data -->
                    @foreach ($labors as $labor)
                        <tr>
                            <td>{{ $labor->id }}</td>
                            <td>{{ $labor->name }}</td>
                            <td>{{ $labor->position }}</td>
                            <td>{{ $labor->email }}</td>
                            <td>{{ $labor->date }}</td>
                            <td>
                                <button @click="editLabor({{ $labor->id }})" class="text-blue-500">Edit</button>
                                <button @click="deleteLabor({{ $labor->id }})" class="text-red-500">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Alpine.js Methods -->
        <script>
            function costManagement() {
                return {
                    materials: @json($materials),
                    labors: @json($labors),
                    editMaterial(id) {
                        console.log('Edit material', id);
                    },
                    deleteMaterial(id) {
                        console.log('Delete material', id);
                    },
                    editLabor(id) {
                        console.log('Edit labor', id);
                    },
                    deleteLabor(id) {
                        console.log('Delete labor', id);
                    }
                }
            }
        </script>
    @endsection
</main>

</body>
</html>
