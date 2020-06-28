<?php
    session_start();
    if(!isset($_SESSION['staff_id'])){
        header("location: ../staff_login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Project Archive</title>
        <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="./assets/fontawesome/css/all.css">
        <link rel="stylesheet" href="./assets/css/styles.css">
        <!-- The style linking for the text editor -->
        <link rel="stylesheet" href="./assets/widgEditor/css/widgEditor.css">
    </head>
    <body>
        <nav class = "navbar navbar-expand-md navbar-dark bg-dark">
            <a href="#" class = "navbar-brand">Project Archive</a>
            <button type="button" class = "navbar-toggler" data-toggle="collapse" data-target = "#navbarCollapse">
                <span class = "navbar-toggler-icon"></span>
            </button>
            <div class = "collapse navbar-collapse" id = "navbarCollapse">
                <div class = "navbar-nav">
                    <a href="index.php" class = "nav-item nav-link">Home</a>
                    <a href="your_topics.php?undone=1" class = "nav-item nav-link">Your Topics</a>
                    <a href="add_topic.php" class = "nav-item nav-link">Add New Topic</a>
                    <a href="index.php" class = "nav-item nav-link">Logout</a>
                </div>
            </div>
        </nav>