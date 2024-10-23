<x-app-layout mainClass="flex" headerClass="shadow-[0px_1px_2px_-1px_rgba(0,0,0,0.1)] ">


    <x-slot name="sidebar">
        <x-sidebar></x-sidebar>
    </x-slot>


    <x-slot name="header">
        <x-header></x-header>
    </x-slot>

    <x-slot name="main">

        <div class="flex h-screen text-gray-800">

            <!-- Main Content -->
            <div class="flex-1 p-4">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Dashboard</h3>

                <dl class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4"> <!-- Increased gap to 4 -->

                    <div
                        class="relative overflow-hidden rounded-lg bg-white px-3 pb-4 pt-4 shadow sm:px-3 sm:pt-4 lg:w-49">
                        <dt>
                            <div
                                class=" ml-7 absolute rounded-full p-2 bg-green-700 bg-opacity-70 w-10 h-10 flex items-center justify-center">
                                <svg width="48" height="54" viewBox="0 0 48 54" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="48" height="54" fill="url(#pattern0_1391_9129)"/>
                                    <defs>
                                        <pattern id="pattern0_1391_9129" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_1391_9129" transform="matrix(0.01 0 0 0.00888889 0 0.0555556)"/>
                                        </pattern>
                                        <image id="image0_1391_9129" width="100" height="100" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEmUlEQVR4nO2dS+hVRRzHj6mVJT0UbGGLsIVUugnUFHGlaEFFj43tqlXkJlwkGOFC1EWgLkyIFuVjJRK4iGypVBRRQZBaUfQSjCDNJLP0E2Pzh8v85zzmPObOuef7gT/84Zz5zZn53HPmzNyZuVkmhBBCtAgwG3gaOAScAv4ELgHfAgeAJ4Ab2sxT5AA8DnxNOV8Bq/PiiIaYTzywkzD+BV5smrfwUEPGFNeAZ30xRbPHlKnYUf4CdgPLgVvtn/l/jz02imlfFtfNX0xvwN024wdgSUGapcCPTpqjeeeLAOzblHtnLKmQzki57Dy6FoXkLTzYV9tRdgek3eukfalqWpEDcNqp1GUBaVcUNPaDJGsKcNGJOTcg7dwxlXuihTQKOJ5ip4uEJEZyQrKBgYSkhYQkhoQkhoT0RAjwCPB9sDA16p0Jccf6JCQGEtIfIQ8D3+kOiUxZhUtIZCSkJsDLBBAQV3dIDCkBMSWkCcC2FITk9lPqXkjVC2pxitLMmFIiCPnZm2/qQoBZ9mvmN4EZLcWcAXw0ZiE/9U4IcBPwzkj4PS3dbW8UyYgkxN9PSVUIcAtw3FNX2xvEnAm8VSYjhpDc4ykKAe4APiiory01Yt4MHPPEOgfsl5D8ipsHfEw5mwNkmFmX73tinAUe8L0St/WBDD5e95NRNcPAWAvtrHqXL4ALdeYUA3cCH3pifgPck/f2lQ1diKkc/l9/4nISuB1Y6ZmyZGbfbyyIuQD43BPTSF+Yk+b6nTJoIcD9wC+einvPNO4j561zpq8argCPemLe7ZkEaPgEmF9yPdsGKwR4EPjVU3HHTEPsOf8xK2GUv4ENFe62E8Btodc4GCFmBRZw3lNxh02HsCDdU/Zx5S6JWAPcl9MLfheYE1q+wQgB1ttKdNlXZf0i8LxnTYuR+5sn5hHgxtCyDUaIeeZ7Fv0YdgXmvYlyDhXdbU1xM2t8vCxB0wvynP8M8E9TGVMArxTIeL3r1cK9FmKHLtw+gXnsbArNt8L6yNpDLIMRYs83fYrP7OmmYX4uNE8fwGsjl/FqFoneC7Fp7gK+NG9LofmVDKmbIfoXsohMhBCbrrOGNiYTI2RSQELSQkISQ0ISQ0KGKMR24J4EDtpR00ue/bKuT8tRo96xEPudg/k2rQyzP8rasgwnHSIIcUdQi5h2bmgBUiVLSEinBaEnZAkKCdkvq3JB6AlZYkLq7JdVqSD0hCwhIXX3ywoqyKRABCFN9suSkA6ENNovKxsYRLhDGu2XlQ0MOhDyR10hIutEiDu7b7kqerxC3E0wGy+KGRJ0IMS3TezSaCXqOXQgJG8jZUkZh5CCrcYv237GQ2roIwtpuBm/6EiIWZ26I3D4XTi0fQdNrb+o8oMuIoaQnJ88cpeSiZhCRHtIyJCE2LUYvwOfaohlzEKAe503sCt2B4RV5uvdyoEGBh0KWQRcnd6MiRBaE2ITb1U/JSEhNsCGnAX5YhxCRqaamrXibwNn7E+zinEJEe0hIUMSon5KQkLUT0lPiPopLdCaECtF/ZSUhFgp6qekJMRKUT8lJSFCCCGEEEIIIYQQQmTt8x+Wic4gnFOGPQAAAABJRU5ErkJggg=="/>
                                    </defs>
                                </svg>

                            </div>
                            <p class="ml-20 text-lg font-semibold text-gray-900">{{ $totalProjects }}</p>
                            <p class="ml-20 truncate text-xs font-normal text-gray-500">Total Projects</p>
                        </dt>
                    </div>

                    <div
                        class="relative overflow-hidden rounded-lg bg-white px-3 pb-4 pt-4 shadow sm:px-3 sm:pt-4 lg:w-49">
                        <dt>
                            <div
                                class=" ml-7 absolute rounded-full p-2 bg-green-700 bg-opacity-70 w-10 h-10 flex items-center justify-center">
                                <svg width="46" height="64" viewBox="0 0 46 64" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="46" height="64" fill="url(#pattern0_1391_9127)"/>
                                    <defs>
                                        <pattern id="pattern0_1391_9127" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_1391_9127" transform="matrix(0.01 0 0 0.0071875 0 0.140625)"/>
                                        </pattern>
                                        <image id="image0_1391_9127" width="100" height="100" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAACRklEQVR4nO3ZwU4TQRzH8QaPNp402tIXQN5BPCrhNSC2BOQxvHoxwtFXEPA1LCYCT6FQEzVovmbYQZphazu7y8V+P0mTHjrDL/8/Ozs722pJkiRJkiRJkiRJkiRJkiRJkiRJkiRJknRLgB6wCXwAjoFv8RO+HwKD8Jvb+vtX5j4H8AB4DVww3W/gHdBpNQxzXBZhDTgjXxiz2mAz1uY+R1yCflFdGNtvoBmDuc8R/yPD8pP6CGwBS8Dd+HkMbAPDCU2pfKVgjssidEuWh+/AOrDwj+ItABvAj2TsV+BRhWZ0zVEUYq+kGU8yCrlS0pS3FRqyN/c54pYy3U2tVyhmP5kjzLmYMb5njqIQmyX3jInL1JTl6yiZa+YbPOb4W4jwgDduK7cZY0V9mcy1nzH20BxFIU6TQizVaEjYfY07zhh7ao6iEKOkEO0aDWknc40yxo7MURTivMFC3EvmOssYe26OohAnDS4VyzWWrBNzFIU4SAqxXaMhO8lc7zPGHpijfLs5rLjtvQN8anDbO5zLHBMeyDYqHgiOC3N2M8b3zHFdjN2kmOEYZCWjmE9Ljk7eVGjqrjmKQnTigWDalP4Mh4uDkmZ8AR5WaEjHHNfFWJ3wDuIoPoEvx6P3dvy+U7JGEud4ntuMK+YYE6+Iui+oXrRqwhw3rpR0+ZpFWKae1W3GFXOMAe4Dr4CfMzTiIt6Ms19ITWOOmwVZjMtHeGj7HM+bRvH7fliecra2VWEOSZIkSZIkSZIkSZIkSZIkSZIkSZLU+r/8AfikHP2FtUAMAAAAAElFTkSuQmCC"/>
                                    </defs>
                                </svg>

                            </div>
                            <p class="ml-20 text-lg font-semibold text-gray-900">{{$pendingProjects}}</p>
                            <p class="ml-20 truncate text-xs font-normal text-gray-500">Pending Projects</p>
                        </dt>
                    </div>

                    <div
                        class="relative overflow-hidden rounded-lg bg-white px-3 pb-4 pt-4 shadow sm:px-3 sm:pt-4 lg:w-49">
                        <dt>
                            <div
                                class=" ml-7 absolute rounded-full p-2 bg-green-700 bg-opacity-70 w-10 h-10 flex items-center justify-center">
                                <svg width="65" height="51" viewBox="0 0 65 51" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="65" height="51" fill="url(#pattern0_1392_9135)"/>
                                    <defs>
                                        <pattern id="pattern0_1392_9135" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_1392_9135" transform="matrix(0.00784615 0 0 0.01 0.107692 0)"/>
                                        </pattern>
                                        <image id="image0_1392_9135" width="100" height="100" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAACi0lEQVR4nO3az6tMcRjH8RGJwsrm2lhY0KVkd7NTVnaS7O3kLpWVsnVL2VqSWLKl+AsUK1myYENKFtfNj7e+deQajb4z32fueTrzfm2n5jw9n3PmnJn5jEaSJEmSJM0bsAM47qaTAG4C34Crfc+y8ICzwE/+uA/sWfjF9AE4AnzmX6+Bo70MtaiAvcArJvsCXOh7zoUAbAMeUedU3/MOHnCtMoyHJby+5x004DTwvSKMch/Z1/e8gwYcBD5UhFHuH8t9zztowC7geUUY5RH4fMX7DVL00o8BKxNeu1M501rlsQYpMowDwFvg6/gZDqxWzvOs/IxiII3KzRd4uWmx5aZ9uXttBdioCOM9sDTFMQepNYuymJ3A0wnvfwt4VzHHxqSPOgOZ/gve3YAT49IMxx6kafcwvpS1gBnuzXjsQWoJYwn41Hj8F8BuAwkIpAtluXuymkUJ81DTAJp4pZQzfRo/gDPuc74/pT+eIpDr85pFfz/+PqgI4wmw3cVtge4x+MZ/wngD7N+KWbQJcGXsf/JiHTjhonoCnOtC+O1iX7OoA5wEPgK3XUoSwOHyX0jfc0hSELu9ydjtTcRubyJ2exOx25uI3d5k7PYmYrc3Ebu9idjtrRO9dLu9jSLDsNsbICoMu71BIsKw2xuoNQy7vckCsdsbrCUMu70JrxC7vdnY7U3Ibm9CdnsTstublN3ehOz2JmS3NyG7vZIGxm5vMnZ7E7Hbm4jd3kTs9iZitzcZu72J2O1NxG5vInZ760Qv3W5vo8gw7PYGiArDbm+QiDDs9gZqDcNub7JA7PYGawnDbm/CK8RubzZ2exOy25uQ3d6E7PYmZbc3Ibu9CdntTchuryRJkiRJozi/ANHLWzBeECZpAAAAAElFTkSuQmCC"/>
                                    </defs>
                                </svg>


                            </div>
                            <p class="ml-20 text-lg font-semibold text-gray-900">{{ $completedProjects }}</p>
                            <p class="ml-20 truncate text-xs font-normal text-gray-500">Completed Projects</p>
                        </dt>
                    </div>

                    <div
                        class="relative overflow-hidden rounded-lg bg-white px-3 pb-4 pt-4 shadow sm:px-3 sm:pt-4 lg:w-49">
                        <dt>
                            <div
                                class=" ml-7 absolute rounded-full p-2 bg-green-700 bg-opacity-70 w-10 h-10 flex items-center justify-center">
                                <svg width="42" height="52" viewBox="0 0 42 52" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="43" height="48" fill="url(#pattern0_1392_9137)"/>
                                    <defs>
                                        <pattern id="pattern0_1392_9137" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_1392_9137" transform="matrix(0.01 0 0 0.00807692 0 0.0961538)"/>
                                        </pattern>
                                        <image id="image0_1392_9137" width="100" height="100" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEXklEQVR4nO3dW6gUdRzA8X+WWqhoF8pEUcqiiwUFKRJhVpgSltaDkdFDxVFM6IKR4YNiBOGFpAwfSrQXLwhaEYlSQWEFJWVgl7USxZNlmqTW6fLPvvHHsaPb7pydnf9tZn4fmJdzYG5fFnZ2frOrlBBCCCGEEA0BvczS+L/CK6ADOJIsHXL6AwIuAX6n25/AZRIlXJBN/N9GCRImxi00N0Gi+I1xJvB5SpAvgLMkir8gj9CzWRLET4xzgYMtBPkZOF+iuA/yAq1bJkHcxrgS+CtDEA2Mkijugmwmu7cliJsYd9K+yRLFbow+QC1HkG+BvhLFXpAnyW+OBLET40LgFwtBjgIXS5T8QV7BnpclSL4Y1wHHLQYx67pBorQf5D3s+wA4Q6Jkj3Ev7kyTINlinAPscRhkH9BPorQeZAHuzZcgrcUYCvzqIUgXMFyi9BxkLf6skSDpMcYC/3gMYrZ1k0RpPlv1Mf59KjNdjYM8RDgPyqvk9BgDgP0BgxwABkqU7iCLCO85CXIixqXAH6FrcGLq8fLKRwFeJx6vVToIcCvxuV1VkZksBHbmPHmdwPa6xfwtj52VnHoEZlu4t9GvwXr7W7i4nK0qOH14KOdJ0ynrz3tT6zBwgaoKYHnOE+Y6iPGiqgLgqmSiMPYgfwPXqLIDtmCHTtmGrfvw76gyA6Zij07Zjs3BiLtUiacPdxUwyHelnHoE5mKX9hTEeEqVCXBR8thyUYMcLdXUI7AK+7THIMZKVQbA9Y5OkE7ZpovtmXWOVkVmJgSB93FDew5ifFjoqUdgOu7oAEGM+1SBpw/3ljBIZyGnHoGFuKUDBTEWqCIBhgG/lThIFzBCFQWwHvd0wCDGOlUEwI2epg914CDGOFWA6cNPPJ0MHUGQz8wX4ajIv92NCgUxHlYRTx/+QPWCHIhy6hFYgl86kiDGYhUTYGSA6UMdUZC4ph6BN/FPRxTEeEPFALiNMHRkQYyJfs++m+nDMgX5Eujtt8LpB/4Y4egIgxiP+q3QfdDnWZg+LGOQw0GmHoEVhKUjDWK85DvGtclkX0jHzWB1kwtUn0/yhp96BN4lDvsbPI4Q8llF/1OPwD2hj7RA7nYdoy/wTeijLJDdwNkug8wLfYQF9LSrGIMdTB9WwTFgiIsgrxKfruR9/6mL63v57VhtO8aYCN5K1vvJTNQ3mbL/kbjYm3pMpg+3EZ9ayj5/RXw+sjL1CDxAnGoFC2LcnzeGecT4e+JUK2CQzkafLmQJ8izxqhUwiPFMuzFG1P0kXWx2pez718SrvalHYANx08ljch11y1xLj127tCFrjPGh97gCbs7yk3Q7Qu9tBexoaeoRmBl6TytkRk8xBiVXwMIPc64HpQV53tOOiG5Lm8W4IuNP0gk7zDvCqxsFecvSBkR2W+tj3NHGSoRdk07G6B35lW1VmFvjfUyQJ0LvifjP4yr5+iERh0MSJC4HTz5OIK+S8Mx9pyk9fpQihBBCCCFUdv8CU0l0vLxsvMIAAAAASUVORK5CYII="/>
                                    </defs>
                                </svg>

                            </div>
                            <p class="ml-20 text-lg font-semibold text-gray-900">{{ $suspendedProjects }}</p>
                            <p class="ml-20 truncate text-xs font-normal text-gray-500">Suspended Projects</p>
                        </dt>
                    </div>
                </dl>

                <!-- Project Card Section -->
                <div class="mt-8">
                    <div class="relative overflow-hidden rounded-lg bg-white px-4 pb-8 pt-5 shadow sm:px-6 sm:pt-6">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Projects</h1>
                        <p class="mt-2 text-xs text-gray-700">A list of all the projects, including their name, the
                            person in charge, cost, and progress status.</p>
                        <div class="mt-4 flex justify-end">
                            <a href="{{ route('project-main') }}"
                               class="block rounded-md bg-green-600 px-3 py-1 text-center text-xs font-small text-white shadow-sm hover:bg-green-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                                View All
                            </a>
                        </div>

                        <!-- projects Table -->
                        <div class="mt-8 flow-root">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <div class="relative bg-white shadow rounded-lg">
                                        <table class="min-w-full table-fixed divide-y divide-gray-300">
                                            <thead>
                                            <tr class="">
                                                <th scope="col"
                                                    class="min-w-[12rem] py-3.5 px-4 pr-3 text-left text-sm font-semibold text-gray-900">
                                                    Project Name
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Project Cost
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Progress
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Status
                                                </th>
                                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">
                                                    <span class="sr-only">Status</span>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 bg-white">

                                            @foreach($projects as $project)
                                                <tr>
                                                    <td class="whitespace-nowrap py-1 px-4 pr-3 text-xs font-small text-gray-900">{{ $project->title }}</td>
                                                    <td class="whitespace-nowrap px-3 py-1 text-xs text-gray-500">
                                                        Php {{$project->project_cost}}</td>
                                                    <td class="whitespace-nowrap px-3 py-1 text-xs text-gray-500">
                                                        <div class="flex items-center">
                                                            <div class="relative">
                                                                <svg class="w-10 h-10" viewBox="0 0 36 36">
                                                                    <path
                                                                        class="text-gray-300"
                                                                        stroke-width="3"
                                                                        stroke="currentColor"
                                                                        fill="none"
                                                                        d="M18 2.0845a15.9155 15.9155 0 0 1 0 31.831"
                                                                    />
                                                                    <path
                                                                        class="text-green-600"
                                                                        stroke-width="3"
                                                                        stroke-linecap="round"
                                                                        stroke="currentColor"
                                                                        fill="none"
                                                                        d="M18 2.0845a15.9155 15.9155 0 0 1 0 31.831"
                                                                        stroke-dasharray="0 100"
                                                                    />
                                                                </svg>
                                                                <span
                                                                    class="absolute left-0 top-0 w-full h-full flex items-center justify-center text-sm text-gray-900">0%</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="whitespace-nowrap text-sm text-gray-500 text-center">
                                                     <span class="flex items-center justify-center text-center rounded-[5px] capitalize p-2 w-[150px] text-xs font-semibold leading-5
                                                            @if($project->status == 'pending')
                                                                text-yellow-800 bg-yellow-100
                                                            @elseif($project->status == 'completed')
                                                                text-green-800 bg-green-100
                                                            @else
                                                                text-red-800 bg-red-100
                                                            @endif">
                                                            {{ $project->status }}
                                                        </span>

                                                    </td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        @if ($projects->isEmpty())
                                            <!-- No pagination if no cards -->
                                        @else
                                            {{-- Pagination Links --}}
                                            <div class="w-full py-5 flex justify-center items-center">
                                                {{ $projects->links('livewire.pagination.tailwind-pagination') }} <!-- Render pagination links -->
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </x-slot>


</x-app-layout>
