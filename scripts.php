<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    



    function getcount($statuId){
        global $conn;
        //SQL SELECT
        $sql="SELECT * FROM tasks WHERE status_id = $statuId";
        // mysqli_fetch_all($result, MYSQLI_ASSOC);
        $res = mysqli_query($conn,$sql);
        $result = mysqli_fetch_all($res, MYSQLI_ASSOC);;

        echo count($result);
    }
    function getTasks($id)
    {
        //CODE HERE
        global $conn;
        //SQL SELECT
        $sql ="SELECT types.name as NameTypes ,priority.name as NamePriority, status.name AS NameStatus ,tasks.* FROM tasks ,types ,priority , status WHERE tasks.type_id = types.id and tasks.priority_id = priority.id and tasks.status_id = status.id and tasks.status_id = $id";
        $res = mysqli_query($conn,$sql);
        
// data-bs-toggle="modal"  data-bs-target="#task<?php echo $row['id']" 
      
        while ($row = mysqli_fetch_assoc($res)) { ?>     
        <button  data="<?php echo $row['status_id']?>" id="<?php echo $row["id"] ?>"  onclick="editeTask(<?php echo $row['id'] ?>)" class="d-flex button border  w-100 p-1 "  href="#modal-task" data-bs-toggle="modal">
            <div class="col-md-1" >
                <?php 
                if($row['NameStatus']  == 'To Do'){
                    echo '<i class="fa fa-circle-question text-success"></i>'; 
                }
                elseif ($row['NameStatus']  == 'In Progress'){
                    echo '<i class="fa fa-spinner text-success"></i> ';
                }
                else{
                    echo '<i class="fa fa-circle-check text-success"></i>'; 
                }?>
            </div>
            <div class="text-start col-md-11 ">
                <!-- <input id="hiba" type="hidden" value="<?php// echo $row["status_id"] ?>"> -->
                <div class="fw-bold" id="title<?php echo $row["id"] ?>" data="<?php echo $row['title'] ?>" ><?php echo $row["title"] ?></div>
                <div class="">
                    <div class="text-gray" data="<?php echo $row['date']?>">#<span><?php echo $row['id']?></span> created in <span id="date<?php echo $row["id"] ?>" data = "<?php echo $row['date'] ?>"><?php echo $row["date"] ?></span></div>
                    <div class="" id="description<?php echo $row["id"] ?>" data="<?php echo $row['description']?>"><?php echo  substr($row["description"], 0, 35,); ?></div>
                </div>
                <div class="">
                    <span class="col-md-auto btn btn-primary text-white" id="priority<?php echo $row["id"] ?>" data="<?php echo $row['priority_id']?>"><?php echo $row["NamePriority"] ?></span>
                    <span class="col-md-auto btn btn-gray text-dark" id="type<?php echo $row["id"] ?>" data="<?php echo $row['type_id']?>" ><?php echo $row["NameTypes"] ?></span>
                    <!-- <span class="d-none" id="task-id"><?php //echo $row["id"] ?></span> -->
                </div>
            </div>
        </button>
        

        <?php
        }
    }


    // function saveTask()
    // {
    //     global $conn;
    //     $title = $_POST['task_name'];
    //     $type = $_POST['task_type'];
    //     $priority = $_POST['task_priority'];
    //     $status = $_POST['task_status'];
    //     $date = $_POST['task_date'];
    //     $description = $_POST['task_description'];
    //     $sql ="INSERT INTO `tasks`(`title`, `type_id`, `priority_id`, `status_id`, `date`, `description`) 
    //     VALUES ('$title','$type','$priority','$status','$date','$description')";
    //     // echo $sql;
    //     $res = mysqli_query($conn,$sql);

    //     $_SESSION['message'] = "Task has been added successfully !";
	// 	header('location: index.php');
    // }
    function saveTask()
    {
        global $conn;
        
        if(empty($_POST['task_name'])||empty($_POST['task_description'])||empty($_POST['task_type'])||empty($_POST['task_priority'])||empty($_POST['task_status'])||empty($_POST['task_date'])){
               
            $_SESSION['error'] = "Task has not been added  !";
            header('location: index.php');


        }
        else{
        $title =test_input($_POST['task_name']) ;
        $type = $_POST['task_type'];
        $priority =$_POST['task_priority'];
        $status =$_POST['task_status'];
        $date =$_POST['task_date'];
        $description =test_input( $_POST['task_description']);

    

        $sql ="INSERT INTO `tasks`(`title`, `type_id`, `priority_id`, `status_id`, `date`, `description`) 
        VALUES ('$title','$type','$priority','$status','$date','$description')";
        // echo $sql;
        $res = mysqli_query($conn,$sql);

        $_SESSION['message'] = "Task has been added successfully !";
		header('location: index.php');
        }
    }
    function test_input($test){
        
        $test=htmlspecialchars($test);
        $test=trim($test);
        $test=stripslashes($test);
        return $test;

    }

    function updateTask()
    {
        global $conn;
        $id=$_POST['task_id'];
        $title = $_POST['task_name'];
        $type = $_POST['task_type'];
        $priority = $_POST['task_priority'];
        $status = $_POST['task_status'];
        $date = $_POST['task_date'];
        $description = $_POST['task_description'];

        // echo  
        // $type ;
       
        $sql="UPDATE `tasks` SET `title`='$title',`type_id`='$type',`priority_id`='$priority',`status_id`='$status',`date`='$date',`description`='$description' 
        WHERE `id`='$id'";
         $res = mysqli_query($conn,$sql);
         $_SESSION['message'] = "Task has been updated successfully !";
         header('location: index.php');
       
      
    }

    function deleteTask()
    {
        global $conn;
        $id=$_POST['task_id'];
    
        $sql="DELETE FROM `tasks` WHERE `id`='$id' ";
        $res = mysqli_query($conn,$sql);
        //SQL DELETE
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }

?>