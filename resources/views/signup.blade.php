<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>School Reminder - Sign Up</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: #ffffff;
    }

    .active-role {
      background-color: #132442;
      color: white;
      border-color: #132442;
    }

    .inactive-role {
      background-color: white;
      color: #132442;
      border: 1.5px solid #132442;
    }
  </style>
</head>

<body class="flex flex-col items-center justify-center min-h-screen">

  <!-- Logo -->
  <div class="mb-6">
    <img src="{{ asset('images/logo.png') }}" alt="School Reminder Logo" class="h-10">
  </div>

  <div class="bg-white shadow-lg rounded-3xl p-10 w-96 flex flex-col items-center">

    <h2 class="text-[#132442] font-bold text-[32px] text-center mb-6">Sign Up</h2>

    <form method="POST" action="{{ route('register') }}" class="w-full">
      @csrf

      <!-- ROLE (HIDDEN) -->
      <input type="hidden" name="role" id="roleInput" value="teacher">

      <!-- Login As -->
      <div class="w-full mb-2">
        <p class="text-[#132442] font-bold text-[16px] mb-2">Login as:</p>

        <div class="flex gap-3 w-full">

          <!-- TEACHER BUTTON -->
          <button type="button" id="teacherBtn"
            class="flex-1 py-2 rounded-xl font-bold text-[16px] active-role flex items-center justify-center gap-2">
            <img src="{{ asset('images/fa-solid_chalkboard-teacher.png') }}" class="w-5 h-5">
            Teacher
          </button>

          <!-- STUDENT BUTTON -->
          <button type="button" id="studentBtn"
            class="flex-1 py-2 rounded-xl font-bold text-[16px] inactive-role flex items-center justify-center gap-2">
            <img src="{{ asset('images/hugeicons_student-card.png') }}" class="w-5 h-5">
            Student
          </button>

        </div>
      </div>

      <!-- Name -->
      <div class="flex items-center w-full border border-[#132442] rounded-xl px-3 py-2 mt-4 mb-3">
        <img src="{{ asset('images/gridicons_user.png') }}" class="w-5 h-5 mr-2">
        <input type="text" name="name" placeholder="Full Name"
          class="w-full focus:outline-none text-[#132442] placeholder-[#C1C1C1] text-[16px] font-medium" required>
      </div>

      <!-- Email -->
      <div class="flex items-center w-full border border-[#132442] rounded-xl px-3 py-2 mb-3">
        <img src="{{ asset('images/mi_email.png') }}" class="w-5 h-5 mr-2">
        <input type="email" name="email" placeholder="Email"
          class="w-full focus:outline-none text-[#132442] placeholder-[#C1C1C1] text-[16px] font-medium" required>
      </div>

      <!-- Password -->
      <div class="flex items-center w-full border border-[#132442] rounded-xl px-3 py-2 mb-3">
        <img src="{{ asset('images/ri_lock-password-line.png') }}" class="w-5 h-5 mr-2">
        <input id="password" name="password" type="password" placeholder="Password"
          class="w-full focus:outline-none text-[#132442] placeholder-[#C1C1C1] text-[16px] font-medium" required>
        <button type="button" id="togglePassword">
          <img src="{{ asset('images/solar_eye-bold.png') }}" class="w-5 h-5 ml-2">
        </button>
      </div>

      <!-- Password Confirmation -->
      <div class="flex items-center w-full border border-[#132442] rounded-xl px-3 py-2 mb-3">
        <img src="{{ asset('images/ri_lock-password-line.png') }}" class="w-5 h-5 mr-2">
        <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password"
          class="w-full focus:outline-none text-[#132442] placeholder-[#C1C1C1] text-[16px] font-medium" required>
        <button type="button" id="togglePasswordConfirm">
          <img src="{{ asset('images/solar_eye-bold.png') }}" class="w-5 h-5 ml-2">
        </button>
      </div>

      <!-- School Name -->
      <div class="flex items-center w-full border border-[#132442] rounded-xl px-3 py-2 mb-1">
        <img src="{{ asset('images/icon-park-solid_school.png') }}" class="w-5 h-5 mr-2">
        <input type="text" name="school_name" placeholder="School name"
          class="w-full focus:outline-none text-[#132442] placeholder-[#C1C1C1] text-[16px] font-medium">
      </div>

      <!-- Remember Me -->
      <label class="flex items-center w-full mt-1 mb-4 text-[14px] text-[#C1C1C1]">
        <input type="checkbox" class="mr-2 accent-[#132442]"> Remember me
      </label>

      <!-- Sign Up Button -->
      <button type="submit"
        class="bg-[#132442] text-white w-full py-2 rounded-full font-medium text-[14px] hover:opacity-90 transition">
        Sign Up
      </button>

      <!-- Login Link -->
      <p class="text-graycustom text-[14px] font-medium mt-4">
        Already have an account?
        <a href="{{ route('login') }}" class="text-[#132442] font-medium">Login</a>
      </p>
    </form>

  </div>

  <!-- SCRIPT -->
  <script>
    const teacherBtn = document.getElementById("teacherBtn");
    const studentBtn = document.getElementById("studentBtn");
    const roleInput = document.getElementById("roleInput");

    // ROLE SWITCH
    teacherBtn.onclick = () => {
      roleInput.value = "teacher";
      teacherBtn.classList.add("active-role");
      studentBtn.classList.remove("active-role");
      studentBtn.classList.add("inactive-role");
    };

    studentBtn.onclick = () => {
      roleInput.value = "student";
      studentBtn.classList.add("active-role");
      teacherBtn.classList.remove("active-role");
      teacherBtn.classList.add("inactive-role");
    };

    // TOGGLE PASSWORD
    document.getElementById("togglePassword").onclick = () => {
      let p = document.getElementById("password");
      p.type = p.type === "password" ? "text" : "password";
    };

    document.getElementById("togglePasswordConfirm").onclick = () => {
      let p = document.getElementById("password_confirmation");
      p.type = p.type === "password" ? "text" : "password";
    };
  </script>

</body>

</html>