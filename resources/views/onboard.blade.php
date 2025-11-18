<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Reminder - Onboarding</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Fade transition */
        .fade {
            transition: opacity 0.8s ease-in-out;
        }

        /* Fade in-out splash animation */
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
        <!-- Ganti src dengan logo kamu -->
        <img src="{{ asset('school-reminder-logo.jpg') }}" alt="School Reminder Logo" class="h-10">
        <h1 class="text-2xl font-semibold text-[#1B2A4E]">School Reminder</h1>
    </div>

    <!-- MAIN CONTENT (HIDDEN BY DEFAULT) -->
    <div id="main" class="hidden">

        <!-- NAVBAR -->
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
                <a href="#" class="text-white bg-[#3A71C1] px-4 py-1 rounded-full">Home</a>
                <a href="#" class="hover:text-[#3A71C1]">Task</a>
                <a href="#" class="hover:text-[#3A71C1]">Calendar</a>
                <a href="#" class="hover:text-[#3A71C1]">Features</a>
                <a href="#" class="hover:text-[#3A71C1]">How it Works</a>
                <a href="#" class="hover:text-[#3A71C1]">Contact Us</a>
            </div>

            <div class="flex items-center space-x-3">
                <a href="{{ route('login') }}"
                    class="border border-[#3A71C1] px-4 py-1 rounded-full hover:bg-[#3A71C1] hover:text-white transition">
                    Log in
                </a>
                <a href="{{ route('signup') }}"
                    class="bg-[#1B2A4E] text-white px-4 py-1 rounded-full hover:opacity-80 transition">
                    Get Started
                </a>
            </div>
        </nav>


        <!-- ONBOARDING SECTION -->
        <section class="flex flex-col justify-center items-start px-20 flex-grow relative overflow-hidden h-screen">
            <!-- Slides Container -->
            <div id="slides" class="w-full max-w-4xl fade opacity-100 transition-opacity duration-700">
                <!-- Slide 1 -->
                <div class="slide active">
                    <h2 class="text-2xl text-[#3A71C1] font-semibold">Online Education</h2>
                    <h1 class="text-4xl font-bold text-black">Feels Like Real Classroom</h1>
                </div>

                <!-- Slide 2 -->
                <div class="slide hidden">
                    <h2 class="text-2xl text-[#3A71C1] font-semibold">Innovative Learning</h2>
                    <h1 class="text-4xl font-bold text-black">for a Changing World</h1>
                </div>

                <!-- Slide 3 -->
                <div class="slide hidden">
                    <h2 class="text-2xl text-[#3A71C1] font-semibold">“Unlock your Potential with us”</h2>
                    <h1 class="text-3xl font-bold text-black leading-snug">
                        –Explore, Learn, and Grow!
                    </h1>
                    <p class="mt-4 text-gray-500 max-w-md leading-relaxed">
                        Welcome to SchoolReminder, where your journey to knowledge begins!
                        Join our community and unlock your full potential with interactive
                        and engaging learning experiences.
                    </p>
                </div>
            </div>

            <!-- Navigation Dots -->
            <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex space-x-3">
                <div class="dot w-3 h-3 rounded-full bg-[#3A71C1] opacity-80"></div>
                <div class="dot w-3 h-3 rounded-full bg-gray-300"></div>
                <div class="dot w-3 h-3 rounded-full bg-gray-300"></div>
            </div>
        </section>
    </div>

    <script>
        const splash = document.getElementById('splash');
        const main = document.getElementById('main');
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        const slideContainer = document.getElementById('slides');
        let index = 0;

        // Show main after splash
        setTimeout(() => {
            splash.classList.add('hidden');
            main.classList.remove('hidden');
        }, 2500);

        // Slide change logic
        function showSlide(n) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('hidden', i !== n);
                dots[i].classList.toggle('bg-[#3A71C1]', i === n);
                dots[i].classList.toggle('bg-gray-300', i !== n);
            });
            slideContainer.classList.remove('opacity-0');
            setTimeout(() => slideContainer.classList.add('opacity-100'), 100);
        }

        function nextSlide() {
            slideContainer.classList.add('opacity-0');
            setTimeout(() => {
                index = (index + 1) % slides.length;
                showSlide(index);
            }, 500);
        }

        setInterval(nextSlide, 4000);
    </script>

</body>

</html>