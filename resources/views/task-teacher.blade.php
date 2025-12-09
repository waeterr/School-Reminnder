<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Task – School Reminder</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .status-selected {
            background-color: #24447D !important;
            color: white !important;
            border-color: #24447D !important;
        }
    </style>
</head>

<body class="bg-white">

    <!-- NAVBAR -->
    <nav class="shadow-sm bg-white px-6 py-4 flex items-center justify-between relative">

        <div class="flex items-center space-x-2">
            <img src="{{'images/logo.png'}}" alt="School Reminder Logo" class="h-10">
            <h1 class="font-semibold text-[#1B2A4E] text-lg">
                School <span class="text-[#3A71C1]">Reminder</span>
            </h1>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex absolute left-1/2 -translate-x-1/2 space-x-6 font-medium text-[#132442]">
            <a href="{{ route('onboard') }}">Home</a>
            <a href="{{ route('task') }}" class="text-white bg-[#3A71C1] px-4 py-1 rounded-full">Task</a>
            <a href="{{ route('login') }}">Calendar</a>
            <a href="#" class="hover:text-blue-600">Reminder</a>
            <a href="{{ route('about-us') }}">About Us</a>
        </div>

        <!-- Right Menu -->
        <div class="hidden md:flex items-center space-x-4">
            <a class="border border-gray-800 px-5 py-2 rounded-full font-semibold hover:bg-gray-900 hover:text-white transition"
                href="{{ route('profile') }}">My Account</a>
        </div>

        <button id="hamburgerBtn" class="md:hidden text-3xl text-[#132442]">☰</button>
    </nav>

    <!-- MOBILE MENU -->
    <div id="mobileMenu"
        class="hidden flex flex-col bg-white shadow-lg px-6 py-4 space-y-4 text-[#132442] font-medium md:hidden">

        <a href="{{ route('onboard') }}">Home</a>
        <a href="{{ route('task') }}" class="text-white bg-[#3A71C1] px-4 py-1 rounded-lg w-max">Task</a>
        <a href="{{ route('welcome') }}">Calendar</a>
        <a href="#" class="hover:text-blue-600">Reminder</a>
        <a href="{{ route('about-us') }}">About Us</a>

        <hr>

        <a class="border border-gray-800 px-5 py-2 rounded-full font-semibold hover:bg-gray-900 hover:text-white transition w-max"
            href="{{ route('profile') }}">My Account</a>
    </div>


    <!-- MAIN CONTENT -->
    <div class="px-4 sm:px-6 md:px-10 lg:px-16 py-8">
        <h1 class="text-2xl sm:text-3xl font-semibold mb-6">
            @forelse($classrooms as $classroom)
                {{ $classroom->name }}
                @break
            @empty
                My Class
            @endforelse
        </h1>

        <div class="bg-[#F3F3F3] shadow-md rounded-xl p-4 sm:p-6 md:p-8">

            <!-- TABS -->
            <div class="grid grid-cols-3 text-center mb-6">
                <button id="tabTask" class="py-2 border-b-2 border-[#132442] text-[#132442] font-medium">Task</button>
                <button id="tabGrading" class="py-2 text-gray-600 font-medium">Grading</button>
                <button id="tabStudent" class="py-2 text-gray-600 font-medium">Student</button>
            </div>

            <!-- TASK CONTENT -->
            <div id="contentTask">

                <div class="mb-5">
                    <input type="text" placeholder="Search task…"
                        class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#28477E] focus:outline-none" />
                </div>

                <div class="border rounded-xl overflow-x-auto">

                    <div
                        class="grid grid-cols-5 min-w-[700px] bg-gray-200 px-4 py-3 font-semibold text-gray-700 text-sm">
                        <div>Task Name</div>
                        <div>Deadline</div>
                        <div>Status</div>
                        <div>Submissions</div>
                        <div>Actions</div>
                    </div>

                    @forelse($assignments as $assignment)
                        @php
                            $dueDate = \Carbon\Carbon::parse($assignment->due_date);
                            $now = \Carbon\Carbon::now();
                            $status = $dueDate->isPast() ? 'Overdue' : ($dueDate->isToday() ? 'Due Today' : 'Active');
                            $statusColor = $status === 'Active' ? 'bg-green-500' : ($status === 'Due Today' ? 'bg-orange-500' : 'bg-red-500');
                            $submissions = $assignment->submissions()->count();
                            $totalStudents = $assignment->classroom->members()->count();
                        @endphp
                        <div class="grid grid-cols-5 min-w-[700px] items-center px-4 py-4 border-t text-sm">

                            <div class="font-medium">{{ Str::limit($assignment->title, 30) }}</div>

                            <div class="text-gray-700 leading-tight">
                                {{ $dueDate->format('l, d M Y') }} <br>
                                {{ $dueDate->format('h:i A') }}
                            </div>

                            <div>
                                <span
                                    class="{{ $statusColor }} text-white text-xs px-3 py-1 rounded-full">{{ $status }}</span>
                            </div>

                            <div class="text-gray-700">{{ $submissions }}/{{ $totalStudents }} Students</div>

                            <div class="flex gap-2">
                                <button class="bg-[#0F2348] text-white text-xs px-3 py-1 rounded-lg">Grade</button>
                                <button class="openEditBtn bg-[#0F2348] text-white text-xs px-3 py-1 rounded-lg"
                                    data-id="{{ $assignment->id }}" data-title="{{ $assignment->title }}"
                                    data-desc="{{ $assignment->description }}"
                                    data-deadline="{{ $assignment->due_date }}">Edit</button>
                                <button class="viewBtn bg-[#0F2348] text-white text-xs px-3 py-1 rounded-lg"
                                    data-title="{{ $assignment->title }}" data-desc="{{ $assignment->description }}"
                                    data-deadline="{{ $dueDate->format('l, d M Y – h:i A') }}"
                                    data-status="{{ $status }}">View</button>
                            </div>
                        </div>
                    @empty
                        <div class="grid grid-cols-5 min-w-[700px] items-center px-4 py-4 border-t text-sm text-center">
                            <div colspan="5" class="text-gray-500">No assignments found for this classroom.</div>
                        </div>
                    @endforelse

                </div>

            </div>

            <!-- GRADING CONTENT -->
            <div id="contentGrading" class="hidden">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">

                    <div class="bg-white p-5 rounded-xl shadow border">
                        <p class="text-gray-600 text-xl text-bold">Class Average</p>
                        <h2 class="text-4xl font-bold mt-2">90.50</h2>
                    </div>

                    <div class="bg-white p-5 rounded-xl shadow border">
                        <p class="text-gray-600 text-xl text-bold">Need grades</p>
                        <div class="flex items-center mt-4">
                            <div
                                class="bg-red-500 text-white w-10 h-10 flex items-center justify-center rounded-lg text-xl font-bold">
                                5
                            </div>
                            <span class="text-red-600 text-2xl font-bold ml-3">Submissions</span>
                        </div>
                    </div>

                </div>

                <div class="overflow-x-auto mt-6 rounded-lg border-2">
                    <table class="w-full border-collapse text-sm min-w-[900px]">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700 text-left">
                                <th class="p-3">No</th>
                                <th class="p-3">Students</th>
                                <th class="p-3">Class Average</th>
                                <th class="p-3">Matriks</th>
                                <th class="p-3">Deret Aritmatika</th>
                                <th class="p-3">Geometri</th>
                                <th class="p-3">Trigonometri</th>
                                <th class="p-3">Persamaan Kuadrat</th>
                                <th class="p-3">Fungsi Kuadrat</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="border-b">
                                <td class="p-3">1</td>
                                <td class="p-3">Adinda Octaviannisa</td>
                                <td class="p-3">95</td>
                                <td class="p-3">95</td>
                                <td class="p-3">95</td>
                                <td class="p-3">95</td>
                                <td class="p-3">95</td>
                                <td class="p-3">95</td>
                                <td class="p-3">95</td>
                            </tr>

                            <tr class="border-b">
                                <td class="p-3">2</td>
                                <td class="p-3">Alden Fathin Hanif</td>
                                <td class="p-3">91</td>
                                <td class="p-3">95</td>
                                <td class="p-3">95</td>
                                <td class="p-3">95</td>
                                <td class="p-3">95</td>
                                <td class="p-3">95</td>
                                <td class="p-3">95</td>
                            </tr>

                            <tr class="border-b">
                                <td class="p-3">3</td>
                                <td class="p-3">Anas Akbar Lajuma</td>
                                <td class="p-3">90</td>
                                <td class="p-3">95</td>
                                <td class="p-3">95</td>
                                <td class="p-3">95</td>
                                <td class="p-3">95</td>
                                <td class="p-3">95</td>
                                <td class="p-3">95</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <!-- STUDENT CONTENT -->
            <div id="contentStudent" class="hidden">

                <div class="mt-6 rounded-xl border p-4 bg-white">

                    <!-- HEADER -->
                    <div class="hidden md:grid md:grid-cols-3 font-semibold text-gray-700 border-b pb-3 mb-4">
                        <div class="text-left">Task</div>
                        <div class="text-left">Grading</div>
                        <div class="text-left">Student</div>
                    </div>

                    <!-- RESPONSIVE LIST -->
                    <div class="space-y-6">

                        <!-- ROW -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 items-center">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                                <p>Adinda Octaviannisa R</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                                <p>Azka Naufal Aleeswa A</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                                <p>Faris Kahlil Haidar</p>
                            </div>
                        </div>

                        <!-- ROW -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 items-center">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                                <p>Alden Fathin Hanif</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                                <p>Bisma Mahes</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                                <p>Kalingga Kusuma A</p>
                            </div>
                        </div>

                        <!-- ROW -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 items-center">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                                <p>Anas Akbar Lajuma</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                                <p>Daffa Rahadyan D</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                                <p>Kalyca Azalia</p>
                            </div>
                        </div>

                        <!-- ROW -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 items-center">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                                <p>Annisa Khurun'ain</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                                <p>Danish Attalla</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                                <p>Kevin Gading A P</p>
                            </div>
                        </div>

                        <!-- ROW -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 items-center">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                                <p>Aqila Dzakky</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                                <p>Davina Alicia Fitriani</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                                <p>Krisna Aditya S</p>
                            </div>
                        </div>

                        <!-- ROW -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 items-center">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                                <p>Arkamudya Aceananda P</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                                <p>Defan Maulana Asyar</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                                <p>Lauhul Ridwan</p>
                            </div>
                        </div>

                    </div>

                    <p class="text-right text-gray-400 text-sm mt-4">18 students</p>

                </div>
            </div>
            <!-- POPUP VIEW -->
            <div id="viewPopup" class="fixed inset-0 bg-black bg-opacity-40 hidden justify-center items-center z-50">

                <div class="bg-white rounded-2xl shadow-xl w-[650px] p-10">
                    <h2 class="text-center text-2xl font-semibold mb-8" id="viewTaskTitle">View Task</h2>

                    <div class="space-y-4 text-[18px] leading-relaxed">

                        <p>
                            <strong>Task Name:</strong>
                            <span id="viewTaskName"></span>
                        </p>

                        <p>
                            <strong>Description:</strong>
                            <span id="viewTaskDesc"></span>
                        </p>

                        <p>
                            <strong>Deadline:</strong>
                            <span id="viewTaskDeadline"></span>
                        </p>

                        <div class="flex items-center gap-4">
                            <strong>Status:</strong>

                            <span id="viewTaskStatus" class="px-4 py-1 rounded-full text-white bg-[#1B2A4A]">
                            </span>

                            <span class="px-4 py-1 bg-gray-300 rounded-full text-gray-700">
                                Schedule
                            </span>
                        </div>
                    </div>

                    <div class="flex justify-end mt-8">
                        <button id="closeViewPopup"
                            class="bg-[#1B2A4A] text-white px-6 py-3 rounded-lg hover:bg-[#16233a]">
                            Back
                        </button>
                    </div>

                </div>
            </div>

            <!-- CREATE BUTTON -->
            <div id="createTaskWrapper" class="mt-5">
                <button id="openTaskPopup"
                    class="w-full py-3 text-white bg-[#28477E] rounded-xl font-medium hover:opacity-90 transition">
                    + Create New Task
                </button>
            </div>

        </div>
    </div>


    <!-- POPUP CREATE TASK -->
    <div id="popupOverlay" class="fixed inset-0 bg-black bg-opacity-40 hidden justify-center items-center z-50">

        <div class="bg-white rounded-2xl shadow-xl w-[95%] max-w-[650px] p-6 sm:p-10">
            <h2 class="text-center text-2xl font-semibold mb-8">New Task</h2>

            <form class="space-y-5">

                <!-- Task Name -->
                <div>
                    <label class="text-gray-600 text-sm font-medium">Task Name:</label>
                    <input type="text"
                        class="w-full border mt-1 px-3 py-2 rounded-lg text-sm sm:text-base focus:ring-2 focus:ring-blue-700">
                </div>

                <!-- Description -->
                <div>
                    <label class="text-gray-600 text-sm font-medium">Description:</label>
                    <textarea rows="3"
                        class="w-full border mt-1 px-3 py-2 rounded-lg text-sm sm:text-base focus:ring-2 focus:ring-blue-700"></textarea>
                </div>

                <!-- Deadline -->
                <div>
                    <label class="text-gray-600 text-sm font-medium">Deadline:</label>
                    <input type="datetime-local"
                        class="w-full border mt-1 px-3 py-2 rounded-lg text-sm sm:text-base focus:ring-2 focus:ring-blue-700">
                </div>

                <!-- Status -->
                <div>
                    <label class="text-gray-600 text-sm font-medium">Status:</label>

                    <div class="flex gap-3 mt-2">
                        <button type="button" class="px-5 py-2 rounded-full border ... active-status">

                        </button>

                        <button type="button" class="px-5 py-2 rounded-full border ... schedule-status">
                        </button>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="flex justify-end pt-2">
                    <button class="bg-[#24447D] text-white px-8 py-2 rounded-lg font-semibold text-sm sm:text-base">
                        Save
                    </button>
                </div>

            </form>

        </div>
    </div>


    <!-- POPUP EDIT -->
    <div id="editPopup" class="fixed inset-0 bg-black bg-opacity-40 hidden justify-center items-center z-50">

        <div class="bg-white rounded-2xl shadow-xl w-[95%] max-w-[650px] p-6 sm:p-10">
            <h2 class="text-center text-2xl font-semibold mb-8">Edit Task</h2>

            <form class="space-y-5">

                <!-- Task Name -->
                <div>
                    <label class="text-gray-600 text-sm font-medium">Task Name:</label>
                    <input id="editTaskName" type="text"
                        class="w-full border mt-1 px-3 py-2 rounded-lg text-sm sm:text-base focus:ring-2 focus:ring-blue-700">
                </div>

                <!-- Description -->
                <div>
                    <label class="text-gray-600 text-sm font-medium">Description:</label>
                    <textarea id="editTaskDesc" rows="3"
                        class="w-full border mt-1 px-3 py-2 rounded-lg text-sm sm:text-base focus:ring-2 focus:ring-blue-700"></textarea>
                </div>

                <!-- Deadline -->
                <div>
                    <label class="text-gray-600 text-sm font-medium">Deadline:</label>
                    <input id="editTaskDeadline" type="datetime-local"
                        class="w-full border mt-1 px-3 py-2 rounded-lg text-sm sm:text-base focus:ring-2 focus:ring-blue-700">
                </div>

                <!-- Status -->
                <div>
                    <label class="text-gray-600 text-sm font-medium">Status:</label>

                    <div class="flex gap-3 mt-2">
                        <button type="button"
                            class="px-5 py-2 rounded-full border border-gray-400 text-gray-700 text-sm sm:text-base active-status">
                            Active
                        </button>

                        <button type="button"
                            class="px-5 py-2 rounded-full border border-gray-400 text-gray-700 text-sm sm:text-base schedule-status">
                            Schedule
                        </button>
                    </div>
                </div>

                <!-- Save -->
                <div class="flex justify-end pt-2">
                    <button class="bg-[#24447D] text-white px-8 py-2 rounded-lg font-semibold text-sm sm:text-base">
                        Save Changes
                    </button>
                </div>

            </form>

        </div>
    </div>




    <!-- SCRIPT -->
    <script>
        const hamburgerBtn = document.getElementById("hamburgerBtn");
        const mobileMenu = document.getElementById("mobileMenu");

        hamburgerBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });

        // Tabs
        const tabTask = document.getElementById("tabTask");
        const tabGrading = document.getElementById("tabGrading");
        const tabStudent = document.getElementById("tabStudent");

        const contentTask = document.getElementById("contentTask");
        const contentGrading = document.getElementById("contentGrading");
        const contentStudent = document.getElementById("contentStudent");

        const createTaskWrapper = document.getElementById("createTaskWrapper");


        function activateTab(tab) {
            tabTask.classList.remove("border-b-2", "border-[#132442]", "text-[#132442]");
            tabGrading.classList.remove("border-b-2", "border-[#132442]", "text-[#132442]");
            tabStudent.classList.remove("border-b-2", "border-[#132442]", "text-[#132442]");

            tabTask.classList.add("text-gray-600");
            tabGrading.classList.add("text-gray-600");
            tabStudent.classList.add("text-gray-600");

            if (tab === "task") {
                tabTask.classList.add("border-b-2", "border-[#132442]", "text-[#132442]");
                contentTask.classList.remove("hidden");
                contentGrading.classList.add("hidden");
                contentStudent.classList.add("hidden");
                createTaskWrapper.classList.remove("hidden");
            }

            if (tab === "grading") {
                tabGrading.classList.add("border-b-2", "border-[#132442]", "text-[#132442]");
                contentTask.classList.add("hidden");
                contentGrading.classList.remove("hidden");
                contentStudent.classList.add("hidden");
                createTaskWrapper.classList.add("hidden");
            }

            if (tab === "student") {
                tabStudent.classList.add("border-b-2", "border-[#132442]", "text-[#132442]");
                contentTask.classList.add("hidden");
                contentGrading.classList.add("hidden");
                contentStudent.classList.remove("hidden");
                createTaskWrapper.classList.add("hidden");
            }
        }

        tabTask.addEventListener("click", () => activateTab("task"));
        tabGrading.addEventListener("click", () => activateTab("grading"));
        tabStudent.addEventListener("click", () => activateTab("student"));


        // Popup Create
        const popupOverlay = document.getElementById("popupOverlay");
        const openTaskPopup = document.getElementById("openTaskPopup");

        openTaskPopup.addEventListener("click", () => {
            popupOverlay.classList.remove("hidden");
            popupOverlay.classList.add("flex");
        });

        popupOverlay.addEventListener("click", (e) => {
            if (e.target === popupOverlay) {
                popupOverlay.classList.add("hidden");
                popupOverlay.classList.remove("flex");
            }
        });


        // Popup Edit
        const editPopup = document.getElementById("editPopup");

        document.addEventListener("click", function (e) {
            if (e.target.classList.contains("openEditBtn")) {
                const taskId = e.target.getAttribute("data-id");
                const taskTitle = e.target.getAttribute("data-title");
                const taskDesc = e.target.getAttribute("data-desc");
                const taskDeadline = e.target.getAttribute("data-deadline");

                document.getElementById("editTaskName").value = taskTitle;
                document.getElementById("editTaskDesc").value = taskDesc;
                document.getElementById("editTaskDeadline").value = taskDeadline;

                editPopup.classList.remove("hidden");
                editPopup.classList.add("flex");
            }
        });

        editPopup.addEventListener("click", (e) => {
            if (e.target === editPopup) {
                editPopup.classList.add("hidden");
                editPopup.classList.remove("flex");
            }
        });
        // ---- STATUS SELECTOR (CREATE + EDIT) ---- //

        function setupStatusButtons(container) {
            const activeBtn = container.querySelector(".active-status");
            const scheduleBtn = container.querySelector(".schedule-status");

            const deadlineInput = container.querySelector("input[type='datetime-local']");

            // Default: Active kepilih
            activeBtn.classList.add("status-selected");

            activeBtn.addEventListener("click", () => {
                activeBtn.classList.add("status-selected");
                scheduleBtn.classList.remove("status-selected");

                // Disable kalender
                deadlineInput.disabled = true;
                deadlineInput.value = "";
            });

            scheduleBtn.addEventListener("click", () => {
                scheduleBtn.classList.add("status-selected");
                activeBtn.classList.remove("status-selected");

                // Enable kalender
                deadlineInput.disabled = false;

                // Auto-prompt user untuk pilih tanggal
                deadlineInput.showPicker?.();
            });
        }

        // Apply ke popup CREATE
        setupStatusButtons(document.querySelector("#popupOverlay form"));

        // Apply ke popup EDIT
        setupStatusButtons(document.querySelector("#editPopup form"));
        function openViewTask(title, desc, deadline, status) {
            document.getElementById("viewTitle").innerText = title;
            document.getElementById("viewName").innerText = title;
            document.getElementById("viewDesc").innerText = desc;
            document.getElementById("viewDeadline").innerText = deadline;

            // Status toggle visual
            if (status === "Active") {
                document.getElementById("statusActive").classList.add("active");
                document.getElementById("statusSchedule").classList.remove("active");
            } else {
                document.getElementById("statusActive").classList.remove("active");
                document.getElementById("statusSchedule").classList.add("active");
            }

            document.getElementById("viewTaskModal").classList.remove("hidden");
        }

        function closeViewTask() {
            document.getElementById("viewTaskModal").classList.add("hidden");
        }
        const viewPopup = document.getElementById("viewPopup");
        const closeViewPopup = document.getElementById("closeViewPopup");

        // Handle View buttons dynamically
        document.addEventListener("click", function (e) {
            if (e.target.classList.contains("viewBtn")) {
                const taskTitle = e.target.getAttribute("data-title");
                const taskDesc = e.target.getAttribute("data-desc");
                const taskDeadline = e.target.getAttribute("data-deadline");
                const taskStatus = e.target.getAttribute("data-status");

                document.getElementById("viewTaskName").textContent = taskTitle;
                document.getElementById("viewTaskDesc").textContent = taskDesc;
                document.getElementById("viewTaskDeadline").textContent = taskDeadline;
                document.getElementById("viewTaskStatus").textContent = taskStatus;

                viewPopup.classList.remove("hidden");
                viewPopup.classList.add("flex");
            }
        });

        viewPopup.addEventListener("click", (e) => {
            if (e.target === viewPopup) {
                viewPopup.classList.add("hidden");
                viewPopup.classList.remove("flex");
            }
        });

        closeViewPopup.addEventListener("click", () => {
            viewPopup.classList.add("hidden");
            viewPopup.classList.remove("flex");
        });
    </script>

</body>

</html>