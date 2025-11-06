<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Reminder - Tasks</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'english': '#f472b6',
                        'informatics': '#f87171',
                        'math': '#4ade80',
                        'history': '#fbbf24',
                        'physics': '#60a5fa',
                        'chemistry': '#a78bfa',
                        'primary': '#6366f1',
                        'primary-light': '#818cf8'
                    }
                }
            }
        }
    </script>
    <style>
        .task-card {
            transition: all 0.2s ease;
        }

        .task-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .subject-tag {
            transition: all 0.2s ease;
        }

        .subject-tag:hover {
            transform: scale(1.05);
        }

        .filter-dropdown {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <nav class="bg-white shadow-sm py-4 px-6 flex justify-between items-center sticky top-0 z-10">
        <div class="flex items-center">
            <h1 class="text-xl font-bold text-primary">School Reminder</h1>
        </div>

        <div class="hidden md:flex space-x-6">
            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Home</a>
            <a href="#" class="text-primary font-medium">Task</a>
            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Calendar</a>
            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Features</a>
            <a href="#" class="text-gray-600 hover:text-primary transition-colors">How it Works</a>
            <a href="#" class="text-gray-600 hover:text-primary transition-colors">About</a>
        </div>

        <div class="flex items-center space-x-4">

            <button id="theme-toggle" class="p-2 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors">
                <i class="fas fa-moon text-gray-600"></i>
            </button>


            <button
                class="border border-primary text-primary px-4 py-2 rounded-lg hover:bg-primary hover:text-white transition-colors">
                My Account
            </button>


            <button id="mobile-menu-button" class="md:hidden text-gray-600">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </nav>


    <div id="mobile-menu" class="md:hidden bg-white shadow-md py-2 px-4 hidden">
        <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">Home</a>
        <a href="#" class="block py-2 text-primary font-medium">Task</a>
        <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">Calendar</a>
        <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">Features</a>
        <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">How it Works</a>
        <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">About</a>
    </div>


    <main class="container mx-auto px-4 py-8 max-w-7xl">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Your To-Do List</h1>
            <div class="flex items-center text-gray-600">
                <span class="mr-4">12 tasks pending</span>
                <span class="flex items-center">
                    <span class="w-2 h-2 bg-red-500 rounded-full mr-1"></span>
                    3 due this week
                </span>
            </div>
        </div>

        <div class="flex flex-wrap gap-4 mb-6 items-center">
            <button class="px-4 py-2 bg-primary text-white rounded-lg">All Tasks</button>


            <div class="relative">
                <button id="status-filter-btn"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors flex items-center">
                    <span>Status</span>
                    <i class="fas fa-chevron-down ml-2 text-xs"></i>
                </button>
                <div id="status-dropdown"
                    class="filter-dropdown absolute left-0 mt-1 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-10 hidden">
                    <div class="p-2">
                        <label class="flex items-center p-2 hover:bg-gray-100 rounded cursor-pointer">
                            <input type="checkbox" class="mr-2 status-filter" value="pending" checked>
                            <span>Pending</span>
                        </label>
                        <label class="flex items-center p-2 hover:bg-gray-100 rounded cursor-pointer">
                            <input type="checkbox" class="mr-2 status-filter" value="completed">
                            <span>Completed</span>
                        </label>
                        <label class="flex items-center p-2 hover:bg-gray-100 rounded cursor-pointer">
                            <input type="checkbox" class="mr-2 status-filter" value="overdue">
                            <span>Overdue</span>
                        </label>
                    </div>
                </div>
            </div>


            <div class="relative">
                <button id="subject-filter-btn"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors flex items-center">
                    <span>Subject</span>
                    <i class="fas fa-chevron-down ml-2 text-xs"></i>
                </button>
                <div id="subject-dropdown"
                    class="filter-dropdown absolute left-0 mt-1 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-10 hidden">
                    <div class="p-2">
                        <label class="flex items-center p-2 hover:bg-gray-100 rounded cursor-pointer">
                            <input type="checkbox" class="mr-2 subject-filter" value="english" checked>
                            <span class="flex items-center">
                                <span class="w-3 h-3 bg-english rounded-full mr-2"></span>
                                English
                            </span>
                        </label>
                        <label class="flex items-center p-2 hover:bg-gray-100 rounded cursor-pointer">
                            <input type="checkbox" class="mr-2 subject-filter" value="informatics" checked>
                            <span class="flex items-center">
                                <span class="w-3 h-3 bg-informatics rounded-full mr-2"></span>
                                Informatics
                            </span>
                        </label>
                        <label class="flex items-center p-2 hover:bg-gray-100 rounded cursor-pointer">
                            <input type="checkbox" class="mr-2 subject-filter" value="math" checked>
                            <span class="flex items-center">
                                <span class="w-3 h-3 bg-math rounded-full mr-2"></span>
                                Math
                            </span>
                        </label>
                        <label class="flex items-center p-2 hover:bg-gray-100 rounded cursor-pointer">
                            <input type="checkbox" class="mr-2 subject-filter" value="history" checked>
                            <span class="flex items-center">
                                <span class="w-3 h-3 bg-history rounded-full mr-2"></span>
                                History
                            </span>
                        </label>
                        <label class="flex items-center p-2 hover:bg-gray-100 rounded cursor-pointer">
                            <input type="checkbox" class="mr-2 subject-filter" value="physics" checked>
                            <span class="flex items-center">
                                <span class="w-3 h-3 bg-physics rounded-full mr-2"></span>
                                Physics
                            </span>
                        </label>
                        <label class="flex items-center p-2 hover:bg-gray-100 rounded cursor-pointer">
                            <input type="checkbox" class="mr-2 subject-filter" value="chemistry" checked>
                            <span class="flex items-center">
                                <span class="w-3 h-3 bg-chemistry rounded-full mr-2"></span>
                                Chemistry
                            </span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="ml-auto flex items-center">
                <span class="text-gray-600 mr-2">Sort by:</span>
                <select
                    class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                    <option>Due Date</option>
                    <option>Subject</option>
                    <option>Priority</option>
                </select>
            </div>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

            <div class="task-card bg-white rounded-xl shadow-md overflow-hidden border-l-4 border-english"
                data-status="pending" data-subject="english">
                <div class="p-5">
                    <div class="flex justify-between items-start mb-3">
                        <span
                            class="subject-tag bg-english text-white text-xs font-medium px-2 py-1 rounded-full">English</span>
                        <span class="inline-block bg-red-100 text-red-800 text-xs font-medium px-2 py-1 rounded">Due
                            Tomorrow</span>
                    </div>

                    <h2 class="text-lg font-bold mb-2">Adjective Clauses</h2>

                    <div class="mb-4">
                        <div class="flex items-center text-gray-600 mb-2 text-sm">
                            <i class="fas fa-user mr-2"></i>
                            <span>Mr. Bambang</span>
                        </div>
                        <p class="text-gray-700 text-sm">
                            Exercise 1 on page 15 – Write all the questions and your answers neatly in your notebook.
                        </p>
                    </div>

                    <div class="flex justify-between items-center text-xs text-gray-500 mb-4">
                        <div class="flex items-center">
                            <i class="far fa-calendar-alt mr-1"></i>
                            <span>22 Jul 2025</span>
                        </div>
                        <div class="flex items-center">
                            <i class="far fa-clock mr-1"></i>
                            <span>11:59 PM</span>
                        </div>
                    </div>

                    <button
                        class="w-full bg-english text-white px-3 py-2 rounded-lg hover:bg-pink-500 transition-colors flex items-center justify-center text-sm">
                        <i class="fas fa-external-link-alt mr-2"></i>
                        View Task Detail
                    </button>
                </div>
            </div>


            <div class="task-card bg-white rounded-xl shadow-md overflow-hidden border-l-4 border-informatics"
                data-status="pending" data-subject="informatics">
                <div class="p-5">
                    <div class="flex justify-between items-start mb-3">
                        <span
                            class="subject-tag bg-informatics text-white text-xs font-medium px-2 py-1 rounded-full">Informatics</span>
                        <span
                            class="inline-block bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded">Due
                            in 3 days</span>
                    </div>

                    <h2 class="text-lg font-bold mb-2">Front End</h2>

                    <div class="mb-4">
                        <div class="flex items-center text-gray-600 mb-2 text-sm">
                            <i class="fas fa-user mr-2"></i>
                            <span>Mr. Mulyono</span>
                        </div>
                        <p class="text-gray-700 text-sm">
                            Create a simple website layout using HTML and CSS with header, navigation, content, and
                            footer.
                        </p>
                    </div>

                    <div class="flex justify-between items-center text-xs text-gray-500 mb-4">
                        <div class="flex items-center">
                            <i class="far fa-calendar-alt mr-1"></i>
                            <span>25 Jul 2025</span>
                        </div>
                        <div class="flex items-center">
                            <i class="far fa-clock mr-1"></i>
                            <span>09:00 PM</span>
                        </div>
                    </div>

                    <button
                        class="w-full bg-informatics text-white px-3 py-2 rounded-lg hover:bg-red-500 transition-colors flex items-center justify-center text-sm">
                        <i class="fas fa-external-link-alt mr-2"></i>
                        View Task Detail
                    </button>
                </div>
            </div>


            <div class="task-card bg-white rounded-xl shadow-md overflow-hidden border-l-4 border-math"
                data-status="pending" data-subject="math">
                <div class="p-5">
                    <div class="flex justify-between items-start mb-3">
                        <span
                            class="subject-tag bg-math text-white text-xs font-medium px-2 py-1 rounded-full">Math</span>
                        <span class="inline-block bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded">Due
                            in 6 days</span>
                    </div>

                    <h2 class="text-lg font-bold mb-2">Matrix</h2>

                    <div class="mb-4">
                        <div class="flex items-center text-gray-600 mb-2 text-sm">
                            <i class="fas fa-user mr-2"></i>
                            <span>Mrs. Cantik</span>
                        </div>
                        <p class="text-gray-700 text-sm">
                            Solve Exercises 3 to 7 on page 42. Show all calculation steps clearly.
                        </p>
                    </div>

                    <div class="flex justify-between items-center text-xs text-gray-500 mb-4">
                        <div class="flex items-center">
                            <i class="far fa-calendar-alt mr-1"></i>
                            <span>28 Jul 2025</span>
                        </div>
                        <div class="flex items-center">
                            <i class="far fa-clock mr-1"></i>
                            <span>01:00 PM</span>
                        </div>
                    </div>

                    <button
                        class="w-full bg-math text-white px-3 py-2 rounded-lg hover:bg-green-500 transition-colors flex items-center justify-center text-sm">
                        <i class="fas fa-external-link-alt mr-2"></i>
                        View Task Detail
                    </button>
                </div>
            </div>


            <div class="task-card bg-white rounded-xl shadow-md overflow-hidden border-l-4 border-history"
                data-status="completed" data-subject="history">
                <div class="p-5">
                    <div class="flex justify-between items-start mb-3">
                        <span
                            class="subject-tag bg-history text-white text-xs font-medium px-2 py-1 rounded-full">History</span>
                        <span
                            class="inline-block bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded">Completed</span>
                    </div>

                    <h2 class="text-lg font-bold mb-2">World War II Essay</h2>

                    <div class="mb-4">
                        <div class="flex items-center text-gray-600 mb-2 text-sm">
                            <i class="fas fa-user mr-2"></i>
                            <span>Mr. Wijaya</span>
                        </div>
                        <p class="text-gray-700 text-sm">
                            Write a 1000-word essay about the causes and consequences of World War II.
                        </p>
                    </div>

                    <div class="flex justify-between items-center text-xs text-gray-500 mb-4">
                        <div class="flex items-center">
                            <i class="far fa-calendar-alt mr-1"></i>
                            <span>26 Jul 2025</span>
                        </div>
                        <div class="flex items-center">
                            <i class="far fa-clock mr-1"></i>
                            <span>03:00 PM</span>
                        </div>
                    </div>

                    <button
                        class="w-full bg-history text-white px-3 py-2 rounded-lg hover:bg-yellow-500 transition-colors flex items-center justify-center text-sm">
                        <i class="fas fa-external-link-alt mr-2"></i>
                        View Task Detail
                    </button>
                </div>
            </div>


            <div class="task-card bg-white rounded-xl shadow-md overflow-hidden border-l-4 border-physics"
                data-status="pending" data-subject="physics">
                <div class="p-5">
                    <div class="flex justify-between items-start mb-3">
                        <span
                            class="subject-tag bg-physics text-white text-xs font-medium px-2 py-1 rounded-full">Physics</span>
                        <span class="inline-block bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded">Due
                            in 8 days</span>
                    </div>

                    <h2 class="text-lg font-bold mb-2">Newton's Laws</h2>

                    <div class="mb-4">
                        <div class="flex items-center text-gray-600 mb-2 text-sm">
                            <i class="fas fa-user mr-2"></i>
                            <span>Mr. Surya</span>
                        </div>
                        <p class="text-gray-700 text-sm">
                            Solve problems 5-12 from chapter 3. Include free-body diagrams for each problem.
                        </p>
                    </div>

                    <div class="flex justify-between items-center text-xs text-gray-500 mb-4">
                        <div class="flex items-center">
                            <i class="far fa-calendar-alt mr-1"></i>
                            <span>30 Jul 2025</span>
                        </div>
                        <div class="flex items-center">
                            <i class="far fa-clock mr-1"></i>
                            <span>10:00 AM</span>
                        </div>
                    </div>

                    <button
                        class="w-full bg-physics text-white px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors flex items-center justify-center text-sm">
                        <i class="fas fa-external-link-alt mr-2"></i>
                        View Task Detail
                    </button>
                </div>
            </div>


            <div class="task-card bg-white rounded-xl shadow-md overflow-hidden border-l-4 border-chemistry"
                data-status="overdue" data-subject="chemistry">
                <div class="p-5">
                    <div class="flex justify-between items-start mb-3">
                        <span
                            class="subject-tag bg-chemistry text-white text-xs font-medium px-2 py-1 rounded-full">Chemistry</span>
                        <span
                            class="inline-block bg-red-100 text-red-800 text-xs font-medium px-2 py-1 rounded">Overdue</span>
                    </div>

                    <h2 class="text-lg font-bold mb-2">Periodic Table</h2>

                    <div class="mb-4">
                        <div class="flex items-center text-gray-600 mb-2 text-sm">
                            <i class="fas fa-user mr-2"></i>
                            <span>Mrs. Dewi</span>
                        </div>
                        <p class="text-gray-700 text-sm">
                            Memorize elements 1-20 with their symbols and atomic numbers. Quiz tomorrow.
                        </p>
                    </div>

                    <div class="flex justify-between items-center text-xs text-gray-500 mb-4">
                        <div class="flex items-center">
                            <i class="far fa-calendar-alt mr-1"></i>
                            <span>23 Jul 2025</span>
                        </div>
                        <div class="flex items-center">
                            <i class="far fa-clock mr-1"></i>
                            <span>08:30 AM</span>
                        </div>
                    </div>

                    <button
                        class="w-full bg-chemistry text-white px-3 py-2 rounded-lg hover:bg-purple-600 transition-colors flex items-center justify-center text-sm">
                        <i class="fas fa-external-link-alt mr-2"></i>
                        View Task Detail
                    </button>
                </div>
            </div>
        </div>


        <div class="flex justify-center mt-8">
            <nav class="flex items-center space-x-1">
                <button class="px-3 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <button class="px-3 py-2 rounded-lg bg-primary text-white">1</button>
                <button
                    class="px-3 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors">2</button>
                <button
                    class="px-3 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors">3</button>
                <button
                    class="px-3 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors">4</button>
                <button
                    class="px-3 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors">5</button>

                <span class="px-2 text-gray-500">...</span>

                <button
                    class="px-3 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors">9</button>
                <button
                    class="px-3 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors">10</button>

                <button class="px-3 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </nav>
        </div>


        <div class="text-center text-gray-500 text-sm mt-4">
            Showing 1-6 of 12 tasks
        </div>
    </main>


    <footer class="bg-white mt-12 py-6 px-4 border-t border-gray-200">
        <div class="container mx-auto text-center text-gray-600">
            <p>© 2025 School Reminder. All rights reserved.</p>
        </div>
    </footer>

    <div id="task-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-20 hidden">
        <div class="bg-white rounded-xl shadow-lg max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <div class="bg-english h-2 w-full"></div>
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span
                            class="subject-tag bg-english text-white text-sm font-medium px-3 py-1 rounded-full">English</span>
                        <h2 class="text-2xl font-bold mt-2">Adjective Clauses</h2>
                    </div>
                    <button id="close-modal" class="text-gray-500 hover:text-gray-700 text-xl">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h3 class="font-semibold text-gray-700 mb-2">Teacher</h3>
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-user text-gray-500"></i>
                            </div>
                            <div>
                                <p class="font-medium">Mr. Bambang</p>
                                <p class="text-gray-600 text-sm">bambang@school.edu</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-semibold text-gray-700 mb-2">Due Date</h3>
                        <div class="flex items-center text-gray-600">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>Tuesday, 22 July 2025 • 11:59 PM</span>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="font-semibold text-gray-700 mb-2">Instructions</h3>
                    <p class="text-gray-700">
                        Exercise 1 on page 15 – Write all the questions and your answers neatly in your notebook. Make
                        sure to use complete sentences and check your grammar before submitting.
                    </p>
                </div>

                <div class="mb-6">
                    <h3 class="font-semibold text-gray-700 mb-2">Attachments</h3>
                    <div class="space-y-2">
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <i class="far fa-file-pdf text-red-500 mr-3 text-xl"></i>
                            <div>
                                <p class="font-medium">Exercise 1 Instructions.pdf</p>
                                <p class="text-xs text-gray-500">312 KB</p>
                            </div>
                            <button class="ml-auto text-primary hover:text-primary-light">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex space-x-4">
                    <button
                        class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-light transition-colors flex-1">
                        Mark as Complete
                    </button>
                    <button
                        class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-50 transition-colors">
                        <i class="far fa-edit mr-2"></i> Edit
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>

        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });




        const statusFilterBtn = document.getElementById('status-filter-btn');
        const statusDropdown = document.getElementById('status-dropdown');
        const subjectFilterBtn = document.getElementById('subject-filter-btn');
        const subjectDropdown = document.getElementById('subject-dropdown');


        statusFilterBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            statusDropdown.classList.toggle('hidden');
            subjectDropdown.classList.add('hidden');
        });


        subjectFilterBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            subjectDropdown.classList.toggle('hidden');
            statusDropdown.classList.add('hidden');
        });


        document.addEventListener('click', function () {
            statusDropdown.classList.add('hidden');
            subjectDropdown.classList.add('hidden');
        });


        statusDropdown.addEventListener('click', function (e) {
            e.stopPropagation();
        });

        subjectDropdown.addEventListener('click', function (e) {
            e.stopPropagation();
        });


        function filterTasks() {
            const selectedStatuses = Array.from(document.querySelectorAll('.status-filter:checked')).map(cb => cb.value);
            const selectedSubjects = Array.from(document.querySelectorAll('.subject-filter:checked')).map(cb => cb.value);

            const taskCards = document.querySelectorAll('.task-card');

            taskCards.forEach(card => {
                const cardStatus = card.getAttribute('data-status');
                const cardSubject = card.getAttribute('data-subject');

                const statusMatch = selectedStatuses.includes(cardStatus);
                const subjectMatch = selectedSubjects.includes(cardSubject);

                if (statusMatch && subjectMatch) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });


            const visibleTasks = document.querySelectorAll('.task-card[style="display: block"]').length;
            document.querySelector('.text-center.text-gray-500.text-sm.mt-4').textContent =
                `Showing 1-${visibleTasks} of ${visibleTasks} tasks`;
        }


        document.querySelectorAll('.status-filter, .subject-filter').forEach(checkbox => {
            checkbox.addEventListener('change', filterTasks);
        });


        const modal = document.getElementById('task-modal');
        const closeModal = document.getElementById('close-modal');


        document.querySelectorAll('button').forEach(button => {
            if (button.textContent.includes('View Task Detail')) {
                button.addEventListener('click', function () {
                    modal.classList.remove('hidden');
                });
            }
        });

        closeModal.addEventListener('click', function () {
            modal.classList.add('hidden');
        });


        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });


        document.querySelectorAll('.pagination button').forEach(button => {
            button.addEventListener('click', function () {

                document.querySelectorAll('.pagination button').forEach(btn => {
                    btn.classList.remove('bg-primary', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-700');
                });


                if (!isNaN(parseInt(this.textContent)) || this.textContent === '1') {
                    this.classList.remove('bg-gray-200', 'text-gray-700');
                    this.classList.add('bg-primary', 'text-white');
                }
            });
        });
    </script>
</body>

</html>