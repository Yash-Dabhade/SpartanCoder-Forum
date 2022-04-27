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
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE `category_id` = $id;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $catTitle = $row['category_title'];
    ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $problem_title = $_POST['problem_title'];
        $problem_desc = $_POST['problem_desc'];
        $user_id = $_SESSION['sno'];
        $sql = "INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES (NULL, '$problem_title', '$problem_desc', '$id', '$user_id', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success ! </strong> Your thread has been posted successfully. Please wait for the community to respond.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>

    <!-- Rules -->
    <div class="container-fluid">
        <div class="row">
            <div class="col order-first figure">
                <img src="./res/threadsListImg2.gif" class=" g-col-md-4 figure-img img-fluid rounded" alt="...">

            </div>
            <div class="col order-last m-2 container-md border border-secondary shadow p-2 mb-5 bg-body rounded">
                <h4 class="text-center fs-3 my-2 ">Rules for the <?php echo $catTitle ?> Forum</h4>
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

    <!-- Ask Question section -->
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<div class="container my-3">
        <p class="fs-3">Ask your Question </p>
        <form action="' . $_SERVER['REQUEST_URI'] . '" method="POST">
            <div class="mb-3">
                <label for="problem_title" class="form-label">Problem Title</label>
                <input type="text" class="form-control" id="problem_title" name="problem_title" aria-describedby="emailHelp">
                <div id="problem_title_help" class="form-text">Keep the title short and crisp</div>
            </div>
            <div class="mb-3">
                <label for="problem_desc" class="form-label">Elaborate the problem</label>
                <textarea class="form-control" id="problem_desc" name="problem_desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-danger">POST</button>
        </form>
    </div>';
    } else {
        echo '<div class="text-center link-warning fs-4" >Please log in to ask questions !   </div> </div>';
    }
    ?>

    <div class="container-fluid">
        <p class="fs-3 text-center">Browse Questions for <?php echo $catTitle ?></p>
        <div class="container-xl my-2">
            <div class="container-md  rounded">
                <!-- Questions here -->
                <?php
                $id = $_GET['catid'];
                $sql = "SELECT * FROM `threads` WHERE `thread_cat_id` = $id;";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 0)
                    echo '<div class="text-center link-danger fs-3" >No threads found ! </div>';
                else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $timestamp = $row['timestamp'];
                        $thread_id = $row['thread_id'];
                        $title = $row['thread_title'];
                        $desc = $row['thread_desc'];
                        $thread_user_id = $row['thread_user_id'];
                        //fetching user details
                        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);



                        echo ' <div class="card p-2 m-3">
                    <h5 class="card-header" style="color:grey;">Posted by ' . $row2['user_email'] . ' : ' . $timestamp . '</h5>
                    <div class="card-body">
                        <h5 class="card-title">' . $title . '</h5>
                        <p class="card-text">' . substr($desc, 0, 30) . '...</p>
                        <a href="thread.php?threadid=' . $thread_id . '" class="btn btn-warning" style="color:white;">See Discussions</a>
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