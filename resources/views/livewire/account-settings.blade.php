<div class="container mx-auto">
    <h1 class="text-xl font-medium mb-6">
        Account Settings
    </h1>
    <div class="bg-white rounded-lg shadow-lg p-4 ">
        <div class="flex flex-col md:flex-row">

            <div class="text-left w-full md:w-1/6 mb-4 md:mb-0 ">
                <div class="mb:1 md:mb-2">
                    <button class="w-full text-xs text-left text-green-500 py-2 px-4 rounded-lg" id="profileButton" onclick="showProfileContent()">
                        My Profile
                    </button>
                </div>
                <div class="mb:1 md:mb-2">
                    <button class="w-full text-xs text-left py-2 px-4 rounded-lg text-gray-600" id="securityButton" onclick="showSecurityContent()">
                        Security
                    </button>
                </div>
                <div>
                    <button class="w-full text-xs text-left py-2 px-4 rounded-lg text-gray-600" id="developersButton" onclick="showDevelopersContent()">
                        Developers
                    </button>
                </div>
            </div>


            <div class="w-full md:w-4/4 md:pl-4 py-1" id="profileContent">
                <h2 class="text-sm font-medium text-gray-800 mb-3">
                    My Profile
                </h2>

                <form wire:submit.prevent="saveProfile">
                    <div class="bg-white p-2 px-4 rounded-lg shadow mb-4 relative">
                        <div class="flex flex-col items-center mb-3 sm:flex-row sm:items-start">
                            <div class="relative w-16 h-16 rounded-full overflow-hidden bg-gray-300 mb-4 sm:mb-0 mt-2">
                                <!-- Use the temporary URL or default URL for preview -->
                                <img alt="Profile photo of a person" class="w-full h-full object-cover" height="64" id="photo"
                                    src="{{  $profileImage ? $profileImage->temporaryUrl() : $profilePhotoUrl  }}" width="64" />
                                <input accept="image/*" class="hidden" id="photoInput" wire:model="profileImage" type="file" />
                                <label class="absolute bottom-0 right-0 bg-black bg-opacity-50 text-white p-1 rounded-full cursor-pointer" for="photoInput" id="photoLabel" style="display: none;">
                                    <i class="fas fa-camera"></i>
                                </label>
                            </div>
                            <div class="text-center sm:mt-6 sm:text-left sm:ml-4">
                                <h3 class="text-xs font-semibold text-gray-800" id="name">
                                    {{ $first_name }} {{ $middle_initial }} {{ $last_name }}
                                </h3>
                                <input class="hidden text-xs font-semibold text-gray-800 border border-gray-300 rounded p-1 mb-1 focus:ring-green-500 focus:border-green-500"
                                    id="nameInput" type="text" value="{{ $first_name }} {{ $middle_initial }} {{ $last_name }}" readonly />
                                <p class="text-[10px] text-gray-600" id="position">
                                    {{$role}}
                                </p>
                                <input class="hidden text-[10px] h-7 text-gray-600 border border-gray-300 rounded p-1 focus:ring-green-500 focus:border-green-500"
                                    id="positionInput" type="text" value="{{$role}}" readonly />
                            </div>
                        </div>
                        <div>
                            <button type="button" class="text-xs text-gray-600 absolute top-3 right-3 hover:text-gray-800 transition duration-200"
                                    id="editButton" onclick="enableEditProfile()">
                                <i class="fas fa-edit"></i>
                                Edit
                            </button>
                            <button type="submit" wire:loading.attr="disabled" class="text-xs text-gray-600 absolute top-3 right-3 hidden hover:text-gray-800 transition duration-200"
                                    id="saveButton" style="display: none;">
                                <i class="fas fa-save"></i>
                                Save
                            </button>
                        </div>
                    </div>
                </form>



                <div class="bg-white p-4 rounded-lg shadow mb-4 relative">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="text-xs font-semibold text-gray-800">
                            Personal Information
                        </h3>
                        <button class="text-xs text-gray-600 hover:text-gray-800 transition duration-200" id="editPersonalInfoButton" onclick="enableEditPersonalInfo()">
                            <i class="fas fa-edit">
                            </i>
                            Edit
                        </button>
                        <button wire:click="savePersonalInfo" class="text-xs text-gray-600 absolute hover:text-gray-800 transition duration-200 top-2 right-2 hidden" id="savePersonalInfoButton" onclick="savePersonalInfoChanges()" style="display: none;">
                            <i class="fas fa-save">
                            </i>
                            Save
                        </button>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <p class="text-[10px] text-gray-600">
                                First Name
                            </p>
                            <p class="text-[11px] text-gray-800 font-medium" id="firstName">
                                {{ $first_name }}
                            </p>
                            <input wire:model="first_name" class="hidden text-[11px] w-full md:w-2/3 h-7 text-gray-800 border border-gray-300 rounded p-1 focus:ring-green-500 focus:border-green-500" id="firstNameInput" type="text" value="{{ $first_name }}" />
                            <p class="text-red-500 text-xs hidden" id="firstNameError">Please enter a valid first name.</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-600">
                                Middle Initial
                            </p>
                            <p class="text-[11px] text-gray-800 font-medium" id="middleInitial">
                                {{ $middle_initial }}
                            </p>
                            <input wire:model="middle_initial" class="hidden text-[11px] w-full md:w-2/3 h-7 text-gray-800 border border-gray-300 rounded p-1 focus:ring-green-500 focus:border-green-500" id="middleInitialInput" type="text" value="{{ $middle_initial }}" />
                            <p class="text-red-500 text-xs hidden" id="middleInitialError">Please enter a valid middle initial.</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-600">
                                Last Name
                            </p>
                            <p class="text-[11px] text-gray-800 font-medium" id="lastName">
                                {{ $last_name }}
                            </p>
                            <input wire:model="last_name" class="hidden text-[11px] w-full md:w-2/3 text-gray-800 border border-gray-300 rounded p-1 focus:ring-green-500 focus:border-green-500" id="lastNameInput" type="text" value="{{ $last_name }}" />
                            <p class="text-red-500 text-xs hidden" id="lastNameError">Please enter a valid last name.</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-600">
                                Birthdate
                            </p>
                            <p class="text-[11px] text-gray-800 font-medium" id="birthdate">
                                {{ $birthdate }}
                            </p>
                            <input wire:model="birthdate" class="hidden text-[11px] w-full md:w-2/3 h-7 text-gray-800 border border-gray-300 rounded p-1 focus:ring-green-500 focus:border-green-500" id="birthdateInput" type="date" value="01/01/1990" />
                            <p class="text-red-500 text-xs hidden" id="birthdateError">Please enter a valid birthdate.</p>
                            <p class="text-red-500 text-xs hidden" id="birthdateTodayError">Birthdate cannot be today.</p>
                            <p class="text-red-500 text-xs hidden" id="birthdateUnder18Error">You must be at least 18 years old.</p>
                        </div>
                    </div>
                </div>



                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="text-xs font-semibold text-gray-800">
                            Contact Information
                        </h3>
                        <button class="text-xs text-gray-600 hover:text-gray-800 transition duration-200" id="editContactInfoButton" onclick="enableEditContactInfo()">
                            <i class="fas fa-edit">
                            </i>
                            Edit
                        </button>
                        <button wire:click="saveContactInfo" class="text-xs text-gray-600 hover:text-gray-800 transition duration-200 hidden" id="saveContactInfoButton" onclick="saveContactInfoChanges()" style="display: none;">
                            <i class="fas fa-save">
                            </i>
                            Save
                        </button>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <p class="text-[10px] text-gray-600">
                                Email Address
                            </p>
                            <p class="text-[11px] text-gray-800 font-medium" id="email">
                                {{ $email }}
                            </p>
                            <input wire:model="email" class="hidden text-[11px] w-full md:w-2/3 h-7 text-gray-800 border border-gray-300 rounded p-1 focus:ring-green-500 focus:border-green-500" id="emailInput" type="email" value="email@example.com" />
                            <p class="text-red-500 text-xs hidden" id="emailError">Please enter a valid email address.</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-600">
                                Phone Number
                            </p>
                            <p class="text-[11px] text-gray-800 font-medium" id="phone">
                                {{ $phoneNumber }}
                            </p>
                            <input wire:model="phoneNumber" class="hidden text-[11px] w-full md:w-2/3 h-7 text-gray-800 border border-gray-300 rounded p-1 focus:ring-green-500 focus:border-green-500" id="phoneInput" type="tel" value="0917-123-4567" />
                            <p class="text-red-500 text-xs hidden" id="phoneError">Please enter a valid phone number (format: 0917-123-4567).</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="w-full md:w-4/4 md:pl-6 py-1" id="securityContent" style="display: none;">
                <h2 class="text-sm font-medium text-gray-800 mb-3">
                    Security
                </h2>
                <div class="flex flex-col md:flex-row">
                    <div class="bg-white p-6 rounded-lg shadow-md w-full md:max-w-md flex-grow mb-6 lg:mb-0">
                        <h3 class="text-xs font-semibold text-gray-800 mb-3">
                            Change Password
                        </h3>
                        <form>
                            <div class="mb-4">
                                <label class="block text-[12px] text-gray-600" for="user-id">
                                    User ID
                                </label>
                                <input wire:model="userID" class="w-full text-[11px] h-7 text-gray-800 px-3 py-2 border border-gray-300 rounded p-1 focus:ring-green-500 focus:border-green-500" id="user-id" type="text" onfocus="clearError('userIdError')" />
                                <!-- Error message -->
                                <span class="text-red-500 text-xs" id="userIdError" style="display: none;">User ID is required.</span>
                            </div>

                            <div class="mb-4 relative">
                                <label class="block text-[12px] text-gray-600" for="current-password">
                                    Current Password
                                </label>
                                <div class="relative">
                                    <input wire:model="currentPassword" class="w-full text-[11px] h-8 text-gray-800 px-3 py-2 border border-gray-300 rounded p-1 focus:ring-green-500 focus:border-green-500 pr-10" id="current-password" type="password" onfocus="clearError('currentPasswordError'); clearError('currentPasswordIncorrectError')" />
                                    <button type="button" class="absolute inset-y-0 right-3 flex items-center cursor-pointer" onclick="toggleCurrentPasswordVisibility()">
                                        <span id="currentPasswordIcon" class="w-4 h-4 mr-2">

                                            <svg id="eyeSlashIconCurrent" width="31" height="20" viewBox="0 0 31 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g clip-path="url(#clip0_1607_9292)">
                                                    <path d="M31 0H0V20H31V0Z" fill="url(#pattern0_1607_9292)" />
                                                </g>
                                                <defs>
                                                    <pattern id="pattern0_1607_9292" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                        <use xlink:href="#image0_1607_9292" transform="matrix(0.00645161 0 0 0.01 0.177419 0)" />
                                                    </pattern>
                                                    <clipPath id="clip0_1607_9292">
                                                        <rect width="31" height="20" fill="white" />
                                                    </clipPath>
                                                    <image id="image0_1607_9292" width="100" height="100" xlink:href="data:image/png;base64,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" />
                                                </defs>
                                            </svg>



                                            <svg id="eyeIconCurrent" class="hidden" width="31" height="20" viewBox="0 0 31 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g clip-path="url(#clip0_1607_9295)">
                                                    <g clip-path="url(#clip1_1607_9295)">
                                                        <path d="M31 0H0V20H31V0Z" fill="url(#pattern0_1607_9295)" />
                                                    </g>
                                                </g>
                                                <defs>
                                                    <pattern id="pattern0_1607_9295" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                        <use xlink:href="#image0_1607_9295" transform="matrix(0.00645161 0 0 0.01 0.177419 0)" />
                                                    </pattern>
                                                    <clipPath id="clip0_1607_9295">
                                                        <rect width="31" height="20" fill="white" />
                                                    </clipPath>
                                                    <clipPath id="clip1_1607_9295">
                                                        <rect width="31" height="20" fill="white" />
                                                    </clipPath>
                                                    <image id="image0_1607_9295" width="100" height="100" xlink:href="data:image/png;base64,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" />
                                                </defs>
                                            </svg>

                                        </span>

                                    </button>
                                </div>
                                <!-- Error message -->
                                <span class="text-red-500 text-xs" id="currentPasswordError" style="display: none;">Current password is required.</span>
                                <span class="text-red-500 text-xs" id="currentPasswordIncorrectError" style="display: none;">Current password is incorrect.</span>
                            </div>

                            <!-- Password Requirements Section -->
                            <div class="mb-4 password-requirements md:hidden">
                                <h3 class="text-xs font-semibold text-gray-800 mb-3">
                                    Password Requirements
                                </h3>
                                <p class="text-[11px] text-gray-700 mb-2">
                                    Please follow this guide for a strong password:
                                </p>
                                <ul class="list-disc list-inside text-[9px] text-gray-700">
                                    <li>One special character</li>
                                    <li>Min 6 characters</li>
                                    <li>One number (2 are recommended)</li>
                                    <li>Change it often</li>
                                </ul>
                            </div>


                            <div class="mb-4 relative">
                                <label class="block text-[12px] text-gray-600" for="new-password">
                                    New Password
                                </label>
                                <div class="relative">
                                    <input wire:model="newPassword" class="w-full text-[11px] h-8 text-gray-800 px-3 py-2 border border-gray-300 rounded p-1 focus:ring-green-500 focus:border-green-500 pr-10" id="new-password" type="password" onfocus="clearError('newPasswordError')" oninput="validatePassword()" />
                                    <button type="button" class="absolute inset-y-0 right-3 flex items-center cursor-pointer" onclick="toggleNewPasswordVisibility()">
                                        <span id="newPasswordIcon" class="w-4 h-4 mr-2">

                                            <svg id="eyeSlashIconNew" width="31" height="20" viewBox="0 0 31 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g clip-path="url(#clip0_1616_9292)">
                                                    <path d="M31 0H0V20H31V0Z" fill="url(#pattern0_1616_9292)" />
                                                </g>
                                                <defs>
                                                    <pattern id="pattern0_1616_9292" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                        <use xlink:href="#image0_1616_9292" transform="matrix(0.00645161 0 0 0.01 0.177419 0)" />
                                                    </pattern>
                                                    <clipPath id="clip0_1616_9292">
                                                        <rect width="31" height="20" fill="white" />
                                                    </clipPath>
                                                    <image id="image0_1616_9292" width="100" height="100" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAAGHklEQVR4nO2da4xdUxTHfzTTmlbRTt2h6tFKPT4QRYJ+8EhR0hEVRE1EgkQjnh+KVBuSFi3BB4/ESATR0BIqjA/ilSBSERI6Ukrr2ZJRr/GYFtMtu1knuW7uedx79z5n3Tn7l6ykac89e+/zP/vsvddaexcCgUAgEAgEAoFAIDBa6AQWAU8Dy4HuoitUZirAR4Cpsm+AfYuuWFnFGKgRIzLbUwJKxDDy+QooEcPaTXlVpuxUMohhx5QJRVe0LGKsTxFjA7B/0RUtA5Ughh6CGIoIYtRgB8dpwKHAccBsMfvnmcB0WSkXNYAPyHWjjunARcBdwLPA+8C2lIdRbYPAB8ALwJ3AhcCMFupTOjFmANcB/fIwjSf7BVgLXNWAQKUR4yhgZYbGGk82DJxYdjH2Ai4FXi1IBCO2AzinzAP4VOA+4I+ChTDSM84qa884GHhIHkLRQpgyi2Gnp3cA21t8gF8Aq8V9fTlwmkxv7dR3EjBGytsb6AKOBE4BLpHfrAE2Vokxt2xi7Ab0At81KcCnwN3APMdBHXuvwxyIsbWdxLDjxCtNiDAg7unDC6x7FjEie0Z6o2ouaHDh9ifwKHBS0RWnMTEi+156sTr2AB5roCFDwApFMeZKi+ugh4GxKOEA4L2MFf8LuB2YjB4qjhalb2t4wU4AtmSs8HPAIeiiknE29WLGNn4pnodCOFve+LRKfg2cgT4qDU5tF2T0rw1lmFY7Z764HdIqtwrYB31UmlxnTAGeytDuYXlhc8G+Kf+kVOh3uU4jFQeLvoUZFrvb8xBlXgYxNgNHe67HZGCOuM+XAfdKzGS8IzGypH1aD/G3RYpyfAan4JvSrX0Fq24FPgRG6nwiXLlDGsnBtdeuS7mnfWazcIwN4vyQUrCdiYxzXTBwLPB8HRGKFiNiT+D1lHvbvN79cISNTX+cUqB13nXglklAX4IQGsSoXhi/lFLGOrmuZR5JKWh1lbfVFbNlumxyEOMTR1sFOqQnJ5X1eKuFXJxSwBsePlO9wN85ifGV430b9mvybkqZ57cSVBpKyVW18QeXXJHyiXIphrV/PUzP7aTm84QyB5t9CfoTbvqTCOaSc+UB5SVGZHYaf6bjtsxM8XrbtKSG3ehxN9sJ9HhowFABYlS/YDbpzrU3I6lMOxxkzghJchjaBZhLxkgCnClIjMjeAnZ33La+lPEr06xrWcJN1nvw+1+jQAwjdqXjto2XFKG48m5Mu4ENSf4W8+MRD5G9CSke1OEcxYhi5Z0eQhQjCRmUiWHgFQmVfQD3XK9IDCN2rYd2PpFQ3j1xP+oSL22cknbl7JoBZWIY8Ur4SPyIe7a/AhPr/WhRQiWXeKjkMQrFMGI+vNVLEsq7ul4e1WcxF/8Yp2CL3Bzjru5xkGvbqqUOtk0O8HFrk421M7zTEyp3C37oV9gzjNjLntq8MqHM/y1OV8dctMPjGR2blYphZI3gg2kJfrono4vGJaySbfzYBx1VU0FtYhjxRvjKs4qLyf8chTDmJlTsVE+V6lIshhHzlbub9LxtWHrXNoF6/zjoIc4RcaByMYyEjH0wVpYR9cq8nwRXsU0N9cUU5WIYlyHXOqyKKdNqEavWeRRHpWAxjMdt1UiQql6ZVou6aZJbXcV/21SMLZ7b2Bnjw7NacBCwqWaLQG5ZdwrFMMBrObS1pyatapNosYsOSYJb4DGvql3EMMBtObW5WwJV8z1k7YwaMYxkvZSWPHxTpsFVuvXtlRJtPcMASykp2nqGkWipj7iPejT2DAMspoRoFWODpo2bZf5MGQmM2Sz7UqG1Z+wELqNkZN0SsFQeUJ6C+IqIqqXRPX0LM2ybc2E2QHYDJaPZDZZzJLnClxjbPOQnq6fV3a7dsjPLtRhrJUBWKlyeN3WyJEK3KsQ7HrYdtAW+Dv+aJemsaVvdauMaD0p+bSnJ6yS2IyRUsFxS/tfI+VV98ne9ck2pGdWnd7YbQQxFBDEUEcRQRBBDEUEMRQQxFBHEUEQQQxFBDEVMzHBeVlsdTN/u2CheEEMR9gDk0DMUYQ+bCZ8pRUyV/SLVotgxJYwZBYsS/V+Ci+UkzkAgEAgEAoFAIBAI0P78B05eze7icpghAAAAAElFTkSuQmCC" />
                                                </defs>
                                            </svg>


                                            <svg id="eyeIconNew" class="hidden" width="31" height="20" viewBox="0 0 31 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g clip-path="url(#clip0_1616_9295)">
                                                    <g clip-path="url(#clip1_1616_9295)">
                                                        <path d="M31 0H0V20H31V0Z" fill="url(#pattern0_1616_9295)" />
                                                    </g>
                                                </g>
                                                <defs>
                                                    <pattern id="pattern0_1616_9295" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                        <use xlink:href="#image0_1616_9295" transform="matrix(0.00645161 0 0 0.01 0.177419 0)" />
                                                    </pattern>
                                                    <clipPath id="clip0_1616_9295">
                                                        <rect width="31" height="20" fill="white" />
                                                    </clipPath>
                                                    <clipPath id="clip1_1616_9295">
                                                        <rect width="31" height="20" fill="white" />
                                                    </clipPath>
                                                    <image id="image0_1616_9295" width="100" height="100" xlink:href="data:image/png;base64,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" />
                                                </defs>
                                            </svg>


                                        </span>
                                    </button>
                                </div>
                                <!-- Error message for password requirement -->
                                <span class="text-red-500 text-xs" id="newPasswordError" style="display: none;">New password is required.</span>
                                <span class="text-red-500 text-xs" id="passwordRequirementError" style="display: none;">Password must be at least 6 characters long, contain at least one number, and one special character.</span>
                            </div>

                            <div class="mb-4 relative">
                                <label class="block text-[12px] text-gray-600" for="retype-new-password">
                                    Re-type New Password
                                </label>
                                <div class="relative">
                                    <input wire:model="retypeNewPassword" class="w-full text-[11px] h-8 text-gray-800 px-3 py-2 border border-gray-300 rounded p-1 focus:ring-green-500 focus:border-green-500 pr-10" id="retype-new-password" type="password" onfocus="clearError('retypeNewPasswordError')" oninput="validateRetypePassword()" />
                                    <button type="button" class="absolute inset-y-0 right-3 flex items-center cursor-pointer" onclick="toggleRetypeNewPasswordVisibility()">
                                        <span id="retypeNewPasswordIcon" class="w-4 h-4 mr-2">

                                            <svg id="eyeSlashIconRetype" width="31" height="20" viewBox="0 0 31 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g clip-path="url(#clip0_1616_9299)">
                                                    <path d="M31 0H0V20H31V0Z" fill="url(#pattern0_1616_9299)" />
                                                </g>
                                                <defs>
                                                    <pattern id="pattern0_1616_9299" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                        <use xlink:href="#image0_1616_9299" transform="matrix(0.00645161 0 0 0.01 0.177419 0)" />
                                                    </pattern>
                                                    <clipPath id="clip0_1616_9299">
                                                        <rect width="31" height="20" fill="white" />
                                                    </clipPath>
                                                    <image id="image0_1616_9299" width="100" height="100" xlink:href="data:image/png;base64,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" />
                                                </defs>
                                            </svg>



                                            <svg id="eyeIconRetype" class="hidden" width="31" height="20" viewBox="0 0 31 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g clip-path="url(#clip0_1616_9302)">
                                                    <g clip-path="url(#clip1_1616_9302)">
                                                        <path d="M31 0H0V20H31V0Z" fill="url(#pattern0_1616_9302)" />
                                                    </g>
                                                </g>
                                                <defs>
                                                    <pattern id="pattern0_1616_9302" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                        <use xlink:href="#image0_1616_9302" transform="matrix(0.00645161 0 0 0.01 0.177419 0)" />
                                                    </pattern>
                                                    <clipPath id="clip0_1616_9302">
                                                        <rect width="31" height="20" fill="white" />
                                                    </clipPath>
                                                    <clipPath id="clip1_1616_9302">
                                                        <rect width="31" height="20" fill="white" />
                                                    </clipPath>
                                                    <image id="image0_1616_9302" width="100" height="100" xlink:href="data:image/png;base64,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" />
                                                </defs>
                                            </svg>


                                        </span>
                                    </button>
                                </div>
                                <!-- Error message for password match -->
                                <span class="text-red-500 text-xs" id="retypeNewPasswordError" style="display: none;">Passwords do not match.</span>
                            </div>

                            <div>
                                <button type="submit" class="w-full text-[11px] h-8 py-2 px-4 hover:bg-green-800 transition duration-200 bg-green-600 text-white rounded focus:ring-green-500 focus:border-green-500">
                                    Update Account
                                </button>
                            </div>
                        </form>
                    </div>





                    <div class="hidden md:block bg-white p-4 rounded-lg shadow-md w-full md:ml-6 max-h-[150px]">
                        <h3 class="text-xs font-semibold text-gray-800 mb-3">
                            Password Requirements
                        </h3>
                        <p class="text-[11px] text-gray-700 mb-2">
                            Please follow this guide for a strong password:
                        </p>
                        <ul class="list-disc list-inside text-[9px] text-gray-700">
                            <li>One special character</li>
                            <li>Min 6 characters</li>
                            <li>One number (2 are recommended)</li>
                            <li>Change it often</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div id="developersContent" style="display: none;" class="w-full md:w-4/4 md:pl-4 py-1">

                <h2 class="text-sm font-medium text-gray-800 mb-3">
                    Practicum Supervisor
                </h2>
                <div>
                    <div class="flex justify-center">
                        <div class="w-24 h-24 rounded-full">
                            <img alt="Profile image placeholder" class="w-full rounded-full" src="{{ asset('storage/pmsAssets/practicum_supervisor.jpg') }}" />
                        </div>
                    </div>
                    <h2 class="text-xs font-semibold  text-gray-800 mt-4 text-center">Mishill D. Cempron</h2>
                </div>
                <div class="mt-5">
                    <h3 class="text-sm font-medium text-gray-800">Developers</h3>
                    <p class="text-xs text-gray-600">Meet the developers of this system</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mt-8">
                        <!-- Developer 1 -->
                        <div class="text-center">
                            <div class="w-24 h-24 rounded-full mx-auto">
                                <img alt="Developer image placeholder" class="w-full h-full rounded-full" src="{{ asset('storage/pmsAssets/raña.jpg') }}" />
                            </div>
                            <h4 class="text-xs font-semibold  text-gray-800 mt-4">Lorjohn M. Raña</h4>
                            <p class="text-[10px] text-gray-600">Lead Back-end Developer</p>
                            <p class="text-[10px] text-gray-600">lorjohn143@gmail.com</p>
                        </div>
                        <!-- Developer 2 -->
                        <div class="text-center">
                            <div class="w-24 h-24 rounded-full mx-auto">
                                <img alt="Developer image placeholder" class="w-full h-full rounded-full" src="{{ asset('storage/pmsAssets/ang.jfif') }}" />
                            </div>
                            <h4 class="text-xs font-semibold  text-gray-800 mt-4">Sweet Frachette L. Ang</h4>
                            <p class="text-[10px] text-gray-600">Front-end Developer</p>
                            <p class="text-[10px] text-gray-600">sweetfrachettelaude@gmail.com</p>
                        </div>
                        <!-- Developer 3 -->
                        <div class="text-center">
                            <div class="w-24 h-24 rounded-full mx-auto">
                                <img alt="Developer image placeholder" class="w-full h-full rounded-full" src="{{ asset('storage/pmsAssets/vargas.png') }}" />
                            </div>
                            <h4 class="text-xs font-semibold  text-gray-800 mt-4">Kristine Mae L. Vargas</h4>
                            <p class="text-[10px] text-gray-600">Front-end Developer</p>
                            <p class="text-[10px] text-gray-600">krstnmvrgs04@gmail.com</p>
                        </div>
                        <!-- Developer 4 -->
                        <div class="text-center">
                            <div class="w-24 h-24 rounded-full mx-auto">
                                <img alt="Developer image placeholder" class="w-full h-full rounded-full" src="{{ asset('storage/pmsAssets/estolloso.jfif') }}" />
                            </div>
                            <h4 class="text-xs font-semibold  text-gray-800 mt-4">Marvin F. Estolloso</h4>
                            <p class="text-[10px] text-gray-600">Front-end Developer</p>
                            <p class="text-[10px] text-gray-600">Marvinestolloso00592@gmail.com</p>
                        </div>
                        <!-- Developer 5 -->
                        <div class="text-center">
                            <div class="w-24 h-24 rounded-full mx-auto">
                                <img alt="Developer image placeholder" class="w-full h-full rounded-full" src="{{ asset('storage/pmsAssets/vitangcor.jpg') }}" />
                            </div>
                            <h4 class="text-xs font-semibold  text-gray-800 mt-4">Alfred Vitangcor</h4>
                            <p class="text-[10px] text-gray-600"></p>
                            <p class="text-[10px] text-gray-600">apvitangcor@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        //TABS
        function showProfileContent() {
            document.getElementById('profileContent').style.display = 'block';
            document.getElementById('securityContent').style.display = 'none';
            document.getElementById('developersContent').style.display = 'none';
            document.getElementById('profileButton').classList.add('text-green-500');
            document.getElementById('profileButton').classList.remove('text-gray-600');
            document.getElementById('securityButton').classList.add('text-gray-600');
            document.getElementById('securityButton').classList.remove('text-green-500');
            document.getElementById('developersButton').classList.add('text-gray-600');
            document.getElementById('developersButton').classList.remove('text-green-500');
        }

        function showSecurityContent() {
            document.getElementById('profileContent').style.display = 'none';
            document.getElementById('securityContent').style.display = 'block';
            document.getElementById('developersContent').style.display = 'none';
            document.getElementById('profileButton').classList.remove('text-green-500');
            document.getElementById('profileButton').classList.add('text-gray-600');
            document.getElementById('securityButton').classList.remove('text-gray-600');
            document.getElementById('securityButton').classList.add('text-green-500');
            document.getElementById('developersButton').classList.add('text-gray-600');
            document.getElementById('developersButton').classList.remove('text-green-500');
        }

        function showDevelopersContent() {
            document.getElementById('profileContent').style.display = 'none';
            document.getElementById('securityContent').style.display = 'none';
            document.getElementById('developersContent').style.display = 'block';
            document.getElementById('profileButton').classList.remove('text-green-500');
            document.getElementById('profileButton').classList.add('text-gray-600');
            document.getElementById('securityButton').classList.add('text-gray-600');
            document.getElementById('securityButton').classList.remove('text-green-500');
            document.getElementById('developersButton').classList.remove('text-gray-600');
            document.getElementById('developersButton').classList.add('text-green-500');
        }




        function enableEditProfile() {
            document.getElementById('name').style.display = 'none';
            document.getElementById('nameInput').style.display = 'block';
            document.getElementById('position').style.display = 'none';
            document.getElementById('positionInput').style.display = 'block';
            document.getElementById('positionInput').style.width = document.getElementById('nameInput').offsetWidth + 'px';
            document.getElementById('photoLabel').style.display = 'block';
            document.getElementById('editButton').style.display = 'none';
            document.getElementById('saveButton').style.display = 'block';
        }

        function saveProfileChanges() {
            document.getElementById('name').innerText = document.getElementById('nameInput').value;
            document.getElementById('name').style.display = 'block';
            document.getElementById('nameInput').style.display = 'none';
            document.getElementById('position').innerText = document.getElementById('positionInput').value;
            document.getElementById('position').style.display = 'block';
            document.getElementById('positionInput').style.display = 'none';
            document.getElementById('photoLabel').style.display = 'none';
            document.getElementById('editButton').style.display = 'block';
            document.getElementById('saveButton').style.display = 'none';
        }

        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('photo');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }





        //PERSONAL INFORMATION
        function enableEditPersonalInfo() {
            document.getElementById('firstName').style.display = 'none';
            document.getElementById('firstNameInput').style.display = 'block';
            document.getElementById('middleInitial').style.display = 'none';
            document.getElementById('middleInitialInput').style.display = 'block';
            document.getElementById('lastName').style.display = 'none';
            document.getElementById('lastNameInput').style.display = 'block';
            document.getElementById('birthdate').style.display = 'none';
            document.getElementById('birthdateInput').style.display = 'block';
            document.getElementById('editPersonalInfoButton').style.display = 'none';
            document.getElementById('savePersonalInfoButton').style.display = 'block';

        }

        function savePersonalInfoChanges() {
            const firstNameInput = document.getElementById('firstNameInput');
            const middleInitialInput = document.getElementById('middleInitialInput');
            const lastNameInput = document.getElementById('lastNameInput');
            const birthdateInput = document.getElementById('birthdateInput');

            const firstNameError = document.getElementById('firstNameError');
            const middleInitialError = document.getElementById('middleInitialError');
            const lastNameError = document.getElementById('lastNameError');
            const birthdateError = document.getElementById('birthdateError');
            const birthdateTodayError = document.getElementById('birthdateTodayError');
            const birthdateUnder18Error = document.getElementById('birthdateUnder18Error');


            let isValid = true;

            // Reset error messages and styles
            firstNameError.classList.add('hidden');
            middleInitialError.classList.add('hidden');
            lastNameError.classList.add('hidden');
            birthdateError.classList.add('hidden');
            birthdateTodayError.classList.add('hidden');
            birthdateUnder18Error.classList.add('hidden');

            firstNameInput.classList.remove('border-red-500');
            middleInitialInput.classList.remove('border-red-500');
            lastNameInput.classList.remove('border-red-500');
            birthdateInput.classList.remove('border-red-500');

            // Validate First Name
            if (firstNameInput.value.trim() === '') {
                firstNameError.classList.remove('hidden');
                firstNameInput.classList.add('border-red-500');
                isValid = false;
            }

            // Validate Middle Initial
            if (middleInitialInput.value.trim() !== '' && middleInitialInput.value.length > 1) {
                middleInitialError.classList.remove('hidden');
                middleInitialInput.classList.add('border-red-500');
                isValid = false;
            }

            // Validate Last Name
            if (lastNameInput.value.trim() === '') {
                lastNameError.classList.remove('hidden');
                lastNameInput.classList.add('border-red-500');
                isValid = false;
            }


            // Validate Birthdate
            const today = new Date();
            const birthdate = new Date(birthdateInput.value);
            const age = today.getFullYear() - birthdate.getFullYear();
            const isBirthdayToday = today.getDate() === birthdate.getDate() && today.getMonth() === birthdate.getMonth();

            if (isBirthdayToday) {
                birthdateTodayError.classList.remove('hidden');
                birthdateInput.classList.add('border-red-500');
                isValid = false;
            } else if (age < 18) {
                birthdateUnder18Error.classList.remove('hidden');
                birthdateInput.classList.add('border-red-500');
                isValid = false;
            }

            if (birthdateInput.value === '') {
                birthdateError.classList.remove('hidden');
                birthdateInput.classList.add('border-red-500');
                isValid = false;
            }


            // If all inputs are valid, update the displayed values
            if (isValid) {
                document.getElementById('firstName').innerText = firstNameInput.value;
                document.getElementById('middleInitial').innerText = middleInitialInput.value;
                document.getElementById('lastName').innerText = lastNameInput.value;
                document.getElementById('birthdate').innerText = birthdateInput.value;

                // Hide inputs and show the updated values
                document.getElementById('firstName').style.display = 'block';
                firstNameInput.style.display = 'none';
                document.getElementById('middleInitial').style.display = 'block';
                middleInitialInput.style.display = 'none';
                document.getElementById('lastName').style.display = 'block';
                lastNameInput.style.display = 'none';
                document.getElementById('birthdate').style.display = 'block';
                birthdateInput.style.display = 'none';

                document.getElementById('editPersonalInfoButton').style.display = 'block';
                document.getElementById('savePersonalInfoButton').style.display = 'none';
            }
        }









        //CONTACT INFORMATION
        function enableEditContactInfo() {
            document.getElementById('email').style.display = 'none';
            document.getElementById('emailInput').style.display = 'block';
            document.getElementById('phone').style.display = 'none';
            document.getElementById('phoneInput').style.display = 'block';
            document.getElementById('editContactInfoButton').style.display = 'none';
            document.getElementById('saveContactInfoButton').style.display = 'block';
        }

        function saveContactInfoChanges() {
            const emailInput = document.getElementById('emailInput');
            const phoneInput = document.getElementById('phoneInput');

            const emailError = document.getElementById('emailError');
            const phoneError = document.getElementById('phoneError');

            let isValid = true;

            // Reset error messages and styles
            emailError.classList.add('hidden');
            phoneError.classList.add('hidden');

            emailInput.classList.remove('border-red-500');
            phoneInput.classList.remove('border-red-500');

            // Validate Email
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic email pattern
            if (!emailPattern.test(emailInput.value.trim())) {
                emailError.classList.remove('hidden');
                emailInput.classList.add('border-red-500');
                isValid = false;
            }

            // Validate Phone Number
            const phonePattern = /^(09\d{2}-\d{3}-\d{4}|(\+63)\s?9\d{2}\s?\d{3}\s?\d{4}|09\d{2}\s?\d{3}\s?\d{4})$/; // Formats: 0917-123-4567, +63 917 123 4567, 0917 123 4567
            if (!phonePattern.test(phoneInput.value.trim())) {
                phoneError.classList.remove('hidden');
                phoneInput.classList.add('border-red-500');
                isValid = false;
            }

            // If all inputs are valid, update the displayed values
            if (isValid) {
                document.getElementById('email').innerText = emailInput.value;
                document.getElementById('phone').innerText = phoneInput.value;

                // Hide inputs and show the updated values
                document.getElementById('email').style.display = 'block';
                emailInput.style.display = ' none';
                document.getElementById('phone').style.display = 'block';
                phoneInput.style.display = 'none';

                document.getElementById('editContactInfoButton').style.display = 'block';
                document.getElementById('saveContactInfoButton').style.display = 'none';
            }
        }





        //script for show and hide password
        function toggleCurrentPasswordVisibility() {
            const currentPasswordInput = document.getElementById('current-password');
            const eyeIconCurrent = document.getElementById('eyeIconCurrent');
            const eyeSlashIconCurrent = document.getElementById('eyeSlashIconCurrent');

            if (currentPasswordInput.type === 'password') {
                currentPasswordInput.type = 'text';
                eyeIconCurrent.classList.remove('hidden');
                eyeSlashIconCurrent.classList.add('hidden');
            } else {
                currentPasswordInput.type = 'password';
                eyeIconCurrent.classList.add('hidden');
                eyeSlashIconCurrent.classList.remove('hidden');
            }
        }

        function toggleNewPasswordVisibility() {
            const newPasswordInput = document.getElementById('new-password');
            const eyeIconNew = document.getElementById('eyeIconNew');
            const eyeSlashIconNew = document.getElementById('eyeSlashIconNew');

            if (newPasswordInput.type === 'password') {
                newPasswordInput.type = 'text';
                eyeIconNew.classList.remove('hidden');
                eyeSlashIconNew.classList.add('hidden');
            } else {
                newPasswordInput.type = 'password';
                eyeIconNew.classList.add('hidden');
                eyeSlashIconNew.classList.remove('hidden');
            }
        }

        function toggleRetypeNewPasswordVisibility() {
            const retypeNewPasswordInput = document.getElementById('retype-new-password');
            const eyeIconRetype = document.getElementById('eyeIconRetype');
            const eyeSlashIconRetype = document.getElementById('eyeSlashIconRetype');

            if (retypeNewPasswordInput.type === 'password') {
                retypeNewPasswordInput.type = 'text';
                eyeIconRetype.classList.remove('hidden');
                eyeSlashIconRetype.classList.add('hidden');
            } else {
                retypeNewPasswordInput.type = 'password';
                eyeIconRetype.classList.add('hidden');
                eyeSlashIconRetype.classList.remove('hidden');
            }
        }



        //input validation for changing password
        function validatePassword() {
            const password = document.getElementById('new-password').value;
            const passwordError = document.getElementById('passwordRequirementError');
            const newPasswordError = document.getElementById('newPasswordError');

            const hasNumber = /\d/;
            const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/;

            if (password.length < 6 || !hasNumber.test(password) || !hasSpecialChar.test(password)) {
                passwordError.style.display = 'block';
                newPasswordError.style.display = 'none';
                document.getElementById('new-password').classList.add('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
            } else {
                passwordError.style.display = 'none';
                document.getElementById('new-password').classList.remove('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
            }
        }

        function validateRetypePassword() {
            const newPassword = document.getElementById('new-password').value;
            const retypePassword = document.getElementById('retype-new-password').value;
            const retypeNewPasswordError = document.getElementById('retypeNewPasswordError');

            if (newPassword !== retypePassword) {
                retypeNewPasswordError.style.display = 'block';
                document.getElementById('retype-new-password').classList.add('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
            } else {
                retypeNewPasswordError.style.display = 'none';
                document.getElementById('retype-new-password').classList.remove('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
            }
        }

        function clearError(errorId) {
            document.getElementById(errorId).style.display = 'none';
            document.getElementById('new-password').classList.remove('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
            document.getElementById('retype-new-password').classList.remove('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
            document.getElementById('current-password').classList.remove('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
            document.getElementById('user-id').classList.remove('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
        }

        document.getElementById('passwordForm').addEventListener('submit', function(event) {
            event.preventDefault();
            validatePassword();
            validateRetypePassword();

            const userId = document.getElementById('user-id').value;
            const currentPassword = document.getElementById('current-password').value;
            const userIdError = document.getElementById('userIdError');
            const currentPasswordError = document.getElementById('currentPasswordError');
            const currentPasswordIncorrectError = document.getElementById('currentPasswordIncorrectError');

            // Simulated validation for user ID and current password
            if (!userId) {
                userIdError.style.display = 'block';
                document.getElementById('user-id').classList.add('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
            } else {
                userIdError.style.display = 'none';
                document.getElementById('user-id').classList.remove('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
            }

            if (!currentPassword) {
                currentPasswordError.style.display = 'block';
                document.getElementById('current-password').classList.add('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
            } else if (currentPassword !== 'correctPassword') { // Replace 'correctPassword' with actual validation logic
                currentPasswordIncorrectError.style.display = 'block';
                document.getElementById('current-password').classList.add('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
            } else {
                currentPasswordError.style.display = 'none';
                currentPasswordIncorrectError.style.display = 'none';
                document.getElementById('current-password').classList.remove('border-red-500', 'focus:ring-red-500', 'focus:border-red-500');
            }

            // Check if there are any validation errors before proceeding
            if (userId && currentPassword && currentPassword === 'correctPassword' &&
                document.getElementById('passwordRequirementError').style.display === 'none' &&
                document.getElementById('retypeNewPasswordError').style.display === 'none') {
                // Proceed with account update logic here
                alert('Account updated successfully!');
            }
        });
    </script>
</div>
