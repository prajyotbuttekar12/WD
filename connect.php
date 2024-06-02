<?php

    $con=mysqli_connect("localhost","root","","signup_page");
    if(mysqli_connect_error()){
        echo"
        <Script>
        alert('cannnot conect to database');
        </Script>";        
        exit();
    }
    else
    { echo"
        <script>
        alert('connection established');
        </script>";
    }
    $name=$_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    if(strlen($password)>=8 and strlen($password)<=16 and preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*-+=])/",$password)){ //pregmatch matches the given pattern in string($password)//
    if($password==$confirm_password)
    { 
    $hash=password_hash($password,PASSWORD_DEFAULT);
    
    {$query= ("INSERT INTO users (name,username,email,password)VALUES('$name','$username','$email','$hash')");
    $data= mysqli_query($con,$query);
   if($data){
    echo "<script>
    alert('DATA INSERTED');
    </script>";
   }
    else {
        echo "FAILED";
    }
 }}
 else{
    echo "<script>
    alert('Password Doesnt match!');
    </script>";
 }
    }
    else{
        echo"
        <script>
        alert('password length should be between 8-16 and must contain one uppercase,lowercase,numbers,specialcharcter');
        </script>";
    }
    mysqli_close($con);
?>
