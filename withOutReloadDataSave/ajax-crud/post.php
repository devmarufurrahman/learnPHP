<?php

    $conn = mysqli_connect("localhost","root","","ajaxCrud");

    if(isset($_POST['isData'])){
        $name = $_POST['Name'];
        $email = $_POST['Email'];


        $query = "INSERT INTO Data(Name,Email) VALUES('$name','$email')";
        $query_run = mysqli_query($conn,$query);
    }
    


?>