<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Camera') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <a href="{{ route('profile.edit') }}"
                        class="inline-flex items-center mb-6 text-indigo-600 hover:text-indigo-900">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Back
                    </a>

                    <h1 class="text-3xl font-bold mb-2 text-gray-900">Take Your Photo</h1>
                    <p class="text-gray-600 mb-6">Capture a new profile picture</p>

                    <div class="bg-gray-300 rounded-lg overflow-hidden mb-8 aspect-video w-full">
                        <img id="cameraPreview" src="{{ asset('images/profile.jpg') }}"
                            class="w-full h-full object-cover">
                    </div>

                    <div class="flex justify-center">
                        <button id="takePhotoBtn"
                            class="w-20 h-20 rounded-full bg-indigo-600 hover:bg-indigo-700 text-white flex items-center justify-center shadow-lg transition">
                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z">
                                </path>
                            </svg>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("takePhotoBtn").addEventListener("click", function () {
            let photoSrc = document.getElementById("cameraPreview").src;
            localStorage.setItem("tempPhoto", photoSrc);
            window.location.href = "{{ route('student.crop') }}";
        });
    </script>
</x-app-layout>