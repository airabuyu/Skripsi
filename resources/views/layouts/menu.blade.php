<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet" type="text/css">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>


    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />


    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <title>Training Adins</title>
</head>

<body>

    {{-- <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Tes</a>
        <form class="form-inline">
          <a class="mr-5" href="/home">Home</a>
          <a class="mr-5" href="/view">View</a>
          <a class="mr-5" href="/login">Login</a>
          <a class="mr-5" href="/homeregister">Register</a>
        </form>
    </nav> --}}




    @auth


    <div class="sidebar">
        <i class='bx bx-menu' id="btn"></i>
        <ul class="nav-list">

            <li>
                <a href="/dashboard">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>

            @if (Auth::user()->role_id == 1)

            <li>
                <a href="/homeregister">
                    <i class='bx bx-user-plus'></i>
                    <span class="links_name">Manage User</span>
                </a>
                <span class="tooltip">Manage User</span>
            </li>

            <li>
                <a href="/exam_list">
                    <i class='bx bx-task'></i>
                    <span class="links_name">Manage Exam</span>
                </a>
                <span class="tooltip">Manage Exam</span>
            </li>

            @endif

            <li>
                <a href="/manage_file">
                    <i class='bx bx-folder-open'></i>
                    <span class="links_name">Files</span>
                </a>
                <span class="tooltip">Files</span>
            </li>

            <li>
                <a href="/report_export">
                    <i class='bx bx-file'></i>
                    <span class="links_name">Report</span>
                </a>
                <span class="tooltip">Report</span>
            </li>

        </ul>
    </div>

    <section class="home-section">
        <nav class="navbar navbar-dark bg-dark navbar-expand-sm" style="justify-content: space-between; padding-right:150px;">
            <a class="navbar-brand " href="#">
                {{-- <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/logo_white.png" width="30" height="30" alt="logo"> --}}
                {{-- Training Adins --}}

                <img width="100px" src="https://cdn.discordapp.com/attachments/641293037976420362/1058081610832019486/meme-mixue-bagian-2-2_11.png" alt="">
            </a>
            <button class="navbar-toggler flasdas " type="button" data-toggle="collapse" data-target="#navbar-list-4"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(Auth::user()->user_img)
                            <img class="rounded-circle" src="/storage/user_img/{{ Auth::user()->user_img}}" alt="profile_image" width="40" height="40" class="rounded-circle">
                            @else
                            <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg"
                                width="40" height="40" class="rounded-circle">
                            @endif
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/changepassword">Change Password</a>
                            <a class="dropdown-item" href="/changeprofile">Change Profile</a>
                            <a class="dropdown-item" href="/logout">Log Out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>


        @endauth




        @yield('content')
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search iocn
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
            }
        }
    </script>



    {{-- <div class="container-fluid p-3 mt-5 bg-light text-primary]">
        <div class="text-center">
            <small class="">&copy BlueJack 20-1</small>
        </div>
    </div> --}}
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</body>

</html>
