<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Dropdown</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<style>


.light-70{
    color: #ffffff;
    font-weight: 600;
    backdrop-filter: blur(5px); /* Efek blur pada teks */
    transition: backdrop-filter 0.3s ease; /* Transisi mulus */
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.5); /* Efek shadow untuk menyamarkan batas blur */
    border-radius: 10px; /* Membuat blur menjadi lebih bulat */
    display: inline-block; /* Mengubah display menjadi inline-block */
    padding: 5px;
}

  .gradient-text-blue {
    background: linear-gradient(135deg, #003d99, #0075FF);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}


    .black{
        color: #000000;
    }

    .navbar{
        height: 65px;
    }

    .hero {
        background-image: url('../assets/2149141362.jpg') ;
        background-size: cover;
        background-position: center;
        color: #ffffff; /* Mengatur warna teks untuk kontras dengan gambar latar belakang */
        padding: 100px 0; /* Sesuaikan sesuai kebutuhan */
        margin-top: 65px; /* Menambahkan margin top agar tidak menempel pada navbar */
    }

    .hero-content {
        max-width: 600px; /* Batasi lebar konten agar tidak terlalu lebar di layar yang besar */
        margin: 0 auto; /* Mengatur margin horizontal menjadi auto untuk membuat konten berada di tengah */
        text-align: center; /* Mengatur teks ke tengah */
    }
</style>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="#">Brand</a>

        <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
            <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>
            <li class="dropdown order-1">
                <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn dropdown-toggle"  >Login <span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-menu-right mt-1">
                    <li class="p-3">
                        <form class="form" role="form" action="../proses/logika_login.php" method="POST"> <!-- Menambahkan action dan method -->
                            <div class="form-group">
                                <input id="nameInput user_name" name="user_name" placeholder="user_name" class="form-control form-control-sm user_name" type="text" required="">
                            </div>
                            <div class="form-group">
                                <input id="passwordInput password" name="password" placeholder="Password" class="form-control form-control-sm password" type="password" required=""> <!-- Mengubah type menjadi password -->
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                            <div class="form-group text-xs-center">
                                <small><a href="#">Forgot password?</a></small>
                            </div>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 hero-content black">
                <h1>Welcome to <span class="gradient-text-blue"> Foodypedia </span></h1>
                <p class="light-70 ">Discover delicious recipes from around the world.</p>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
