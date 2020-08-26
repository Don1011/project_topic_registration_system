<?php 
    include("assets/inc/header.php");
    include("assets/inc/conn.php");
?>
    <div>
        
        <div class="container page_body">
            <?php
                if(isset($_GET['topic_id']) && isset($_POST['name']) && isset($_POST['matric_number']) && isset($_POST['password']) && isset($_POST['confirm_password'])){
                    
                    $topic_id = $_GET['topic_id'];

                    if(!empty($_GET['topic_id']) && !empty($_POST['name']) && !empty($_POST['matric_number']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])){
                        
                        $name = $_POST['name'];
                        $matric_number = $_POST['matric_number'];
                        $password = $_POST['password'];
                        $confirm_password = $_POST['confirm_password'];
                        $time = date('h:i:s');
                        $date = date('Y-m-d');

                        if($password == $confirm_password){
                            $sql_reg = "INSERT INTO topic_registration(`student_name`, `student_matric_number`, `password`, `topic_id`, `registration_time`, `registration_date` ) VALUES('$name', '$matric_number', '$password', '$topic_id', '$time', '$date')";

                            $query_reg = mysqli_query($conn, $sql_reg);
                             
                            echo "<script lang = 'javascript'>
                                alert('Topic Registration Successful.');
                                location.href = 'topic_details.php?topic_id=$topic_id';
                            </script>";
                            // header("location: topic_details.php?topic_id=$topic_id");
                        }else{
                            echo "<script lang = 'javascript'>
                                alert('Make sure passwords match before submitting the form.');
                                location.href = 'topic_details.php?topic_id=$topic_id';
                            </script>";
                            // header("location: topic_details.php?topic_id=$topic_id");
                        }

                    }else{
                        echo "<script lang = 'javascript'>
                            alert('Complete filling the form before submitting.');
                            location.href = 'topic_details.php?topic_id=$topic_id';
                        </script>";
                        // header("location: topic_details.php?topic_id=$topic_id");
                    }
                    
                }elseif(isset($_GET['topic_id'])){
                    
                    $topic_id = $_GET['topic_id'];

                    $sql_topic = "SELECT * FROM project_topic WHERE id = '$topic_id'";
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
                                $sql_cont = "SELECT * FROM contributions WHERE topic = '$topic_id'";
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





                        <div class="bootstrap-modal my-5 text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalLong">
                                Register Topic
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Fill in your details.</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class = "text-left" action="topic_details.php?topic_id=<?php echo $_GET['topic_id']?>" method = "POST">
                                                <div class="form-group">
                                                    <label for="name">Full Name</label>
                                                    <input type="text" id = "name" name = "name" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="matric_number">Matric Number</label>
                                                    <input type="text" id = "matric_number" name = "matric_number" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" id = "password" name = "password" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="confirm_password">Confrim Password</label>
                                                    <input type="password" id = "confirm_password" name = "confirm_password" class="form-control">
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Register</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

<?php include("assets/inc/footer.php")?>
