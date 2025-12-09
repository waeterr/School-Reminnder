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
        <img src="{{'images/logo.png'}}" alt="School Reminder Logo" class="h-10">
    </div>

    <!-- MAIN CONTENT -->
    <div id="main" class="hidden">

        <!-- NAVBAR -->
        <nav class="flex justify-between items-center px-6 py-6 shadow md:px-12 md:py-6">
            <div class="text-xl flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="school logo" class="h-10 w-auto md:h-12" />
            </div>

            {{-- Desktop Menu --}}
            <ul class="hidden md:flex gap-10 font-semibold">
                <li><a href="#" class="px-6 py-2 bg-[#28477E] text-white rounded-full">Home</a></li>
                <li><a href="{{ url('login') }}" class="hover:text-blue-600">Task</a></li>
                <li><a href="{{ url('login') }}" class="hover:text-blue-600">Calendar</a></li>
                <li><a href="#" class="hover:text-blue-600">Reminder</a></li>
                <li><a href="{{ url('about-us') }}" class="hover:text-blue-600">About Us</a></li>
            </ul>

            <div class="hidden md:flex items-center space-x-3">
                <a href="{{ route('login') }}"
                    class="border border-[#3A71C1] px-4 py-1 rounded-full hover:bg-[#3A71C1] hover:text-white transition">
                    Log in
                </a>
                <a href="{{ route('signup') }}"
                    class="bg-[#1B2A4E] text-white px-4 py-1 rounded-full hover:opacity-80 transition">
                    Get Started
                </a>
            </div>

            <!-- MOBILE BUTTON -->
            <button id="hamburger" class="md:hidden p-2 focus:outline-none">
                <svg class="w-7 h-7 text-[#1B2A4E]" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </nav>

        <!-- MOBILE MENU -->
        <div id="mobileMenu"
            class="fixed top-0 left-0 w-64 h-full bg-white shadow-lg z-50 transform -translate-x-full transition-transform duration-300 md:hidden">

            <div class="p-5 flex justify-between items-center border-b">
                <div class="flex items-center space-x-2">
                    <img src="{{'images/logo.png'}}" class="h-8">
                    <p class="font-semibold text-[#1B2A4E] text-lg">Menu</p>
                </div>

                <button id="closeMenu">
                    <svg class="w-7 h-7 text-[#1B2A4E]" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <ul class="flex flex-col space-y-4 p-6 text-[#1B2A4E] font-medium">
                <li><a href="{{ route('onboard') }}" class="text-white bg-[#3A71C1] px-4 py-2 block rounded-lg">Home</a>
                </li>
                <li><a href="{{ route('login') }}" class="hover:text-[#3A71C1] block">Task</a></li>
                <li><a href="{{ route('login') }}" class="hover:text-[#3A71C1] block">Calendar</a></li>
                <li><a href="#" class="hover:text-[#3A71C1] block">Reminder</a></li>
                <li><a href="{{ route('about-us') }}" class="hover:text-[#3A71C1] block">About Us</a></li>

                <hr class="my-3">

                <li><a href="{{ route('login') }}"
                        class="border border-[#3A71C1] px-4 py-2 block rounded-lg text-center hover:bg-[#3A71C1] hover:text-white transition">
                        Log In
                    </a>
                </li>
                <li><a href="{{ route('signup') }}"
                        class="bg-[#1B2A4E] text-white px-4 py-2 block rounded-lg text-center hover:opacity-80 transition">
                        Get Started
                    </a>
                </li>
            </ul>
        </div>


        <!-- ONBOARDING SECTION -->
        <section
            class="flex flex-col justify-center items-start px-6 md:px-20 flex-grow relative overflow-hidden h-screen">

            <div id="slides" class="w-full max-w-4xl fade opacity-100">
                <!-- Slide 1 -->
                <div class="slide active">
                    <h2 class="text-xl md:text-2xl text-[#3A71C1] font-semibold">Online Education</h2>
                    <h1 class="text-3xl md:text-4xl font-bold">Feels Like Real Classroom</h1>
                </div>

                <!-- Slide 2 -->
                <div class="slide hidden">
                    <h2 class="text-xl md:text-2xl text-[#3A71C1] font-semibold">Innovative Learning</h2>
                    <h1 class="text-3xl md:text-4xl font-bold">for a Changing World</h1>
                </div>

                <!-- Slide 3 -->
                <div class="slide hidden">
                    <h2 class="text-xl md:text-2xl text-[#3A71C1] font-semibold">“Unlock your Potential with us”</h2>
                    <h1 class="text-2xl md:text-3xl font-bold leading-snug">–Explore, Learn, and Grow!</h1>
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

        setTimeout(() => {
            splash.classList.add('hidden');
            main.classList.remove('hidden');
        }, 2500);

        // SLIDER
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        const slideContainer = document.getElementById('slides');
        let index = 0;

        function showSlide(n) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('hidden', i !== n);
                dots[i].classList.toggle('bg-[#3A71C1]', i === n);
                dots[i].classList.toggle('bg-gray-300', i !== n);
            });
        }

        function nextSlide() {
            index = (index + 1) % slides.length;
            showSlide(index);
        }

        setInterval(nextSlide, 4000);


        // MOBILE MENU
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');
        const closeMenu = document.getElementById('closeMenu');

        hamburger.onclick = () => mobileMenu.classList.remove("-translate-x-full");
        closeMenu.onclick = () => mobileMenu.classList.add("-translate-x-full");
    </script>

</body>

</html>