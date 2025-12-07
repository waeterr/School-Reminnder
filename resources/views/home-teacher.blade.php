<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Reminder - Homescreen Teacher</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Jakarta Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="text-gray-900" style="font-family: 'Plus Jakarta Sans', sans-serif !important;">

    {{-- NAVBAR --}}
    <nav class="flex justify-between items-center px-6 py-4 shadow md:px-12 md:py-6">
        <div class="text-xl flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="school logo" class="h-10 w-auto md:h-12" />
            <h1 class="font-semibold text-[#1B2A4E] text-lg">
                School <span class="text-[#3A71C1]">Reminder</span>
            </h1>
        </div>

        {{-- Desktop Menu --}}
        <ul class="hidden md:flex gap-10 font-semibold">
            <li><a href="#" class="px-6 py-2 bg-[#28477E] text-white rounded-full">Home</a></li>
            <li><a href="{{ url('task-teacher') }}" class="hover:text-blue-600">Task</a></li>
            <li><a href="#" class="hover:text-blue-600">Calendar</a></li>
            <li><a href="#" class="hover:text-blue-600">Features</a></li>
            <li><a href="{{ url('aboutuslog') }}" class="hover:text-blue-600">About Us</a></li>
        </ul>

        {{-- Mobile Menu Button (Hamburger) --}}
    <button id="menuBtn" class="md:hidden flex flex-col gap-1.5 p-2 rounded-lg border border-gray-800 transition-all">
        <span class="bar1 block w-6 h-0.5 bg-gray-800 transition-all"></span>
        <span class="bar2 block w-6 h-0.5 bg-gray-800 transition-all"></span>
        <span class="bar3 block w-6 h-0.5 bg-gray-800 transition-all"></span>
    </button>

        {{-- Desktop My Account --}}
        <a class="hidden md:block border border-gray-800 px-5 py-2 rounded-full font-semibold hover:bg-gray-900 hover:text-white transition" href="#">
            My Account
        </a>
    </nav>

    {{-- MOBILE MENU --}}
    <div id="mobileMenu"
        class="hidden flex flex-col bg-white shadow-lg px-6 py-4 space-y-4 text-[#132442] font-medium md:hidden">
    
        <a href="{{ route('home-teacher') }}">Home</a>
        <a href="#" class="text-white bg-[#3A71C1] px-4 py-1 rounded-lg w-max">Task</a>
        <a href="{{ route('welcome') }}">Calendar</a>
        <a href="{{ route('about-uslog') }}">About Us</a>
    
        <hr>
    
        <a class="border border-gray-800 px-5 py-2 rounded-full font-semibold hover:bg-gray-900 hover:text-white transition w-max"
            href="{{ route('profile') }}">My Account</a>
    </div>

    {{-- WELCOME --}}
    <h1 class="font-bold text-3xl ml-6 mt-10 md:text-4xl md:ml-16 md:mt-16">
        Welcome,<br>Mrs. Cantik!
    </h1>

    {{-- GRID --}}
    <div class="grid grid-cols-1 md:grid-cols-3 mt-6 mx-4 mb-10 md:mx-10 gap-4 md:gap-8">

        {{-- MY CLASSES --}}
        <div class="bg-gray-200 rounded-xl flex flex-col text-center p-6">
            <h2 class="text-xl font-bold text-gray-800 mt-4">My Classes</h2>

            {{-- Class Card --}}
            <div class="m-4 bg-white border border-[#132442] rounded-lg p-4 flex items-center gap-3 cursor-pointer">
                <img src="{{ asset('images/calculator.svg') }}" alt="">
                <div class="text-left">
                    <p class="font-medium">Math XI PPLG 3</p>
                    <p class="text-sm text-gray-500">18 student have been joined</p>
                </div>
            </div>

            <a href="{{ url('hs-teach1') }}" class="flex flex-col ml-4 mr-4">
                <button class="w-full bg-[#132442] text-white text-sm py-3 rounded-lg flex items-center justify-center gap-2 font-bold hover:scale-105 transition">
                    <img src="{{ asset('images/+.png') }}" class="w-5"> Create New Class
                </button>
            </a>
        </div>

        {{-- ASSIGNMENT TO REVIEW --}}
        <div class="bg-[#E4E7EB] rounded-2xl p-8">
            <h2 class="text-xl font-bold text-gray-800 text-center mb-6">Assignment to review</h2>

            <div class="space-y-4">

                @php
