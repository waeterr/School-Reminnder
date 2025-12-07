<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>School Reminder - Login</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Plus Jakarta Sans -->
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;700&display=swap" rel="stylesheet">

  <style>
    body {
      background-color: #ffffff;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .text-main {
      color: #132442;
    }

    .text-graycustom {
      color: #C1C1C1;
    }
  </style>
</head>

<body class="flex flex-col items-center justify-center min-h-screen">

  <!-- Logo -->
  <div class="mb-6">
    <img src="{{ asset('images/logo.png') }}" alt="School Reminder Logo" class="h-10">

  </div>

  <!-- Card -->
  <div class="bg-white shadow-lg rounded-3xl p-10 w-96 flex flex-col items-center">

    <h2 class="text-main font-bold text-[32px] leading-tight text-center">Welcome to</h2>
    <h2 class="text-main font-bold text-[32px] leading-tight text-center mb-2">School Reminder!</h2>

    <p class="text-[#132442] font-medium text-[13px] text-center mb-6">
      make your school schedule,<br> assignments and exams easy to do.
    </p>

    <!-- Frontend-only login (username) - no server POST -->
    <form id="loginForm" action="#" class="w-full">
      <!-- Username -->
      <div class="flex items-center w-full border border-[#132442] rounded-xl px-3 py-2 mb-4">
        <img src="{{ asset('images/gridicons_user.png') }}" class="w-5 h-5 mr-2">
        <input type="text" name="username" id="username" placeholder="Username"
          class="w-full focus:outline-none text-[#132442] placeholder-[#C1C1C1] text-[16px] font-medium" required>
      </div>

      <!-- Password (optional, client-side only) -->
      <div class="flex items-center w-full border border-[#132442] rounded-xl px-3 py-2 mb-2">
        <img src="{{ asset('icons/ri_lock-password-line.png') }}" class="w-5 h-5 mr-2">
        <input id="password" name="password" type="password" placeholder="Password"
          class="w-full focus:outline-none text-[#132442] placeholder-[#C1C1C1] text-[16px] font-medium">

        <button type="button" id="togglePassword">
          <img id="eyeIcon" src="{{ asset('icons/solar_eye-bold.png') }}" class="w-5 h-5 ml-2">
        </button>
      </div>

      <!-- Button (handled client-side) -->
      <button type="submit" id="loginBtn"
        class="bg-[#132442] text-white w-full py-2 rounded-full font-medium text-[14px] hover:opacity-90 transition">
        Login
      </button>
    </form>

    <!-- Sign Up -->
    <p class="text-graycustom text-[14px] font-medium mt-4">
      Don’t have an account?
      <a href="{{ route('signup') }}" class="text-[#132442] font-medium">Sign Up</a>
    </p>

  </div>

  <!-- Toggle Password + Frontend login handler -->
  <script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    const loginForm = document.getElementById('loginForm');
    const loginBtn = document.getElementById('loginBtn');

    let visible = false;

    togglePassword.addEventListener('click', () => {
      visible = !visible;
      passwordInput.type = visible ? 'text' : 'password';
    });

    // Frontend-only login: store username in localStorage and redirect to guest homestudent
    loginForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const username = document.getElementById('username').value.trim();
      if (!username) {
        alert('Please enter a username');
        return;
      }
      // store for simple demo usage
      try {
        localStorage.setItem('sr_user', username);
      } catch (err) {
        // ignore storage errors
      }
      // redirect to public guest homestudent page
      window.location.href = "{{ route('homestudent.guest') }}";
    });
  </script>

</body>

</html>