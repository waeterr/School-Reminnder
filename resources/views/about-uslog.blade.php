<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>School Reminder - About Us</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  <style>
    body {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
  </style>
</head>

<body class="text-gray-900">

  <!-- NAVBAR -->
  <nav class="flex justify-between items-center px-6 md:px-12 py-6 shadow">

    <!-- LOGO -->
    <div class="text-xl flex items-center">
      <img src="{{ asset('images/logo.png') }}" alt="school logo" class="h-10 w-auto" />
    </div>

    <!-- DESKTOP MENU -->
    <ul class="hidden md:flex gap-10 font-semibold items-center">
      <li><a href="{{ route('homestudent') }}" class="hover:text-blue-600">Home</a></li>
      <li><a href="{{ route('task') }}" class="hover:text-blue-600">Task</a></li>
      <li><a href="{{ route('calendar') }}" class="hover:text-blue-600">Calendar</a></li>


      <li>
        <a href="{{ route('aboutuslog') }}" class="px-6 py-2 bg-[#28477E] text-white font-semibold rounded-full">About
          Us</a>
      </li>
    </ul>

    <!-- ACCOUNT (desktop only) -->
    <a class="hidden md:block border border-gray-800 px-5 py-2 rounded-full font-semibold hover:bg-gray-900 hover:text-white transition"
      href="{{ route('profile') }}">My Account</a>

    <!-- MOBILE BUTTON -->
    <button id="menuBtn" class="md:hidden text-3xl">
      ☰
    </button>
  </nav>

  <!-- MOBILE MENU -->
  <div id="mobileMenu" class="hidden md:hidden bg-white shadow px-6 py-4">
    <ul class="flex flex-col gap-4 font-semibold">
      <li><a href="{{ route('homestudent') }}">Home</a></li>
      <li><a href="{{ route('task') }}">Task</a></li>
      <li><a href="{{ route('calendar') }}">Calendar</a></li>
      <li><a href="{{ route('about-us') }}" class="font-bold text-blue-700">About Us</a></li>
      <li><a href="#" class="border border-gray-800 px-4 py-2 rounded-lg text-center">My Account</a></li>
    </ul>
  </div>

  <!-- HERO SECTION -->
  <section class="bg-[#28477E] text-white px-6 md:px-12 py-12 flex flex-col md:flex-row items-center gap-10">
    <div class="max-w-xl">
      <h1 class="text-3xl md:text-4xl font-extrabold leading-tight mb-6">
        Making Homework Management Smarter into Organized Success
      </h1>

      <a href="#"
        class="transition duration-300 bg-[#132442] px-6 py-3 rounded-lg font-bold inline-block hover:scale-110">
        Get Started Now
      </a>
    </div>

    <div class="flex justify-center">
      <img src="{{ asset('images/1.png') }}" alt="1" class="w-64 md:w-96 object-cover" />
    </div>
  </section>

  <!-- ABOUT SECTION -->
  <section class="px-6 md:px-12 py-20 flex flex-col md:flex-row items-center gap-10">
    <div class="flex justify-center w-full md:w-1/2">
      <img src="{{ asset('images/2.png') }}" alt="" class="w-64 md:w-96 object-cover">
    </div>

    <div class="w-full md:w-1/2">
      <h2 class="text-3xl font-extrabold mb-4">We're Your Strategic Academic Partner</h2>

      <p class="text-lg leading-relaxed font-semibold text-justify">
        Our platform helps you manage your time through smart reminders and healthy habit with building routines,
        empowering you to consistently prioritize what matters most, maintain balance throughout your school
        life, and track your progress with clarity.
      </p>
    </div>
  </section>

  <!-- STATS -->
  <section class="flex flex-col md:flex-row justify-center items-center gap-16 py-10 text-center mb-10">
    <div>
      <div role="progressbar" style="--value: 90" class="mx-auto"></div>
      <h2 class="text-[#132442] font-semibold mt-4 text-lg">Assignments<br>Submitted On Time</h2>
    </div>

    <div>
      <div role="progressbar2" style="--value: 80; --label: '500+';" class="mx-auto"></div>
      <h2 class="text-[#B0C635] font-semibold mt-4 text-lg">Students Enrolled</h2>
    </div>

    <div>
      <div role="progressbar3" style="--value: 60; --label: '150+';" class="mx-auto"></div>
      <h2 class="text-[#132442] font-semibold mt-4 text-lg">Teachers Registered</h2>
    </div>
  </section>

  <!-- HOW IT WORKS -->
  <section class="bg-[#B0C635] py-20 px-6 md:px-12 text-center">
    <h2 class="text-3xl md:text-4xl font-extrabold mb-16 text-white">How School Reminder Works</h2>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-10 place-items-center">
      <div>
        <img src="{{ asset('images/3.png') }}" class="w-16 md:w-20 mx-auto mb-2">
        <p class="font-bold text-white">Create & Assign Tasks</p>
      </div>

      <div>
        <img src="{{ asset('images/4.png') }}" class="w-16 md:w-20 mx-auto mb-2">
        <p class="font-bold text-white">Receive Notifications</p>
      </div>

      <div>
        <img src="{{ asset('images/5.png') }}" class="w-16 md:w-20 mx-auto mb-2">
        <p class="font-bold text-white">Manage & Complete</p>
      </div>

      <div>
        <img src="{{ asset('images/6.png') }}" class="w-16 md:w-20 mx-auto mb-2">
        <p class="font-bold text-white">Grade & Feedback</p>
      </div>
    </div>
  </section>

  <!-- WHY CHOOSE US -->
  <section class="px-6 md:px-36 py-24 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

    <div>
      <h2 class="text-3xl md:text-4xl font-bold text-[#9AB236] mb-8">Why Choose Us?</h2>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

        <div class="flex items-center gap-4">
          <img src="{{ asset('images/8.png') }}" class="w-20">
          <div>
            <h3 class="text-[#9AB236] text-xl font-semibold">Student Growth</h3>
            <p class="text-[#9AB236]">Fosters Academic Progress</p>
          </div>
        </div>

        <div class="flex items-center gap-4">
          <img src="{{ asset('images/9.png') }}" class="w-20">
          <div>
            <h3 class="text-[#9AB236] text-xl font-semibold">User-Friendly</h3>
            <p class="text-[#9AB236]">Clean & Intuitive</p>
          </div>
        </div>

        <div class="flex items-center gap-4">
          <img src="{{ asset('images/10.png') }}" class="w-20">
          <div>
            <h3 class="text-[#9AB236] text-xl font-semibold">Real-Time</h3>
            <p class="text-[#9AB236]">Accurate Alerts</p>
          </div>
        </div>

        <div class="flex items-center gap-4">
          <img src="{{ asset('images/11.png') }}" class="w-20">
          <div>
            <h3 class="text-[#9AB236] text-xl font-semibold">Collaboration</h3>
            <p class="text-[#9AB236]">Seamless Feedback</p>
          </div>
        </div>

      </div>
    </div>

    <div class="flex justify-center">
      <img src="{{ asset('images/7.png') }}" class="h-80 md:h-[420px] object-contain">
    </div>

  </section>

  <!-- MOBILE NAV SCRIPT -->
  <script>
    const btn = document.getElementById("menuBtn");
    const menu = document.getElementById("mobileMenu");

    btn.addEventListener("click", () => {
      menu.classList.toggle("hidden");
    });
  </script>

</body>

</html>