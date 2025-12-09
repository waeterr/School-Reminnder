<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Reminder - Dashboard</title>

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* ========================= ROOT COLORS ========================= */
        :root {
            --color-background: #f8f8fb;
            --color-sidebar-bg: #ffffff;
            --color-text-main: #333;
            --color-text-light: #888;
            --color-math: #a389f4;
            --color-english: #fe72a8;
            --color-informatics: #ff5454;
            --color-button-green: #c4f981;
            --color-active-nav: #121647;
            --color-current-day-bg: #3c3c78;
            --color-current-day-text: #ffffff;
        }

        /* ========================= RESET ========================= */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: var(--color-background);
        }

        /* ========================= NAVBAR ========================= */
        .top-navbar {
            width: 100%;
            height: 75px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 50px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, .06);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-logo {
            width: 40px;
        }

        .brand-text {
            font-weight: 700;
            font-size: 18px;
        }

        .nav-menu {
            display: flex;
            gap: 35px;
            list-style: none;
        }

        .nav-menu li {
            cursor: pointer;
            font-weight: 500;
            color: #121647;
        }

        .nav-menu .active {
            background: #121647;
            color: white;
            padding: 8px 18px;
            border-radius: 22px;
        }

        .account-btn {
            border: 1px solid #121647;
            background: white;
            padding: 8px 22px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 500;
        }

        /* ========================= MAIN CONTENT ========================= */

        .main-content {
            padding: 24px;
            padding-top: 85px;
            max-width: 1200px;
            margin-inline: auto;
        }

        .main-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .main-header h1 {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .main-header p {
            color: var(--color-text-light);
            margin-left: 10px;
        }

        .search-box {
            margin-left: auto;
            display: flex;
            align-items: center;
            background: white;
            padding: 8px 15px;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .05);
        }

        .search-box input {
            border: none;
            outline: none;
            padding: 5px 10px;
            width: 250px;
        }

        .search-box i {
            color: var(--color-text-light);
        }

        /* ========================= CONTENT GRID ========================= */
        .content-grid {
            display: grid;
            grid-template-columns: 2.2fr 1fr;
            gap: 20px;
        }

        /* ========================= SUBJECT CARDS ========================= */
        .subject-cards {
            display: flex;
            gap: 14px;
            margin-bottom: 20px;
        }

        .card {
            flex: 1;
            padding: 18px;
            border-radius: 20px;
            color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .08);
        }

        .card i {
            font-size: 2rem;
        }

        .card h3 {
            margin: 8px 0 4px;
        }

        .view-tasks-btn {
            background: rgba(255, 255, 255, .3);
            border: none;
            padding: 8px 15px;
            border-radius: 15px;
            margin-top: 12px;
            color: white;
            cursor: pointer;
            font-size: .8rem;
        }

        .math-card {
            background: var(--color-math);
        }

        .english-card {
            background: var(--color-english);
        }

        .informatics-card {
            background: var(--color-informatics);
        }

        /* ========================= SCHEDULED TASKS ========================= */
        .scheduled-tasks {
            background: white;
            padding: 20px;
            border-radius: 20px;
        }

        .task-item {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .task-item:last-child {
            border-bottom: none;
        }

        .add-create-btn {
            background: var(--color-button-green);
            border: none;
            padding: 8px 14px;
            border-radius: 15px;
            font-size: .8rem;
            cursor: pointer;
        }

        /* ========================= CALENDAR ========================= */
        .calendar-widget {
            background: white;
            padding: 20px;
            border-radius: 20px;
            text-align: center;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }

        .day-label {
            font-weight: bold;
            color: var(--color-text-light);
        }

        .date {
            padding: 8px 0;
            border-radius: 50%;
            cursor: pointer;
        }

        .date:hover {
            background: #eee;
        }

        .date.current-day {
            background: var(--color-current-day-bg);
            color: white;
            font-weight: bold;
        }

        /* ========================= TODAY CLASSES ========================= */
        .todays-classes {
            background: white;
            padding: 20px;
            border-radius: 20px;
            margin-top: 20px;
        }

        .class-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        .class-item:last-child {
            border-bottom: none;
        }

        .today-img img {
            width: 30px;
        }

        .class-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .class-icon.math {
            background: var(--color-math);
        }

        .class-icon.english {
            background: var(--color-english);
        }

        .class-icon.informatics {
            background: var(--color-informatics);
        }

        /* ========================= RESPONSIVE ========================= */
        @media(max-width: 850px) {
            .content-grid {
                grid-template-columns: 1fr;
            }

            .subject-cards {
                flex-direction: column;
            }

            .search-box input {
                width: 150px;
            }
        }

        @media(max-width: 480px) {
            .top-navbar {
                padding: 0 20px;
            }

            .nav-menu {
                display: none;
            }

            .subject-cards {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <!-- ========================= NAVBAR ========================= -->
    <nav class="top-navbar">
        <div class="nav-left">
            <img src="images/logo.png" class="nav-logo">
            <span class="brand-text">School Reminder</span>
        </div>

        <ul class="nav-menu">
            <li>Home</li>
            <li>Task</li>
            <li>Calendar</li>
            <li class="active">Reminder</li>
            <li>About Us</li>
        </ul>

        <button class="account-btn">My Account</button>
    </nav>

    <!-- ========================= MAIN ========================= -->
    <main class="main-content">

        <header class="main-header">
            <h1>Reminder</h1>
            <p>Don't Miss Anything</p>

            <div class="search-box">
                <input type="text" placeholder="Search for anything">
                <i class="fas fa-search"></i>
            </div>
        </header>

        <div class="content-grid">

            <!-- LEFT -->
            <section class="left-section">

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

                <div class="scheduled-tasks">
                    <div class="task-item">
                        <div class="task-info">
                            <h4>Theory of Algebraic properties</h4>
                            <p>Mathematics · Mrs. Cantik</p>
                        </div>
                        <div class="task-actions">
                            <span>- Task</span>
                            <button class="add-create-btn">+ Add or Create</button>
                        </div>
                    </div>

                    <div class="task-item">
                        <div class="task-info">
                            <h4>Adjective Clauses</h4>
                            <p>English · Mr. Bambang</p>
                        </div>
                        <div class="task-actions">
                            <span>- Task</span>
                            <button class="add-create-btn">+ Add or Create</button>
                        </div>
                    </div>
                </div>

            </section>

            <!-- RIGHT -->
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

                    <div class="class-item">
                        <div class="class-info">
                            <h4>Mathematica Theory</h4>
                            <p>Carry out writing summary in school</p>
                        </div>
                        <div class="class-icon math">
                            <div class="today-img"><img src="picture/paper.png"></div>
                        </div>
                    </div>

                    <div class="class-item">
                        <div class="class-info">
                            <h4>English Theory</h4>
                            <p>Carry out writing summary in school</p>
                        </div>
                        <div class="class-icon english">
                            <div class="today-img"><img src="picture/paper.png"></div>
                        </div>
                    </div>

                    <div class="class-item">
                        <div class="class-info">
                            <h4>Informatic Exam</h4>
                            <p>Carry out writing summary in school</p>
                        </div>
                        <div class="class-icon informatics">
                            <div class="today-img"><img src="picture/exam.png"></div>
                        </div>
                    </div>

                </div>

            </section>

        </div>

    </main>

</body>

</html>