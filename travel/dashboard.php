<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divine Travel</title>
    <!-- EXTERNAL LINKS -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <!-- /EXTERNAL LINKS -->

    <link rel="stylesheet" href="./css/dashboard.css">
</head>

<body>
    <main class="dashboard-wrapper ">
        <section class="navbar">
            <div class="navbar_content">
                <div class="navbar_links">
                    <a class="link-item active" href=""><span class="material-icons-sharp dash-icon">home</span>Home</a>
                    <a class="link-item" href=""><span class="material-icons-sharp dash-icon">grid_view</span>Dashboard</a>
                    <a class="link-item" href=""><span class="material-icons-sharp dash-icon">flight</span>Trips</a>
                    <a class="link-item" href=""><span class="material-icons-sharp dash-icon">person_outline</span>Users</a>
                </div>
                <div class="navbar-signout">
                    <a class="link-item" href=""><span class="material-icons-sharp dash-icon">logout</span>Sign out</a>

                </div>
            </div>

            <div class="menu_toggle">
                <span class="material-icons-sharp">
                    menu
                </span>
            </div>


        </section>
        <section class="dashboard__content-wrapper">
            <div class="dashboard__content-cards-wrapper">
                <div class="card">
                    <span class="material-icons-sharp card__icon-profit">paid</span>
                    <p class="card__text-content">Total Profit: <br><span data-card-icon>5000$</span></p>
                </div>
                <div class="card">
                    <span class="material-icons-sharp card__icon-best_seller">flight</span>
                    <p class="card__text-content">Best Seller: <br><span data-card-icon>Trip Name</span></p>
                </div>
                <div class="card">
                    <span class="material-icons-sharp card__icon-ticket">
                        airplane_ticket
                    </span>
                    <p class="card__text-content">Number of Orders: <br><span data-card-icon>20</span></p>
                </div>
                <div class="card">
                    <span class="material-icons-sharp card__icon-user">
                        account_circle
                    </span>
                    <p class="card__text-content">Number of Users: <br><span data-card-icon>20</span></p>
                </div>
            </div>
            <div class="dashboard__content-chart">

                <div class="chart-container">
                    <canvas class="chart"></canvas>
                </div>
            </div>
            <div class="dashboard__content-users">
                <div class="user-table-wrapper">
                    <div class="user-table-title">
                        New users:
                    </div>
                    <div class="new__users-row">
                        <div class="new__users-name-wrapper">
                            <p>i am the new user</p>
                        </div>
                        <div class="new__users-date-wrapper">
                            <p>2020-12-10</p>
                        </div>
                    </div>
                    <div class="new__users-row">
                        <div class="new__users-name-wrapper">
                            <p>i am the new user</p>
                        </div>
                        <div class="new__users-date-wrapper">
                            <p>2020-12-10</p>
                        </div>
                    </div>
                    <div class="new__users-row">
                        <div class="new__users-name-wrapper">
                            <p>i am the new user</p>
                        </div>
                        <div class="new__users-date-wrapper">
                            <p>2020-12-10</p>
                        </div>
                    </div>
                    <div class="new__users-row">
                        <div class="new__users-name-wrapper">
                            <p>i am the new user</p>
                        </div>
                        <div class="new__users-date-wrapper">
                            <p>2020-12-10</p>
                        </div>
                    </div>
                    <div class="new__users-row">
                        <div class="new__users-name-wrapper">
                            <p>i am the new user</p>
                        </div>
                        <div class="new__users-date-wrapper">
                            <p>2020-12-10</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- gsap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <!-- gsap -->
    <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <!-- chart js -->

    <script src="./js/dashboard.js"></script>
</body>

</html>