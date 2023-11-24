<?php

    $server = 'localhost';
    $user_name = 'root';
    $password = '';
    $dbname = 'itbasket';

    $connect = mysqli_connect($server,$user_name,$password,$dbname);

    if(!$connect){
        die("failed" .mysqli_connect_error());
    }

?>


<?php
    if($_SERVER["REQUEST_METHOD"]=='POST'){
        $email= $_POST['email'];
        $current_password= $_POST['current_password'];
        $new_password= $_POST['new_password'];


        $sql ="SELECT * FROM user  WHERE email = '$email'";
        $result = $connect->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if($current_password===$row['password']){
                $sql= "UPDATE user  SET password='$new_password' WHERE email= '$email'";
                $result = mysqli_query($connect,$sql);


                if($result){
                    echo "successful";
                }
                else{
                    echo "error";
                }
            }
            else{
                echo "wrong current password";
            }
        
        }
        else{
            echo "email doesn't exist";
        }
    }

    mysqli_close($connect);






?>