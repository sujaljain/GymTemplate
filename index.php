<!-- echo "<script>
        alert('Thankyou for writting to us. We will respond you as soon as possible.')
        </script>"; -->
<?php
$insert = 0;
if (isset($_POST['FirstName'])) {

    //Set Connection Variables
    $server = "localhost";
    $username = "root";
    $password = "";

    //Create a database connection
    $con = mysqli_connect($server, $username, $password);


    //check for connection success
    if (!$con) {
        die("Connection to the database failed due to" .
            mysqli_connect_error());
    }
    // } else {
    //     echo "Connection Succesful..";
    // }


    //Collecting Post Variables
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $Subject = $_POST['Subject'];
    $Description = $_POST['Description'];

    // ERROR HANDLING
    //If any field is empty:)
    if (
        empty($FirstName) || empty($LastName) || empty($Email) ||
        empty($Phone) || empty($Subject) || empty($Description)
    ) {
        $insert = 1;
        // echo "Any field cannot be empty";

        //Closing the database connection
        $con->close();
    } else {

        $sql = "INSERT INTO `gym`.`contact` (`FirstName`, `LastName`, `Email`, `Phone`,
        `Subject`, `Description`, `Date`) VALUES ('$FirstName', '$LastName', '$Email', '$Phone',
        '$Subject','$Description',  current_timestamp());";
        // echo $sql;


        //Executing the query
        if ($con->query($sql) == true) {
            // echo "Successfully Inserted";

            // $insert = 2; //For successful insertion

            $insert = 2;
        } else {
            echo "ERROR: $sql <br> #con-error";
        }

        //Closing the database connection
        $con->close();
    }
}
// else {
//     echo "<script>
//         alert('First Name field cannot be empty')
//         </script>";
// }
?>



<!-- HTML -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- My Own Css -->
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="mobile.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Be Fit - Home</title>
</head>

