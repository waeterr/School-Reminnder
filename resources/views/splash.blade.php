<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Reminder - Home</title>
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

        /* Splash Screen Styles */
        .splash-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #6366f1 0%, #818cf8 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        .splash-logo {
            width: 120px;
            height: 120px;
            margin-bottom: 20px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .splash-logo img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

        .splash-text {
            color: white;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }

        .splash-subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
            margin-bottom: 30px;
            text-align: center;
            max-width: 500px;
            line-height: 1.6;
        }

        .loading-bar {
            width: 200px;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 2px;
            overflow: hidden;
        }

        .loading-progress {
            height: 100%;
            background: white;
            width: 0%;
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        .splash-hidden {
            opacity: 0;
            visibility: hidden;
        }

        /* Home Page Styles */
        .hero-section {
            background: linear-gradient(135deg, #6366f1 0%, #818cf8 100%);
            border-radius: 20px;
            overflow: hidden;
        }

        .feature-card {
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">
     Splash Screen -->
<!-- <div id="splash-screen" class="splash-screen">
    <div class="splash-logo">

      
        <div class="text-white text-4xl">
            <i class="fas fa-book-open"></i>
        </div>
    </div>
    <h1 class="splash-text">School Reminder</h1>

    <div class="loading-bar">
        <div id="loading-progress" class="loading-progress"></div>
    </div>
</div>

 Top Navigation Bar -->
<!-- <nav class="bg-white shadow-sm py-4 px-6 flex justify-between items-center sticky top-0 z-10">
    <div class="flex items-center">
        <h1 class="text-xl font-bold text-primary">School Reminder</h1>
    </div>

    <div class="hidden md:flex space-x-6">
        <a href="#" class="text-primary font-medium">Home</a>
        <a href="#" class="text-gray-600 hover:text-primary transition-colors">Task</a>
        <a href="#" class="text-gray-600 hover:text-primary transition-colors">Calendar</a>
        <a href="#" class="text-gray-600 hover:text-primary transition-colors">Features</a>
        <a href="#" class="text-gray-600 hover:text-primary transition-colors">How it Works</a>
        <a href="#" class="text-gray-600 hover:text-primary transition-colors">About</a>
    </div>

    <div class="flex items-center space-x-4">
         Dark/Light Mode Toggle 
<button id="theme-toggle" class="p-2 rounded-full bg-gray-100 hover:bg-gray-200 transition-colors">
    <i class="fas fa-moon text-gray-600"></i>
</button>-->

<!-- My Account Button 
        <button
            class="border border-primary text-primary px-4 py-2 rounded-lg hover:bg-primary hover:text-white transition-colors">
            My Account
        </button>

        Mobile Menu Button -->
<!--<button id="mobile-menu-button" class="md:hidden text-gray-600">
    <i class="fas fa-bars text-xl"></i>
</button>
</div>
</nav>

Mobile Menu -->
<!--<div id="mobile-menu" class="md:hidden bg-white shadow-md py-2 px-4 hidden">
    <a href="#" class="block py-2 text-primary font-medium">Home</a>
    <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">Task</a>
    <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">Calendar</a>
    <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">Features</a>
    <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">How it Works</a>
    <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">About</a>
</div>

Main Content - Home Page -->
<!--<main class="container mx-auto px-4 py-8 max-w-7xl">
     Hero Section -->
<!--<div class="hero-section text-white p-8 md:p-12 mb-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold mb-4">The Best Partner to Reach Fluency</h1>
                <p class="text-lg md:text-xl mb-6 opacity-90">
                    As an e-learning platform which facilitate two-way interaction between students and teachers,
                    SchoolReminder enables you to learn anywhere.
                </p>
                <div class="flex flex-wrap gap-4">
                    <button
                        class="bg-white text-primary px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Get Started
                    </button>
                    <button
                        class="border border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary transition-colors">
                        Learn More
                    </button>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="bg-white/20 rounded-2xl p-6 backdrop-blur-sm">
                    <div class="text-6xl text-white text-center">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    Features Section -->
<!--<div class="mb-16">
        <h2 class="text-3xl font-bold text-center mb-12">Why Choose School Reminder?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="feature-card bg-white p-6 rounded-xl shadow-md border-l-4 border-primary">
                <div class="text-3xl text-primary mb-4">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Interactive Learning</h3>
                <p class="text-gray-600">
                    Two-way interaction between students and teachers for effective learning experience.
                </p>
            </div>

            <div class="feature-card bg-white p-6 rounded-xl shadow-md border-l-4 border-english">
                <div class="text-3xl text-english mb-4">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Learn Anywhere</h3>
                <p class="text-gray-600">
                    Access your courses and assignments from any device, anytime, anywhere.
                </p>
            </div>

            <div class="feature-card bg-white p-6 rounded-xl shadow-md border-l-4 border-math">
                <div class="text-3xl text-math mb-4">
                    <i class="fas fa-tasks"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Smart Reminders</h3>
                <p class="text-gray-600">
                    Never miss a deadline with our intelligent task and assignment tracking system.
                </p>
            </div>
        </div>
    </div>

     Quick Stats -->
<!--<div class="bg-white rounded-xl shadow-md p-8 mb-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div>
                <div class="text-3xl font-bold text-primary mb-2">1.2K+</div>
                <div class="text-gray-600">Active Students</div>
            </div>
            <div>
                <div class="text-3xl font-bold text-english mb-2">150+</div>
                <div class="text-gray-600">Expert Teachers</div>
            </div>
            <div>
                <div class="text-3xl font-bold text-math mb-2">500+</div>
                <div class="text-gray-600">Courses</div>
            </div>
            <div>
                <div class="text-3xl font-bold text-informatics mb-2">95%</div>
                <div class="text-gray-600">Success Rate</div>
            </div>
        </div>
    </div>

     Recent Tasks Preview -->
<!--<div class="mb-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Recent Tasks</h2>
            <a href="#" class="text-primary hover:text-primary-light transition-colors font-semibold">
                View All Tasks <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            < English Task 
            <div class="task-card bg-white rounded-xl shadow-md overflow-hidden border-l-4 border-english">
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
                            Exercise 1 on page 15 – Write all the questions and your answers neatly in your
                            notebook.
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
                </div>
            </div>

             Math Task 
            <div class="task-card bg-white rounded-xl shadow-md overflow-hidden border-l-4 border-math">
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
                </div>
            </div>

             Informatics Task 
            <div class="task-card bg-white rounded-xl shadow-md overflow-hidden border-l-4 border-informatics">
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
                </div>
            </div>
        </div>
    </div>
</main>

 Simple Footer 
<footer class="bg-white mt-12 py-8 px-4 border-t border-gray-200">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <div>
                <h3 class="font-bold text-lg mb-4">School Reminder</h3>
                <p class="text-gray-600">
                    The best e-learning platform for interactive learning between students and teachers.
                </p>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-4">Quick Links</h3>
                <ul class="space-y-2 text-gray-600">
                    <li><a href="#" class="hover:text-primary transition-colors">Home</a></li>
                    <li><a href="#" class="hover:text-primary transition-colors">Tasks</a></li>
                    <li><a href="#" class="hover:text-primary transition-colors">Calendar</a></li>
                    <li><a href="#" class="hover:text-primary transition-colors">Reminder</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-4">Support</h3>
                <ul class="space-y-2 text-gray-600">
                    <li><a href="#" class="hover:text-primary transition-colors">Help Center</a></li>
                    <li><a href="#" class="hover:text-primary transition-colors">About Us</a></li>
                    <li><a href="#" class="hover:text-primary transition-colors">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-4">Connect With Us</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-600 hover:text-primary transition-colors">
                        <i class="fab fa-facebook text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-primary transition-colors">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-primary transition-colors">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-primary transition-colors">
                        <i class="fab fa-linkedin text-xl"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="text-center text-gray-600 border-t border-gray-200 pt-8">
            <p>© 2025 School Reminder. All rights reserved.</p>
        </div>
    </div>
</footer>

<script>
    // Splash Screen Functionality
    document.addEventListener('DOMContentLoaded', function () {
        const splashScreen = document.getElementById('splash-screen');
        const loadingProgress = document.getElementById('loading-progress');

        // Simulate loading progress
        let progress = 0;
        const interval = setInterval(() => {
            progress += Math.random() * 15;
            if (progress >= 100) {
                progress = 100;
                clearInterval(interval);

                // Hide splash screen after loading completes
                setTimeout(() => {
                    splashScreen.classList.add('splash-hidden');
                    // Remove splash screen from DOM after animation completes
                    setTimeout(() => {
                        splashScreen.style.display = 'none';
                    }, 500);
                }, 500);
            }
            loadingProgress.style.width = progress + '%';
        }, 200);
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