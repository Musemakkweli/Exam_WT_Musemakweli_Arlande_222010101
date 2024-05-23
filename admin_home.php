<?php
// Include database connection file
require_once "config.php";

// Fetch total number of users from the database
$sql_users = "SELECT COUNT(*) AS total_users FROM users";
$result_users = $conn->query($sql_users);
$total_users = $result_users->fetch_assoc()['total_users'];




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fundraising Platform For Nonprofits</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2986ff;
            margin: 0;
            padding: 0;
        }

        .container1 {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .container1 h1 {
            font-size: 45px;
            color: #1234a5;
            margin-bottom: 30px;
        }

       .container1 label {
            display: block;
            font-size: 18px;
            color: #3633f6;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #074844;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        .container1 input[type="submit"] {
            background-color: #1421de;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
            margin-top: 20px;
        }

        .container1 input[type="submit"]:hover {
            background-color: #0093cd;
        }
        .container1 p {
            text-align: center;
            margin-top: 20px;
        }

        .container1  p a {
            color: #2836f5;
            text-decoration: none;
        }

        .container1 p a:hover {
            text-decoration: underline;
        }

        .sidebar {
            width: 250px;
            float: left;
            background-color: #333;
            padding: 20px;
            box-sizing: border-box;
        }

        .sidebar h2 {
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-size: 40px;
            color: #2836f5;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar li {
            background-color: rgb(43, 20, 20);
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            text-align: center;
        }

        .sidebar a {
            text-decoration: none;
            color: #3628f5;
            font-size: 18px;
            transition: all 0.3s ease;
            display: block;
        }

        .sidebar a:hover {
            background-color: #6461ff;
        }

        .content {
            margin-left: 270px;
            padding: 20px;
        }

        .content h2 {
            color: rgb(128, 0, 100);
            margin-bottom: 20px;
        }

        #section h2 {
            color: rgb(0, 26, 255);
        }

        section {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        section:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        h2 {
           text-align: center;
           font-size: 30px;
           font-family: "Arial", sans-serif; 
           font-style: bold;
           color: rgb(0, 47, 255); 
        }

        #overview h2 {
            text-align: center;
            font-size: 30px;
            font-family: "Arial", sans-serif;
            color: rgb(0, 34, 128);
        }

        #overview {
            background-color: #f9f9f9;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #overview h2 {
            text-align: center;
            font-size: 40px;
            color: #333;
            margin-bottom: 20px;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        }

        #overview p {
            text-align: center;
            font-size: 18px;
            color: black;
            margin-bottom: 10px;
        }

        #overview ul {
            list-style-type: none;
            padding: 28;
        }

        #overview li {
            
            font-size: 30px;
            color: rgb(128, 0, 107);
            margin-bottom: 5px;
        }

       
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Virtual Reality</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                
            <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">MANAGE<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

            <!-- Page Header  -->
            <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="container text-center py-5 mt-4">
                    <h1 class="display-2 text-white mb-3 animated slideInDown">ADMINISTRATION PANEL</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item" aria-current="page">DASHBOARD</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Page Header  -->

    <!-- Sidebar navigation menu -->
    <div class="sidebar">
        <h2>ADMIN PANEL</h2>
        <ul>
            <li><a href="#overview">Dashboard Overview</a></li>
            <li><a href="#manage-users">Manage Users</a></li>
            <li><a href="#manage-courses">Manage Courses</a></li>
            <li><a href="#manage-enrollments">Manage Enrollments</a></li>
            <li><a href="#view-transactions">View Transactions</a></li>
            <li><a href="#manage-assessments">Manage Assessments</a></li>
            <li><a href="#settings-preferences">Settings & Preferences</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <!-- Sidebar navigation menu -->



        <!-- Main content area -->
        <div class="content">
            <!-- Dashboard Overview -->
            <section id="overview">
                <h2>DASHBOARD OVERIEW</h2>
                <p>Welcome to the Dashboard Overview section. Here, you can find a summary of key metrics and statistics:</p>
                <ul>
                    <li>NUMBER OF ALL USERS: <b><?php echo $total_users; ?></li></b> 
                </ul>
            </section>
            
            <!-- Manage Users -->
            <section id="manage-users">
                <h2>MANAGE USERS</h2>
                <?php include "manage_users.php"; ?>
                <!-- Add user management functionality here -->
            </section>
    
            <!-- Manage Courses -->
            <section id="manage-courses">
                <h2>MANAGE COURSES</h2>
                <?php include "manage_courses.php"; ?>
                <!-- Add course management functionality here -->
            </section>
    
            <!-- Manage Enrollments -->
            <section id="manage-enrollments">
                <h2>MANAGE ENROLLMENTS</h2>
                <?php include "manage_enrollments.php"; ?>
                <!-- Add enrollment management functionality here -->
            </section>
    
            <!-- View Transactions -->
            <section id="view-transactions">
                <h2>VIEW TRANSACTIONS</h2>
                <?php include "manage_transactions.php"; ?>
                <!-- Add transaction viewing functionality here -->
            </section>
    
            <!-- Manage Assessments -->
            <section id="manage-assessments">
                <h2>MANAGE ASSESSMENTS</h2>
                <?php include "manage_assessments.php"; ?>
                <!-- Add assessment management functionality here -->
            </section>
    
            
        </div>
    




    
  

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="about.html">About Us</a>
                    <a class="btn btn-link" href="contact.html">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>KK59, KIGALI, RWANDA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0790277464</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>belyse@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="https://www.twitter.com/musema"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/belyse"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/rossa"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/belyse_250"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Subscribe to Our Newsletter</h4>
<p>Stay updated with the latest news, course releases, and special offers on our online virtual reality courses. Sign up now to join our community of learners passionate about exploring virtual worlds and unlocking new possibilities.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Online Virtual Reality Courses</a>, All Right Reserved.
                        Designed By <a class="border-bottom" href="#">Musemakweli Rossa  Arlande </a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>