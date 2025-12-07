<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Choose Photo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h2 class="text-2xl font-bold mb-2">Select a Photo</h2>
                    <p class="text-gray-600 mb-8">Choose a photo from the gallery to use as your profile picture.</p>

                    {{-- PHOTO GRID --}}
                    <div id="photoGrid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">

                        {{-- Photo 1 --}}
                        <div class="photo-item relative rounded-lg overflow-hidden cursor-pointer bg-gray-300 aspect-square shadow hover:shadow-lg transition"
                            data-img="{{ asset('icons/profile.jpg') }}">
                            <img src="{{ asset('icons/profile.jpg') }}" class="w-full h-full object-cover">
                            <div
                                class="check hidden absolute top-2 right-2 w-6 h-6 rounded-full bg-green-500 text-white flex items-center justify-center text-sm font-bold">
                                ✔</div>
                        </div>

                        {{-- Photo 2 --}}
                        <div class="photo-item relative rounded-lg overflow-hidden cursor-pointer bg-gray-300 aspect-square shadow hover:shadow-lg transition"
                            data-img="{{ asset('images/profile.jpg') }}">
                            <img src="{{ asset('images/profile.jpg') }}" class="w-full h-full object-cover">
                            <div
                                class="check hidden absolute top-2 right-2 w-6 h-6 rounded-full bg-green-500 text-white flex items-center justify-center text-sm font-bold">
                                ✔</div>
                        </div>

                        {{-- Photo 3 --}}
                        <div class="photo-item relative rounded-lg overflow-hidden cursor-pointer bg-gray-300 aspect-square shadow hover:shadow-lg transition"
                            data-img="{{ asset('icons/profile.jpg') }}">
                            <img src="{{ asset('icons/profile.jpg') }}" class="w-full h-full object-cover">
                            <div
                                class="check hidden absolute top-2 right-2 w-6 h-6 rounded-full bg-green-500 text-white flex items-center justify-center text-sm font-bold">
                                ✔</div>
                        </div>

                    </div>

                    <div class="flex justify-end gap-3">
                        <a href="{{ route('profile.edit') }}"
                            class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                            Cancel
                        </a>
                        <button id="doneBtn"
                            class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-semibold">
                            Select Photo
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        let selectedImage = null;

        document.querySelectorAll(".photo-item").forEach(item => {
            item.addEventListener("click", function () {
                document.querySelectorAll(".photo-item").forEach(i => {
                    i.classList.remove("ring-4", "ring-indigo-500");
                    i.querySelector(".check").classList.add("hidden");
                });

                this.classList.add("ring-4", "ring-indigo-500");
                this.querySelector(".check").classList.remove("hidden");
                selectedImage = this.getAttribute("data-img");
            });
        });

        document.getElementById("doneBtn").addEventListener("click", () => {
            if (!selectedImage) {
                alert("Please select a photo first.");
                return;
            }
            localStorage.setItem("tempPhoto", selectedImage);
            window.location.href = "{{ route('student.crop') }}";
        });
    </script>
</x-app-layout>