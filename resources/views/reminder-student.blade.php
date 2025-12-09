<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Remind3r - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Custom Properties (Warna Utama dari Desain) */
:root {
    --color-background: #f8f8fb;
    --color-text-main: #333;
    --color-text-light: #888;
    --color-math: #a389f4; /* Ungu/Merah Muda */
    --color-english: #fe72a8; /* Merah Muda */
    --color-informatics: #ff5454; /* Merah */
    --color-button-green: #c4f981;
    --color-active-nav: #e3e2ff; /* Latar belakang navigasi aktif */
    --color-current-day-bg: #3c3c78; /* Latar belakang tanggal aktif di kalender */
    --color-current-day-text: #ffffff;
}

/* Reset Dasar */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif; 
}

body {
    background-color: var(--color-background);
    color: var(--color-text-main);
    line-height: 1.6;
}

/* Tombol home */
.home button img {
  background-color: #333;
}

/* tombol home di bawah */
.home {
  margin-top: auto;     /* dorong ke bawah */
  padding-bottom: 20px; /* jarak bawah */
}


/* --- Konten Utama --- */
.main-content {
    padding: 30px;
    margin-left: 10px; 
    font-family: "Poppins", sans-serif;
}

.main-header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    position: relative; /* Untuk penempatan search-box */
}

.main-header h1 {
    font-size: 1.8rem;
    font-weight: bold;
}

.main-header p {
    color: var(--color-text-light);
    margin-left: 10px;
    font-size: 0.9rem;
}

.search-box {
    margin-left: auto;
    display: flex;
    align-items: center;
    padding: 8px 15px;
    border-radius: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.search-box input {
    border: none;
    outline: none;
    padding: 5px 10px;
    width: 250px;
    font-size: 0.9rem;
}

.search-box i {
    color: var(--color-text-light);
}

/* --- Grid Konten Utama --- */
.content-grid {
    display: grid;
    /* Membagi konten menjadi dua kolom utama: Kiri (2fr) dan Kanan (1fr) */
    grid-template-columns: 2fr 1fr;
    gap: 30px;
}

/* --- Kartu Mata Pelajaran --- */
.subject-cards {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
}

.card {
    background-color: var(--color-sidebar-bg);
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    flex: 1;
    color: white; /* Teks putih di dalam kartu berwarna */
    position: relative;
    overflow: hidden;
}

.card h3 {
    margin: 10px 0 5px;
    font-size: 1.2rem;
}

.card p {
    font-size: 0.8rem;
    opacity: 0.8;
}

.card i {
    font-size: 2rem;
    margin-bottom: 5px;
}

.view-tasks-btn {
    background-color: rgba(255, 255, 255, 0.3);
    border: none;
    color: white;
    padding: 8px 15px;
    border-radius: 15px;
    margin-top: 15px;
    cursor: pointer;
    font-size: 0.8rem;
    font-weight: bold;
    transition: background-color 0.2s;
}

.view-tasks-btn:hover {
    background-color: rgba(255, 255, 255, 0.5);
}

/* Warna Kartu Spesifik */
.math-card { background-color: var(--color-math); }
.english-card { background-color: var(--color-english); }
.informatics-card { background-color: var(--color-informatics); }

/* --- Daftar Tugas Terjadwal --- */
.scheduled-tasks {
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
}

.task-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #eee;
}

.task-item:last-child {
    border-bottom: none;
}

.task-info h4 {
    font-size: 1rem;
    margin-bottom: 3px;
}

.task-info p {
    font-size: 0.8rem;
    color: var(--color-text-light);
}

.task-actions {
    display: flex;
    align-items: center;
    font-size: 0.9rem;
    color: var(--color-text-light);
}

.add-create-btn {
    background-color: var(--color-button-green);
    border: none;
    color: var(--color-text-main);
    padding: 8px 15px;
    border-radius: 15px;
    margin-left: 10px;
    cursor: pointer;
    font-weight: bold;
    font-size: 0.8rem;
    transition: opacity 0.2s;
}

.add-create-btn:hover {
    opacity: 0.8;
}

/* --- Kalender Widget --- */
.calendar-widget {
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 30px;
    text-align: center;
}

.calendar-widget h2 {
    font-size: 1.2rem;
    margin-bottom: 15px;
}

.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px;
    text-align: center;
}

.day-label {
    font-weight: bold;
    font-size: 0.8rem;
    color: var(--color-text-light);
    padding-bottom: 5px;
}

.date {
    padding: 8px 0;
    font-size: 0.9rem;
    border-radius: 50%;
    cursor: pointer;
    transition: background-color 0.2s;
    height: 35px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.date:not(.inactive):hover {
    background-color: #eee;
}

.date.inactive {
    color: #ccc;
}

.date.current-day {
    background-color: var(--color-current-day-bg);
    color: var(--color-current-day-text);
    font-weight: bold;
}

/* --- Kelas Hari Ini --- */
.todays-classes {
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
}

.todays-classes h2 {
    font-size: 1.2rem;
    margin-bottom: 15px;
}

.class-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #eee;
}

