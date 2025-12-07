<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Update Profile') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <div class="mb-8 pb-8 border-b">
            <h3 class="text-lg font-semibold mb-4">Profile Picture</h3>
            <div class="flex items-center gap-6">
              <img id="profilePreview" src="{{ asset('images/profile.jpg') }}"
                class="w-32 h-32 rounded-full object-cover border-4 border-indigo-100 shadow">

              <div class="flex flex-col gap-2">
                <button id="btn-change-photo"
                  class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                  Change Photo
                </button>

                <button class="px-4 py-2 bg-gray-300 text-gray-600 rounded-lg cursor-not-allowed" disabled>
                  Delete Photo
                </button>
              </div>
            </div>
          </div>

          <form class="space-y-6">
            <div>
              <label class="block font-semibold text-gray-700 mb-3">Gender</label>
              <div class="flex gap-6">
                <label class="flex items-center gap-2">
                  <input type="radio" name="gender" value="female" checked>
                  Female
                </label>
                <label class="flex items-center gap-2">
                  <input type="radio" name="gender" value="male">
                  Male
                </label>
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">First Name</label>
                <input type="text" value="{{ Auth::user()->name }}"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
              </div>

              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Last Name</label>
                <input type="text" value="Student"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
              </div>

              <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" value="{{ Auth::user()->email }}"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
              </div>

              <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">School</label>
                <input type="text" value="Your School"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50" readonly>
              </div>

              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                <input type="text" value="(+62) 858-6715-2305"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50" readonly>
              </div>

              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth</label>
                <input type="text" value="2009-03-24"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50" readonly>
              </div>
            </div>

            <div class="flex justify-end gap-3 pt-6 border-t">
              <button type="button" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                Discard
              </button>
              <button type="submit"
                class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                Save Changes
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  {{-- PHOTO MODAL --}}
  <div id="photoModal" class="fixed inset-0 bg-black bg-opacity-40 hidden justify-center items-center z-50">
    <div class="bg-white p-6 rounded-lg w-80 shadow-xl space-y-3">
      <h3 class="text-lg font-semibold text-gray-900 mb-4">Choose Photo Source</h3>

      <button onclick="selectOption('gallery')"
        class="w-full flex items-center gap-3 p-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
        <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
          <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"></path>
        </svg>
        <span>Choose from Gallery</span>
      </button>

      <button onclick="selectOption('camera')"
        class="w-full flex items-center gap-3 p-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
        <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
            d="M4 5a2 2 0 012-2 1 1 0 010-2h8a1 1 0 010 2 2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V5z"
            clip-rule="evenodd"></path>
        </svg>
        <span>Take Photo</span>
      </button>

      <button onclick="closePhotoModal()"
        class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
        Cancel
      </button>
    </div>
  </div>

  <script>
    const modal = document.getElementById('photoModal');
    const changePhotoBtn = document.getElementById('btn-change-photo');

    changePhotoBtn.addEventListener('click', () => {
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    });

    function closePhotoModal() {
      modal.classList.add('hidden');
    }

    modal.addEventListener('click', (e) => {
      if (e.target.id === 'photoModal') closePhotoModal();
    });

    function selectOption(option) {
      closePhotoModal();
      if (option === 'gallery') window.location.href = "{{ route('student.photos') }}";
      if (option === 'camera') window.location.href = "{{ route('student.camera') }}";
    }

    document.addEventListener("DOMContentLoaded", () => {
      let selected = localStorage.getItem("selectedProfilePhoto");
      if (selected) document.getElementById("profilePreview").src = selected;
    });
  </script>
</x-app-layout>