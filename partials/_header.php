<?php
session_start();
include 'partials/_loginmodal.php';
include 'partials/_signmodal.php';

echo '<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #2A0944;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/projects/StudyForum/">
            <img src="./res/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
            SpartanCoders Forum
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
                       ';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '<div class="d-flex justify-content-end">
                    <a href="partials/_logout.php" class="btn btn-outline-warning ml-2">Logout</a>
            </div>';
} else {
    echo '<div style="float:right;">
    <button class="btn  btn-outline-warning me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
    <button class="btn  btn-outline-warning me-2" data-bs-toggle="modal" data-bs-target="#signModal">Register</button>
    </div>';
}

echo '</div>
    </div>
</nav>';
