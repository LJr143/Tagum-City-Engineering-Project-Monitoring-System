<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">


    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>


    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">


    <div class="flex">
    <!-- Sidebar will occupy space, so adjust the rest of the layout accordingly -->
    <div class="w-full p-4">
        <div class="grid grid-cols-4 gap-4">
            <!-- Project Stats Cards -->
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-3xl font-bold">111</h2>
                <p>All Projects</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-3xl font-bold">123</h2>
                <p>On Progress</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-3xl font-bold">123}</h2>
                <p>Pending</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-3xl font-bold">123</h2>
                <p>Completed</p>
            </div>
        </div>


        <div class="grid grid-cols-2 gap-4 mt-4">
            <!-- Pie Charts -->
            <div class="bg-white rounded-lg shadow p-4">
                <canvas id="pieChart"></canvas>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <canvas id="employeeChart"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4">
            <!-- Line Chart for Total Costs -->
            <div class="bg-white rounded-lg shadow p-4">
                <canvas id="lineChart"></canvas>
            </div>
            <!-- Pie Chart for Users -->
            <div class="bg-white rounded-lg shadow p-4">
                <canvas id="userChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>

<script>
    document.addEventListener('livewire:load', function () {
        // Pie Chart Example
        const ctx1 = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: ['Materials as per POW', 'Materials as per Used', 'Balanced of Materials'],
                datasets: [{
                    data: [81, 22, 62], // Sample Data; You can replace this with dynamic data
                    backgroundColor: ['#F87171', '#34D399', '#60A5FA'],
                }]
            }
        });

        // Employee Chart Example
        const ctx2 = document.getElementById('employeeChart').getContext('2d');
        const employeeChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                datasets: [{
                    label: 'Hours Worked',
                    data: [40, 60, 50, 70, 80, 60, 50], // Sample Data
                    backgroundColor: ['#F87171', '#FBBF24'],
                }]
            }
        });

        // Line Chart Example
        const ctx3 = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(ctx3, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: '2024',
                    data: [500000, 1000000, 1500000, 2000000], // Sample Data
                    borderColor: '#60A5FA',
                }, {
                    label: '2025',
                    data: [700000, 1100000, 1600000, 2100000], // Sample Data
                    borderColor: '#F87171',
                }]
            }
        });

        // Users Pie Chart Example
        const ctx4 = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx4, {
            type: 'doughnut',
            data: {
                labels: ['Civil Engineer', 'Electrical Engineer', 'Architect'],
                datasets: [{
                    data: [],
                    backgroundColor: ['#34D399', '#60A5FA', '#FBBF24'],
                }]
            }
        });
    });
</script>

    </x-slot>


</x-app-layout>

