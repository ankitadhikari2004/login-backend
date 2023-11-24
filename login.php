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
        $password= $_POST['password'];

        $sql ="SELECT * FROM user  WHERE email = '$email'";
        $result = $connect->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();

            if($password===$row['password']){
                echo "login successful";
            } else{
                echo "invalid password";
            }
        } else{
            echo "login failed";
        }
    }

    mysqli_close($connect);

?>
