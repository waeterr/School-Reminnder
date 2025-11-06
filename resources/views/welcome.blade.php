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
    </style>
</head>

<body class="bg-gray-50 text-gray-800">
    <!-- Top Navigation Bar -->
    <nav class="bg-white shadow-sm py-4 px-6 flex justify-between items-center sticky top-0 z-10">
        <div class="flex items-center">
            <h1 class="text-xl font-bold text-primary">School Reminder</h1>
        </div>

        <div class="hidden md:flex space-x-6">
            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Home</a>
            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Task</a>
            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Calendar</a>
            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Features</a>
            <a href="#" class="text-gray-600 hover:text-primary transition-colors">How it Works</a>
            <a href="#" class="text-gray-600 hover:text-primary transition-colors">About</a>
        </div>

        <div class="flex items-center space-x-4">
            <!-- Dark/Light Mode Toggle -->
            <button id="theme-toggle" class="p-2 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors">
                <i class="fas fa-moon text-gray-600"></i>
            </button>

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
        <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">Calendar</a>
        <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">Features</a>
        <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">How it Works</a>
        <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">About</a>
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
                <div class="grid grid-cols-7 gap-2">
                    <!-- Empty days before the month starts -->
                    <div></div>
                    <div></div>

                    <!-- Calendar Days -->
                    <div class="calendar-day bg-gray-50 rounded-lg p-3 h-28 cursor-pointer hover:bg-gray-100">
                        <div class="text-right font-medium">1</div>
                        <div class="mt-2 space-y-1">
                            <span
                                class="task-tag bg-math-green text-white text-xs px-2 py-1 rounded-full block">Math</span>
                        </div>
                    </div>

                    <div class="calendar-day bg-gray-50 rounded-lg p-3 h-28 cursor-pointer hover:bg-gray-100">
                        <div class="text-right font-medium">2</div>
                    </div>

                    <div class="calendar-day bg-gray-50 rounded-lg p-3 h-28 cursor-pointer hover:bg-gray-100">
                        <div class="text-right font-medium">3</div>
                        <div class="mt-2 space-y-1">
                            <span
                                class="task-tag bg-english-pink text-white text-xs px-2 py-1 rounded-full block">English</span>
                        </div>
                    </div>

                    <div class="calendar-day bg-gray-50 rounded-lg p-3 h-28 cursor-pointer hover:bg-gray-100">
                        <div class="text-right font-medium">4</div>
                    </div>

                    <div class="calendar-day bg-gray-50 rounded-lg p-3 h-28 cursor-pointer hover:bg-gray-100">
                        <div class="text-right font-medium">5</div>
                        <div class="mt-2 space-y-1">
                            <span
                                class="task-tag bg-informatics-red text-white text-xs px-2 py-1 rounded-full block">Informatics</span>
                        </div>
                    </div>

                    <!-- More days would go here -->
                    <div class="calendar-day bg-gray-50 rounded-lg p-3 h-28 cursor-pointer hover:bg-gray-100">
                        <div class="text-right font-medium">6</div>
                    </div>

                    <div class="calendar-day bg-gray-50 rounded-lg p-3 h-28 cursor-pointer hover:bg-gray-100">
                        <div class="text-right font-medium">7</div>
                    </div>

                    <div class="calendar-day bg-gray-50 rounded-lg p-3 h-28 cursor-pointer hover:bg-gray-100">
                        <div class="text-right font-medium">8</div>
                    </div>

                    <div class="calendar-day bg-gray-50 rounded-lg p-3 h-28 cursor-pointer hover:bg-gray-100">
                        <div class="text-right font-medium">9</div>
                        <div class="mt-2 space-y-1">
                            <span
                                class="task-tag bg-history-yellow text-white text-xs px-2 py-1 rounded-full block">History</span>
                        </div>
                    </div>

                    <div class="calendar-day bg-gray-50 rounded-lg p-3 h-28 cursor-pointer hover:bg-gray-100">
                        <div class="text-right font-medium">10</div>
                    </div>

                    <div class="calendar-day bg-gray-50 rounded-lg p-3 h-28 cursor-pointer hover:bg-gray-100">
                        <div class="text-right font-medium">11</div>
                        <div class="mt-2 space-y-1">
                            <span
                                class="task-tag bg-math-green text-white text-xs px-2 py-1 rounded-full block">Math</span>
                            <span
                                class="task-tag bg-english-pink text-white text-xs px-2 py-1 rounded-full block">English</span>
                        </div>
                    </div>

                    <!-- Today's date highlighted -->
                    <div
                        class="calendar-day bg-primary-light rounded-lg p-3 h-28 cursor-pointer text-white hover:bg-primary">
                        <div class="text-right font-medium">12</div>
                        <div class="mt-2 space-y-1">
                            <span
                                class="task-tag bg-white text-primary text-xs px-2 py-1 rounded-full block">Informatics</span>
                        </div>
                    </div>

                    <!-- More days would continue... -->
                    <div class="calendar-day bg-gray-50 rounded-lg p-3 h-28 cursor-pointer hover:bg-gray-100">
                        <div class="text-right font-medium">13</div>
                    </div>

                    <div class="calendar-day bg-gray-50 rounded-lg p-3 h-28 cursor-pointer hover:bg-gray-100">
                        <div class="text-right font-medium">14</div>
                    </div>

                    <!-- Continue with the rest of the month -->
                </div>
            </div>

            <!-- Right Column - Task Detail -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-english-pink h-2 w-full"></div>
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-2">Essay: Modern Literature Analysis</h2>
                    <p class="text-gray-600 mb-6">Write a 1500-word analysis of themes in contemporary literature,
                        focusing on at least three works published in the last decade.</p>

                    <div class="mb-6">
                        <h3 class="font-semibold text-gray-700 mb-2">Instructions:</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Select three contemporary literary works</li>
                            <li>Analyze common themes across these works</li>
                            <li>Discuss how these themes reflect modern society</li>
                            <li>Include proper citations and bibliography</li>
                            <li>Submit in PDF format</li>
                        </ul>
                    </div>

                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user text-gray-500"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold">Dr. Sarah Johnson</h3>
                            <p class="text-gray-600 text-sm">s.johnson@university.edu</p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="font-semibold text-gray-700 mb-2">Due Date:</h3>
                        <div class="flex items-center text-gray-600">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>July 12, 2025 - 11:59 PM</span>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-semibold text-gray-700 mb-2">Attachments:</h3>
                        <div class="space-y-2">
                            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                <i class="far fa-file-pdf text-red-500 mr-3"></i>
                                <div>
                                    <p class="font-medium">Assignment Guidelines.pdf</p>
                                    <p class="text-xs text-gray-500">245 KB</p>
                                </div>
                                <button class="ml-auto text-primary hover:text-primary-light">
                                    <i class="fas fa-download"></i>
                                </button>
                            </div>

                            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                <i class="far fa-file-word text-blue-500 mr-3"></i>
                                <div>
                                    <p class="font-medium">Recommended Reading.docx</p>
                                    <p class="text-xs text-gray-500">512 KB</p>
                                </div>
                                <button class="ml-auto text-primary hover:text-primary-light">
                                    <i class="fas fa-download"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex space-x-4">
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
    </main>

    <!-- Footer with Contact Form -->


    <div class="text-center mt-8 text-gray-600">
        <p>© 2025 School Reminder. All rights reserved.</p>
    </div>
    </div>
    </footer>

    <!-- Task Detail Modal -->
    <div id="task-modal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-20 modal hidden">
        <div class="bg-white rounded-xl shadow-lg max-w-md w-full mx-4">
            <div class="bg-math-green h-2 w-full"></div>
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold">Algebra Homework</h3>
                    <button id="close-modal" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <p class="text-gray-600 mb-4">Complete exercises 1-20 from chapter 5 on quadratic equations.</p>

                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-user text-gray-500"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold">Mr. Davis</h4>
                        <p class="text-gray-600 text-sm">mdavis@school.edu</p>
                    </div>
                </div>

                <div class="mb-4">
                    <h4 class="font-semibold text-gray-700 mb-1">Due Date:</h4>
                    <p class="text-gray-600">July 11, 2025</p>
                </div>

                <button
                    class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-light transition-colors w-full">
                    View Full Details
                </button>
            </div>
        </div>
    </div>

    <script>

        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });




        const form = document.querySelector('form');
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const message = document.getElementById('message');
            let isValid = true;


            document.getElementById('name-error').classList.add('hidden');
            document.getElementById('email-error').classList.add('hidden');
            document.getElementById('message-error').classList.add('hidden');


            if (!name.value.trim()) {
                document.getElementById('name-error').classList.remove('hidden');
                isValid = false;
            }


            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value)) {
                document.getElementById('email-error').classList.remove('hidden');
                isValid = false;
            }


            if (!message.value.trim()) {
                document.getElementById('message-error').classList.remove('hidden');
                isValid = false;
            }

            if (isValid) {
                alert('Message sent successfully!');
                form.reset();
            }
        });

        // Modal functionality
        const calendarDays = document.querySelectorAll('.calendar-day');
        const modal = document.getElementById('task-modal');
        const closeModal = document.getElementById('close-modal');

        calendarDays.forEach(day => {
            day.addEventListener('click', function () {
                modal.classList.remove('hidden');
            });
        });

        closeModal.addEventListener('click', function () {
            modal.classList.add('hidden');
        });

        // Close modal when clicking outside
        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    </script>
</body>

</html>