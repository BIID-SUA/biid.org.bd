<?php

function xmail($email_address,$email_from,$subject,$msg) {
      
       if( mail($email_address,$subject,$msg,"From: ".$email_from) )
       {
         return 1;

       }
       else
       {
         return 0;
       }  
} 

//user defined********************
$to = "info@biid.org.bd";
$subject = $HTTP_GET_VARS[subject];
//************************************


// get the name

$name = $HTTP_GET_VARS[name];

$from ="shahid.akbar@info@biid.org.bd";

$body.="Name : ". $name."\n";
$body.="Organization : ". $HTTP_GET_VARS[organization]."\n";
$body.="E-mail : ". $HTTP_GET_VARS[email]."\n";
$body.="Contact Number : ". $HTTP_GET_VARS[number]."\n";
$body.="Body:\n";
$body.= $HTTP_GET_VARS[message];


if (xmail($to,$from,$subject, $body) == 1)
{
 
  
  header("Location: http://www.biid.org.bd/feedback.php?status=0"); 
  exit();
  
}
else
{
   header("Location: http://www.biid.org.bd/feedback.php?status=1"); 
   //echo("<p>Message delivery failed...</p>");
}



?>