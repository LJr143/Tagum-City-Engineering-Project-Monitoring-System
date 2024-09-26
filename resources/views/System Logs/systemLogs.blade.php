
<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">

    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>

    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">

        
        <h1 class="text-2xl font-semibold ml-5">System Logs</h1>
        <p class="mb-6 ml-5">List of activity within the system</p>

        <div class="container mx-auto bg-white p-6 rounded-lg shadow">
            <div class="flex flex-col md:flex-row justify-between items-center mb-4">
                <div class="flex max-w-20 space-x-2 mb-4 md:mb-0">
                    <button id="download-btn" class="bg-white-200 border border-gray-200 p-2 rounded">
                        <svg className="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4"/>
                        </svg>
                    </button>

                    <!--  <button class="bg-white-200 border border-gray-200 p-2 rounded"><i class="fas fa-calendar-alt"></i></button> -->
                    <div class="relative ">
                        <button id="filter-btn" class="bg-white-200 border border-gray-200 p-2 rounded">
                            <svg className="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" strokeLinecap="round" strokeWidth="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z"/>
                            </svg>
                        </button>
                        <div id="filter-options" class="absolute left-0 mt-2 w-48 bg-white border rounded shadow-lg hidden">
                            <button class="block w-full text-left px-4 py-2 hover:bg-gray-100" data-role="all">All</button>
                            <button class="block w-full text-left px-4 py-2 hover:bg-gray-100" data-role="admin">Admin</button>
                            <button class="block w-full text-left px-4 py-2 hover:bg-gray-100" data-role="engineer">Engineer</button>
                            <button class="block w-full text-left px-4 py-2 hover:bg-gray-100" data-role="viewer">Viewer</button>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-2 items-center">

                    <div class="relative">
                        <input id="search-input" type="text" placeholder="Search" class="border border-gray-200 rounded pl-10 pr-4 py-2">
                        <svg class="h-5 w-5 text-gray-400 dark:text-gray-300 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>

                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table id="user-table" class="min-w-full bg-white border border-gray-300">
                    <thead>
                    <tr>

                        <th class="py-2 px-4 border-b text-left">User ID </th>
                        <th class="py-2 px-4 border-b text-left">Name </th>
                        <th class="py-2 px-4 border-b text-left">Position</th>
                        <th class="py-2 px-4 border-b text-left">Role</th>
                        <th class="py-2 px-4 border-b text-left">Timestamp</th>
                        <th class="py-2 px-4 border-b text-left">Activity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr data-role="admin">
                        <td class="py-2 px-4 border-b">0000</td>
                        <td class="py-2 px-4 border-b">Fname MI. Lname</td>
                        <td class="py-2 px-4 border-b">Engineer</td>
                        <td class="py-2 px-4 border-b"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">Admin</span></td>
                        <td class="py-2 px-4 border-b">8/17/2024 03:26:56 PM</td>
                        <td class="py-2 px-4 border-b">Activity</td>
                    </tr>
                    <tr data-role="engineer">
                        <td class="py-2 px-4 border-b">0000</td>
                        <td class="py-2 px-4 border-b">Fname MI. Lname</td>
                        <td class="py-2 px-4 border-b">Engineer</td>
                        <td class="py-2 px-4 border-b"><span class="bg-green-100 text-green-800 px-2 py-1 rounded">Engineer</span></td>
                        <td class="py-2 px-4 border-b">8/17/2024 03:26:56 PM</td>
                        <td class="py-2 px-4 border-b">Activity</td>
                    </tr>
                    <tr data-role="engineer">
                        <td class="py-2 px-4 border-b">0000</td>
                        <td class="py-2 px-4 border-b">Fname MI. Lname</td>
                        <td class="py-2 px-4 border-b">Engineer</td>
                        <td class="py-2 px-4 border-b"><span class="bg-green-100 text-green-800 px-2 py-1 rounded">Engineer</span></td>
                        <td class="py-2 px-4 border-b">8/17/2024 03:26:56 PM</td>
                        <td class="py-2 px-4 border-b">Activity</td>
                    </tr>
                    <tr data-role="engineer">
                        <td class="py-2 px-4 border-b">0000</td>
                        <td class="py-2 px-4 border-b">Fname MI. Lname</td>
                        <td class="py-2 px-4 border-b">Engineer</td>
                        <td class="py-2 px-4 border-b"><span class="bg-green-100 text-green-800 px-2 py-1 rounded">Engineer</span></td>
                        <td class="py-2 px-4 border-b">8/17/2024 03:26:56 PM</td>
                        <td class="py-2 px-4 border-b">Activity</td>
                    </tr>
                    <tr data-role="engineer">
                        <td class="py-2 px-4 border-b">0000</td>
                        <td class="py-2 px-4 border-b">Fname MI. Lname</td>
                        <td class="py-2 px-4 border-b">Engineer</td>
                        <td class="py-2 px-4 border-b"><span class="bg-green-100 text-green-800 px-2 py-1 rounded">Engineer</span></td>
                        <td class="py-2 px-4 border-b">8/17/2024 03:26:56 PM</td>
                        <td class="py-2 px-4 border-b">Activity</td>
                    </tr>
                    <tr data-role="viewer">
                        <td class="py-2 px-4 border-b">0000</td>
                        <td class="py-2 px-4 border-b">Fname MI. Lname</td>
                        <td class="py-2 px-4 border-b">Engineer</td>
                        <td class="py-2 px-4 border-b"><span class="bg-gray-100 text-gray-800 px-2 py-1 rounded">Viewer</span></td>
                        <td class="py-2 px-4 border-b">8/17/2024 03:26:56 PM</td>
                        <td class="py-2 px-4 border-b">Activity</td>
                    </tr>
                    <tr data-role="viewer">
                        <td class="py-2 px-4 border-b">0000</td>
                        <td class="py-2 px-4 border-b">Fname MI. Lname</td>
                        <td class="py-2 px-4 border-b">Engineer</td>
                        <td class="py-2 px-4 border-b"><span class="bg-gray-100 text-gray-800 px-2 py-1 rounded">Viewer</span></td>
                        <td class="py-2 px-4 border-b">8/17/2024 03:26:56 PM</td>
                        <td class="py-2 px-4 border-b">Activity</td>
                    </tr>
                    <tr data-role="viewer">
                        <td class="py-2 px-4 border-b">0000</td>
                        <td class="py-2 px-4 border-b">Fname MI. Lname</td>
                        <td class="py-2 px-4 border-b">Engineer</td>
                        <td class="py-2 px-4 border-b"><span class="bg-gray-100 text-gray-800 px-2 py-1 rounded">Viewer</span></td>
                        <td class="py-2 px-4 border-b">8/17/2024 03:26:56 PM</td>
                        <td class="py-2 px-4 border-b">Activity</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center mt-4">

                <div class="flex items-center space-x-4 mb-4 md:mb-0">
                    <label for="rowsPerPage" class="text-gray-700">Rows per page:</label>
                    <select id="items-per-page" class="border border-gray-300 rounded px-7 py-2">
                        <option value="5">5</option>
                        <option value="7" selected>7</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                </div>
                <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-2">
                    <div class="text-gray-600">
                        Showing 1-10 of 30 items
                    </div>
                    <div class="flex space-x-2">
                        <button id="prev-page" class="text-gray-500"><i class="fas fa-chevron-left"></i></button>
                        <button id="page-1" class="text-gray-500 pagination-btn">1</button>
                        <button id="page-2" class="text-gray-500 pagination-btn">2</button>
                        <button id="page-3" class="text-gray-500 pagination-btn">3</button>
                        <button id="next-page" class="text-gray-500"><i class="fas fa-chevron-right"></i></button>
                        <button id="last-page" class="text-gray-500"><i class="fas fa-angle-double-right"></i></button>
                    </div>
                </div>
            </div>
        </div>



        <script>
            let currentPage = 1;
            let itemsPerPage = 7;
            let userIdCounter = 1;

            function renderTable() {
                const rows = document.querySelectorAll('#user-table tbody tr');
                const totalItems = rows.length;
                const totalPages = Math.ceil(totalItems / itemsPerPage);

                rows.forEach((row, index) => {
                    row.style.display = (index >= (currentPage - 1) * itemsPerPage && index < currentPage * itemsPerPage) ? '' : 'none';
                });

                document.querySelector('.text-gray-600').innerText = `Showing ${(currentPage - 1) * itemsPerPage + 1}-${Math.min(currentPage * itemsPerPage, totalItems)} of ${totalItems} items`;

                document.querySelectorAll('.pagination-btn').forEach(btn => btn.classList.remove('bg-gray-200'));
                document.querySelector(`#page-${currentPage}`).classList.add('bg-gray-200');
            }

            document.getElementById('items-per-page').addEventListener('change', function () {
                itemsPerPage = parseInt(this.value);
                currentPage = 1;
                renderTable();
            });

            document.getElementById('prev-page').addEventListener('click', function () {
                if (currentPage > 1) {
                    currentPage--;
                    renderTable();
                }
            });

            document.getElementById('next-page').addEventListener('click', function () {
                const totalItems = document.querySelectorAll('#user-table tbody tr').length;
                const totalPages = Math.ceil(totalItems / itemsPerPage);
                if (currentPage < totalPages) {
                    currentPage++;
                    renderTable();
                }
            });

            document.getElementById('last-page').addEventListener('click', function () {
                const totalItems = document.querySelectorAll('#user-table tbody tr').length;
                const totalPages = Math.ceil(totalItems / itemsPerPage);
                currentPage = totalPages;
                renderTable();
            });

            document.querySelectorAll('.pagination-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    currentPage = parseInt(this.innerText);
                    renderTable();
                });
            });

            document.getElementById('download-btn').addEventListener('click', function () {
                var table = document.getElementById('user-table');
                var rows = table.querySelectorAll('tr');
                var csvContent = 'User\n';

                rows.forEach(function (row, rowIndex) {
                    var cols = row.querySelectorAll('td, th');
                    var rowData = [];
                    cols.forEach(function (col, colIndex) {
                        // Skip the first column (checkbox) and the last column (actions)
                        if (colIndex !== 0 && colIndex !== cols.length - 1) {
                            rowData.push(col.innerText);
                        }
                    });
                    csvContent += rowData.join(',') + '\n';
                });

                var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
                var link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = 'user_data.csv';
                link.style.display = 'none';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });

            document.getElementById('filter-btn').addEventListener('click', function () {
                var filterOptions = document.getElementById('filter-options');
                filterOptions.classList.toggle('hidden');
            });

            document.querySelectorAll('#filter-options button').forEach(function (button) {
                button.addEventListener('click', function () {
                    var role = this.getAttribute('data-role');
                    var rows = document.querySelectorAll('#user-table tbody tr');
                    rows.forEach(function (row) {
                        if (role === 'all' || row.getAttribute('data-role') === role) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                    document.getElementById('filter-options').classList.add('hidden');
                });
            });

            document.getElementById('search-input').addEventListener('input', function () {
                var searchTerm = this.value.toLowerCase();
                var rows = document.querySelectorAll('#user-table tbody tr');
                rows.forEach(function (row) {
                    var cells = row.querySelectorAll('td');
                    var match = false;
                    cells.forEach(function (cell, index) {
                        if (index !== 0 && index !== cells.length - 1) { // Skip the first column (checkbox) and the last column (actions)
                            if (cell.innerText.toLowerCase().includes(searchTerm)) {
                                match = true;
                            }
                        }
                    });
                    if (match) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            document.getElementById('add-user-btn').addEventListener('click', function () {
                document.getElementById('add-user-form').reset();
                document.getElementById('add-user-modal').classList.remove('hidden');
            });

            document.getElementById('close-modal-btn').addEventListener('click', function () {
                document.getElementById('add-user-modal').classList.add('hidden');
                // Clear error messages
                document.getElementById('nameError').classList.add('hidden');
                document.getElementById('emailError').classList.add('hidden');
                document.getElementById('birthdateError').classList.add('hidden');
                document.getElementById('positionError').classList.add('hidden');
                document.getElementById('roleError').classList.add('hidden');

                // Remove border-red-500 class from input fields
                document.getElementById('user-name').classList.remove('border-red-500');
                document.getElementById('email').classList.remove('border-red-500');
                document.getElementById('birthdate').classList.remove('border-red-500');
                document.getElementById('position').classList.remove('border-red-500');
                document.getElementById('role').classList.remove('border-red-500');

            });

            document.getElementById('cancel-btn').addEventListener('click', function () {
                document.getElementById('add-user-modal').classList.add('hidden');

                // Clear error messages
                document.getElementById('nameError').classList.add('hidden');
                document.getElementById('emailError').classList.add('hidden');
                document.getElementById('birthdateError').classList.add('hidden');
                document.getElementById('positionError').classList.add('hidden');
                document.getElementById('roleError').classList.add('hidden');

                // Remove border-red-500 class from input fields
                document.getElementById('user-name').classList.remove('border-red-500');
                document.getElementById('email').classList.remove('border-red-500');
                document.getElementById('birthdate').classList.remove('border-red-500');
                document.getElementById('position').classList.remove('border-red-500');
                document.getElementById('role').classList.remove('border-red-500');
            });

            document.getElementById('add-user-form').addEventListener('submit', function (e) {
                e.preventDefault();

                var name = document.getElementById('user-name').value;
                var email = document.getElementById('email').value;
                var birthdate = document.getElementById('birthdate').value;
                var age = document.getElementById('age').value;
                var position = document.getElementById('position').value;
                var role = document.getElementById('role').value;

                // Input validation
                var isValid = true;
                if (!name) {
                    document.getElementById('nameError').classList.remove('hidden');
                    document.getElementById('user-name').classList.add('border-red-500');
                    isValid = false;
                } else {
                    document.getElementById('nameError').classList.add('hidden');
                    document.getElementById('user-name').classList.remove('border-red-500');
                }

                if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    document.getElementById('emailError').classList.remove('hidden');
                    document.getElementById('email').classList.add('border-red-500');
                    isValid = false;
                } else {
                    document.getElementById('emailError').classList.add('hidden');
                    document.getElementById('email').classList.remove('border-red-500');
                }

                if (!birthdate) {
                    document.getElementById('birthdateError').classList.remove('hidden');
                    document.getElementById('birthdate').classList.add('border-red-500');
                    isValid = false;
                } else {
                    document.getElementById('birthdateError').classList.add('hidden');
                    document.getElementById('birthdate').classList.remove('border-red-500');
                }

                if (!position) {
                    document.getElementById('positionError').classList.remove('hidden');
                    document.getElementById('position').classList.add('border-red-500');
                    isValid = false;
                } else {
                    document.getElementById('positionError').classList.add('hidden');
                    document.getElementById('position').classList.remove('border-red-500');
                }

                if (!role) {
                    document.getElementById('roleError').classList.remove('hidden');
                    document.getElementById('role').classList.add('border-red-500');
                    isValid = false;
                } else {
                    document.getElementById('roleError').classList.add('hidden');
                    document.getElementById('role').classList.remove('border-red-500');
                }

                if (!isValid) {
                    return;
                }

                var newRow = document.createElement('tr');
                newRow.setAttribute('data-role', role.toLowerCase());
                newRow.innerHTML = `
                                    <td class="py-2 px-4 border-b"><input type="checkbox"></td>
                                    <td class="py-2 px-4 border-b">${String(userIdCounter).padStart(4, '0')}</td>
                                    <td class="py-2 px-4 border-b">${name}</td>
                                    <td class="py-2 px-4 border-b">${position}</td>
                                    <td class="py-2 px-4 border-b">${email}</td>
                                    <td class="py-2 px-4 border-b">${birthdate}</td>
                                    <td class="py-2 px-4 border-b">${age}</td>
                                    <td class="py-2 px-4 border-b"><span class="bg-${role.toLowerCase() === 'admin' ? 'blue' : role.toLowerCase() === 'engineer' ? 'green' : 'gray'}-100 text-${role.toLowerCase() === 'admin' ? 'blue' : role.toLowerCase() === 'engineer' ? 'green' : 'gray'}-800 px-2 py-1 rounded">${role}</span></td>
                                    <td class="py-2 px-4 border-b">
                                        <button class="text-gray-500 edit-btn"><i class="fas fa-pen"></i></button>
                                        <button class="text-gray-500 delete-btn"><i class="fas fa-trash"></i></button>
                                    </td>
                                `;

                document.querySelector('#user-table tbody').appendChild(newRow);
                userIdCounter++;

                document.querySelectorAll('.delete-btn').forEach(function (button) {
                    button.addEventListener('click', function () {
                        var row = this.closest('tr');
                        document.getElementById('delete-modal').classList.remove('hidden');
                        document.getElementById('confirm-delete-btn').onclick = function () {
                            row.remove();
                            document.getElementById('delete-modal').classList.add('hidden');
                        };
                    });
                });

                document.querySelectorAll('.edit-btn').forEach(function (button) {
                    button.addEventListener('click', function () {
                        var row = this.closest('tr');
                        var userId = row.children[1].innerText;
                        var name = row.children[2].innerText;
                        var email = row.children[4].innerText;
                        var birthdate = row.children[5].innerText;
                        var age = row.children[6].innerText;
                        var position = row.children[3].innerText;
                        var role = row.children[7].innerText;

                        document.getElementById('edit-user-id').value = userId;
                        document.getElementById('edit-user-name').value = name;
                        document.getElementById('edit-email').value = email;
                        document.getElementById('edit-birthdate').value = birthdate;
                        document.getElementById('edit-age').value = age;
                        document.getElementById('edit-position').value = position;
                        document.getElementById('edit-role').value = role;

                        document.getElementById('edit-user-modal').classList.remove('hidden');

                        document.getElementById('edit-user-form').onsubmit = function (e) {
                            e.preventDefault();

                            // Input validation
                            var isValid = true;
                            if (!document.getElementById('edit-user-name').value) {
                                document.getElementById('editNameError').classList.remove('hidden');
                                document.getElementById('edit-user-name').classList.add('border-red-500');
                                isValid = false;
                            } else {
                                document.getElementById('editNameError').classList.add('hidden');
                                document.getElementById('edit-user-name').classList.remove('border-red-500');
                            }

                            if (!document.getElementById('edit-email').value || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(document.getElementById('edit-email').value)) {
                                document.getElementById('editEmailError').classList.remove('hidden');
                                document.getElementById('edit-email').classList.add('border-red-500');
                                isValid = false;
                            } else {
                                document.getElementById('editEmailError').classList.add('hidden');
                                document.getElementById('edit-email').classList.remove('border-red-500');
                            }

                            if (!document.getElementById('edit-birthdate').value) {
                                document.getElementById('editBirthdateError').classList.remove('hidden');
                                document.getElementById('edit-birthdate').classList.add('border-red-500');
                                isValid = false;
                            } else {
                                document.getElementById('editBirthdateError').classList.add('hidden');
                                document.getElementById('edit-birthdate').classList.remove('border-red-500');
                            }

                            if (!document.getElementById('edit-position').value) {
                                document.getElementById('editPositionError').classList.remove('hidden');
                                document.getElementById('edit-position').classList.add('border-red-500');
                                isValid = false;
                            } else {
                                document.getElementById('editPositionError').classList.add('hidden');
                                document.getElementById('edit-position').classList.remove('border-red-500');
                            }

                            if (!document.getElementById('edit-role').value) {
                                document.getElementById('editRoleError').classList.remove('hidden');
                                document.getElementById('edit-role').classList.add('border-red-500');
                                isValid = false;
                            } else {
                                document.getElementById('editRoleError').classList.add('hidden');
                                document.getElementById('edit-role').classList.remove('border-red-500');
                            }

                            if (!isValid) {
                                return;
                            }

                            row.children[2].innerText = document.getElementById('edit-user-name').value;
                            row.children[4].innerText = document.getElementById('edit-email').value;
                            row.children[5].innerText = document.getElementById('edit-birthdate').value;
                            row.children[6].innerText = document.getElementById('edit-age').value;
                            row.children[3].innerText = document.getElementById('edit-position').value;
                            row.children[7].innerHTML = `<span class="bg-${document.getElementById('edit-role').value.toLowerCase() === 'admin' ? 'blue' : document.getElementById('edit-role').value.toLowerCase() === 'engineer' ? 'green' : 'gray'}-100 text-${document.getElementById('edit-role').value.toLowerCase() === 'admin' ? 'blue' : document.getElementById('edit-role').value.toLowerCase() === 'engineer' ? 'green' : 'gray'}-800 px-2 py-1 rounded">${document.getElementById('edit-role').value}</span>`;

                            document.getElementById('edit-user-modal').classList.add('hidden');
                        };
                    });
                });

                document.getElementById('add-user-modal').classList.add('hidden');
                renderTable();
            });

            document.querySelectorAll('.edit-btn').forEach(function (button) {
                button.addEventListener('click', function () {
                    var row = this.closest('tr');
                    var userId = row.children[1].innerText;
                    var name = row.children[2].innerText;
                    var email = row.children[4].innerText;
                    var birthdate = row.children[5].innerText;
                    var age = row.children[6].innerText;
                    var position = row.children[3].innerText;
                    var role = row.children[7].innerText;

                    document.getElementById('edit-user-id').value = userId;
                    document.getElementById('edit-user-name').value = name;
                    document.getElementById('edit-email').value = email;
                    document.getElementById('edit-birthdate').value = birthdate;
                    document.getElementById('edit-age').value = age;
                    document.getElementById('edit-position').value = position;
                    document.getElementById('edit-role').value = role;

                    document.getElementById('edit-user-modal').classList.remove('hidden');

                    document.getElementById('edit-user-form').onsubmit = function (e) {
                        e.preventDefault();

                        // Input validation
                        var isValid = true;
                        if (!document.getElementById('edit-user-name').value) {
                            document.getElementById('editNameError').classList.remove('hidden');
                            document.getElementById('edit-user-name').classList.add('border-red-500');
                            isValid = false;
                        } else {
                            document.getElementById('editNameError').classList.add('hidden');
                            document.getElementById('edit-user-name').classList.remove('border-red-500');
                        }

                        if (!document.getElementById('edit-email').value || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(document.getElementById('edit-email').value)) {
                            document.getElementById('editEmailError').classList.remove('hidden');
                            document.getElementById('edit-email').classList.add('border-red-500');
                            isValid = false;
                        } else {
                            document.getElementById('editEmailError').classList.add('hidden');
                            document.getElementById('edit-email').classList.remove('border-red-500');
                        }

                        if (!document.getElementById('edit-birthdate').value) {
                            document.getElementById('editBirthdateError').classList.remove('hidden');
                            document.getElementById('edit-birthdate').classList.add('border-red-500');
                            isValid = false;
                        } else {
                            document.getElementById('editBirthdateError').classList.add('hidden');
                            document.getElementById('edit-birthdate').classList.remove('border-red-500');
                        }

                        if (!document.getElementById('edit-position').value) {
                            document.getElementById('editPositionError').classList.remove('hidden');
                            document.getElementById('edit-position').classList.add('border-red-500');
                            isValid = false;
                        } else {
                            document.getElementById('editPositionError').classList.add('hidden');
                            document.getElementById('edit-position').classList.remove('border-red-500');
                        }

                        if (!document.getElementById('edit-role').value) {
                            document.getElementById('editRoleError').classList.remove('hidden');
                            document.getElementById('edit-role').classList.add('border-red-500');
                            isValid = false;
                        } else {
                            document.getElementById('editRoleError').classList.add('hidden');
                            document.getElementById('edit-role').classList.remove('border-red-500');
                        }

                        if (!isValid) {
                            return;
                        }

                        row.children[2].innerText = document.getElementById('edit-user-name').value;
                        row.children[4].innerText = document.getElementById('edit-email').value;
                        row.children[5].innerText = document.getElementById('edit-birthdate').value;
                        row.children[6].innerText = document.getElementById('edit-age').value;
                        row.children[3].innerText = document.getElementById('edit-position').value;
                        row.children[7].innerHTML = `<span class="bg-${document.getElementById('edit-role').value.toLowerCase() === 'admin' ? 'blue' : document.getElementById('edit-role').value.toLowerCase() === 'engineer' ? 'green' : 'gray'}-100 text-${document.getElementById('edit-role').value.toLowerCase() === 'admin' ? 'blue' : document.getElementById('edit-role').value.toLowerCase() === 'engineer' ? 'green' : 'gray'}-800 px-2 py-1 rounded">${document.getElementById('edit-role').value}</span>`;

                        document.getElementById('edit-user-modal').classList.add('hidden');
                    };
                });
            });

            document.querySelectorAll('.delete-btn').forEach(function (button) {
                button.addEventListener('click', function () {
                    var row = this.closest('tr');
                    document.getElementById('delete-modal').classList.remove('hidden');
                    document.getElementById('confirm-delete-btn').onclick = function () {
                        row.remove();
                        document.getElementById('delete-modal').classList.add('hidden');
                        renderTable();
                    };
                });
            });

            document.getElementById('close-delete-modal-btn').addEventListener('click', function () {
                document.getElementById('delete-modal').classList.add('hidden');
            });

            document.getElementById('cancel-delete-btn').addEventListener('click', function () {
                document.getElementById('delete-modal').classList.add('hidden');
            });

            document.getElementById('close-edit-modal-btn').addEventListener('click', function () {
                document.getElementById('edit-user-modal').classList.add('hidden');
                document.getElementById('edit-user-name').classList.remove('border-red-500');
                document.getElementById('edit-email').classList.remove('border-red-500');
                document.getElementById('edit-birthdate').classList.remove('border-red-500');
                document.getElementById('edit-position').classList.remove('border-red-500');
                document.getElementById('edit-role').classList.remove('border-red-500');
            });

            document.getElementById('cancel-edit-btn').addEventListener('click', function () {
                document.getElementById('edit-user-modal').classList.add('hidden');

                // Clear error messages
                document.getElementById('editNameError').classList.add('hidden');
                document.getElementById('editEmailError').classList.add('hidden');
                document.getElementById('editBirthdateError').classList.add('hidden');
                document.getElementById('editPositionError').classList.add('hidden');
                document.getElementById('editRoleError').classList.add('hidden');

                // Remove border-red-500 class from input fields
                document.getElementById('edit-user-name').classList.remove('border-red-500');
                document.getElementById('edit-email').classList.remove('border-red-500');
                document.getElementById('edit-birthdate').classList.remove('border-red-500');
                document.getElementById('edit-position').classList.remove('border-red-500');
                document.getElementById('edit-role').classList.remove('border-red-500');
            });

            function calculateAge() {
                const birthdate = document.getElementById('birthdate').value;
                const birthDate = new Date(birthdate);
                const today = new Date();
                let age = today.getFullYear() - birthDate.getFullYear();
                const monthDifference = today.getMonth() - birthDate.getMonth();

                if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }

                document.getElementById('age').value = age;
            }

            function calculateEditAge() {
                const birthdate = document.getElementById('edit-birthdate').value;
                const birthDate = new Date(birthdate);
                const today = new Date();
                let age = today.getFullYear() - birthDate.getFullYear();
                const monthDifference = today.getMonth() - birthDate.getMonth();

                if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }

                document.getElementById('edit-age').value = age;
            }

            function validateEmail() {
                const email = document.getElementById('email').value;
                const emailError = document.getElementById('emailError');
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (!emailPattern.test(email)) {
                    emailError.classList.remove('hidden');
                    document.getElementById('email').classList.add('border-red-500');
                } else {
                    emailError.classList.add('hidden');
                    document.getElementById('email').classList.remove('border-red-500');
                }
            }

            function validateEditEmail() {
                const email = document.getElementById('edit-email').value;
                const emailError = document.getElementById('editEmailError');
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (!emailPattern.test(email)) {
                    emailError.classList.remove('hidden');
                    document.getElementById('edit-email').classList.add('border-red-500');
                } else {
                    emailError.classList.add('hidden');
                    document.getElementById('edit-email').classList.remove('border-red-500');
                }
            }

            // Initial render
            renderTable();
        </script>
        </body>
        </html>

    </x-slot>
</x-app-layout>




