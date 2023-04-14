<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../res/logo.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Custom css -->
    <link rel="stylesheet" href="./styles/indexPage.css">
    <link rel="stylesheet" href="../styles/dashboard.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>SpartanCoders Forum</title>
    <style>
        body {
            scroll-behavior: smooth;
        }

        .cardContainer {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            flex-wrap: wrap;
            padding: 50px;
            background: url('../res/adminbg.jpg') center center/cover no-repeat;
        }

        .card2 {
            /* margin-top: 50px; */
            border-radius: 15px;
            display: flex;
            align-items: center;
            background-color: whitesmoke;
            width: 200px;
            justify-content: center;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;

        }

        .cardTop {
            display: flex;
            height: 100px;
            gap: 30%;
            align-items: center;
            justify-content: space-evenly;


        }

        .cardTop>img {
            width: 64px;
        }

        #actionpanel {
            margin: 5px;
            display: flex;
            margin-top: 40px;
            align-items: center;
            justify-content: center;
            gap: 30px;
            justify-content: space-around;

        }

        @media only screen and (max-width: 750px) {
            #actionpanel {
                flex-wrap: wrap;
            }

            .cardContainer {
                gap: 20px;
                flex-direction: column;
            }

            .card2 {
                width: 90%;
            }
        }

        .btn-custom {
            background-color: #641086;
            color: white;
        }

        .contactDev {
            height: 134px;
            width: 144px;
        }

        .contact {
            display: flex;
            align-items: center;
            justify-content: center;
            /* flex-direction: column; */
        }

        .card {
            width: 800px;
            height: 300px;
        }
    </style>
</head>

<body>

    <?php include './adminHeader.php' ?>
    <?php include '../partials/_dbconnect.php' ?>


    <!-- main Section -->
    <div id="container">

        <!-- status cards container -->
        <div class="cardContainer">
            <div class="card2 avatar" data-tooltip="Categories">

                <div class="cardTop ">
                    <img src="../res/categories.png" alt="" class="cardIcon">
                    <h3 class="m-2"><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `categories`")); ?></h3>

                </div>
            </div>
            <div class="card2 avatar" data-tooltip="Questions">
                <div class="cardTop ">
                    <img src="../res/questions.png" alt="" class="cardIcon">
                    <h3 class="m-2"><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `threads`")); ?></h3>
                </div>
            </div>
            <div class="card2 avatar" data-tooltip="Comments">
                <div class="cardTop ">
                    <img src="../res/comments.png" alt="" class="cardIcon">
                    <h3 class="m-2"><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `comments`")); ?></h3>
                </div>
            </div>
            <div class="card2 avatar" data-tooltip="Active Users">
                <div class="cardTop ">
                    <img src="../res/users.png" alt="" class="cardIcon">
                    <h3 class="m-2"><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `users`")); ?></h3>
                </div>
            </div>
        </div>

        <!-- -------------------------------------------- -->
        <div id="actionpanel">
            <div class="card text-center">
                <div class="card-header">
                    Categories Control
                </div>
                <div class="card-body" class="contact">
                    <h5 class="card-title">Add/Delete Categories</h5>
                    <img src="../res/categoryMain.png" alt="contact" class="contactDev">
                </div>
                <div class="card-footer">
                    <a href="./alterCategories.php" class="btn btn-primary w-100">Add/Modify</a>
                </div>

            </div>
            <div class="card text-center">
                <div class="card-header">
                    User Control
                </div>
                <div class="card-body" class="contact">
                    <h5 class="card-title">Suspend the malicious users</h5>
                    <img src="../res/malicioususer.png" alt="contact" class="contactDev">
                </div>
                <div class="card-footer">
                    <a href="./alterUsers.php" class="btn btn-primary w-100">View Users</a>
                </div>

            </div>
            <div class="card text-center">
                <div class="card-header">
                    Contact Developer
                </div>
                <div class="card-body" class="contact">
                    <h5 class="card-title">Facing Technical Issue</h5>
                    <img src="../res/contactdeveloper.png" alt="contact" class="contactDev">
                </div>
                <div class="card-footer">
                    <a href="https://mail.google.com/mail/u/0/?fs=1&to=dabhadeyash1111@gmail.com&tf=cm" class="btn btn-primary w-100">Contact Now</a>
                </div>

            </div>

        </div>
        <!-- modal -->
    </div>


</body>

</html>