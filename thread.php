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


    <!-- Thread Details -->
    <div class="container-fluid">
        <div class="row">
            <?php
            $id = $_GET['threadid'];
            $sql = "SELECT * FROM `threads` WHERE `thread_id` = $id;";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $thread_id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            echo ' <div class="col  order-last m-4 p-4 container-md border border-secondary shadow p-2 mb-5 bg-body rounded">
            <h4 class="fs-3 my-2 ">' . $title . '</h4>
            <p class="fs-5">' . $desc . '</p>
            </div>';
            ?>
        </div>
    </div>

    <!-- Post a comment -->
    <div class="container my-3">
        <p class="fs-3">Post a comment </p>
        <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST">
            <div class="mb-3">
                <label for="comment" class="form-label">Enter your comment </label>
                <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-danger">POST COMMENT</button>
        </form>
    </div>

    <!-- Discussions -->
    <div class="container-fluid">
        <p class="fs-3 text-center"> Discussions </p>
        <div class="container-xl my-2">
            <div class="container-md  rounded">
                <!-- Questions here -->
                <?php
                $id = $_GET['threadid'];
                $sql = "SELECT * FROM `comments` WHERE `thread_id` = $id;";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 0)
                    echo '<div class="text-center link-danger fs-3" >No Comments found , Be the first one to comment! </div>';
                else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $timestamp = $row['timestamp'];
                        $thread_id = $row['thread_id'];
                        $comment_by = $row['comment_by'];
                        $comment = $row['comment'];
                        echo ' <div class="card p-2 m-3">
                    <h5 class="card-header" style="color:grey;">Posted on : ' . $timestamp . '</h5>
                    <div class="card-body">
                    </div>
                        <div class="card-title">Username</div>
                        <p class="card-text">' . $comment . '</p>
                    </div>
                </div>';
                    }
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