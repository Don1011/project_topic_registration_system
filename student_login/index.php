<?php 
    session_start();
    include("assets/inc/conn.php");
    include("assets/inc/header.php");
?>
    <div>
        
        <div class="container page_body">
            <?php
                if(!isset($_SESSION['student_id'])){
                    header("location: ../index.php");
                }else{
                    $id = $_SESSION['student_id'];
                    $sql_reg = "SELECT * FROM topic_registration WHERE id = '$id'";
                    $query_reg = mysqli_query($conn, $sql_reg);
                    $fetch_reg = mysqli_fetch_assoc($query_reg);

                    $topic_id = $fetch_reg['topic_id'];
                    $sql_topic = "SELECT * FROM project_topic WHERE id = '$topic_id'";
                    $query_topic = mysqli_query($conn, $sql_topic);
                    $fetch_topic = mysqli_fetch_assoc($query_topic);

                    $staff_id = $fetch_topic['staff_id'];
                    $sql_staff = "SELECT * FROM staffs WHERE id = '$staff_id'";
                    $query_staff = mysqli_query($conn, $sql_staff);
                    $fetch_staff = mysqli_fetch_assoc($query_staff);
                }
            ?>
            <div class="row">
                <div class="col-md-8">
                    <div class = "page-header">
                        <h1><?php echo $fetch_topic['topic_name']?></h1>
                    </div>
                    <div class="page_body">
                        <p>
                            Added By: <?php echo $fetch_staff['staff_name']?>
                        </p>
                        <p>
                            <?php echo $fetch_topic['topic_details']?>
                        </p>
                        <!-- The controibution list -->
                        <div>
                            <div class = "page-header">
                                <h3>Contributions</h3>
                            </div>
                            <?php
                                $sql_cont = "SELECT * FROM contributions WHERE topic = '$topic_id'";
                                $query_cont = mysqli_query($conn, $sql_cont);
                                while($fetch_cont = mysqli_fetch_assoc($query_cont)):
                            ?>
                            <a href="contribution_page.php?cont_id=<?php echo $fetch_cont['id']?>" class = "list_item">
                                <div class="row">
                                    <div class = "col-12">
                                        <b>Contribution to the topic</b> by 
                                        <?php 
                                            $c = $fetch_cont['contributor'];
                                            $sql_student = "SELECT * FROM topic_registration WHERE id = '$c'";
                                            $query_student = mysqli_query($conn, $sql_student);
                                            $fetch_student = mysqli_fetch_assoc($query_student);
                                            echo $fetch_student['student_matric_number'];
                                        ?>
                                    </div>
                                </div>
                            </a>
                            <?php
                                endwhile;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php
                        if(isset($_GET['title']) && isset($_GET['details'])){
                            if(!empty($_GET['title']) && !empty($_GET['details'])):
                                $title = $_GET['title'];
                                $details = $_GET['details'];

                                $sql_check = "SELECT * FROM contributions WHERE contribution_title = '$title'";
                                $query_check = mysqli_query($conn, $sql_check);
                                if(mysqli_num_rows($query_check)):
                                    $fetch_check = mysqli_fetch_assoc($query_check);
                                ?>
                                    <div class="grey_border">
                                        <p class="text-danger">
                                            Sorry, The Contribution You are trying to add has already been added. <a href="contribution_page.php?cont_id=<?php echo $fetch_check['id']?>">Click here to see details on it.</a>
                                        </p>
                                    </div>
                                <?php
                                
                                else:
                                    $time = date('h:i:s');
                                    $date = date('Y-m-d');

                                    $sql_add = "INSERT INTO contributions(contributor, topic, contribution_title, contribution_details, contribution_time, contribution_date) VALUES('$id', '$topic_id', '$title', '$details', '$time', '$date')";
                                    $query_add = mysqli_query($conn, $sql_add);
                                    ?>
                                    <div class="grey_border">
                                        <p class="text-primary">
                                            Your Contribution Has Been Successfully Added.
                                        </p>
                                    </div>
                                <?php  
                                endif;
                            else:
                                ?>
                                    <div class="grey_border">
                                        <p class="text-danger">
                                            You need to write some details on the project before adding.
                                        </p>
                                    </div>
                                <?php
                            endif;
                                
                        }
                    ?>
                    <form action="index.php" class = "contribution_form" method = "GET">
                        <div class="page-header">
                            <h1>Make Contribution</h1>
                        </div>
                        <input type="text" name = "title" class = "form-control" placeholder = "Contribution Topic">
                        <div class="widgContainer">
                            <textarea id="noise" name="details" class="widgEditor"></textarea>
                        </div>
                        <input type="submit" value = "Contribute" class = "btn btn-dark">
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include("assets/inc/footer.php")?>