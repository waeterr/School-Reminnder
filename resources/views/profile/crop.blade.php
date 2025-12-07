<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crop Photo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">

                    <h2 class="text-2xl font-bold mb-2">Adjust Your Photo</h2>
                    <p class="text-gray-600 mb-8">Crop the photo to fit your profile picture.</p>

                    <div class="w-60 h-60 rounded-full overflow-hidden bg-gray-300 shadow-lg mx-auto mb-8">
                        <img id="cropImg" class="w-full h-full object-cover" />
                    </div>

                    <button id="doneCrop"
                        class="px-8 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-semibold">
                        Done
                    </button>

                </div>
            </div>
        </div>
    </div>

    <script>
        let imgSrc = localStorage.getItem("tempPhoto");
        document.getElementById("cropImg").src = imgSrc;

        document.getElementById("doneCrop").addEventListener("click", () => {
            localStorage.setItem("selectedProfilePhoto", imgSrc);
            localStorage.removeItem("tempPhoto");
            window.location.href = "{{ route('profile.edit') }}";
        });
    </script>
</x-app-layout>