<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                        {{-- PROFILE CARD --}}
                        <section class="lg:row-span-2 bg-gray-50 rounded-lg p-6 border border-gray-200">
                            <div class="text-center relative mb-6">
                                <img src="{{ asset('icons/profile.jpg') }}"
                                    class="w-[100px] h-[100px] rounded-full border-4 border-white object-cover mx-auto shadow-md"
                                    alt="Profile">

                                <a href="{{ route('profile.edit') }}"
                                    class="absolute bottom-0 right-1/2 translate-x-14 w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center shadow-lg hover:bg-indigo-700 transition">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </a>
                            </div>

                            <div class="text-center mb-6">
                                <h2 class="text-xl font-bold text-gray-900">{{ Auth::user()->name }}</h2>
                                <span
                                    class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-lg text-sm font-medium inline-block mt-2">Student</span>
                            </div>

                            <div class="mt-6 space-y-4">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-600 mb-1">Email</label>
                                    <input class="w-full bg-white border border-gray-300 rounded-lg p-2 text-sm"
                                        readonly>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-600 mb-1">School</label>
                                    <input class="w-full bg-white border border-gray-300 rounded-lg p-2 text-sm"
                                        value="Your School" readonly>
                                </div>
                                <div>
                                    <a href="{{ route('edit1') }}"
                                        class="w-full block text-center bg-indigo-600 text-white py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">
                                        Edit Profile
                                    </a>
                                </div>
                            </div>
                        </section>

                        {{-- DEADLINE CARD 1 --}}
                        <div
                            class="flex items-center p-4 rounded-lg border-l-4 border-yellow-500 bg-yellow-50 shadow-sm">
                            <svg class="w-8 h-8 text-yellow-600 mr-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-lg text-gray-900">Informatics Report</p>
                                <span
                                    class="bg-red-600 text-white px-2 py-1 rounded text-xs mt-1 inline-block">Deadline:
                                    Tomorrow</span>
                            </div>
                        </div>

                        {{-- DEADLINE CARD 2 --}}
                        <div class="flex items-center p-4 rounded-lg border-l-4 border-pink-500 bg-pink-50 shadow-sm">
                            <svg class="w-8 h-8 text-pink-600 mr-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-lg text-gray-900">Essay PAI</p>
                                <span
                                    class="bg-red-600 text-white px-2 py-1 rounded text-xs mt-1 inline-block">Deadline:
                                    Tomorrow</span>
                            </div>
                        </div>

                        {{-- TODAY'S CLASSES --}}
                        <section class="lg:col-span-2 bg-gray-50 rounded-lg p-6 border border-gray-200">
                            <h2 class="text-lg font-bold text-gray-900 mb-4">Today's Classes</h2>

                            <div class="flex flex-col gap-3">

                                <div class="flex items-center p-4 rounded-lg text-white shadow-sm bg-green-500">
                                    <div class="text-lg font-bold w-20 border-r border-white/40 pr-3">7:00 am</div>
                                    <div class="ml-4">
                                        <p class="font-semibold">Mathematics</p>
                                        <span class="text-sm opacity-90">Mr. Bambang</span>
                                    </div>
                                </div>

                                <div class="flex items-center p-4 rounded-lg text-white shadow-sm bg-pink-500">
                                    <div class="text-lg font-bold w-20 border-r border-white/40 pr-3">9:00 am</div>
                                    <div class="ml-4">
                                        <p class="font-semibold">English</p>
                                        <span class="text-sm opacity-90">Mr. Aji</span>
                                    </div>
                                </div>

                                <div class="flex items-center p-4 rounded-lg text-white shadow-sm bg-red-500">
                                    <div class="text-lg font-bold w-20 border-r border-white/40 pr-3">11:00 am</div>
                                    <div class="ml-4">
                                        <p class="font-semibold">Informatics</p>
                                        <span class="text-sm opacity-90">Mrs. Dian</span>
                                    </div>
                                </div>

                            </div>
                        </section>

                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>