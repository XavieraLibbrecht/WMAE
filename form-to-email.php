<?php
    $lastName = isset($_POST['lastName']) ? $_POST['lastName']: 'undefined';
    $firstName = isset($_POST['firstName']) ? $_POST['firstName']: 'undefined';
    $organisation = isset($_POST['organisation']) ? $_POST['organisation']: 'undefined';
    $mail = isset($_POST['mail']) ? $_POST['mail']: 'undefined';
    $country = isset($_POST['country']) ? $_POST['country']: 'undefined';
    $language = isset($_POST['language']) ? $_POST['language']: 'undefined';
    $subject = isset($_POST['subject']) ? $_POST['subject']: 'undefined';
    $message = isset($_POST['message']) ? $_POST['message']: 'No message found';

    $email_from = 'office@wmaeurope.com';
	$email_subject = "New Form submission";
	$email_body = "You have received a new message! 
    \n Last name:\n $lastName
    \n First name:\n $firstName
    \n Organisation:\n $organisation
    \n Country:\n $country
    \n Language:\n $language
    \n Subject:\n $subject
    \n Message:\n $message";


    $to = "office@wmaeurope.com";
    $headers = "From: $email_from \r\n";
  
    $headers .= "Reply-To: $mail \r\n";
  
    mail($to,$email_subject,$email_body,$headers);


    function IsInjected($str){
        $injections = array('(\n+)',
            '(\r+)',
            '(\t+)',
            '(%0A+)',
            '(%0D+)',
            '(%08+)',
            '(%09+)'
            );
                
        $inject = join('|', $injections);
        $inject = "/$inject/i";
        
        if(preg_match($inject,$str))
        {
        return true;
        }
        else
        {
        return false;
        }
    }

    if(IsInjected($mail))
    {
        echo "Bad email value!";
        exit;
    }

    header('location: contact_redirect.html');
?>