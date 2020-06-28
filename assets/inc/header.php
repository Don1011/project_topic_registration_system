<!DOCTYPE html>
<?php session_start()?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Archive</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="./assets/css/styles.css">

    
</head>
<body>
    <nav class = "navbar navbar-expand-md navbar-dark bg-dark">
        <a href="index.php" class = "navbar-brand">Project Archive</a>
        <button type="button" class = "navbar-toggler" data-toggle="collapse" data-target = "#navbarCollapse">
            <span class = "navbar-toggler-icon"></span>
        </button>

        <div class = "collapse navbar-collapse" id = "navbarCollapse">
            <div class = "navbar-nav">
                <a href="index.php" class = "nav-item nav-link">Home</a>
                <a href="staff_login.php" class = "nav-item nav-link">Staff Login</a>
                <button class = "nav-item nav-link nav_button" onclick = "showStudentLoginForm()" id = "loginFormButton">My Topic</button>
                <div id="loginForm" class = "display_none">
                    <?php
                        if(isset($_POST['mat_no']) && isset($_POST['password']))
                        {
                            if(!empty($_POST['mat_no']) && !empty($_POST['password']))
                            {
                                $m = $_POST['mat_no'];
                                $p = $_POST['password'];
                                $sql_login = "SELECT * FROM topic_registration WHERE student_matric_number = '$m' AND password = '$p'";
                                $query_login = mysqli_query($conn, $sql_login); 
                                if(mysqli_num_rows($query_login))
                                {
                                    $fetch_login = mysqli_fetch_assoc($query_login);
                                    $_SESSION['student_id'] = $fetch_login['id'];
                                    header("location: ./student_login/index.php");
                                }else{
                                    echo "<script lang = 'javascript'>alert('Incorrect Login Details');</script>";
                                }
                            }
                        }
                    ?>
                    <form action="<?php echo $_SERVER['SCRIPT_NAME']?>" class = "form-inline ml-auto" method = "POST">
                        <button class="fa fa-times-circle close_button" onclick = "removeStudentLoginForm()" type = "button" role = "button"></button>
                        <input name = "mat_no" type="text" class = "form-control mr-sm-2" placeholder = "Matric number">
                        <input name = "password" type="password" class = "form-control mr-sm-2" placeholder = "Password">
                        <button type = "submit" class = "btn btn-outline-light">Login</button>
                    </form>
                </div>
            </div>
            <!--
            <form action="#" class = "form-inline ml-auto">
                <input type="text" id = "searchInput" class = "form-control mr-sm-2" placeholder = "Search Topic">
                <button type = "button" onclick = "clearSearchInput()" class = "fa fa-times btn btn-outline-danger"></button>
            </form>
            -->
        </div>
    </nav>