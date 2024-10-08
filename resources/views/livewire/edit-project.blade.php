<div x-data="{ open: false }" x-cloak @project-added.window="open = false">
    <div class="flex justify-end">
        <div class="relative ml-2">
            <button @click="open = true" class="flex bg-green-500 text-white text-xs px-4 py-2 rounded shadow-md hover:bg-green-600 focus:outline-none">
                Edit Project

                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-2">
                    <path d="M21 7L17 3L14 6L8 12V16H12L18 10L21 7Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 6L18 10" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 4H4V20H20V14" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

            </button>
        </div>
    </div>

    <!-- Modal -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
    >
        <!-- Modal Content -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="bg-white w-full max-w-[700px] p-6 rounded-lg relative"
        >
            <!-- Close Button (X) -->
            <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h2 class="text-sm font-bold mb-4">Add Project</h2>
            <form wire:submit.prevent="submit" class="text-xs">
                <div class="grid grid-cols-9 gap-6">
                    <!-- Left side (Project Info) -->
                    <div class="col-span-5 space-y-4">
                        <div>
                            <label class="block text-xs font-medium mb-1">Project Title</label>
                            <input type="text" wire:model="title" class="w-full px-3 py-2 text-xs border border-gray-400 rounded" required>
                        </div>
                        <div>
                            <label class="block text-xs font-medium mb-1">Address</label>
                            <input type="text" wire:model="address" class="w-full px-3 py-2 text-xs border border-gray-400 rounded" required>
                        </div>
                        <div class="flex space-x-2">
                            <div class="flex-1">
                                <label class="block text-xs font-medium mb-1">Start Date</label>
                                <input type="date" wire:model="start_date" class="w-full px-3 py-2 text-xs border border-gray-400 rounded" required>
                            </div>
                            <div class="flex-1">
                                <label class="block text-xs font-medium mb-1">End Date</label>
                                <input type="date" wire:model="end_date" class="w-full px-3 py-2 text-xs border border-gray-400 rounded" required>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-medium mb-1">Description</label>
                            <textarea wire:model="description" class="w-full h-[80px] px-3 py-2 text-xs border border-gray-400 rounded" style="resize: none;" required></textarea>
                        </div>
                    </div>

                    <!-- Right side (Upload and Assignee Info) -->
                    <div class="col-span-4 space-y-4">
                        <label class="block text-xs font-medium mb-1">Upload Project Image</label>
                        <div class="border border-dashed border-green-400 rounded p-6 h-[140px] flex items-center justify-center text-center">

                            <div class="flex flex-col items-center justify-center space-y-2">
                                <svg width="68" height="50" viewBox="0 0 78 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="pt-4">
                                    <path d="M40.5679 13.6446C40.4063 14.1279 40.7207 14.6133 41.2237 14.7471L41.3081 14.7695L41.3112 14.7663C41.7861 14.8505 42.277 14.6024 42.425 14.1567C43.7368 10.2261 47.8775 7.4651 52.5082 7.4651C53.0275 7.4651 53.4788 7.08591 53.4788 6.58336C53.4788 6.0808 53.0275 5.70162 52.5082 5.70162C46.8604 5.70162 42.0993 9.0556 40.5679 13.6446ZM40.5679 13.6446L40.7102 13.6922M40.5679 13.6446C40.5679 13.6446 40.5679 13.6447 40.5679 13.6447L40.7102 13.6922M40.7102 13.6922C40.5807 14.0795 40.828 14.4866 41.2623 14.6021L40.7102 13.6922Z" fill="#249000" fill-opacity="0.78" stroke="#F9FFF9" stroke-width="0.3"/>
                                    <path d="M63.9935 42.4384H59.0704C58.6173 42.4384 58.2498 42.1107 58.2498 41.7067C58.2498 41.3027 58.6173 40.9749 59.0704 40.9749H63.9935C70.7797 40.9749 76.3013 36.0509 76.3013 29.999C76.3013 23.9471 70.7797 19.023 63.9935 19.023H63.8751C63.6371 19.023 63.4109 18.9311 63.255 18.7706C63.0991 18.6101 63.0288 18.3974 63.0628 18.1873C63.136 17.7315 63.173 17.2737 63.173 16.8279C63.173 11.5829 58.3875 7.31531 52.5061 7.31531C50.218 7.31531 48.0359 7.95296 46.1956 9.15978C45.7912 9.42478 45.2168 9.30718 44.983 8.91047C39.7709 0.0596993 26.1575 -1.12887 19.0997 6.57053C16.1265 9.81417 14.9583 14.0336 15.8944 18.146C15.9976 18.6002 15.6078 19.0236 15.0903 19.0236H14.7615C7.97522 19.0236 2.45363 23.9477 2.45363 29.9996C2.45363 36.0514 7.97522 40.9755 14.7615 40.9755H19.6846C20.1376 40.9755 20.5051 41.3032 20.5051 41.7072C20.5051 42.1113 20.1376 42.439 19.6846 42.439H14.7615C7.07018 42.439 0.8125 36.8585 0.8125 29.9995C0.8125 23.3329 6.72374 17.8742 14.1174 17.5731C13.4229 13.3066 14.7509 9.00295 17.829 5.64437C25.3855 -2.5996 39.8668 -1.67556 45.9884 7.51707C47.9413 6.42522 50.176 5.85244 52.5058 5.85244C59.6315 5.85244 65.2779 11.261 64.7838 17.58C72.1093 17.9463 77.9421 23.3763 77.9421 29.999C77.9421 36.8585 71.6844 42.4384 63.9931 42.4384L63.9935 42.4384Z" fill="#249000" fill-opacity="0.78"/>
                                    <path d="M18.6039 41.2935C18.6039 51.4791 27.89 59.737 39.2673 59.737C50.6447 59.737 59.9306 51.479 59.9306 41.2935C59.9306 31.1078 50.6446 22.85 39.2673 22.85C27.8899 22.85 18.6039 31.108 18.6039 41.2935ZM20.5453 41.2935C20.5453 32.1123 28.9275 24.6138 39.2673 24.6138C49.6069 24.6138 57.9892 32.1121 57.9892 41.2935C57.9892 50.4747 49.6069 57.9732 39.2673 57.9732C28.9277 57.9732 20.5453 50.4748 20.5453 41.2935Z" fill="#249000" fill-opacity="0.78" stroke="#F9FFF9" stroke-width="0.3"/>
                                    <path d="M39.6398 49.1935C39.3081 49.1935 39.0391 48.9536 39.0391 48.6578V34.7292C39.0391 34.4334 39.3081 34.1935 39.6398 34.1935C39.9715 34.1935 40.2405 34.4334 40.2405 34.7292V48.6578C40.2405 48.9539 39.9715 49.1935 39.6398 49.1935Z" fill="#249000" fill-opacity="0.78"/>
                                    <path d="M38.8891 48.6578C38.8891 49.0521 39.2419 49.3435 39.6398 49.3435C40.0376 49.3435 40.3905 49.0525 40.3905 48.6578V34.7292C40.3905 34.3349 40.0377 34.0435 39.6398 34.0435C39.2419 34.0435 38.8891 34.3349 38.8891 34.7292V48.6578Z" stroke="#249000" stroke-opacity="0.78" stroke-width="0.3"/>
                                    <path d="M44.4466 39.5519C44.293 39.5519 44.139 39.4994 44.0218 39.395L39.6409 35.4881L35.26 39.395C35.0257 39.6043 34.6451 39.6043 34.4104 39.395C34.1757 39.1857 34.1757 38.8466 34.4104 38.6373L39.2161 34.3517C39.4504 34.1424 39.831 34.1424 40.0657 34.3517L44.8714 38.6373C45.1061 38.8466 45.1061 39.1857 44.8714 39.395C44.7542 39.4998 44.6002 39.5519 44.4466 39.5519H44.4466Z" fill="#249000" fill-opacity="0.78"/>
                                    <path d="M43.922 39.5069C44.0693 39.6383 44.2599 39.7018 44.4466 39.7019H44.4466C44.6331 39.7018 44.8239 39.6388 44.9714 39.5067C45.2728 39.2378 45.2727 38.7943 44.9712 38.5254L40.1655 34.2397C39.874 33.9798 39.4075 33.9796 39.1162 34.2398C39.1162 34.2398 39.1162 34.2398 39.1162 34.2398L34.3106 38.5254C34.009 38.7943 34.009 39.238 34.3106 39.5069C34.6021 39.7669 35.0686 39.767 35.3598 39.5069C35.3599 39.5069 35.3599 39.5069 35.3599 39.5068L39.6409 35.6891L43.922 39.5069Z" stroke="#249000" stroke-opacity="0.78" stroke-width="0.3"/>
                                </svg>
                                <p class="text-xs">Drag & drop files or <a href="#" class="text-green-600">Browse</a></p>
                                <p class="text-xs text-gray-500">Supported formats: jpg, png (Max size: 1Mb)</p>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium mb-1">Assignee Information</label>
                            <div class="flex space-x-2 mb-2">
                                <input type="text" wire:model="assignee_name" class="w-full px-3 py-2 text-xs border border-gray-400 rounded" placeholder="Name" required>
                                <select wire:model="position" class="w-full px-3 py-2 text-xs border border-gray-400 rounded" required>
                                    <option>Select Position</option>
                                    <!-- Add positions here -->
                                </select>
                            </div>
                            <label class="block text-xs font-medium mb-1">X and Y Coordinates</label>
                            <div class="flex space-x-2">
                                <input type="text" wire:model="x_coordinate" class="w-full px-3 py-2 text-xs border border-gray-400 rounded" placeholder="X Coordinates" required>
                                <input type="text" wire:model="y_coordinate" class="w-full px-3 py-2 text-xs border border-gray-400 rounded" placeholder="Y Coordinates" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-6 flex justify-end space-x-2">
                    <button @click="open = false" type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded shadow-md hover:bg-gray-400 text-xs">
                        Cancel
                    </button>
                    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded shadow-md hover:bg-green-600 text-xs">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
