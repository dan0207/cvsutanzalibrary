<!-- font awesome -->
<script src="https://kit.fontawesome.com/9475ab4ee0.js" crossorigin="anonymous"></script>

<style>
    .form-control:focus {
        border-color: rgb(0, 190, 25);
        box-shadow: 0 0 0 0.2rem rgb(0,114,5,0.25);
    }
</style>

<nav class="navbar navbar-expand-lg bg-light sticky-top border-bottom mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="../user/index.php"><img id="logo" src="../image/logo.png" alt="" srcset=""></a>

        <button id="searchToggle" class="navbar-toggler ms-auto p-3" type="button" data-bs-toggle="collapse" data-bs-target="#searchBar" aria-controls="searchBar" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fa-solid fa-magnifying-glass fa-sm" style="color: #000000;"></i></i></span>
        </button>

        <button id="userNavButton" class="navbar-toggler ms-auto collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        
        <!-- search bar -->
        <div id="searchBar" class="collapse navbar-collapse input-group input-group-sm mb-3 mt-3" style="width: 40vw;">
            <input type="text" class="form-control" placeholder="Title, Author, Subject, Series or Call Number" aria-describedby="basic-addon2">
            <button class="input-group-button btn btn-success rounded-end ps-2 pe-2 border-0 hover" type="button">SEARCH</button>
        </div>
        <!-- navigation bar -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 pe-5 bg-light">
                <li class="nav-item">
                    <a class="nav-link" href="../user/home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../user/books.php">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../user/services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../user/acquisition.php">Aquisition</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        More
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../user/tutorial.php">Tutorials</a></li>
                        <li><a class="dropdown-item" href="../user/events.php">Events</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../user/about.php">About</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Log in</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    const searchBar = document.getElementById('searchBar');
    const searchToggle = document.getElementById('searchToggle');
    if(window.location.href === 'http://localhost/library_opac/user/index.php' || window.location.href === 'http://localhost/library_opac/user/books.php'){
        searchBar.style.visibility = 'hidden';
        searchToggle.style.visibility = 'hidden';
    }
</script>