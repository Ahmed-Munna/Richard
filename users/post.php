<?php
    session_start();
    include('include/config.php');
    $name               = filter_var($_POST["name"],FILTER_SANITIZE_STRING);
    $email              = $_POST["email"];
    $password           = $_POST["password"];
    $hash_password      = password_hash($password,PASSWORD_DEFAULT);
    $number             = preg_match('@[0-9]@', $password);
    $uppercase          = preg_match('@[A-Z]@', $password);
    $lowercase          = preg_match('@[a-z]@', $password);
    $specialChars       = preg_match('@[^\w]@', $password);
    $gender             = filter_var($_POST["gender"],FILTER_SANITIZE_STRING);
    if(empty($name)){
        $mass   = "Name field is requerd";
        header('location:regestation.php?nam_err='.$mass);
    }elseif(empty($email)){
        $mass   = "email field is requerd";
        header('location:regestation.php?email_err='.$mass);
    }elseif(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
        $mass   = "You should submit valid email";
        header('location:regestation.php?valid_email_err='.$mass);
    }elseif(empty($password)){
        $mass   = "Password field is requerd";
        header('location:regestation.php?password_err='.$mass);
    }elseif(!$number | !$uppercase | !$lowercase | !$specialChars >= 8){
        $mass   = "You should be strong password";
        header('location:regestation.php?strong_pass_err='.$mass);
    }elseif(empty($gender)){
        $mass   = "Gender field is requerd";
        header('location:regestation.php?gender_err='.$mass);
    }else{
        $valid_query   = "SELECT COUNT(*) as reg FROM user WHERE email='$email'";
        $valid_query   = mysqli_query($db_connect,$valid_query);
        $fetch         = mysqli_fetch_assoc($valid_query);
        if($fetch["reg"]==1){
            $_SESSION["err_reg"]    = "This email or pass alrady exsist";
            header('location:regestation.php');
        }else{
            $insart_query       =  "INSERT INTO `user`(`name`, `email`, `pass`, `gender`) VALUES ('$name','$email','$hash_password','$gender')";
            mysqli_query($db_connect,$insart_query);
            $_SESSION["succ"]       = "regestation successfull";
            header('location:regestation.php');
        }
        
    }

?>