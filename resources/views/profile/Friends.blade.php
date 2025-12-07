<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Friends') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            {{-- PROFILE HEADER --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 flex items-center gap-4">
                    <img src="{{ asset('icons/profile.jpg') }}" class="w-20 h-20 rounded-full object-cover">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900">{{ Auth::user()->name }}</h2>
                        <span
                            class="text-sm bg-indigo-100 text-indigo-700 px-3 py-1 rounded-lg inline-block mt-1">Student</span>
                        <p class="text-gray-600 text-sm mt-1">Your School</p>
                    </div>
                </div>
            </div>

            {{-- FRIENDS LIST --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200 bg-gray-50">
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Full Name</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Class</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            {{-- FRIEND 1 --}}
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 flex items-center gap-3">
                                    <img src="{{ asset('images/profile.jpg') }}" class="w-10 h-10 rounded-full">
                                    <span class="font-medium text-gray-900">Adinda Octaviannisa</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">XI LK 2</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                        <span class="text-sm text-green-700 font-medium">Active</span>
                                    </div>
                                </td>
                            </tr>

                            {{-- FRIEND 2 --}}
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 flex items-center gap-3">
                                    <img src="{{ asset('images/profile.jpg') }}" class="w-10 h-10 rounded-full">
                                    <span class="font-medium text-gray-900">Saprillia Wardani</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">XI PPLG 3</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
                                        <span class="text-sm text-gray-600">Last seen today at 3:15 pm</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>