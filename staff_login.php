<?php
    session_start();
    include("./assets/inc/conn.php");
?>
<!DOCTYPE html>
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
<div class = "">
<br><br><br><br><br>
    <div class="header text-center">
        <h2>Staff Login</h2>
    </div>
    <?php
        if(isset($_POST['email']) && isset($_POST['password']))
        {
            if(!empty($_POST['email']) && !empty($_POST['password']))
            {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $sql_login = "SELECT * FROM staffs WHERE staff_email = '$email' AND staff_password = '$password'";
                $query_login = mysqli_query($conn, $sql_login);
                if(mysqli_num_rows($query_login)){
                    $fetch_login = mysqli_fetch_assoc($query_login);
                    $_SESSION['staff_id'] = $fetch_login['id'];
                    header("location: ./staff/index.php");
                }else{
                    echo "<script type = 'text/javascript'>alert('Wrong Login Details');</script>";
                }
            }else
            {
                echo "<script type = 'text/javascript'>alert('Please Finish Filling The Form Before Submitting');</script>";
            }
        }
    ?>
    <form action="staff_login.php" method = "POST" class = "register_form text-center">
        <input type="text" name = "email" class = "form-control" placeholder = "Enter your email">
        <br>
        <input type="password" name = "password" class = "form-control" placeholder = "Enter your password">
        <br>
        <br>
        <button class = "btn btn-dark">Login</button>
    </form>

</div>
<?php include("./assets/inc/footer.php")?>