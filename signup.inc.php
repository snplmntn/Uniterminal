<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $Email == $_POST["Email"];
    $Pass == $_POST["Password"];
    
    try{    
        require_once "connection.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";

        //ERROR HANDLERS
        $errors = [];

        if(inputHandler($Email, $Pass)){
            $errors["empty_inputs"] = "Fill in All Fields!";
        }

        if(emailValidator($Email)){
            $errors["invalid_email"] = "Invalid Email Used!";
        }

        if(emailChecker($pdo, $Email)){
            $errors["used_email"] = "Email Already Used";
        }

        require_once "session.inc.php";

        if($errors){
            $_SESSION["error_signup"] = $errors;
            header("Location: signup-form.php");
            die();
        }

       create_user($pdo, $Email, $Pass);
       header("Location: signup-form.php?signup=success");
       $pdo = null;
       $stmt = null;
       die();

    } catch(PDOException $e) {
        die("QUERY FAILED!" . $e->getMessage());
    }
} else {
    header("Location: signup-form.php");
    die();
}