.class-item:last-child {
    border-bottom: none;
}

.class-info h4 {
    font-size: 1rem;
    margin-bottom: 3px;
}

.class-info p {
    font-size: 0.8rem;
    color: var(--color-text-light);
}

.class-icon {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    /* Menggunakan box-shadow untuk "glow" */
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); 
}

.class-icon.math { background-color: var(--color-math); }
.class-icon.english { background-color: var(--color-english); }
.class-icon.informatics { background-color: var(--color-informatics); }

.filter-reminder {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

.filter-reminder select,
.filter-reminder button {
    padding: 8px 18px;
    border-radius: 10px;
    border: 1px solid #ccc;
    cursor: pointer;
    font-size: 14px;
}

    </style>
</head>
<body>
<div class="container">

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
            <a href="{{ route('welcome') }}" class="hover:text-[#3A71C1]">Home</a>
            <a href="{{ route('task') }}" class="text-white bg-[#3A71C1] px-4 py-1 rounded-full">Task</a>
            <a href="{{ route('calendar') }}" class="hover:text-[#3A71C1]">Calendar</a>
            <a href="{{ route('reminder') }}" class="hover:text-[#3A71C1]">Reminder</a>
            <a href="#" class="hover:text-[#3A71C1]">About Us</a>
        </div>




        <button
            class="border border-[#446298] text-[#446298] px-4 py-2 rounded-lg hover:bg-[#446298] hover:text-white transition-colors">
            My Account
        </button>


        <button id="mobile-menu-button" class="md:hidden text-gray-600">
            <i class="fas fa-bars text-xl"></i>
        </button>
        </div>
    </nav>


    <div id="mobile-menu" class="md:hidden bg-white shadow-md py-2 px-4 hidden">
        <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">Home</a>
        <a href="#" class="block py-2 text-primary font-medium">Task</a>
        <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">Calendar</a>
        <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">Reminder</a>
        <a href="#" class="block py-2 text-gray-600 hover:text-primary transition-colors">About Us</a>
    </div>

    <main class="main-content">
        <header class="main-header">
            <h1>Reminder</h1><br>
            <p>Don't Miss Anything</p>
            <div class="search-box">
                <input type="text" placeholder="Search for anythings">
                <i class="fas fa-search"></i>
            </div>
        </header>

        <div class="content-grid">

            <!-- LEFT SECTION -->
            <section class="left-section">

                <!-- FILTER UI -->
                <div class="filter-reminder flex gap-3 mb-4">
                    <select id="subjectFilter" class="border px-3 py-2 rounded">
                        <option value="">All Subjects</option>
                        <option value="math">Math</option>
                        <option value="english">English</option>
                        <option value="informatics">Informatics</option>
                    </select>

                    <button id="todayBtn" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Today Tasks
                    </button>

                    <button id="upcomingBtn" class="bg-green-600 text-white px-4 py-2 rounded">
                        Upcoming Tasks
                    </button>
                </div>

                <!-- SUBJECT CARDS -->
                <div class="subject-cards">
                    <div class="card math-card">
                        <i class="fas fa-calculator"></i>
                        <h3>Math</h3>
                        <p>4 Tasks Remaining</p>
                        <button class="view-tasks-btn">View Tasks</button>
                    </div>
                    <div class="card english-card">
                        <i class="fas fa-language"></i>
                        <h3>English</h3>
                        <p>3 Tasks Remaining</p>
                        <button class="view-tasks-btn">View Tasks</button>
                    </div>
                    <div class="card informatics-card">
                        <i class="fas fa-laptop-code"></i>
                        <h3>Informatics</h3>
                        <p>No assignment yet</p>
                        <button class="view-tasks-btn">View Tasks</button>
                    </div>
                </div>

                <!-- TASK LIST -->
                <div class="scheduled-tasks">
                    <div class="task-item">
                        <div class="task-info">
                            <h4>Theory of Algebraic Properties</h4>
                            <p>Mathematics · Mrs. Cantik</p>
                        </div>
                        <div class="task-actions">
                            <button class="add-create-btn"> + Add or Create</button>
                        </div>
                    </div>
                </div>

            </section>

            <!-- RIGHT SECTION -->
            <section class="right-section">
                <div class="calendar-widget">
                    <h2>January 2025</h2>
                    <div class="calendar-grid">
                        <span class="day-label">Sun</span>
                        <span class="day-label">Mon</span>
                        <span class="day-label">Tue</span>
                        <span class="day-label">Wed</span>
                        <span class="day-label">Thu</span>
                        <span class="day-label">Fri</span>
                        <span class="day-label">Sat</span>

                        <span class="date inactive">29</span>
                        <span class="date inactive">30</span>
                        <span class="date inactive">31</span>
                        <span class="date">01</span>
                        <span class="date">02</span>
                        <span class="date">03</span>
                        <span class="date">04</span>
                        <span class="date">05</span>
                        <span class="date">06</span>
                        <span class="date">07</span>
                        <span class="date">08</span>
                        <span class="date">09</span>
                        <span class="date">10</span>
                        <span class="date">11</span>
                        <span class="date">12</span>
                        <span class="date">13</span>
                        <span class="date">14</span>
                        <span class="date">15</span>
                        <span class="date">16</span>
                        <span class="date">17</span>
                        <span class="date">18</span>
                        <span class="date">19</span>
                        <span class="date current-day">20</span>
                        <span class="date">21</span>
                        <span class="date">22</span>
                        <span class="date">23</span>
                        <span class="date">24</span>
                        <span class="date">25</span>
                        <span class="date">26</span>
                        <span class="date">27</span>
                        <span class="date">28</span>
                        <span class="date">29</span>
                        <span class="date">30</span>
                        <span class="date">31</span>
                        <span class="date inactive">01</span>
                        <span class="date inactive">02</span>
                    </div>
                </div>

                <div class="todays-classes">
                    <h2>Today's Classes</h2>
                </div>
            </section>

        </div>
    </main>
</div>

<script>
// Ambil token user
const token = localStorage.getItem("token");
if (!token) alert("You must login first!");


// =====================
// 1. Fetch COUNT per Mapel
// =====================
fetch("http://127.0.0.1:8000/api/assignments-count", {
    headers: { "Authorization": "Bearer " + token }
})
.then(res => res.json())
.then(data => {
    document.querySelector(".math-card p").innerText = data.Math + " Tasks Remaining";
    document.querySelector(".english-card p").innerText = data.English + " Tasks Remaining";
    document.querySelector(".informatics-card p").innerText =
        data.Informatics > 0 ? data.Informatics + " Tasks Remaining" : "No assignment yet";
})
.catch(err => console.error("Error Count:", err));


// =====================
// Fungsi umum render reminder
// =====================
function fetchReminder(url) {
    fetch(url, {
        headers: { "Authorization": "Bearer " + token }
    })
    .then(res => res.json())
    .then(tasks => {
        const container = document.querySelector(".scheduled-tasks");
        container.innerHTML = "";

        if (!tasks || tasks.length === 0) {
            container.innerHTML = `
                <div class="task-item">
                    <div class="task-info">
                        <h4>No tasks found</h4>
                        <p>Try another filter</p>
                    </div>
                </div>`;
            return;
        }

        tasks.forEach(t => {
            container.innerHTML += `
                <div class="task-item">
                    <div class="task-info">
                        <h4>${t.title}</h4>
                        <p>${t.subject} · ${t.teacher ?? "Teacher"}</p>
                    </div>
                    <div class="task-actions">
                        <span>${t.deadline}</span>
                        <button class="add-create-btn"> + Add or Create</button>
                    </div>
                </div>`;
        });
    })
    .catch(err => console.error("Reminder Error:", err));
}


// =====================
// FILTERS
// =====================

// Dropdown subject
document.getElementById("subjectFilter").addEventListener("change", function () {
    let subject = this.value.toLowerCase();

    if (subject === "") {
        fetchReminder("http://127.0.0.1:8000/api/assignments-upcoming");
        return;
    }
    fetchReminder(`http://127.0.0.1:8000/api/reminder/by/${subject}`);
});

// Today filter
document.getElementById("todayBtn").addEventListener("click", function () {
    fetchReminder("http://127.0.0.1:8000/api/reminder/today");
});

// Upcoming filter
document.getElementById("upcomingBtn").addEventListener("click", function () {
    fetchReminder("http://127.0.0.1:8000/api/reminder/upcoming");
});


// =====================
// TODAY’S CLASSES
// =====================
fetch("http://127.0.0.1:8000/api/today-classes", {
    headers: { "Authorization": "Bearer " + token }
})
.then(res => res.json())
.then(classes => {
    const container = document.querySelector(".todays-classes");
    container.innerHTML = "<h2>Today's Classes</h2>";

    if (!classes || classes.length === 0) {
        container.innerHTML += `
        <div class="class-item">
            <div class="class-info">
                <h4>No Classes Today</h4>
                <p>Enjoy your free time ✨</p>
            </div>
        </div>`;
        return;
    }

    classes.forEach(c => {
        container.innerHTML += `
        <div class="class-item">
            <div class="class-info">
                <h4>${c.subject}</h4>
                <p>Period ${c.start_period} - ${c.end_period}</p>
            </div>
            <div class="class-icon ${c.subject.toLowerCase()}"></div>
        </div>`;
    });
})
.catch(err => console.error("Today Classes Error:", err));

</script>

</body>
</html>
