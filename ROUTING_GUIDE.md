# School Reminder - Routing & File Connection Guide

## 6 Main Pages Connected

### 1. **Welcome Page** (`welcome.blade.php`)

-   **Route:** `{{ route('welcome') }}` atau `/`
-   **Purpose:** Home/Landing page dengan calendar dan task details
-   **Links to:**
    -   Task page
    -   Calendar view
    -   Login page
    -   Signup page

### 2. **Login Page** (`login.blade.php`)

-   **Route:** `{{ route('login') }}` atau `/login`
-   **Purpose:** User authentication
-   **Links to:**
    -   Signup page (`{{ route('signup') }}`)

### 3. **Signup Page** (`signup.blade.php`)

-   **Route:** `{{ route('signup') }}` atau `/signup`
-   **Purpose:** User registration dengan role selection (Teacher/Student)
-   **Links to:**
    -   Login page (`{{ route('login') }}`)

### 4. **Onboarding Page** (`onboard.blade.php`)

-   **Route:** `{{ route('onboard') }}` atau `/onboard`
-   **Purpose:** Introduction slides untuk first-time users
-   **Links to:**
    -   Home page (`{{ route('welcome') }}`)
    -   Task page (`{{ route('task') }}`)
    -   Calendar view (`{{ route('calendar') }}`)
    -   Login page
    -   Signup page

### 5. **Task Page** (`task.blade.php`)

-   **Route:** `{{ route('task') }}` atau `/task`
-   **Purpose:** Display dan manage tasks dengan filter & sorting
-   **Links to:**
    -   Home page (`{{ route('welcome') }}`)
    -   Calendar view (`{{ route('calendar') }}`)

### 6. **Home Student** (`homestudent.blade.php`)

-   **Route:** `{{ route('homestudent') }}` atau `/homestudent`
-   **Purpose:** Student dashboard dengan hero section
-   **Links to:**
    -   Task page (`{{ route('task') }}`)
    -   Calendar view (`{{ route('calendar') }}`)
    -   Login page
    -   Signup page

---

## Navigation Flow

```
Onboard → Login/Signup
         ↓
      Home (Welcome) ← Calendar view (Welcome)
         ↓
    Task Page
         ↓
    Home Student
```

## Blade Routes Configuration

Semua route sudah dikonfigurasi di `routes/web.php`:

```php
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/onboard', function () {
    return view('onboard');
})->name('onboard');

Route::get('/task', function () {
    return view('task');
})->name('task');

Route::get('/calendar', function () {
    return view('welcome');
})->name('calendar');

Route::get('/homestudent', function () {
    return view('homestudent');
})->name('homestudent');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/login', function () {
    return view('login');
})->name('login');
```

## Menggunakan Route dalam Template

```blade
<!-- Link ke halaman -->
<a href="{{ route('welcome') }}">Home</a>
<a href="{{ route('task') }}">Task</a>
<a href="{{ route('login') }}">Login</a>
<a href="{{ route('signup') }}">Sign Up</a>
```

## Testing Links

Ketika menjalankan aplikasi, pastikan:

1. Semua link navigasi di navbar mengarah ke halaman yang tepat
2. Tombol "Login" & "Sign Up" mengarah ke halaman auth yang sesuai
3. Navigation breadcrumb atau footer links berfungsi dengan baik

---

**Updated:** November 17, 2025
