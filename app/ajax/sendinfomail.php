<?php
  $mailinfo = $_POST;

  $email = $mailinfo['email'];
  $nick = $mailinfo['nick'];
  $phone = $mailinfo['phone'];
  $subj = $mailinfo['subject'];
  $message = $mailinfo['message'];

  $mailMessage = "Email: " . $email . "\r\nNavn: " . $nick . "\r\nTelefonnummer: " . $phone "\r\nBesked:\r\n" . $message; 

  $to      = 'info@rensfyn.dk';
  $subject = 'Rensfyn.dk - ' . $subj;
  $headers = 'From: noreply@rensfyn.dk' . "\r\n" .
      'Reply-To: noreply@rensfyn.dk' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();

  if(mail($to, $subject, $mailMessage, $headers)) {
    echo 0;
  } else {
    echo 1;
  }
?>