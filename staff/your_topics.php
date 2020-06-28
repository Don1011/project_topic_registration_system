<?php 
    include("assets/inc/header.php");
    include("assets/inc/conn.php");
    
?>
    <div>
        <?php
            $id = $_SESSION['staff_id'];
            if(isset($_GET['undone'])){
                $sql_your_topics = "SELECT * FROM project_topic WHERE staff_id = '$id' AND status = 'undone'";
            }else if(isset($_GET['done'])){
                $sql_your_topics = "SELECT * FROM project_topic WHERE staff_id = '$id' AND status = 'done'";
            }else{
                header("location: index.php");
            }
        ?>
        <div class="center_button text-center">
            <a href = "your_topics.php?undone=1" class = "btn btn-dark btn-lg">Your Undone Projects</a>
            <a href = "your_topics.php?done=1" class = "btn btn-light btn-lg">Your Done Projects</a>
        </div>
        <div class="container">
            <div class="row">
                <?php
                    $query_your_topics = mysqli_query($conn, $sql_your_topics);
                    while($fetch_your_topics = mysqli_fetch_assoc($query_your_topics)):
                ?>
                <a href="topic_details.php?topic_id=<?php echo $fetch_your_topics['id']?>" class = "list_item">
                    <div class="row">
                        <div class="col-md-4">
                            <b><?php echo $fetch_your_topics['topic_name']?></b>
                        </div>
                        <div class="col-md-8">
                            <?php echo substr($fetch_your_topics['topic_details'], 0, 200)."..."?>
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