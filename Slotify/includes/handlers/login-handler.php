<?php

    if (isset($_POST['LoginButton'])) {
    //LOGIN BUTTON WAS PRESSED
    $userName=$_POST['loginUserName'];
    $password=$_POST['loginPassword'];
    

    //Login Function
    $result = $account->login($userName,$password);

    if($result==true){
        $_SESSION['userLoggedIn'] = $userName;
        header("location: index.php");
    }
    }

?>