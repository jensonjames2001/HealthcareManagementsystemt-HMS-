
<?php
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa; /* Light background */
        }

        /* Navbar */
        .navbar {
            background-color: #005eb8; /* NHS blue */
            padding: 15px;
        }

        .navbar-brand {
            color: white;
            font-size: 1.5rem;
            text-decoration: none;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            height: 60px; /* Adjust logo size */
            margin-right: 10px;
        }

        .navbar-nav a {
            color: white;
            font-weight: 500;
            text-decoration: none;
            margin-left: 15px;
        }

        .navbar-nav a:hover {
            color: #cce3f5; /* Lighter NHS blue for hover */
        }

        .dropdown-menu {
            background-color: #005eb8;
        }

        .dropdown-item {
            color: white;
        }

        .dropdown-item:hover {
            background-color: #0072ce;
        }

        /* Search Bar */
        .navbar .form-inline {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-control {
            width: 300px;
            border-radius: 30px; /* Rounded corners */
            padding-left: 20px;
            font-size: 1rem;
        }

        .search-btn {
            border-radius: 30px;
            background-color: #0072ce;
            color: white;
            border: none;
            padding: 10px 20px;
        }

        .search-btn:hover {
            background-color: #005eb8;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #005eb8, #0072ce); /* NHS gradient */
            color: white;
            text-align: center;
            padding: 80px 20px;
            border-bottom: 5px solid #005eb8;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .hero .btn {
            font-size: 1rem;
            padding: 10px 30px;
            border-radius: 5px;
            margin: 10px;
        }

        .btn-primary {
            background: #4CAF50; 
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background: #388E3C; 
        }

        /* Register Button Color */
        .btn-register {
            background: #007bff; 
            color: white;
            border: none;
        }

        .btn-register:hover {
            background: #0056b3; 
        }

        /* Services Section */
        .services {
            padding: 50px 20px;
        }

        .services h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 30px;
            color: #005eb8;
        }

        .card {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-body {
            text-align: center;
        }

        .card-title {
            font-size: 1.2rem;
            color: #005eb8;
            margin-bottom: 15px;
        }

        .btn-service {
            background-color: #0072ce;
            color: white;
            font-size: 0.9rem;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-service:hover {
            background-color: #005eb8;
        }

        /* Health Info Links Section */
        .health-info {
            background-color: #f1f3f5;
            padding: 40px 20px;
        }

        .health-info h3 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 30px;
            color: #005eb8;
        }

        .health-info .row .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .health-info .row .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #0072ce;
        }

        .health-info .row .card-body {
            text-align: center;
        }

        .health-info .btn-health {
            background-color: #0072ce;
            color: white;
            font-size: 1rem;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .health-info .btn-health:hover {
            background-color: #005eb8;
        }

        /* Footer */
        .footer {
            background-color: #005eb8;
            color: white;
            padding: 15px 0;
            text-align: center;
            font-size: 0.9rem;
        }

        .footer a {
            color: #cce3f5;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Logo and Brand -->
            <a class="navbar-brand" href="#">
                <img src="images/HealthcareLogo.png" alt="Logo"> 
            </a>

            <!-- Search Bar -->
            <form class="d-flex form-inline">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="search-btn" type="submit">Search</button>
            </form>

            <!-- Right Navbar Links -->
            <div class="navbar-nav d-flex align-items-center">
                <!-- My Account Dropdown -->
                <div class="dropdown d-flex align-items-center">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle fa-2x me-2"></i> My Account
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="login.php">Login</a></li>
                        <li><a class="dropdown-item" href="registration.php">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero">
        <div class="container">
            <h1>Welcome to Healthcare System</h1>
            <p>Your trusted platform for managing healthcare services online.</p>
            <a href="login.php" class="btn btn-primary">Login</a>
            <a href="registration.php" class="btn btn-register">Register</a>
        </div>
    </header>

    <!-- Health Info Links Section -->
    <section class="health-info">
        <div class="container">
            <h3>Explore More Health Information</h3>
            <div class="row gy-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pregnancy Information</h5>
                            <p class="card-text">Helpful information and tips for expecting parents.</p>
                            <a href="https://www.nhs.uk/pregnancy/" class="btn-health">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Live Well</h5>
                            <p class="card-text">Lifestyle advice for a healthier and happier life.</p>
                            <a href="https://www.nhs.uk/live-well/" class="btn-health">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Mental Health</h5>
                            <p class="card-text">Guidance and support for mental well-being.</p>
                            <a href="https://www.nhs.uk/mental-health/" class="btn-health">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Logout -->

    <a href = "login.php"> Logout </a>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Healthcare System. <a href="#">Privacy Policy</a> | <a href="#">Terms and Conditions</a></p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
