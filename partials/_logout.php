<?php
session_start();
echo "Logging you out. Please wait...";

session_destroy();
header("Location: /projects/StudyForum/index.php");
