<?php 
    include("assets/inc/header.php");
    include("assets/inc/conn.php");    
?>
    <div>
        <?php
            if(!isset($_GET['contribution'])){
                header("location: index.php");
            }else{
                $c = $_GET['contribution'];
                $sql_c = "SELECT * FROM contributions WHERE id = '$c'";
                $query_c = mysqli_query($conn, $sql_c);
                $fetch_c = mysqli_fetch_assoc($query_c);
            }
        ?>
        <div class="container page_body">
            <div class = "page-header">
                <h1><?php echo $fetch_c['contribution_title']?></h1>
            </div>
            <div class="page_body">
                <p>
                    Added By: 
                    <?php 
                        $cor = $fetch_c['contributor'];
                        $sql_cor = "SELECT * FROM topic_registration WHERE id = '$cor'";
                        $query_cor = mysqli_query($conn, $sql_cor);
                        $fetch_cor = mysqli_fetch_assoc($query_cor);
                        echo $fetch_cor['student_matric_number'];
                    ?>
                </p>
                <p>
                    <?php echo $fetch_c['contribution_details']?>
                </p>
               
            </div>
        </div>
    </div>

<?php include("assets/inc/footer.php")?>