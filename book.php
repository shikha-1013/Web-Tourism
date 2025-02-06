    <?php
    // Start the session
    session_start();

    // Database connection (replace with your own database credentials)
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'login';
    $conn = new mysqli($host, $user, $password, $dbname);

    // Check if the database connection is successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form is submitted
    if (isset($_POST['send'])) {
        // Collect form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $location = $_POST['location'];
        $guests = $_POST['guests'];
        $arrivals = $_POST['arrivals'];
        $leaving = $_POST['leaving'];

        // Insert form data into the bookings table
        $stmt = $conn->prepare("INSERT INTO bookings (name, email, phone, address, location, guests, arrivals, leaving) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $name, $email, $phone, $address, $location, $guests, $arrivals, $leaving);

        if ($stmt->execute()) {
            echo "<script>alert('Booking successfully submitted!');</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        // Close the statement
        $stmt->close();
    }

    $conn->close();
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Now</title>
        <!-- swiper css link-->
        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
        <!--font awesome cdn link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!--custom css link file-->
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <!--header section starts-->
    <section class="header">
        <a href="home.php" class="logo">Travel</a>
        <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="package.php">package</a>
            <a href="book.php">book</a>
            <!-- <?php
            if (isset($_SESSION['user_id'])) {
                echo '<a href="profile.php" class="user-name">Hello, ' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . '</a>';
                echo '<a href="logout.php" class="logout">Logout</a>';
            } else {
                echo '<a href="index.php">Login</a>';
            }
            ?> -->
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </section>
    <!--header section ends-->

    <div class="heading" style="background:url(images/img2.jpg) no-repeat">
        <h1>Book Now</h1>
    </div>

    <!--booking section starts-->
    <section class="booking">
        <h1 class="heading-title">Book Your Trip!</h1>
        <form action="book.php" method="post" class="book-form">
            <div class="flex">
                <div class="inputBox">
                    <span>Name:</span>
                    <input type="text" placeholder="Enter your name" name="name" required>
                </div>
                <div class="inputBox">
                    <span>Email:</span>
                    <input type="email" placeholder="Enter your email" name="email" required>
                </div>
                <div class="inputBox">
                    <span>Phone:</span>
                    <input type="number" placeholder="Enter your number" name="phone" required>
                </div>
                <div class="inputBox">
                    <span>Address:</span>
                    <input type="text" placeholder="Enter your address" name="address" required>
                </div>
                <div class="inputBox">
                    <span>Where to:</span>
                    <input type="text" placeholder="Place you want to visit" name="location" required>
                </div>
                <div class="inputBox">
                    <span>How many:</span>
                    <input type="number" placeholder="Number of guests" name="guests" required>
                </div>
                <div class="inputBox">
                    <span>Arrivals:</span>
                    <input type="date" name="arrivals" required>
                </div>
                <div class="inputBox">
                    <span>Leaving:</span>
                    <input type="date" name="leaving" required>
                </div>
            </div>
            <input type="submit" value="Submit" class="btn" name="send">
        </form>
    </section>
    <!--booking section ends-->

    <!--footer section starts-->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Quick Links</h3>
                <a href="home.php"><i class="fas fa-angle-right"></i>Home</a>
                <a href="about.php"><i class="fas fa-angle-right"></i>About</a>
                <a href="package.php"><i class="fas fa-angle-right"></i>Package</a>
                <a href="book.php"><i class="fas fa-angle-right"></i>Book</a>
            </div>
            <div class="box">
                <h3>Extra Links</h3>
                <a href="#"><i class="fas fa-angle-right"></i>Ask Questions</a>
                <a href="#"><i class="fas fa-angle-right"></i>About Us</a>
                <a href="#"><i class="fas fa-angle-right"></i>Privacy Policy</a>
                <a href="#"><i class="fas fa-angle-right"></i>Terms of Use</a>
            </div>
            <div class="box">
                <h3>Contact Info</h3>
                <a href="#"> <i class="fas fa-phone"></i>+123-456-7890</a>
                <a href="#"> <i class="fas fa-phone"></i>+111-222-3333</a>
                <a href="#"> <i class="fas fa-envelope"></i>shaikhanas@gmail.com</a>
                <a href="#"> <i class="fas fa-map"></i>Jaipur, India - 302023</a>
            </div>
            <div class="box">
                <h3>Follow Us</h3>
                <a href="#"> <i class="fab fa-facebook"></i>Facebook</a>
                <a href="#"> <i class="fab fa-twitter"></i>Twitter</a>
                <a href="#"> <i class="fab fa-instagram"></i>Instagram</a>
                <a href="#"> <i class="fab fa-linkedin"></i>LinkedIn</a>
            </div>
        </div>
        <div class="credit">Copyright © 2024, Easy Tech</div>
    </section>
    <!--footer section ends-->

    <!--swiper js link-->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <!--custom js file link -->
    <script src="js/script.js"></script>
    </body>
    </html>
