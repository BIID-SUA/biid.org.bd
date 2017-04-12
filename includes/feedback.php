<?php
require_once("antihack.php");

$adminemail = "info@biid.org.bd";

if(isset($_POST['frmsubmit']))
{
	$name = $_POST['uname'];
	$organization = $_POST['organization'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$comment = $_POST['comment'];
	
	$to      = $adminemail;
	$subject = $_POST['subject'];
	$headers = 'From: "$name" <$email>' . "\r\n" .
	   'Reply-To: "BIID admin" <$adminemail>' . "\r\n" .
	   'X-Mailer: PHP/' . phpversion();
	
	$message = "User feedback on BIID website:
	-------------------------------------------
	
	$comment

	Regards,
	$name
	$organization
	Contact No.: $phone";
	
	//@mail($to, $subject, $message, $headers);
}

if(isset($_POST['frmsubmit'])){?>
	<div style="float:left" class="heading">Your mail has been sent successfully.<br>Thank you for your feedback.</div><br><br><br><br>Click <a href="<?php echo $siteurl;?>">here</a> to return to the home page.
	<?php }else{?>
                                                  <table width="100%" border="0">
                  <form name="frmEmail" method="post">
                                                    <tr> 
                                                      <td class="heading">

                                                      
                                                      Feedback Form<br><br></td>
                                                    </tr>
                                                    <tr> 
                                                      <td align="right"><table width="100%" border="0">
                                                          <tr> 
                                                            <td>

                                                            
                                                            <strong style="font-weight: 400">Name:</strong></td>
                                                            <td><input name="uname" type="text" class="text" id="name" size="30"></td>
                                                          </tr>
                                                          <tr> 
                                                            <td height="24">
                                                            
                                                            <strong style="font-weight: 400">Organization:</strong></td>

                                                            <td><input name="organization" type="text" class="text" id="organization" size="30"></td>
                                                          </tr>
                                                          <tr> 
                                                            <td height="24">
                                                            
                                                            <strong style="font-weight: 400">Email:</strong></td>
                                                            <td><input name="email" type="text" class="text" id="email" size="30"></td>
                                                          </tr>
                                                          <tr> 
                                                            <td height="24">

                                                            
                                                            <strong style="font-weight: 400">Contact 
                                                              Number:</strong></td>
                                                            <td><input name="phone" type="text" class="text" id="number" size="30"></td>
                                                          </tr>
                                                          <tr> 
                                                            <td height="24">
                                                            
                                                            <strong style="font-weight: 400">Subject:</strong></td>

                                                            <td><input name="subject" type="text" class="text" id="subject" size="30" maxlength="30"></td>
                                                          </tr>
                                                          <tr> 
                                                            <td height="24" valign="top">
                                                            
                                                            <strong style="font-weight: 400">Message:</strong></td>
                                                            <td><textarea class="text" name="comment" cols="40" rows="10" id="message"></textarea></td>
                                                          </tr>

                                                          <tr>
                                                            <td height="24" valign="top">&nbsp;</td>
                                                            <td align="left"><input class="button" type="submit" name="frmsubmit" value="Submit"></td>
                                                          </tr>
                                                          <tr> 
                                                            <td height="24" valign="top"><font color="#FFBD03" size="2">&nbsp;</td>
                                                            <td align="left">
																														
															
															</td>
                                                          </tr>

                                                        </table>
                                                        
                                                      </td>
                                                    </tr>
                                                </form>
                                                  </table>
<?php }?>