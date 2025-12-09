<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Reminder - Home Student</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .hero-bg-wave {
            background: url('');
            /* GANTI NANTI DENGAN WAVY SHAPE BAWAH */
            background-size: cover;
            background-repeat: no-repeat;
        }

        /* Splash */
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

<body class="bg-white min-h-screen flex flex-col overflow-x-hidden">

    <!-- SPLASH SCREEN -->
    <div id="splash" class="fixed inset-0 flex flex-col items-center justify-center bg-white z-50 splash-animate">
        <!-- Ganti logo splash -->
        <div class="w-20 h-20 bg-gray-200 rounded-full"></div>

    </div>

    <!-- MAIN CONTENT -->
    <div id="main" class="hidden">

        <!-- NAVBAR -->
        <nav class="w-full flex justify-between items-center px-10 py-4 shadow-sm">
            <div class="flex items-center space-x-2">

                <!-- LOGO -->
                <div class="w-10 h-10 rounded-md">
                    <img src="images/logo.png" alt="">
                </div>

                <h1 class="font-semibold text-[#1B2A4E] text-lg">
                    School <span class="text-[#3A71C1]">Reminder</span>
                </h1>
            </div>

            <div class="hidden md:flex space-x-7 text-[#1B2A4E] font-medium">
                <a href="{{ route('homestudent') }}" class="text-white bg-[#3A71C1] px-4 py-1 rounded-full">Home</a>
                <a href="{{ route('task') }}" class="hover:text-[#3A71C1]">Task</a>
                <a href="{{ route('calendar') }}" class="hover:text-[#3A71C1]">Calendar</a>
                <a href="#" class="hover:text-[#3A71C1]">Reminder</a>
                <a href="#" class="hover:text-[#3A71C1]">About Us</a>
            </div>

            <div class="flex items-center space-x-3">
                <a href="#"
                    class="border border-[#3A71C1] px-4 py-1 rounded-full hover:bg-[#3A71C1] hover:text-white transition">
                    Sign In
                </a>
                <a href="#" class="bg-[#1B2A4E] text-white px-4 py-1 rounded-full hover:opacity-80 transition">
                    Log In
                </a>
            </div>
        </nav>

        <!-- HERO SECTION -->
        <section class="px-10 mt-20 flex flex-col md:flex-row items-center justify-between">

            <!-- LEFT TEXT -->
            <div class="max-w-xl">
                <div class="flex items-center gap-2 bg-[#3A71C1] text-white rounded-full px-4 py-1 w-fit">
                    <div class="w-4 h-4 rounded-full"></div>
                        <img src="{{'images/rocket.png'}}" alt="Rocket Icon" class="w-4 h-4">
                    <span>No. 1 platform for learning</span>
                </div>

                <h1 class="text-4xl md:text-5xl font-bold text-black mt-4 leading-tight">
                    The Best Partner to <br> Reach Fluency
                </h1>

                <p class="text-gray-700 text-md mt-4 leading-relaxed">
                    As an e-learning platform which facilitate two-way
                    interaction between students and teachers,
                    SchoolReminder enables you to learn anywhere.
                </p>
            </div>

            <!-- RIGHT IMAGE -->
            <div class="mt-10 md:mt-0 md:ml-10">
                <!-- Placeholder gambar anime -->
                <img src="{{ asset('images/hero-image.png') }}" alt="Hero Image"
                    class="w-[330px] h-[330px] object-cover rounded-lg">
                <!-- GANTI dengan <img src=""> -->
            </div>
        </section>
        <!-- OUR SERVICE SECTION -->
        <section class="bg-[#1A2E4F] w-full py-16 mt-20">

            <h2 class="text-center text-white text-2xl font-semibold mb-10">
                Our Service
            </h2>

            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-6">

                <!-- CARD 1 -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 text-center shadow-md">
                    <div
                        class="w-16 h-16 mx-auto rounded-full bg-gradient-to-b from-white to-gray-300 flex items-center justify-center shadow">
                        <img src="{{ asset('images/classplanner.png') }}" alt="ClassPlanner" class="w-8">
                    </div>
                    <p class="text-white font-semibold mt-4">ClassPlanner</p>
                    <p class="text-gray-300 text-sm mt-2">Atur, ubah, dan kelola jadwal pelajaran siswa!</p>
                </div>

                <!-- CARD 2 -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 text-center shadow-md">
                    <div
                        class="w-16 h-16 mx-auto rounded-full bg-gradient-to-b from-white to-gray-300 flex items-center justify-center shadow">
                        <img src="{{ asset('images/bell.png') }}" alt="Bell" class="w-8">
                    </div>
                    <p class="text-white font-semibold mt-4">DeadlineBuzz</p>
                    <p class="text-gray-300 text-sm mt-2">Reminder otomatis disaat dekat deadline tugas siswa!</p>
                </div>

                <!-- CARD 3 -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 text-center shadow-md">
                    <div
                        class="w-16 h-16 mx-auto rounded-full bg-gradient-to-b from-white to-gray-300 flex items-center justify-center shadow">
                        <img src="{{ asset('images/teacher.png') }}" alt="Teacher" class="w-8">
                    </div>
                    <p class="text-white font-semibold mt-4">TeacherTask</p>
                    <p class="text-gray-300 text-sm mt-2">Tempat untuk para guru memberikan tugas / ujian</p>
                </div>

                <!-- CARD 4 -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 text-center shadow-md">
                    <div
                        class="w-16 h-16 mx-auto rounded-full bg-gradient-to-b from-white to-gray-300 flex items-center justify-center shadow">
                        <img src="{{ asset('images/book.png') }}" alt="Book" class="w-8">
                    </div>
                    <p class="text-white font-semibold mt-4">MyTaskBook</p>
                    <p class="text-gray-300 text-sm mt-2">Tempat siswa mengelola tugas sebelum deadline menyerang</p>
                </div>

                <!-- CARD 5 -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 text-center shadow-md">
                    <div
                        class="w-16 h-16 mx-auto rounded-full bg-gradient-to-b from-white to-gray-300 flex items-center justify-center shadow">
                        <img src="{{ asset('images/alert.png') }}" alt="Alert" class="w-8">
                    </div>
                    <p class="text-white font-semibold mt-4">PingAlert</p>
                    <p class="text-gray-300 text-sm mt-2">Notifikasi cepat buat tugas yang kelewat</p>
                </div>

                <!-- CARD 6 -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 text-center shadow-md">
                    <div
                        class="w-16 h-16 mx-auto rounded-full bg-gradient-to-b from-white to-gray-300 flex items-center justify-center shadow">
                        <img src="{{ asset('images/history.png') }}" alt="History" class="w-8">
                    </div>
                    <p class="text-white font-semibold mt-4">HistoryLine</p>
                    <p class="text-gray-300 text-sm mt-2">Tempat menyimpan semua aktivitas guru atau pun siswa</p>
                </div>

            </div>
        </section>



        <!-- FOOTER (LIKE THE PICTURE) -->
        <footer class="bg-[#E4E4E4] py-10 text-center">

            <!-- TITLE "School" -->
            <h3 class="text-2xl font-semibold mb-3">
                <span class="text-[#132442]">Schoo</span><span class="text-[#F4C542]">L</span>
            </h3>

            <!-- MENU -->
            <div class="flex justify-center gap-6 mt-3 text-sm font-medium text-[#132442]">
                <a href="#" class="hover:underline">About</a>
                <a href="#" class="hover:underline">Contact</a>
                <a href="#" class="hover:underline">Terms Of Service</a>
                <a href="#" class="hover:underline">Privacy Policy</a>
            </div>

            <!-- SOCIAL ICONS -->
            <div class="flex justify-center gap-4 mt-6">
                <img src="{{ asset('images/X-logo.png') }}" alt="X" class="w-6">
                <img src="{{ asset('images/instagram.png') }}" alt="Instagram" class="w-6">
                <img src="{{ asset('images/facebook.png') }}" alt="Facebook" class="w-6">
            </div>

            <!-- COPYRIGHT -->
            <p class="text-[#132442] text-sm mt-6">
                All Rights Reserved
            </p>
        </footer>

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