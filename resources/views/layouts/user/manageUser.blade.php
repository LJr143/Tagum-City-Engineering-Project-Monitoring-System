
<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">

    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>

    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">

        <h1 class="text-xl font-medium">User</h1>
        <p class="mb-6 text-sm">List of user within the system</p>

        <div id="labor-cost" class="">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-sm font-semibold mb-4 text-center">Manage User</h3>
                <!-- Filter, Search, Import Inside Card -->
                <div class="flex items-center justify-between mb-4 space-x-4">
                    <div class="flex space-x-2 ml-auto">
                        <livewire:add-user/>
                        <input type="text" placeholder="Search..." class="px-2 py-1 border border-gray-300 rounded-md shadow-sm text-xs w-55">
                    </div>
                </div>
                <!-- Table for Material Costs -->
                <div class="relative bg-white shadow rounded-lg overflow-hidden text-[12px] w-full">
                    <livewire:user-table />
                </div>
            </div>
        </div>

        <!-- Edit User Modal -->
        <div id="edit-user-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 sm:p-6 lg:p-8 hidden">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="font-semibold">Edit User</h2>
                    <button id="close-edit-modal-btn" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <form id="edit-user-form">
                    <div class="mb-4">
                        <label class="block text-sm text-gray-700">User ID</label>
                        <input type="text" id="edit-user-id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-gray-100 cursor-not-allowed" readonly>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm">Name</label>
                        <input type="text" id="edit-user-name" class="w-full mt-1 p-2 border rounded-md text-sm">
                        <p id="editNameError" class="text-red-500 text-sm mt-1 hidden">Name is required</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm">Email</label>
                        <input type="email" id="edit-email" class="w-full mt-1 p-2 border rounded-md text-sm" oninput="validateEditEmail()">
                        <p id="editEmailError" class="text-red-500 text-sm mt-1 hidden">Invalid email address</p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 text-sm">Birthdate</label>
                            <div class="relative">
                                <input type="date" id="edit-birthdate" class="w-full mt-1 p-2 border rounded-md text-sm" placeholder="MM/DD/YYYY" onchange="calculateEditAge()">
                                <i class="fas fa-calendar-alt absolute right-3 top-3 text-gray-500"></i>
                            </div>
                            <p id="editBirthdateError" class="text-red-500 text-sm mt-1 hidden">Birthdate is required</p>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm">Age</label>
                            <input type="text" id="edit-age" class="w-full mt-1 p-2 border rounded-md text-sm" placeholder="Age" readonly>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 text-sm">Position</label>
                            <select id="edit-position" class="w-full mt-1 p-2 border rounded-md mb-4 text-sm">
                                <option value="">Select Position</option>
                                <option>Engineer</option>
                                <option>Manager</option>
                                <option>Director</option>
                            </select>
                            <p id="editPositionError" class="text-red-500 text-sm mt-1 hidden">Position is required</p>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm">Role</label>
                            <select id="edit-role" class="w-full mt-1 p-2 border rounded-md mb-4 text-sm">
                                <option value="">Select Role</option>
                                <option>Admin</option>
                                <option>Engineer</option>
                                <option>Viewer</option>
                            </select>
                            <p id="editRoleError" class="text-red-500 text-sm mt-1 hidden">Role is required</p>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row justify-between">
                        <button type="button" id="cancel-edit-btn" class="w-full sm:w-1/2 mr-0 sm:mr-2 mb-2 sm:mb-0 py-2 border rounded-md text-gray-700 hover:bg-gray-100">Cancel</button>
                        <button type="submit" class="w-full sm:w-1/2 ml-0 sm:ml-2 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div id="delete-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg text-sm">
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center text-red-600">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <h2 class="font-semibold">Delete User</h2>
                    </div>
                    <button id="close-delete-modal-btn" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <p class="text-gray-700 mb-6 ml-8">Are you sure you want to remove this user? This process cannot be undone</p>
                <div class="flex justify-end space-x-2">
                    <button id="cancel-delete-btn" class="px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded hover:bg-gray-100">Cancel</button>
                    <button id="confirm-delete-btn" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
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

    </x-slot>
</x-app-layout>
