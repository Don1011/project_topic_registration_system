<?php 
    include("assets/inc/header.php");
    include("assets/inc/conn.php");

?>
    <div>
        
        <div class="container page_body">
            <div class="row justify-content-center text-center">
                <div class="col-md-12">
                    <form action="add_topic.php" class = "contribution_form" method = "GET">
                        <div class="page-header">
                            <h1>Add New Topic</h1>
                        </div>
                        <?php
                            if(isset($_GET['title']) && isset($_GET['details'])){
                                if(!empty($_GET['title']) && !empty($_GET['details'])):
                                    $title = $_GET['title'];
                                    $details = $_GET['details'];

                                    $sql_check = "SELECT * FROM project_topic WHERE topic_name = '$title'";
                                    $query_check = mysqli_query($conn, $sql_check);
                                    if(mysqli_num_rows($query_check)):
                                        $fetch_check = mysqli_fetch_assoc($query_check);
                                    ?>
                                        <div class="grey_border">
                                            <p class="text-danger">
                                                Sorry, The Topic You are trying to add has already been added. <a href="topic_details.php?topic_id=<?php echo $fetch_check['id']?>">Click here to see details on it.</a>
                                            </p>
                                        </div>
                                    <?php                                
                                    else:
                                        $staff_id = $_SESSION['staff_id'];
                                        $status = "undone";
                                        $time = date('h:i:s');
                                        $date = date('Y-m-d');

                                        $sql_add = "INSERT INTO project_topic(topic_name, topic_details, staff_id, status, time_added, date_added) VALUES('$title', '$details', '$staff_id', '$status', '$time', '$date')";
                                        $query_add = mysqli_query($conn, $sql_add);
                                        ?>
                                        <div class="grey_border">
                                            <p class="text-primary">
                                                Your Topic Has Been Successfully Added.
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
                        <input type="text" name = "title" class = "form-control" placeholder = "Topic Title">
                        <div class="widgContainer">
                            <textarea id="noise" name="details" class="widgEditor">Enter Topic Details...</textarea>
                        </div>
                        <input type="submit" value = "Add" class = "btn btn-dark">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include("assets/inc/footer.php")?>