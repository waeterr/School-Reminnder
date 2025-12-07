<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Reminder - Student Productivity App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'math-green': '#4ade80',
                        'english-pink': '#f472b6',
                        'informatics-red': '#f87171',
                        'history-yellow': '#fbbf24',
                        'primary': '#6366f1',
                        'primary-light': '#818cf8'
                    }
                }
            }
        }
    </script>
    <style>
        .calendar-day {
            transition: all 0.2s ease;
        }

        .calendar-day:hover {
            transform: scale(1.05);
        }

        .task-tag {
            transition: all 0.2s ease;
        }

        .task-tag:hover {
            transform: translateY(-2px);
        }

        .modal {
            transition: opacity 0.3s ease;
        }

        .info-box {
            border-left: 4px solid #f87171;
        }

        .deadline-badge {
            font-size: 0.7rem;
        }

        .has-task::after {
            content: '';
            position: absolute;
            bottom: 8px;
            right: 8px;
            width: 8px;
            height: 8px;
            background: #ef4444;
            border-radius: 50%;
        }

        .day-number {
            text-align: right;
            font-weight: 600;
        }

        .task-detail {
            display: none;
        }

        .task-detail.active {
            display: block;
        }

        .placeholder-message {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            text-align: center;
            padding: 2rem;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">
    <!-- Top Navigation Bar -->
    <nav class="w-full flex justify-between items-center px-10 py-4 shadow-sm">
        <div class="flex items-center space-x-2">

            <!-- LOGO -->
            <div class="w-10 h-10 bg-gray-300 rounded-md"></div>
            <!-- GANTI kotak abu ini dengan logo: <img src=""> -->

            <h1 class="font-semibold text-[#1B2A4E] text-lg">
                School <span class="text-[#3A71C1]">Reminder</span>
            </h1>
        </div>

        <div class="hidden md:flex space-x-7 text-[#1B2A4E] font-medium">
            <a href="{{ route('welcome') }}" class="text-white bg-[#3A71C1] px-4 py-1 rounded-full">Home</a>
            <a href="{{ route('task') }}" class="hover:text-[#3A71C1]">Task</a>
            <a href="{{ route('calendar') }}" class="hover:text-[#3A71C1]">Calendar</a>
            <a href="#" class="hover:text-[#3A71C1]">Reminder</a>
            <a href="#" class="hover:text-[#3A71C1]">About Us</a>
        </div>

        <!-- My Account Button -->
        <button
            class="border border-primary text-primary px-4 py-2 rounded-lg hover:bg-primary hover:text-white transition-colors">
            My Account
        </button>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="md:hidden text-gray-600">
            <i class="fas fa-bars text-xl"></i>
        </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden bg-white shadow-md py-2 px-4 hidden">
        <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">Home</a>
        <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">Task</a>
        <a href="#" class="block py-2 text-primary font-medium">Calendar</a>
        <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">Reminder</a>
        <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">About Us</a>
    </div>

    <!-- Main Section -->
    <main class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left Column - Calendar -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800">July 2025</h2>
                    <div class="flex space-x-2">
                        <button class="p-2 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="p-2 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Weekday Headers -->
                <div class="grid grid-cols-7 gap-2 mb-4">
                    <div class="text-center text-gray-500 font-medium">Sun</div>
                    <div class="text-center text-gray-500 font-medium">Mon</div>
                    <div class="text-center text-gray-500 font-medium">Tue</div>
                    <div class="text-center text-gray-500 font-medium">Wed</div>
                    <div class="text-center text-gray-500 font-medium">Thu</div>
                    <div class="text-center text-gray-500 font-medium">Fri</div>
                    <div class="text-center text-gray-500 font-medium">Sat</div>
                </div>

                <!-- Calendar Grid -->
                <div class="grid grid-cols-7 gap-2" id="calendarGrid">
                    <!-- Calendar days will be populated by JavaScript -->
                </div>
            </div>

            <!-- Right Column - Task Details -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div id="taskPlaceholder" class="placeholder-message">
                    <i class="fas fa-calendar-day text-4xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-500 mb-2">Select a date to view tasks</h3>
                    <p class="text-gray-400">Click on a date with a red dot to see task details</p>
                </div>

                <!-- English Project Task Detail -->
                <div id="englishTask" class="task-detail">
                    <div class="bg-english-pink h-2 w-full"></div>
                    <div class="p-6">
                        <!-- Task Header -->
                        <div class="mb-6">
                            <div class="flex items-center justify-between mb-3">
                                <span
                                    class="inline-block bg-english-pink text-white text-sm font-medium px-3 py-1 rounded-full">English</span>
                                <span
                                    class="inline-block bg-pink-100 text-pink-800 text-xs font-medium px-2 py-1 rounded deadline-badge">
                                    <i class="fas fa-clock mr-1"></i>Due: Today 11.59 PM
                                </span>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-3">English Project</h2>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Exercise 1 on page 15 — Write all the questions and your answers neatly in your
                                notebook. Then, take a clear picture of your work and upload it to the School Reminder
                                website before Thursday at 11.59 PM. Make sure to use complete sentences and check your
                                grammar before submitting.
                            </p>
                        </div>

                        <!-- Divider -->
                        <div class="border-t border-gray-200 my-6"></div>

                        <!-- Teacher Information -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-700 mb-3">Teacher</h3>
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-user text-gray-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800">Mr. Bambang</h4>
                                    <p class="text-gray-600 text-sm">englishteacher@gmail.com</p>
                                </div>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="border-t border-gray-200 my-6"></div>

                        <!-- Deadline Information -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-700 mb-3">Deadline</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="info-box bg-gray-50 p-4 rounded-lg">
                                    <div class="text-sm text-gray-500 mb-1">Date</div>
                                    <div class="font-semibold text-gray-800">22-07-2025</div>
                                </div>
                                <div class="info-box bg-gray-50 p-4 rounded-lg">
                                    <div class="text-sm text-gray-500 mb-1">Time</div>
                                    <div class="font-semibold text-gray-800">11.59 PM</div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-700 mb-3">Submission Details</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="info-box bg-gray-50 p-4 rounded-lg">
                                    <div class="text-sm text-gray-500 mb-1">File Type</div>
                                    <div class="font-semibold text-gray-800">PNG, JPG, JPEG</div>
                                </div>
                                <div class="info-box bg-gray-50 p-4 rounded-lg">
                                    <div class="text-sm text-gray-500 mb-1">Task Code</div>
                                    <div class="font-semibold text-gray-800">H-T</div>
                                </div>
                            </div>
                        </div>



                        <!-- Information Note -->

                        <!-- Informatics Project Task Detail -->
                        <div id="informaticsTask" class="task-detail">
                            <div class="bg-informatics-red h-2 w-full"></div>
                            <div class="p-6">
                                <!-- Task Header -->
                                <div class="mb-6">
                                    <div class="flex items-center justify-between mb-3">
                                        <span
                                            class="inline-block bg-informatics-red text-white text-sm font-medium px-3 py-1 rounded-full">Informatics</span>
                                        <span
                                            class="inline-block bg-red-100 text-red-800 text-xs font-medium px-2 py-1 rounded deadline-badge">
                                            <i class="fas fa-clock mr-1"></i>Due: 4 days
                                        </span>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-800 mb-3">Informatics Project</h2>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        Create a simple website layout using HTML and CSS — Write your code in Visual
                                        Studio
                                        Code
                                        and make sure your page includes a header, navigation bar, main content, and
                                        footer.
                                        Save
                                        your project folder with your name (example: Name_WebProject) and upload it to
                                        the
                                        School
                                        Reminder website.
                                    </p>
                                </div>

                                <!-- Divider -->
                                <div class="border-t border-gray-200 my-6"></div>

                                <!-- Teacher Information -->
                                <div class="mb-6">
                                    <h3 class="font-semibold text-gray-700 mb-3">Teacher</h3>
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center mr-3">
                                            <i class="fas fa-user text-gray-500"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-800">Mr. Mulyono</h4>
                                            <p class="text-gray-600 text-sm">informaticsacher@gmail.com</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Divider -->
                                <div class="border-t border-gray-200 my-6"></div>

                                <!-- Deadline Information -->
                                <div class="mb-6">
                                    <h3 class="font-semibold text-gray-700 mb-3">Deadline</h3>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="info-box bg-gray-50 p-4 rounded-lg">
                                            <div class="text-sm text-gray-500 mb-1">Date</div>
                                            <div class="font-semibold text-gray-800">25-07-2025</div>
                                        </div>
                                        <div class="info-box bg-gray-50 p-4 rounded-lg">
                                            <div class="text-sm text-gray-500 mb-1">Time</div>
                                            <div class="font-semibold text-gray-800">9.00 PM</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Additional Information -->
                                <div class="mb-6">
                                    <h3 class="font-semibold text-gray-700 mb-3">Project Details</h3>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="info-box bg-gray-50 p-4 rounded-lg">
                                            <div class="text-sm text-gray-500 mb-1">Code Platform</div>
                                            <div class="font-semibold text-gray-800">Github</div>
                                        </div>
                                        <div class="info-box bg-gray-50 p-4 rounded-lg">
                                            <div class="text-sm text-gray-500 mb-1">Time Left</div>
                                            <div class="font-semibold text-gray-800">H-4</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- View Details Button -->
                                <div class="mt-8">
                                    <button
                                        class="w-full bg-informatics-red text-white px-4 py-3 rounded-lg hover:bg-red-500 transition-colors flex items-center justify-center">
                                        <i class="fas fa-external-link-alt mr-2"></i>
                                        View Full Task Details
                                    </button>
                                </div>

                                <!-- Information Note -->
                                <div class="mt-4 p-3 bg-blue-50 rounded-lg border border-blue-200">
                                    <div class="flex items-start">
                                        <i class="fas fa-info-circle text-blue-500 mr-2 mt-0.5"></i>
                                        <p class="text-xs text-blue-700">
                                            This calendar view is for deadline tracking only. To submit your project,
                                            please go
                                            to
                                            the Tasks page.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white mt-12 py-6 px-4 border-t border-gray-200">
        <div class="text-center text-gray-600">
            <p>© 2025 School Reminder. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Calendar data
        const calendarData = {
            month: "July 2025",
            days: [
                // Week 1 (29 June - 5 July)
                { day: 29, otherMonth: true },
                { day: 30, otherMonth: true },
                { day: 1 },
                { day: 2 },
                { day: 3 },
                { day: 4 },
                { day: 5 },

                // Week 2 (6-12 July)
                { day: 6 },
                { day: 7 },
                { day: 8 },
                { day: 9 },
                { day: 10 },
                { day: 11 },
                { day: 12 },

                // Week 3 (13-19 July)
                { day: 13 },
                { day: 14 },
                { day: 15 },
                { day: 16 },
                { day: 17 },
                { day: 18 },
                { day: 19 },

                // Week 4 (20-26 July)
                { day: 20 },
                { day: 21 },
                { day: 22, hasTask: true, taskId: "englishTask" },
                { day: 23 },
                { day: 24 },
                { day: 25, hasTask: true, taskId: "informaticsTask" },
                { day: 26 },

                // Week 5 (27 July - 2 August)
                { day: 27 },
                { day: 28 },
                { day: 29 },
                { day: 30 },
                { day: 31 },
                { day: 1, otherMonth: true },
                { day: 2, otherMonth: true }
            ]
        };

        // Function to render calendar
        function renderCalendar() {
            const calendarGrid = document.getElementById('calendarGrid');
            calendarGrid.innerHTML = '';

            calendarData.days.forEach(dayData => {
                const dayElement = document.createElement('div');
                dayElement.className = 'calendar-day bg-gray-50 rounded-lg p-3 h-28 cursor-pointer hover:bg-gray-100 relative';

                if (dayData.otherMonth) {
                    dayElement.classList.add('text-gray-400');
                }

                if (dayData.hasTask) {
                    dayElement.classList.add('has-task');
                }

                // Highlight today's date (12th)
                if (dayData.day === 12) {
                    dayElement.classList.remove('bg-gray-50', 'hover:bg-gray-100');
                    dayElement.classList.add('bg-primary-light', 'text-white', 'hover:bg-primary');
                }

                dayElement.innerHTML = `
                    <div class="day-number">${dayData.day}</div>
                `;

                // Add event listener for clicking on a day
                dayElement.addEventListener('click', () => {
                    // Remove active class from all days
                    document.querySelectorAll('.calendar-day').forEach(day => {
                        day.classList.remove('ring-2', 'ring-primary');
                    });

                    // Add active class to clicked day
                    dayElement.classList.add('ring-2', 'ring-primary');

                    // Show task details if available
                    if (dayData.hasTask && dayData.taskId) {
                        showTaskDetail(dayData.taskId);
                    } else {
                        showTaskPlaceholder();
                    }
                });

                calendarGrid.appendChild(dayElement);
            });
        }

        // Function to show task placeholder
        function showTaskPlaceholder() {
            document.getElementById('taskPlaceholder').style.display = 'flex';
            document.querySelectorAll('.task-detail').forEach(task => {
                task.classList.remove('active');
            });
        }

        // Function to show task detail
        function showTaskDetail(taskId) {
            document.getElementById('taskPlaceholder').style.display = 'none';
            document.querySelectorAll('.task-detail').forEach(task => {
                task.classList.remove('active');
            });
            document.getElementById(taskId).classList.add('active');
        }

        // Initialize calendar when page loads
        document.addEventListener('DOMContentLoaded', () => {
            renderCalendar();
        });

        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Theme toggle
        document.getElementById('theme-toggle').addEventListener('click', function () {
            const icon = this.querySelector('i');
            if (icon.classList.contains('fa-moon')) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
                document.body.classList.add('bg-gray-900', 'text-white');
                document.body.classList.remove('bg-gray-50', 'text-gray-800');
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
                document.body.classList.remove('bg-gray-900', 'text-white');
                document.body.classList.add('bg-gray-50', 'text-gray-800');
            }
        });
    </script>
</body>

</html>