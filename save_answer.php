<?php
session_start();
require 'config.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["question_id"], $_POST["answer"])) {
    $_SESSION["answers"][ $_POST["question_id"] ] = $_POST["answer"];
    header("Location: quiz.php?q=" . ($_POST["question_id"] + 1));
    exit();
}
?>