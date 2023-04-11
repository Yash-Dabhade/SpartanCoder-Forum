<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./res/logo.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="./styles/indexPage.css">
    <title>SpartanCoders Forum</title>

    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css");

        body {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>

    <?php include './partials/_header.php' ?>
    <?php include './partials/_dbconnect.php' ?>
    <?php
    if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success !</strong> Registration Successful, Login next time.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } else if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false" && isset($_GET['error'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error !</strong> ' . $_GET['error'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>

    <!-- Intro to the forum -->
    <div class="container m-5">

        <div class="row align-items-center">
            <div class="col">
                <h1 class="display-5">Welcome to the online discussion forum for <span class=" font-monospace fw-bold placeholder-glow" style="color:#F2B23E ">
                        Computer Science Spartans
                    </span>
                </h1>

            </div>
            <div class="col">
                <img src="./res/landingPage/top.jpg" class="img-fluid " alt="">
            </div>
        </div>
    </div>


    <!-- Trending -->
    <div class="container-fluid rounded">
        <div class="rounded-pill " style="background-color: #2A0944;">
            <h2 class="text-center my-4" style="font-family: 'Kanit', sans-serif; color:white">Trending Categories</h2>
        </div>
        <div class="row my-0 row-cols-1 row-cols-md-4 g-4  align-items-center justify-content-center rounded" id="trending">

            <!--Fetching data from the categories  -->
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            $limit = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $limit + 1;
                if ($limit > 8)
                    break;
                $catID = $row['category_id'];
                $catTitle = $row['category_title'];
                $catDesc = $row['category_description'];
                $catImg = $row['imgurl'];

                echo '
                <div class="col">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded my-4 h-100" style="width: 18rem; height:auto;">
                        <img src=' . $catImg . ' class="card-img-top img-thumbnail" style="height:250px; width:auto;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">' . $catTitle . '</h5>
                            <p class="card-text">' . substr($catDesc, 0, 45) . '...</p>  
                        </div>
                        <div class="card-footer">
                             <a href="threadslist.php?catid=' . $catID . '" class="btn btn-primary rounded-pill " style="width:100%">Visit Thread</a>
                        </div>
                    </div>
            </div>';
            }
            ?>
        </div>

    </div>
    </div>






    <?php include './partials/_footer.php' ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>