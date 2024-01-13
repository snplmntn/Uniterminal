<?php

declare(strict_types=1);

function signup_inputs(){
    if(isset($_SESSION["signup_data"]["Email"]) && !isset($_SESSION["error_signup"]["used_email"]) && !isset($_SESSION["error_signup"]["invalid_email"]) ){
        echo '<label>Email</label>
         <input type="email" class="input-email" name="Email" placeholder="Enter Email" value="' . $_SESSION["signup_data"]["Email"] . '" required>';
    } else {
        echo ' <label>Email</label>
        <input type="email" class="input-email" name="Email" placeholder="Enter Email" required>';
    } 

    echo ' <label>Password</label>
    <input type="password" class="input-password" name="Pass" placeholder="Enter Password" required>
    <label>Re-Type Password</label>
    <input type="password" class="input-repassword" placeholder="Re-Type Password" required> ';
}

function check_signup_errors(){
    if(isset($_SESSION['error_signup'])){
        $errors = $_SESSION['error_signup'];
        echo "<br>";

        foreach ($errors as $error){
            echo "<p>" .$error . "</p>";
        }

        unset($_SESSION['error_signup']);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success"){
        echo "<br>";
        echo "<p>Signup Success!</p>";
    }
}

?>