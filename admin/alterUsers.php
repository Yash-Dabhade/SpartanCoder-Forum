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
        $email = $_POST['email'];
        $password = $_POST['password'];

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ( '$email', '$hash', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success ! </strong> User added Successfully 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    } else {
        if (isset($_GET["Id"])) {
            $id = $_GET["Id"];
            $sql = "DELETE FROM `users` WHERE `user_id`=$id";
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
            <h2 class="heading">List of the users</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">CREATED AT</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT * FROM `users`;";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) == 0)
                        echo '<div class="text-center link-danger fs-3" >No threads found ! </div>';
                    else {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['user_id'];
                            $email = $row['user_email'];
                            $createdAt = $row['timestamp'];


                            echo '
                            <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . substr($email, 0, 40) . '</td>
                            <td>' . substr($createdAt, 0, 40) . '...</td>
                            <td><form action=' . htmlspecialchars($_SERVER['PHP_SELF']) . ' method="GET">
                            <input type="hidden" name="Id" value="' . $id . '"/> 
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
                Add New User
            </h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="form-group mt-2">
                    <label for="title">Email</label>
                    <input type="text" required class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter title" name="email">

                </div>
                <div class="form-group mt-2">
                    <label for="description">Password</label>
                    <input required type="text" class="form-control" name="password" id="Description" aria-describedby="emailHelp" placeholder="Enter Short and Precise Description">

                </div>


                <button type="submit" class="btn btn-primary w-100 mt-4 ">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>