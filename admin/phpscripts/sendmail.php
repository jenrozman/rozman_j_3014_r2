<?php
function submitUser($name, $email, $password){
    $sendMail = $email;
    $subject = "Email with your login id from website";
    $confirm = "Thank you for signing up! Your login details are \n\n Username: \n\n" . $username . " \n\n Password:" . $password;

  @mail($sendMail, $subject, $confirm);
}
?>
