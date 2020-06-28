<?php 
    include("assets/inc/header.php");
    include("assets/inc/conn.php");

?>
    <div>
        <div class = "header text-center custom_profile_row">
            <h1>Registered Topics</h1>
        </div>
        <div class="container">
            <div class="row">
                <?php
                    $sql_reg = "SELECT * FROM topic_registration ORDER BY id DESC";
                    $query_reg = mysqli_query($conn, $sql_reg);
                    while($fetch_reg = mysqli_fetch_assoc($query_reg)):
                ?>
                <a href="reg_details.php?reg_id=<?php echo $fetch_reg['id']?>" class = "list_item">
                    <div class="row">
                        <div class="col-md-4">
                            <b><?php echo $fetch_reg['student_name']?></b> 
                        </div>
                        <div class="col-md-8">
                            <?php 
                                $topic = $fetch_reg['topic_id'];
                                $sql_topic = "SELECT * FROM project_topic WHERE id = $topic";
                                $query_topic = mysqli_query($conn, $sql_topic);
                                $fetch_topic = mysqli_fetch_assoc($query_topic);
                                echo $fetch_topic['topic_name'];
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

<?php include("assets/inc/footer.php")?>