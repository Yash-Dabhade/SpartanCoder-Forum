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

    <!-- Custom css -->
    <link rel="stylesheet" href="./styles/indexPage.css">
    <title>SpartanCoders Forum</title>
</head>

<body>

    <?php include './partials/_header.php' ?>
    <?php include './partials/_dbconnect.php' ?>


    <!-- Rules -->
    <div class="container-fluid">
        <div class="row">
            <div class="col order-first figure">
                <img src="./res/threadsListImg2.gif" class=" g-col-md-4 figure-img img-fluid rounded" alt="...">

            </div>
            <div class="col order-last m-2 container-md border border-secondary shadow p-2 mb-5 bg-body rounded">
                <h4 class="text-center fs-3 my-2 ">Rules for the Forum</h4>
                <ul class="p-4  list-group">
                    <li class="list-group-item">No Spam / Advertising / Self-promote in the forums</li>
                    <li class="list-group-item">Do not post copyright-infringing material</li>
                    <li class="list-group-item">Do not post “offensive” posts, links or images</li>
                    <li class="list-group-item">Remain respectful of other members at all times</li>
                    <li class="list-group-item">Do not offer to pay for help</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <p class="fs-3 text-center">Browse Questions</p>
        <div class="container-xl my-2">
            <div class="container-md  rounded">
                <!-- Questions here -->
                <div class="card p-2 m-3">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-warning" style="color:white;">Go somewhere</a>
                    </div>
                </div>
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