$assignments = [
    ['name' => 'Adinda Octaviannisa R', 'task' => 'Matriks', 'score' => '92/100', 'color' => 'green'],
    ['name' => 'Alden Fathin Hanif', 'task' => 'Matriks', 'score' => '92/100', 'color' => 'green'],
    ['name' => 'Anas Akbar Lajuma', 'task' => 'Matriks', 'score' => '92/100', 'color' => 'green'],
    ['name' => 'Annisa Khurun’ain', 'task' => 'Matriks', 'score' => 'Pending review', 'color' => 'red'],
    ['name' => 'Aqila Dzaky', 'task' => 'Matriks', 'score' => 'Pending review', 'color' => 'red'],
];
                @endphp

                @foreach ($assignments as $a)
                <div class="flex items-center justify-between py-3 border-b border-gray-300">
                    <div>
                        <p class="font-semibold text-gray-800">{{ $a['name'] }}</p>
                        <p class="text-sm text-gray-500">{{ $a['task'] }}</p>
                    </div>
                    <span class="text-xs font-medium px-3 py-1 rounded 
                        @if($a['color'] == 'green') bg-green-100 text-green-700 
                        @else bg-red-100 text-red-700 @endif">
                        {{ $a['score'] }}
                    </span>
                </div>
                @endforeach

            </div>
        </div>

        {{-- STUDENT PERFORMANCE --}}
        <div class="bg-gray-200 rounded-xl p-8 shadow">
            <h2 class="text-xl font-bold text-[#0F1D3A] text-center mb-6">
                Student Performance <br /> Overview
            </h2>

            <div class="space-y-4">
                @foreach ([
    'Adinda Octaviannisa R',
    'Alden Fathin Hanif',
    'Anas Akbar Lajuma',
    'Annisa Khurun\'ain',
    'Aqila Dzaky',
    'Arkamudya Aceananda P',
    'Azka Naufal Aleeswa A',
    'Bisma Mahes'
] as $student)
                <div class="flex justify-between">
                    <p class="text-gray-600 font-medium">{{ $student }}</p>
                    <span class="font-semibold">95</span>
                </div>
                @endforeach
            </div>
        </div>

    </div>

    {{-- POPUP NEW CLASS --}}
    <div id="popupClass" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center hidden">
        <div class="bg-white w-[90%] max-w-2xl rounded-xl shadow-lg p-6 md:p-10">

            <h2 class="text-2xl font-bold text-center mb-6">New Class</h2>

            <label class="font-semibold text-sm">Class Name:</label>
            <input type="text" placeholder="Enter your class here…" class="w-full border rounded-md mt-1 mb-4 px-3 py-2 outline-none">

            <label class="font-semibold text-sm">Subject:</label>
            <input type="text" placeholder="Enter subject here…" class="w-full border rounded-md mt-1 mb-4 px-3 py-2 outline-none">

            <label class="font-semibold text-sm">Teacher:</label>
            <p class="w-full border rounded-md mt-1 mb-6 px-3 py-2 bg-gray-100">Mrs. Cantik</p>

            <div class="flex justify-end">
                <button id="closePopup" class="bg-[#28477E] text-white px-8 py-2 rounded-lg">
                    Save
                </button>
            </div>

        </div>
    </div>

    {{-- SCRIPT --}}
    <script>
        // POPUP
        const popupClass = document.getElementById('popupClass');
        const createBtn = document.querySelector('a[href="{{ url('hs-teach1') }}"] button');

        if (createBtn) {
            createBtn.addEventListener('click', (event) => {
                event.preventDefault();
                popupClass.classList.remove('hidden');
            });
        }

        document.getElementById('closePopup').addEventListener('click', () => {
            popupClass.classList.add('hidden');
        });

        // Mobile Menu
       menuBtn.addEventListener('click', () => {
                  mobileMenu.classList.toggle('hidden');
       
        document.querySelector('.bar1').classList.toggle('rotate-45');
            doc
        ume
    nt.querySelector('.bar1').classList.toggle('translate-y-1.5');
        
    document.querySelector('.bar2').classList.toggle('opacity-0');

    document.querySelector('.bar3').classList.toggle('-rotate-45');
    document.querySelector('.bar3').classList.toggle('-translate-y-1.5');
});
    </script>

</body>
</html>
