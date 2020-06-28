<?php 
    include("assets/inc/conn.php");
    include("assets/inc/header.php");
?>
    <div>
        
        <div class="container page_body">
            <?php
                if(isset($_GET['cont_id'])){
                    $cont = $_GET['cont_id'];
                    $sql_cont = "SELECT * FROM contributions WHERE id = '$cont'";
                    $query_cont = mysqli_query($conn, $sql_cont);
                    $fetch_cont = mysqli_fetch_assoc($query_cont);
                }else{
                    header("location: index.php");
                }
            ?>
            <div class = "page-header">
                <h1><?php echo $fetch_cont['contribution_title']?></h1>
            </div>
            <div class="page_body">
                <p>
                    Added By: 
                    <?php
                        $student = $fetch_cont['contributor'];
                        $sql_student = "SELECT * FROM topic_registration WHERE id = '$student'";
                        $query_student = mysqli_query($conn, $sql_student);
                        $fetch_student = mysqli_fetch_assoc($query_student);
                        echo $fetch_student['student_name'];
                    ?>
                </p>
                <p>
                    <?php echo $fetch_cont['contribution_details']?>
                </p>
               
            </div>
        </div>
    </div>

<?php include("assets/inc/footer.php")?>