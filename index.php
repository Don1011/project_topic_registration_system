<?php 
    include("assets/inc/conn.php");
    include("assets/inc/header.php");
    
?>
    <div>
        
        <div class="center_button text-center">
            <a href = "index.php" class = "btn btn-dark btn-lg">Undone Projects</a>
            <a href = "index.php?done=1" class = "btn btn-light btn-lg">Done Projects</a>
        </div>
        <div class="container">
            <div class="row">
                <?php
                    if(isset($_GET['done'])){
                        $sql_topics = "SELECT * FROM project_topic WHERE status = 'done'";
                    }else{
                        $sql_topics = "SELECT * FROM project_topic WHERE status = 'undone'";
                    }
                    $query_topics = mysqli_query($conn, $sql_topics);
                    while($fetch_topic = mysqli_fetch_assoc($query_topics)):
                ?>
                <a href="topic_details.php?topic_id=<?php echo $fetch_topic['id']?>" class = "list_item">
                    <div class="row">
                        <div class="col-md-4">
                            <?php echo $fetch_topic['topic_name']?>
                        </div>
                        <div class="col-md-8">
                            <?php echo substr($fetch_topic['topic_details'], 0, 200)."..."?>
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