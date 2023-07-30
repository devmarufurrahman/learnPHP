<?php

    $conn = mysqli_connect("localhost","root","","ajaxCrud");

    if(isset($_POST['isData'])){
        $name = $_POST['Name'];
        $email = $_POST['Email'];


        $query = "INSERT INTO Data(Name,Email) VALUES('$name','$email')";
        $query_run = mysqli_query($conn,$query);
    }
    


    if(isset($_POST['isView'])){
        $dataId = $_POST['dataId'];


        $query = "SELECT * FROM Data WHERE id=$dataId";
        $query_run= mysqli_query($conn,$query);

        $result_array = [];


        if(mysqli_num_rows($query_run) > 0){
            foreach($query_run as $row){
                array_push($result_array,$row); 
            }
    
            header('Content-type: application/json');
            echo json_encode($result_array); 
        } else{
            echo "<h4>No Record Found!</h4>";
        }
    }


?>