<?php 
    include("assets/inc/header.php");
    include("assets/inc/conn.php");
?>
    <div>
        
        <div class="container page_body">
            <?php
                if(isset($_GET['reg_id'])){
                    $reg_id = $_GET['reg_id'];

                    $sql_reg = "SELECT * FROM topic_registration WHERE id = '$reg_id'";
                    $query_reg = mysqli_query($conn, $sql_reg);
                    $fetch_reg = mysqli_fetch_assoc($query_reg);

                    $topic = $fetch_reg['topic_id'];
                    $sql_topic = "SELECT * FROM project_topic WHERE id = '$topic'";
                    $query_topic = mysqli_query($conn, $sql_topic);
                    $fetch_topic = mysqli_fetch_assoc($query_topic);

                    $staff = $fetch_topic['staff_id'];
                    $sql_staff = "SELECT * FROM staffs WHERE id = '$staff'";
                    $query_staff = mysqli_query($conn, $sql_staff);
                    $fetch_staff = mysqli_fetch_assoc($query_staff);
                }else{
                    header("location: index.php");
                }
                
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class = "page-header">
                        <h1><?php echo $fetch_topic['topic_name']?></h1>
                    </div>
                    <div class="page_body">
                        <p>
                            Added By: <?php echo $fetch_staff['staff_name']?>
                        </p>
                        <div>
                            <?php echo $fetch_topic['topic_details']?>
                        </div>
                        <!-- The controibution list -->
                        <div>
                            <div class = "page-header">
                                <h3>Contributions</h3>
                            </div>
                            <?php
                                $sql_cont = "SELECT * FROM contributions WHERE topic = '$topic'";
                                $query_cont = mysqli_query($conn, $sql_cont);
                                while($fetch_cont = mysqli_fetch_assoc($query_cont)):
                            ?>
                            <a href="contribution_page.php?contribution=<?php echo $fetch_cont['id']?>" class = "list_item">
                                <div class="row">
                                    <div class = "col-12">
                                        <b>Contribution to the topic</b> by 
                                        <?php 
                                            $c = $fetch_cont['contributor'];
                                            $sql_contributor = "SELECT * FROM topic_registration WHERE id = '$c'";
                                            $query_contributor = mysqli_query($conn, $sql_contributor);
                                            $fetch_contributor = mysqli_fetch_assoc($query_contributor);
                                            echo $fetch_contributor['student_matric_number'];
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
                
            </div>
        </div>
    </div>

<?php include("assets/inc/footer.php")?>