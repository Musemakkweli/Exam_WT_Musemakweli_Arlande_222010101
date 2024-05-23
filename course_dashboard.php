<?php
session_start();

// Include database connection file
require_once "config.php";



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch courses from the database
$sql = "SELECT CourseID, Title, Description, Link FROM courses";
$result = $conn->query($sql);


// Function to insert achievement into the database
function insertAchievement($conn, $userID) {
    // Achievement name
    $achievementName = "Completion of courses";

    // Achievement date (current timestamp)
    $achievementDate = date("Y-m-d H:i:s");

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("INSERT INTO archivements (UserID, ArchivementName, ArchivementDate) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $userID, $achievementName, $achievementDate);
    $stmt->execute();
    $stmt->close();
}

// Check if UserID is set and not empty
if (isset($_POST['userID']) && !empty($_POST['userID'])) {
    // Get UserID from POST data
    $userID = $_POST['userID'];

    // Call the function to insert achievement
    insertAchievement($conn, $userID);

    // Redirect to the same page or any other page as needed
    // header("Location: your_page.php");
    // exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Online Virtual Reality (VR) Courses Platform</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

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
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 50px;
            width: 200%;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
        }
        .card h5{
            color: black;
            text-align: center;
            font-weight: bold;
            font-size: 25px;
        }
        .card {
            margin: 10px;
            width: 300px;
            background-color: #ffc107; /* Default background color */
        }
        .card:nth-child(2n) {
            background-color: #17a2b8; /* Alternate background color */
        }
        .card-body {
            color: #fff;
        }
        .btn-finish {
            margin-top: 20px;
            width: 50%;
            margin-left:270px;
            margin-bottom: 20px;
        }
         
  
    </style>
</head>
<!-- Navigation Bar -->

        
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
                <a href="personal_info.php" class="nav-item nav-link">PROFILE</a>
                <a href="settings.php" class="nav-item nav-link active">UPDATE</a>
                <a href="payment.html" class="nav-item nav-link active">PAY</a>
                <a href="enrollments.php" class="nav-item nav-link">COURSES</a>
                <a href="course_dashboard.php" class="nav-item nav-link active">LEARN</a>
                <a href="assessment.php" class="nav-item nav-link active">ASSESSMENTS</a>
                <a href="feedback.php" class="nav-item nav-link active">COMMENT</a>
                <a href="logout.php" class="nav-item nav-link active">LOGOUT</a>
            </div>
            
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5 mt-4">
            <h1 class="display-2 text-white mb-3 animated slideInDown">STUDENT PAGE</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item" aria-current="page">FELL THE DASHBOARD</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header -->

    <div class="container">
        <h1 class="text-center">Budgeting Training Dashboard</h1>
        <a href="insert_enrollment.php" class="nav-item nav-link" style="color: rgb(255, 0, 136); background-color: cyan; text-align:center;">Befor you start, Enroll Now</a>
        <div class="card-container">
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["Title"]; ?></h5>
                            <p class="card-text"><?php echo $row["Description"]; ?></p>
                            <button class="btn btn-primary start-course" data-link="<?php echo $row["Link"]; ?>">Start Course</button>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No courses found";
            }
            ?>
        </div>
        
        <button class="btn btn-success btn-finish" data-toggle="modal" data-target="#finishModal">Finish</button>
    </div>
    
    <!-- Modal for Finish -->
<div class="modal fade" id="finishModal" tabindex="-1" role="dialog" aria-labelledby="finishModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="finishModalLabel">Finish and Insert Achievement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="achievementForm" method="post" action="">
                    <div class="form-group">
                        <label for="userID">Enter Your UserID:</label>
                        <input type="text" class="form-control" id="userID" name="userID" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Insert Achievement</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Modal for Video -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Course Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="videoContainer"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
    $(".start-course").click(function() {
        var videoLink = $(this).data("link");
        var videoId = extractVideoId(videoLink);
        var embedUrl = 'https://www.youtube.com/embed/' + videoId;
        $("#videoContainer").html('<iframe width="100%" height="400" src="' + embedUrl + '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
        $("#videoModal").modal("show");
    });
});

function extractVideoId(url) {
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    var match = url.match(regExp);
    return (match && match[7].length === 11) ? match[7] : false;
}

    </script>
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
