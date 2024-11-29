<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">

    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>

    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">
        <div class="container mx-auto p-6">

         <div class="mb-2">
             <!-- Success message -->
             @if (session('status'))
                 <div id="success-message" class="bg-green-500 text-white text-[12px] p-2 rounded-md">
                     {{ session('status') }}
                 </div>
             @endif

             <!-- Error message -->
             @if ($errors->any())
                 <div id="error-message" class="bg-red-500 text-white text-[12px] p-2 rounded-md">
                     <ul>
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                 </div>
             @endif
         </div>


            <!-- Project Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                <div class="mb-4 md:mb-0">
                    <h3 class="text-base font-semibold leading-6 text-gray-900 mb-2">Program of Work {{ $index }}</h3>
                    <span class="inline-block  bg-green-600 text-white px-3 py-1 rounded text-xs">
                            Ref: #{{ $pow->reference_number }}
                    </span>
                </div>

                @if ((auth()->user()->isAdmin() || auth()->user()->isEncoder()) && $pow->project->status != 'completed')
                    <div>
                        <div class="flex justify-content-between">
                            <button onclick="openDeleteModal()"
                                    class="bg-red-500 mr-2 text-white text-[10px] sm:text-xs px-2 h-7 sm:px-4 py-1 sm:py-2 rounded shadow-md hover:bg-red-600 focus:outline-none flex items-center space-x-2">
                                <span>Delete</span>
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 10V16" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M14 10V16" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M18 6V18C18 19.1046 17.1046 20 16 20H8C6.89543 20 6 19.1046 6 18V6"
                                          stroke="white" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M4 6H20" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M15 6V5C15 3.89543 14.1046 3 13 3H11C9.89543 3 9 3.89543 9 5V6"
                                          stroke="white" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </button>
                            @if($pow->project->status != 'suspended' && $pow->project->status != 'completed')
                                <button onclick="openSuspendModal()"
                                        class="bg-red-500 text-white text-[10px] sm:text-xs px-2 sm:px-4 py-1 h-7 sm:py-2 rounded shadow-md hover:bg-red-600 focus:outline-none flex items-center space-x-2">
                                    <span>Suspend</span>
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 10V16" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M14 10V16" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M18 6V18C18 19.1046 17.1046 20 16 20H8C6.89543 20 6 19.1046 6 18V6"
                                              stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M4 6H20" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M15 6V5C15 3.89543 14.1046 3 13 3H11C9.89543 3 9 3.89543 9 5V6"
                                              stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            @elseif ($pow->project->status != 'completed')
                                <button onclick="openResumeModal()" class="bg-green-500 text-white text-[10px] h-7 sm:text-xs px-2 sm:px-4 py-1 sm:py-2 rounded shadow-md hover:bg-green-600 focus:outline-none flex items-center space-x-1">
                                    <span>Resume</span>
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <rect width="15" height="15" fill="url(#pattern0_1545_9266)"/>
                                        <defs>
                                            <pattern id="pattern0_1545_9266" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_1545_9266" transform="scale(0.01)"/>
                                            </pattern>
                                            <image id="image0_1545_9266" width="100" height="100" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAADyUlEQVR4nO3dXYgWVRzH8aNuvhGkIkZIShCk+RKsRsV6ISReBWIkZKaXISJEemH4hhca2+WKN90aCuKykCAseaNCFKQUalDSImuBb5AvmPj+lYMztOr67Mwz/2nOmfl9LpfdYfb89pxn57z8xzkRERERERERERERERHJDRgNLACWAYuA8UWbERgFdAIrgLXAKmC+/7oiat1wnwDnedINYCswpo0gJgE7gUGG9xewCZigYJ5tvM201ud7T44wlgKXyOZ34F2F8l/jvQM8zNBw6zOG8SFwj3z8928HOhofDLA/Y6P9mSGM2cC/tO8H4LVGhwKcy9FgL49wre8p7jqwxjUVcC1HY73Z4jrzsHUAmOyaJvmLzGpOi+tsw57/r2+xaxLDQPooxwPga2CsawLDQI5TrpPALFd3hoH8SPluAZ/X+ik/skBS/cArro4iDYRkJuADVzcRB0Iyw/ANMNHVRYWBnAZuYuMM8Jarg4oC2Z38zDTgEDZuAxvzTIIGqaJAPnpqvWRtwTmwoY4A012sqg4k5Z8xgBPYuAqsdDEKJRDPT78DO4D72NgLvOhiElIgKeA9YAAbfja7y8UixEA84CXgW2z4BbBu4AUXulADSSWbI/7Bxk/A6y5koQfiATOBY9jwv+9nLlQxBOL5nS/JLpU72DgITHGhiSWQFPA28Ad1XQCLLRDP7+UCerCbD+sJZgEsxkBSwHLgCjZO+X0BrmoxB+L5nTDAYWz4tljoqhR7IEPmw75IJhiL8j1uhqtKHQJJ+fsDfqG4XleVOgXi+R37yYd0lu2xrVSzvlK3QFLAEuBv2veVq0JdA/GAqcB3tOeoq0KdAxnyhP9rG4EMuCookOdSIIENWcfMb6jJQxbFP9R3lX2PjQgE/dsbTiCGD4YHy7i/xvQQbKdOLgOvWt5fowLBfnJxgdW9NS4QbKfffwbesLivxgWCFqhqu4Q7qCXcx7TJIeYhC20DCicQtFGutltJd7RT1eh/F+KQhTZbhxEIOo4QTg9BB3bCGLLQkbYgAtlT0qHPDdFXeajwWPRvhgc9dSzaIBALKhxg2EOKUmmNgEpr9Kv4TBiB3FJ5piepgFnZIinx1x3MCaeyqQhmfcvEzjXuGY0tE2tZSLnfIIjGF1LeZ1hqfFbBomQqNZ5sGvAfnCNZl7HHLQPu5gxCxfifasQvR2iw3pyvq3gfuJgxjLN6XcXwjfjxMC9f8eP5loIvdLnwnCAGk1IZ9SlgWdIrjzqTYacLGGdwzY7kmp/6oi/Aar3ySERERERERERERERExEXnEQrlvdEPbQz+AAAAAElFTkSuQmCC"/>
                                        </defs>
                                    </svg>
                                </button>

                            @endif
                        </div>
                        <div class="mt-2">
                            @if ((auth()->user()->isEncoder() || auth()->user()->isAdmin()) && $pow->project->status != 'suspended')
                            <button onclick="openRealignmentModal()"
                                    class=" w-full text-center bg-green-500 text-white text-[10px] h-7 sm:text-xs px-2 sm:px-4 py-1 sm:py-2 rounded shadow-md hover:bg-green-600 focus:outline-none flex items-center justify-center space-x-2">
                                <span>Realignment Setting</span>
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 10V16" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M14 10V16" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M18 6V18C18 19.1046 17.1046 20 16 20H8C6.89543 20 6 19.1046 6 18V6"
                                          stroke="white" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M4 6H20" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M15 6V5C15 3.89543 14.1046 3 13 3H11C9.89543 3 9 3.89543 9 5V6"
                                          stroke="white" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </button>
                            @endif
                        </div>
                    </div>
                @elseif(auth()->user()->isProjectIncharge() && $pow->project->status != 'suspended')

                    <div class="w-full md:w-auto">
                        <div class="flex flex-col md:flex-row items-start md:items-end space-y-2 md:space-y-0 gap-2">
                            <div class="flex-shrink-0 w-full md:w-auto">
                                <livewire:add-swaa-report :pow_id="$pow->id" class="w-full sm:w-auto"/>
                            </div>
                            @if($pow->project->status != 'completed' && $pow->project->status != 'pending validation')
                            <div class="flex-shrink-0 w-full md:w-auto">
                                <livewire:mark-project-complete :pow_id="$pow->id" class="w-full sm:w-auto"/>
                            </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>



            <livewire:material-cost-table :pow_id="$pow->id"/>


            <div>
                <div class="sm:hidden mb-4">
                    <label for="tabs" class="sr-only">Select a tab</label>
                    <select id="tabs" name="tabs" onchange="changeTab(event)"
                            class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        <option value="materials">Materials</option>
                        <option value="labor-cost">Labor Cost</option>
                        <option value="indirect-cost">Indirect Cost</option>
                        <option value="other-direct-cost">Direct Cost</option>
                        <option value="purchase-order-history">Purchase Order History</option>
                        <option value="pow-suspension-resume">POW Suspension/Resume History</option>
                        <option value="realignment-history">Realignment History</option>

                    </select>
                </div>
                <div class="hidden sm:block mb-4">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            <a id="materials-tab" href="#" onclick="changeTabTo('materials')"
                               class="text-gray-500 border-green-600 text-green-600 whitespace-nowrap border-b-2 pb-1 px-1 text-xs font-medium"
                               aria-current="page">Materials</a>
                            <a id="labor-cost-tab" href="#" onclick="changeTabTo('labor-cost')"
                               class="text-gray-500 hover:border-green-600 hover:text-green-600 whitespace-nowrap border-b-2 pb-1 px-1 text-xs font-medium">Labor
                                Cost</a>
                            <a id="indirect-cost-tab" href="#" onclick="changeTabTo('indirect-cost')"
                               class="text-gray-500 hover:border-green-600 hover:text-green-600 whitespace-nowrap border-b-2 pb-1 px-1 text-xs font-medium">Indirect
                                Cost</a>
                            <a id="other-direct-cost-tab" href="#" onclick="changeTabTo('other-direct-cost')"
                               class="text-gray-500 hover:border-green-600 hover:text-green-600 whitespace-nowrap border-b-2 pb-1 px-1 text-xs font-medium">
                                Direct Cost</a>

                            <a id="purchase-order-history-tab" href="#" onclick="changeTabTo('purchase-order-history')"
                               class="text-gray-500 hover:border-green-600 hover:text-green-600 whitespace-nowrap border-b-2 pb-1 px-1 text-xs font-medium">
                                Purchase Order History</a>

                            <a id="pow-suspension-resume-tab" href="#" onclick="changeTabTo('pow-suspension-resume')"
                               class="text-gray-500 hover:border-green-600 hover:text-green-600 whitespace-nowrap border-b-2 pb-1 px-1 text-xs font-medium">
                                POW Suspension/Resume History</a>

                            <a id="realignment-history-tab" href="#" onclick="changeTabTo('realignment-history')"
                               class="text-gray-500 hover:border-green-600 hover:text-green-600 whitespace-nowrap border-b-2 pb-1 px-1 text-xs font-medium">
                                Realignment History</a>



                        </nav>
                    </div>
                </div>
            </div>

            <div class="flex w-full gap-4">
                <!-- Material Cost Section -->
                <div id="materials" class="w-full">
                    <div class="w-full bg-white shadow-lg rounded-lg" x-data="{ tab: 'materials' }">
                        <!-- Tabs -->
                        <div class="flex justify-center space-x-4 bg-gray-200 rounded-t-lg">
                            <button :class="tab === 'materials' ? 'bg-white font-bold text-green-500' : 'text-gray-500'" @click="tab = 'materials'" class="w-1/2 px-4 py-2 rounded-t-lg text-sm">
                                Materials
                            </button>
                            <button :class="tab === 'materials-history' ? 'bg-white font-bold text-green-500' : 'text-gray-500'" @click="tab = 'materials-history'" class="w-1/2 px-4 py-2 rounded-t-lg text-sm">
                                Materials History
                            </button>
                        </div>
                        <!-- Tab Content -->
                        <div class="p-6">
                            <div class="text-gray-700" x-show="tab === 'materials'">
                               <!-- <h2 class="text-sm font-semibold mb-4">Materials</h2>-->
                                <div class="  ">
                                    <div class="mb-2">
                                        @if ((auth()->user()->isEncoder() || auth()->user()->isAdmin()) && $pow->project->status != 'suspended' && $pow->project->status != 'completed')
                                            <livewire:add-manual-material :pow_id="$pow->id"/>
                                        @elseif(auth()->user()->isProjectIncharge() && $pow->project->status != 'suspended' && $pow->project->status != 'completed')
                                            <livewire:make-material-report :pow_id="$pow->id"/>
                                        @endif
                                    </div>
                                    <div class="relative bg-white shadow rounded-lg overflow-hidden text-[12px] w-full">
                                        <livewire:material-table :pow_id="$pow->id"/>
                                    </div>

                                </div>
                            </div>
                            <div class="text-gray-700" x-show="tab === 'materials-history'">
                                <h2 class="text-sm font-semibold mb-4">
                                    Material History
                                </h2>

                                <div class="relative bg-white shadow rounded-lg overflow-hidden text-[12px] w-full">

                                    <livewire:material-history :pow_id="$pow->id"/>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <!-- Labor Cost Section -->
                <div id="labor-cost" class="hidden w-full">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-sm font-semibold mb-4 text-center">Labor Cost</h3>
                        <!-- Filter, Search, Import Inside Card -->
                        <div class="flex items-center justify-between mb-4 space-x-4">
                            <div class="flex space-x-2 ml-auto">
                                @if ((auth()->user()->isEncoder() || auth()->user()->isAdmin()) && $pow->project->status != 'suspended' && $pow->project->status != 'completed')
                                <livewire:add-payroll :pow_id="$pow->id"/>
                                @endif
                            </div>
                        </div>
                        <!-- Table for Material Costs -->
                        <div class="relative bg-white shadow rounded-lg overflow-hidden text-[12px] w-full">
                            <livewire:payroll-table :pow_id="$pow->id"/>
                        </div>
                    </div>
                </div>

                <!-- Indirect Cost Section -->
                <div id="indirect-cost" class="hidden w-full">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-sm font-semibold mb-2 text-center"> Indirect Cost</h3>
                        <div class="mb-2">
                            @if ((auth()->user()->isEncoder() || auth()->user()->isAdmin()) && $pow->project->status != 'suspended' && $pow->project->status != 'completed')
                            <livewire:add-manual-indirect-cost :pow_id="$pow->id"/>
                            @endif
                        </div>
                        <div class="relative bg-white shadow rounded-lg overflow-hidden text-[12px] w-full">
                            <livewire:indirect-cost-table :pow_id="$pow->id"/>
                        </div>
                    </div>
                </div>

                <!-- Other Direct Cost Section -->
                <div id="other-direct-cost" class="hidden w-full">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-sm font-semibold mb-2 text-center"> Direct Cost</h3>
                        <div class="mb-2">
                            @if ((auth()->user()->isEncoder() || auth()->user()->isAdmin()) && $pow->project->status != 'suspended' && $pow->project->status != 'completed')
                            <livewire:add-manual-direct-cost :pow_id="$pow->id"/>
                            @endif
                        </div>
                        <div class="relative bg-white shadow rounded-lg overflow-hidden text-[12px] w-full">
                            <livewire:other-direct-cost-table :pow_id="$pow->id"/>
                        </div>
                    </div>
                </div>

                <!-- Purchase Order History Section -->
                <div id="purchase-order-history" class="hidden w-full">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-sm font-semibold mb-2 text-center"> Purchase Order History</h3>
                        <div class="relative bg-white shadow rounded-lg overflow-hidden text-[12px] w-full">
                            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2 mb-3">

                                    <!-- Add Purchase Order Button -->
                                    @if(auth()->user()->isProjectIncharge() && $pow->project->status != 'suspended' && $pow->project->status != 'completed')
                                    <div>
                                        <livewire:add-p-o :pow_id="$pow->id"/>
                                    </div>
                                    @endif
                                </div>
                            </div>
                                <div class="text-[12px]">
                                    <livewire:purchase-order-table :pow_id="$pow->id"/>
                                </div>

                        </div>
                    </div>
                </div>

                <!-- POW Suspension Resume Section -->
                <div id="pow-suspension-resume" class="hidden w-full">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-sm font-semibold mb-2 text-center"> Suspension / Continuation  History</h3>
                        <div class="relative bg-white shadow rounded-lg overflow-hidden text-[12px] w-full">
                            <livewire:pow-suspend-resume :pow_id="$pow->id"/>
                        </div>
                    </div>
                </div>

                <div id="realignment-history" class="hidden w-full">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-sm font-semibold mb-2 text-center"> Project Realignment  History</h3>
                        <div class="relative bg-white shadow rounded-lg overflow-hidden text-[12px] w-full">
                            <livewire:realignment-history :pow_id="$pow->id"/>
                        </div>
                    </div>
                </div>


                <div id="materials-history" class="hidden w-full">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-sm font-semibold mb-2 text-center"> Materials  History</h3>
                        <div class="relative bg-white shadow rounded-lg overflow-hidden text-[12px] w-full">

                        </div>
                    </div>
                </div>

            </div>

            <!-- Modal for Edit Item -->
            <div id="edit-modal"
                 class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                    <h2 class="text-lg font-semibold mb-4" id="edit-modal-title">Edit Item</h2>
                    <div id="edit-modal-content">
                        <div class="mb-4">
                            <label for="labor-description" class="block text-xs font-medium text-gray-700">Labor
                                Description</label>
                            <input type="text" id="labor-description"
                                   class="mt-1 px-2 py-2 border border-gray-300 rounded-md text-xs w-full"
                                   placeholder="Enter labor description"> <!-- Increased padding -->
                        </div>
                        <div class="mb-4">
                            <label for="labor-rate" class="block text-xs font-medium text-gray-700">Hourly Labor
                                Rate</label>
                            <input type="text" id="labor-rate"
                                   class="mt-1 px-2 py-2 border border-gray-300 rounded-md text-xs w-full"
                                   placeholder="Enter hourly labor rate"> <!-- Increased padding -->
                        </div>
                        <div class="mb-4">
                            <label for="labor-hours" class="block text-xs font-medium text-gray-700">Estimated Labor
                                Hours</label>
                            <input type="text" id="labor-hours"
                                   class="mt-1 px-2 py-2 border border-gray-300 rounded-md text-xs w-full"
                                   placeholder="Enter estimated labor hours"> <!-- Increased padding -->
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button onclick="closeEditModal()"
                                class="px-4 py-1 bg-white border border-gray-300 rounded-md text-xs hover:bg-gray-300">
                            Cancel
                        </button>
                        <button id="edit-modal-confirm" onclick="confirmEditAction()"
                                class="ml-2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 text-xs">
                            Confirm
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal for Delete Item -->
            <div id="delete-modal"
                 class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-4 sm:mx-auto">
                    <div class="flex items-center mb-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="mr-2">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M8.4845 2.49512C9.15808 1.32845 10.842 1.32845 11.5156 2.49512L17.7943 13.3701C18.4678 14.5368 17.6259 15.9951 16.2787 15.9951H3.72136C2.37421 15.9951 1.53224 14.5368 2.20582 13.3701L8.4845 2.49512ZM10 5.00012C10.4142 5.00012 10.75 5.33591 10.75 5.75012V9.25012C10.75 9.66434 10.4142 10.0001 10 10.0001C9.58579 10.0001 9.25 9.66434 9.25 9.25012L9.25 5.75012C9.25 5.33591 9.58579 5.00012 10 5.00012ZM10 14.0001C10.5523 14.0001 11 13.5524 11 13.0001C11 12.4478 10.5523 12.0001 10 12.0001C9.44772 12.0001 9 12.4478 9 13.0001C9 13.5524 9.44772 14.0001 10 14.0001Z"
                                  fill="#CA383A"/>
                        </svg>
                        <h2 class="text-sm font-semibold text-red-500">Delete Item</h2>
                    </div>
                    <p class="text-xs mb-4 ml-7">Are you sure you want to remove this item? This process cannot be
                        undone.</p>

                    <!-- Delete Form -->
                    <form id="delete-form" action="{{ route('pow.destroy', $pow->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="project_id" value="{{ $pow->project_id }}">

                        <div class="flex justify-end">
                            <button type="button" id="delete-cancel-button" onclick="closeDeleteModal()"
                                    class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-400">
                                Cancel
                            </button>
                            <button type="submit" id="delete-modal-confirm"
                                    class="bg-red-500 text-white rounded-md px-4 py-2 text-xs hover:bg-red-600 ml-2">
                                Delete
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal for Suspension -->
            <livewire:suspend-project :powId="$pow->id" :index="$index"/>

            <!-- Modal for Resume -->
            <div id="resume-modal"
                 class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-4 sm:mx-auto">
                    <div class="flex items-center mb-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.4845 2.49512C9.15808 1.32845 10.842 1.32845 11.5156 2.49512L17.7943 13.3701C18.4678 14.5368 17.6259 15.9951 16.2787 15.9951H3.72136C2.37421 15.9951 1.53224 14.5368 2.20582 13.3701L8.4845 2.49512ZM10 5.00012C10.4142 5.00012 10.75 5.33591 10.75 5.75012V9.25012C10.75 9.66434 10.4142 10.0001 10 10.0001C9.58579 10.0001 9.25 9.66434 9.25 9.25012L9.25 5.75012C9.25 5.33591 9.58579 5.00012 10 5.00012ZM10 14.0001C10.5523 14.0001 11 13.5524 11 13.0001C11 12.4478 10.5523 12.0001 10 12.0001C9.44772 12.0001 9 12.4478 9 13.0001C9 13.5524 9.44772 14.0001 10 14.0001Z" fill="#4CAF50"/>
                        </svg>

                        <h2 class="text-sm font-semibold text-green-500">Resume Project</h2>
                    </div>
                    <p class="text-xs mb-4 ml-7">Are you sure you want to resume this project?.</p>

                    <form id="resume-form" action="{{ route('projects.resume') }}" method="POST">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $pow->project_id }}">
                        <input type="hidden" name="pow_id" value="{{ $pow->id }}">

                        <div class="flex justify-end">
                            <button type="button" onclick="closeResumeModal()"
                                    class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-400">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="bg-green-500 text-white rounded-md px-4 py-2 text-xs hover:bg-green-600 ml-2">
                                Resume
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal for Realignment -->
            <div id="realignment-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6 w-11/12 sm:w-1/3 ">
                    <div class="flex items-center mb-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M8.4845 2.49512C9.15808 1.32845 10.842 1.32845 11.5156 2.49512L17.7943 13.3701C18.4678 14.5368 17.6259 15.9951 16.2787 15.9951H3.72136C2.37421 15.9951 1.53224 14.5368 2.20582 13.3701L8.4845 2.49512ZM10 5.00012C10.4142 5.00012 10.75 5.33591 10.75 5.75012V9.25012C10.75 9.66434 10.4142 10.0001 10 10.0001C9.58579 10.0001 9.25 9.66434 9.25 9.25012L9.25 5.75012C9.25 5.33591 9.58579 5.00012 10 5.00012ZM10 14.0001C10.5523 14.0001 11 13.5524 11 13.0001C11 12.4478 10.5523 12.0001 10 12.0001C9.44772 12.0001 9 12.4478 9 13.0001C9 13.5524 9.44772 14.0001 10 14.0001Z"
                                  fill="#CA383A"/>
                        </svg>
                        <h2 class="text-sm font-semibold text-red-500">Realign Fund</h2>
                    </div>
                    <p class="text-xs mb-4">
                            <span class="font-semibold text-red-500">This Action cannot be undone, please be cautious</span>
                    </p>

                    <p class="text-xs mb-4">Select a source and destination for realignment, and choose specific items to adjust the budget</p>

                    <!-- Realignment Form -->
                    <livewire:realignment :pow_id="$pow->id" />
                </div>
            </div>

            <!-- Save Modal -->
            <div id="save-modal"
                 class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-4 sm:mx-auto">
                    <div class="flex items-center mb-2">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="25" height="25" fill="url(#pattern0_1562_9309)"/>
                            <defs>
                                <pattern id="pattern0_1562_9309" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_1562_9309" transform="scale(0.01)"/>
                                </pattern>
                                <image id="image0_1562_9309" width="100" height="100" xlink:href="data:image/png;base64,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"/>
                            </defs>
                        </svg>


                        <h2 class="text-sm font-semibold text-green-600 ml-1">Save Changes</h2>
                    </div>
                    <p class="text-xs mb-4 ml-7">Are you sure you want to save these changes? This action cannot be
                        undone.</p>
                    <div class="flex justify-end">
                        <button id="save-cancel-button" onclick="closeSaveModal()"
                                class="bg-white border border-gray-300 text-gray-700 rounded-md text-xs px-4 py-2 hover:bg-gray-400">
                            Cancel
                        </button>
                        <button id="save-modal-confirm" onclick="confirmSaveAction()"
                                class="bg-green-600 text-white rounded-md px-4 py-2 text-xs hover:bg-green-700 ml-2">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </x-slot>
    <script>
        // Tab Change Function
        function changeTab(event) {
            const selectedTab = event.target.value;
            changeTabTo(selectedTab);
        }

        function changeTabTo(tab) {
            document.getElementById('materials').style.display = tab === 'materials' ? 'block' : 'none';
            document.getElementById('labor-cost').style.display = tab === 'labor-cost' ? 'block' : 'none';
            document.getElementById('indirect-cost').style.display = tab === 'indirect-cost' ? 'block' : 'none';
            document.getElementById('other-direct-cost').style.display = tab === 'other-direct-cost' ? 'block' : 'none';
            document.getElementById('purchase-order-history').style.display = tab === 'purchase-order-history' ? 'block' : 'none';
            document.getElementById('pow-suspension-resume').style.display = tab === 'pow-suspension-resume' ? 'block' : 'none';
            document.getElementById('realignment-history').style.display = tab === 'realignment-history' ? 'block' : 'none';


            // Highlight active tab
            document.getElementById('materials-tab').classList.toggle('border-green-600', tab === 'materials');
            document.getElementById('materials-tab').classList.toggle('text-green-600', tab === 'materials');
            document.getElementById('labor-cost-tab').classList.toggle('border-green-600', tab === 'labor-cost');
            document.getElementById('labor-cost-tab').classList.toggle('text-green-600', tab === 'labor-cost');
            document.getElementById('indirect-cost-tab').classList.toggle('border-green-600', tab === 'indirect-cost');
            document.getElementById('indirect-cost-tab').classList.toggle('text-green-600', tab === 'indirect-cost');
            document.getElementById('other-direct-cost-tab').classList.toggle('border-green-600', tab === 'other-direct-cost');
            document.getElementById('other-direct-cost-tab').classList.toggle('text-green-600', tab === 'other-direct-cost');
            document.getElementById('purchase-order-history-tab').classList.toggle('border-green-600', tab === 'purchase-order-history');
            document.getElementById('purchase-order-history-tab').classList.toggle('text-green-600', tab === 'purchase-order-history');
            document.getElementById('pow-suspension-resume-tab').classList.toggle('border-green-600', tab === 'pow-suspension-resume');
            document.getElementById('pow-suspension-resume-tab').classList.toggle('text-green-600', tab === 'pow-suspension-resume');
            document.getElementById('realignment-history-tab').classList.toggle('border-green-600', tab === 'realignment-history');
            document.getElementById('realignment-history-tab').classList.toggle('text-green-600', tab === 'realignment-history');

        }

        // Modal Management Functions
        function openEditModal() {
            document.getElementById('edit-modal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('edit-modal').classList.add('hidden');
        }

        function confirmEditAction() {
            closeEditModal();
        }

        function openDeleteModal() {
            document.getElementById('delete-modal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('delete-modal').classList.add('hidden');
        }

        function confirmDeleteAction() {
            closeDeleteModal();
        }

        function openSuspendModal() {
            document.getElementById('suspend-modal').classList.remove('hidden');
        }

        function closeSuspendModal() {
            document.getElementById('suspend-modal').classList.add('hidden');
        }

        function confirmSuspendAction() {
            closeSuspendModal();
        }

        function openResumeModal() {
            document.getElementById('resume-modal').classList.remove('hidden');
        }

        function closeResumeModal() {
            document.getElementById('resume-modal').classList.add('hidden');
        }

        function confirmResumeAction() {
            closeResumeModal();
        }

        function openRealignmentModal() {
            document.getElementById('realignment-modal').classList.remove('hidden');
        }

        function closeRealignmentModal() {
            document.getElementById('realignment-modal').classList.add('hidden');
        }

        function confirmRealignmentAction() {
            closeRealignmentModal();
        }

        // Modal for Adding Payroll
        const modal = document.getElementById('modal');
        const openModalButton = document.getElementById('open-modal');
        const closeModalButton = document.getElementById('close-modal');

        // Function to open modal
        openModalButton.onclick = function () {
            modal.classList.remove('hidden'); // Show modal
        };

        // Function to close modal
        closeModalButton.onclick = function () {
            modal.classList.add('hidden'); // Hide modal
        };

        // Close modal when clicking outside of it
        window.onclick = function (event) {
            if (event.target === modal) {
                modal.classList.add('hidden'); // Hide modal
            }
        };

        // Function to open the Save modal
        function openSaveModal() {
            document.getElementById("save-modal").classList.remove("hidden");
        }

        // Function to close the Save modal
        function closeSaveModal() {
            document.getElementById("save-modal").classList.add("hidden");
        }

        // Function to confirm Save action
        function confirmSaveAction() {
            // Add your save logic here
            closeSaveModal();
        }

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let successMessage = document.getElementById('success-message');
            let errorMessage = document.getElementById('error-message');


            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 2000);
            }

            if (errorMessage) {
                setTimeout(function() {
                    errorMessage.style.display = 'none';
                }, 2000);
            }
        });
    </script>


</x-app-layout>
