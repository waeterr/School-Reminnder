<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Reminder - Onboarding</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .fade {
            transition: opacity 0.8s ease-in-out;
        }

        @keyframes fadeSplash {

            0%,
            100% {
                opacity: 0;
            }

            10%,
            90% {
                opacity: 1;
            }
        }

        .splash-animate {
            animation: fadeSplash 2.5s ease-in-out forwards;
        }
    </style>
</head>

<body class="bg-white min-h-screen flex flex-col">

    <!-- SPLASH SCREEN -->
    <div id="splash" class="fixed inset-0 flex flex-col items-center justify-center bg-white z-50 splash-animate">
        <img src="{{ asset('school-reminder-logo.jpg') }}" alt="School Reminder Logo" class="h-10">
        <h1 class="text-2xl font-semibold text-[#1B2A4E]">School Reminder</h1>
    </div>

    <!-- MAIN CONTENT -->
    <div id="main" class="hidden">

        <!-- NAVBAR -->
        <nav class="w-full flex justify-between items-center px-10 py-4 shadow-sm">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-gray-200 rounded"></div>
                <h1 class="font-semibold text-[#1B2A4E] text-lg">
                    School <span class="text-[#3A71C1]">Reminder</span>
                </h1>
            </div>

            <div class="hidden md:flex space-x-6 text-[#1B2A4E]">
                <a href="{{ route('welcome') }}" class="hover:text-[#3A71C1]">Home</a>
                <a href="{{ route('task') }}" class="hover:text-[#3A71C1]">Task</a>
                <a href="{{ route('calendar') }}" class="hover:text-[#3A71C1]">Calendar</a>
                <a href="#" class="hover:text-[#3A71C1]">Features</a>
                <a href="#" class="hover:text-[#3A71C1]">How it Works</a>
                <a href="#" class="hover:text-[#3A71C1]">About</a>
            </div>

            <div class="flex items-center space-x-3">
                <a href="{{ route('signup') }}" class="text-[#1B2A4E] hover:text-[#3A71C1]">Sign up</a>
                <a href="{{ route('login') }}"
                    class="border border-[#3A71C1] text-[#3A71C1] px-4 py-1 rounded-full hover:bg-[#3A71C1] hover:text-white transition">
                    Log in
                </a>
            </div>
        </nav>

        <!-- HERO TEXT -->
        <section class="px-10 mt-10 max-w-3xl">
            <h2 class="text-lg md:text-xl text-[#3A71C1] font-semibold">
                No. 1 platform for learning
            </h2>
            <h1 class="text-4xl md:text-5xl font-bold text-black mt-2 leading-tight">
                The Best Partner to Reach Fluency
            </h1>

            <h4 class="text-md text-black mt-4 leading-relaxed">
                As an e-learning platform which facilitate two-way interaction between students and teachers,
                SchoolReminder enables you to learn anywhere.
            </h4>
        </section>


        <!-- FOOTER (SAMA PERSIS KAYAK DI FOTO) -->
        <footer class="bg-gray-300 mt-20 py-10 text-center">
            <h3 class="text-lg font-semibold">School Reminder</h3>

            <div class="flex justify-center gap-6 mt-4 text-sm text-gray-700">
                <a href="#">About</a>
                <a href="#">Contact</a>
                <a href="#">Terms Of Service</a>
                <a href="#">Privacy Policy</a>
            </div>

            <div class="flex justify-center gap-4 mt-5">
                <img src="icon-ig.png" class="w-6" alt="Instagram">
                <img src="icon-x.png" class="w-6" alt="Twitter/X">
                <img src="icon-fb.png" class="w-6" alt="Facebook">
            </div>

            <p class="text-gray-600 text-sm mt-6">All Rights Reserved</p>
        </footer>

    </div>

    <script>
        const splash = document.getElementById('splash');
        const main = document.getElementById('main');

        setTimeout(() => {
            splash.classList.add('hidden');
            main.classList.remove('hidden');
        }, 2500);
    </script>

</body>

</html>