<body>

    <!--NavBar-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top HeadingFont">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <img src="Images/Logo2.png" alt="LOGO" width="30" height="24" class="d-inline-block align-top">
                Be Fit
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav nav-pills">
                    <li class="nav-item list-group" id="list-example">
                        <a class="nav-link" aria-current="page" href="index.html">Home</a>
                    </li>

                    <li class="nav-item list-group" id="list-example">
                        <a class="nav-link" href="#about-div">About</a>
                    </li>

                    <li class="nav-item list-group" id="list-example">
                        <a class="nav-link" href="#categories-div">Categories</a>
                    </li>

                    <li class="nav-item list-group" id="list-example">
                        <a class="nav-link" href="#ourblogs-div">Our Blogs</a>
                    </li>

                    <li class="nav-item list-group" id="list-example">
                        <a class="nav-link" href="#contact-div">Contact</a>
                    </li>

                    <li class="nav-item">
                        <div class="btn-group">
                            <button type="button" class="drop-button dropdown-position btn dropdown-toggle HeadingFont" data-bs-toggle="dropdown" aria-expanded="false">
                                <a>More</a>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Timimgs</a></li>
                                <li><a class="dropdown-item" href="#">Pricings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Book A Custom Class</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn FreeClass" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <h5>FREE Class</h5>
                        <!-- <h6><span class="badge bg-warning">New</span></h6> -->
                    </button>

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <div class="content">
        <!-- Error Msg -->
        <?php
        if ($insert == 1) {
            echo' 
            <h6><span class="badge bg-danger">Alert</span></h6>
            <p style = "color: red">
            Any field cannot be empty.
            </p>';
        } else if ($insert == 2) {
            echo' 
            <h6><span class="badge bg-success">Success</span></h6>
            <p style = "color: green">
            Thankyou for writting to us. We will respond you as soon as possible.
            </p>';
        }
        ?>
        <!-- Carousel -->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Images/machines.jpg" class="d-block w-100" alt="Image" height="500px" width="400px">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Being fit is one of the best thing in the world.<h5>
                                <p>A fit and healthy body can perform all sorts of tasks without any kind of tiredness
                                    or restlessness.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="Images/carousel-1.jfif" class="d-block w-100" alt="Image" height="500px" width="400px">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Be fit - Be healthy.</h5>
                        <h5>Make yourself absolutely fit with us.</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="Images/Gym1.jpg" class="d-block w-100" alt="Image" height="500px" width="400px">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Fitness and Health is the number one priority.</h5>
                        <h5>It improves the confidence level and reduces stress in life.</h5>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>



        <!-- Modal -->
        <div class="modal fade HeadingFont" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Book Your Seat For Demo Class</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="Book-class-and-Form font1 HeadingFont">
                            <div class="Book-class">
                                <h4>Book your FREE Demo Class Today</h4>
                                <h5>Hurry Up!! Only Few Seats Left</h5>
                            </div>
                            <div class="Form">
                                <form action="/index.html">
                                    <input type="text" id="bName" name="bName" placeholder="Full Name">
                                    <input type="email" id="bEmail" name="bEmail" placeholder="E-mail Address">
                                    <input type="tel" id="bPhone" name="bPhone" placeholder="Phone Number">
                                </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success book-now-btn">
                        Book Now!!</button>
                </div>
            </div>
        </div>
    </div>


    <div class="quote">
        <img src="Images/NewQuote.png" alt="">
    </div>


    <!-- Other Content -->
    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" tabindex="0">
        <!--ABOUT-->
        <div class="About-div">
            <div class="blank-div" id="about-div"></div>
            <h1 id="about"><u>About Us</u></h1>
            <h1 id="TrainersHeading"><u>Meet our Trainers</u></h1>
            <div class="trainers">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="Images/trainer-1.jfif" id="i1" height="140px" width="140px" fill="#777">
                        <h2 class="trainer-name">Brandon Stok</h2>
                        <p>Hey, Myself Brandon. I was winner of the National Level Body Building competition. I am
                            very
                            much
                            passionate in my work of being fit and make others also fit so that every individual
                            will
                            live a
                            happy and healthy life. I gaurantee you that if you join me and our gym you will thank
                            god
                            for
                            giving you this such a nice opportunity.</p>
                        <p class="read-more-btn"><a class="btn btn-secondary" href="#" role="button">Read More »</a>
                        </p>
                    </div>


                    <div class="col-lg-4">
                        <img src="Images/trainer-2.jfif" id="i2" height="140px" width="140px" fill="#777">
                        <h2 class="trainer-name">John Bram</h2>
                        <p>Hello my good friend. Do you also want to make your body fit and fine by doing only 1-2
                            hours
                            gym.
                            Then, I would say that you came to the best place for it. I am pretty much sure that you
                            gain a nice
                            muscular body after joining a very good gym like the our one. So, don't think much and
                            join
                            our gym
                            as soon as possible. Good Luck!</p>
                        <p class="read-more-btn"><a class="btn btn-secondary" href="#" role="button">Read More »</a>
                        </p>
                    </div>


                    <div class="col-lg-4">
                        <img src="Images/trainer-3.jfif" id="i3" height="140px" width="140px" fill="#777">
                        <h2 class="trainer-name">Tommy Roe</h2>
                        <p>Hi everyone. I think Fitness is very much important in everyone's life. Everyone can lead
                            a
                            happy
                            life if one is healthy and fit. There is also a saying which says that:- "Health is
                            wealth
                            and
                            Health is more valuable than anything in this world." I and all other trainers are here
                            to
                            help you.
                            Hope that you will take my wordings in concern.</p>
                        <p class="read-more-btn"><a class="btn btn-secondary" href="#" role="button">Read More »</a>
                        </p>
                    </div>

                </div>
            </div>>

            <hr size="4">


            <!--CATEGORIES-->
            <div class="Categories">
                <div class="blank-div" id="categories-div"></div>
                <h1 id="categories"><u>Categories</u></h1>
                <div class="all-cards-c">
                    <div class="card-c" style="width: 18rem;">
                        <img src="SVGs/fitness.svg" class="card-img-top" alt="...">
                        <div class="card-body-c">
                            <h5 class="card-text-c">Weight Lifting</h5>
                        </div>
                    </div>
                    <div class="card-c" style="width: 18rem;">
                        <img src="SVGs/gym-workout-treadmill.svg" class="card-img-top" alt="...">
                        <div class="card-body-c">
                            <h5 class="card-text-c">Treadmill</h5>
                        </div>
                    </div>
                    <div class="card-c" style="width: 18rem;">
                        <img src="SVGs/diet-food.svg" class="card-img-top" alt="...">
                        <div class="card-body-c">
                            <h5 class="card-text-c">Weight Loss</h5>
                        </div>
                    </div>
                    <div class="card-c" style="width: 18rem;">
                        <img src="SVGs/meditation-yoga.svg" class="card-img-top" alt="...">
                        <div class="card-body-c">
                            <h5 class="card-text-c">Yoga and Meditation</h5>
                        </div>
                    </div>
                    <div class="card-c" style="width: 18rem;">
                        <img src="SVGs/healthy.svg" class="card-img-top" alt="...">
                        <div class="card-body-c">
                            <h5 class="card-text-c">Muscular Body</h5>
                        </div>
                    </div>
                </div>
            </div>

            <hr size="4">


            <!-- Our Blogs -->
            <div class="Blogs">
                <div class="blank-div" id="ourblogs-div"></div>
                <h1 id="ourblogs"><u>Our Blogs</u></h1>
                <div class="blogs">
                    <div class="part-one-blogs">
                        <div class="card">
                            <img src="Images/blog-pic.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="card-body">
                                    <h5 class="card-title">Get A Muscular Body within 30 days</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <img src="Images/blog-pic.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="card-body">
                                    <h5 class="card-title">Loose inches in just a few weeks</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <img src="Images/blog-pic.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="card-body">
                                    <h5 class="card-title">Get A Muscular Body within 30 days</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="blogs">
                        <div class="part-two-blogs">
                            <div class="card">
                                <img src="Images/blog-pic.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Yoga And Meditation</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <img src="Images/blog-pic.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Full Body Fitness</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <img src="Images/blog-pic.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Full Body Fitness</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="See-More">
                        <a href="##">See More</a>
                    </div>
                </div>


                <hr size="4">


                <!-- CONTACT -->
                <div class="Contact">
                    <div class="blank-div" id="contact-div"></div>
                    <h1 class="contactheading" id="contact"><u>No Worries!!</u></h1>
                    <h1 class="contactheading"><u>Feel Free to Contact Us</u></h1>
                    <div class="contact-form">
                        <form class="m-form" action="index.php" method="post">
                            <div class="m-form-box">
                                <!-- <label>Enter Your Name :-</label> -->
                                <input type="text" id="FirstName" name="FirstName" placeholder="First Name">
                                <input type="text" id="LastName" name="LastName" placeholder="Last Name">
                            </div>
                            <div class="m-form-box">
                                <!-- <label>Enter Your Email Address :-</label> -->
                                <input type="email" id="Email" name="Email" placeholder="Email Address">
                            </div>
                            <div class="m-form-box">
                                <!-- <label>Enter Your Mobile Number :-</label> -->
                                <input type="phone" id="Phone" name="Phone" placeholder="Contact Number">
                            </div>
                            <div class="m-form-box">
                                <!-- <label>Enter Subject :-</label> -->
                                <input type="text" id="Subject" name="Subject" placeholder="Subject">
                            </div>
                            <div class="m-form-box">
                                <!-- <label>Please Describe Your Concern</label> -->
                                <textarea class="TextArea" id="Description" name="Description" placeholder="Please Elaborate Your Concern"></textarea>
                            </div>
                            <div class="m-form-box-2" id="Check-Box">
                                <input type="checkbox">
                                <label><a href="/index.html">I Accept All The Terms & Conditions of
                                        befit.com</a></label>
                            </div>
                            <div class="m-form-box-3">
                                <input type="submit" class="Submit-btn">
                            </div>
                    </div>
                    <div class="information">
                        <div class="info-content">
                            <!-- <img src="Images/yoga.jpg" alt=""> -->
                            <div class="phone">
                                <img src="SVGs/phone.svg" alt="svg">
                                <p class="info-text">+91 50384 32821</p>
                            </div>

                            <div class="email">
                                <img src="SVGs/envelope.svg" alt="svg">
                                <p class="info-text">support@befit.com</p>
                            </div>

                            <div class="address">
                                <img src="SVGs/building.svg" alt="svg">
                                <p class="info-text">
                                    Rose Wood Complex, Hello Garden,
                                </p>
                                <p class="info-text">
                                    S-Block, South Delhi - 190973
                                </p>
                                <p class="info-text">
                                    India.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->
        <hr size="4">


        <!-- Footer -->
        <footer>
            <div class="Copyright-Line">
                <p>All Copyrights &copy; are reserved
                    <a href="index.html">befit.com</a>
                </p>

                <div class="icons">
                    <!-- Facebook Icon -->
                    <a href="https://www.facebook.com/">
                        <img src="SVGs/facebook-square-color.svg" alt="Facebook Icon">
                    </a>

                    <!-- Instagram Icon -->
                    <a href="https://www.instagram.com/">
                        <img src="SVGs/instagram-color.svg" alt="Instagram Icon">
                    </a>

                    <!-- LinkedIn Icon -->
                    <a href="https://www.linkedin.com/">
                        <img src="SVGs/linkedin-square-color.svg" alt="LinkedIn icon">
                    </a>

                </div>
            </div>
        </footer>
    </div>




    <!-- <h1>Hello, world!</h1> -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>



<!-- <div class='modal fade HeadingFont' id='staticBackdrop' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                <div class='modal-header'>
                <h5 class='modal-title' id='staticBackdropLabel'>Book Your Seat For Demo Class</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                <div class='Book-class-and-Form font1 HeadingFont'>
                <div class='Book-class'>
                                <h4>Book your FREE Demo Class Today</h4>
                                <h5>Hurry Up!! Only Few Seats Left</h5>
                                </div>
                            <<div class='Form'>
                            <form action='/index.html'>
                            <input type='text' id='Name' name='Name' placeholder='Full Name'>
                            <input type='email' id='Email' name='Email' placeholder='E-mail Address'>
                            <input type='tel' id='Phone' name='Phone' placeholder='Phone Number'>
                            </form>
                            </div>
                            </div>
                            </div>
                            <div class='modal-footer'>
                            <button type='button' class='btn btn-outline-success book-now-btn'>
                            Book Now!!</button>
                </div>
            </div>
            </div>" -->