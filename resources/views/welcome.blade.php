<style>
    .layout-container {
        position: relative;
        width: 100%;
        min-height: 140px;

        box-sizing: border-box;
        padding: 20px;
    }

    .home {
        text-align: center;
        font-size: 25px;
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding-top: 0;
        top: 5px;
    }

    .task {
        position: absolute;

        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
    }


    @media (max-width: 600px) {
        .task {
            right: 10px;
            font-size: 18px;
        }

        .home {
            padding-top: 60px;
        }
    }
</style>

<div class="layout-container">
    <p class="home">Dashboard</p>
    <p class="task">Task</p>
</div>