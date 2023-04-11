<!doctype html>
<html lang="en">
<?php include './adminHeader.php' ?>
<?php include '../partials/_dbconnect.php' ?>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>SpartanCoders Forum</title>
    <style>
        body {
            scroll-behavior: smooth;
        }

        .heading {
            color: #641086;
            font-size: 34px;
            font-family: Georgia, 'Times New Roman', Times, serif
        }

        #container {
            margin: 40px 20px;
            display: flex;
            height: 80vh;
            align-items: flex-start;
            justify-content: center;
            gap: 50px;
        }



        #viewTable {
            padding: 20px;
            width: 65%;
        }

        #addForm {
            border: 1px solid black;
            border-radius: 15px;
            padding: 20px;
            width: 35%;
        }


        .btn {
            /* background-color: #641086; */
            color: white;
        }
    </style>
</head>

<body>



    <!-- submit_form -->
    <?php


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $imgurl = $_POST['imgurl'];

        $sql = "INSERT INTO `categories` (`category_id`, `category_title`, `category_description`,  `imgurl`) VALUES (NULL, '$title', '$description', '$imgurl')";
        $result = mysqli_query($conn, $sql);
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success ! </strong> Category added Successfully 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    } else {
        if (isset($_GET["catId"])) {
            $catid = $_GET["catId"];
            $sql = "DELETE FROM `categories` WHERE `category_id`=$catid";
            $result = mysqli_query($conn, $sql);
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success ! </strong> Category Deleted Successfully 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>


    <div id="container" class="flexProp">
        <div id="viewTable">
            <h2 class="heading">Available Categories</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">TITLE</th>
                        <th scope="col">DESCRIPTION</th>
                        <th scope="col">IMGURL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT * FROM `categories`;";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) == 0)
                        echo '<div class="text-center link-danger fs-3" >No threads found ! </div>';
                    else {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $catid = $row['category_id'];
                            $title = $row['category_title'];
                            $desc = $row['category_description'];
                            $url = $row['imgurl'];

                            echo '
                            <tr>
                            <th scope="row">' . $catid . '</th>
                            <td>' . substr($title, 0, 20) . '</td>
                            <td>' . substr($desc, 0, 40) . '...</td>
                            <td>' . substr($url, 0, 10) . '...</td>
                            <td><form action=' . htmlspecialchars($_SERVER['PHP_SELF']) . ' method="GET">
                            <input type="hidden" name="catId" value="' . $catid . '"/> 
                            <input type="submit"  value="Delete" class="btn btn-danger" /></form></td>
                            </tr>
                         ';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="addForm">
            <h2 class="heading">
                Add New Category
            </h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="form-group mt-2">
                    <label for="title">Category Title</label>
                    <input type="text" required class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter title" name="title">

                </div>
                <div class="form-group mt-2">
                    <label for="description">Category Description</label>
                    <input required type="text" class="form-control" name="description" id="Description" aria-describedby="emailHelp" placeholder="Enter Short and Precise Description">

                </div>
                <div class="form-group mt-2">
                    <label for="imgurl">Image URL</label>
                    <input required type="text" class="form-control" id="imageUrl" aria-describedby="emailHelp" name="imgurl" placeholder="Enter Image URL">
                    <small id="emailHelp" class="form-text text-muted">Image url should be of copyright free hosted images</small>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-4 ">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>