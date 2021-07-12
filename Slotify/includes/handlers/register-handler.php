<?php


function sanitizeFormPassword($inputText){
  $inputText = strip_tags($inputText);
  return $inputText;
}

function sanitizeFormUserName($inputText){
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ","", $inputText);
  return $inputText;
}

function sanitizeFormString($inputText){
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ","", $inputText);
  $inputText = ucfirst(strtolower($inputText));
  return $inputText;
}


if (isset($_POST['RegisterButton'])) {
  //REGISTER BUTTON WAS PRESSED
  $userName = sanitizeFormUserName($_POST['userName']);
  $firstName = sanitizeFormString($_POST['firstName']);
  $lastName = sanitizeFormString($_POST['lastName']);
  $email = sanitizeFormString($_POST['email']);
  $email2 = sanitizeFormString($_POST['email2']);
  $Password = sanitizeFormPassword($_POST['Password']);
  $Password2 = sanitizeFormPassword($_POST['Password2']);

  
  $wasSuccessful = $account->register($userName,$firstName,$lastName,$email,$email2,$Password,$Password2);

  if ($wasSuccessful == true) {
    $_SESSION['userLoggedIn'] = $userName;
    header("Location: index.php");
  }
}


?>