<?php
$id = $_POST['id'];
$pass = $_POST['pass'];

//database connection
$con = new mysqli("localhost","root","","pciu computer club");
if($con->connect_error){
    die("Failed to connect : ".$con->connect_error);
}else{
    $stmt = $con->prepare("select * from register where id = ?");
    $stmt-> bind_param("s",$id);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result-> fetch_assoc();
        if($data['pass']===$pass){
            echo "<h2>Login Successfully</h2>";
        }else{
            echo "<h2>Invalid ID or password</h2>";
        }
    }else{
        echo "<h2>Invalid ID or Password</h2>";
    }
}
?>