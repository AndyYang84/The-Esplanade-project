<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "info@theesplanade.nz";
    $email_subject = "The Esplanade Whangarei- Inquiry";
 
    function died($error) {
      echo "<link rel='stylesheet' type='text/css' href='css/reuseable.css'><div><h1>Sorry</h1><h2>The information submitted was not quite correct or enough.</h2><p>Please refer to the error messages in below:<br> $error</p></div>";
      echo "<script>alert('please check!');</script>";
        // your error code can go here
        //echo "We are very sorry, but there were error(s) found within the form you submitted. ";
        //echo "These errors appear below.<br /><br />";
        //echo $error."<br /><br />";
        //echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $lot = $_POST['lot'];
    $subject= $_POST['subject'];
    $comments = $_POST['comments']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered were too short and do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
 
    $email_message .= "First Name: ".clean_string($first_name)." ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Phone Number: ".clean_string($telephone)."\n";
    $email_message .= "Interested in Lot(s): ".clean_string($lot)."\n";
    $email_message .= "Message Subject: ".clean_string($subject)."\n";
    $email_message .= "Message Content: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>






<!-- include your own success html here -->
<style>
  @import url('https://fonts.googleapis.com/css?family=Libre+Baskerville|Varela+Round&display=swap');
  body{font-family: 'Varela Round', sans-serif;}
  .modal{
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    overflow: auto;
    height: 100%;
    width: 100%;
    background: rgba(0,0,0, 0.3);
}

#result{
    background: white;
    text-align: center;
    margin: 5% auto;
    width: 70%;
    height: 350px;
    border-radius: 10px;
    padding: 2.5rem;
    box-shadow: 0 5px 8px 0 rgba(0,0,0, 0.2) ,  0 7px 20px 0 rgba(0,0,0, 0.17);
    animation-name: modalopen;
    animation-duration: 0.7s; 
}

a{
    color: white;
    border-radius: 15px;
    margin-top: 8px !important;
    background: linear-gradient(to right, rgb(7, 146, 246), rgb(17, 137, 223), rgb(28, 114, 175));
    border: none;
    font-size: 1.5rem;
    padding: 12px 36px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    text-decoration: none !important; /*take out link uner*/
}
a:hover{
  padding: 10px 40px;
  font-weight: bolder;
}

#modal-des{
    text-align: left;
}

@media(max-width: 700px){
    #modal-img{width: 100%}
}



.modal-content h1{
    margin-bottom: 1rem;
}


.modal-content p{
    font-size: 1.3rem;
    margin-top: 1rem;
}




@keyframes modalopen{
    from{
        opacity: 0;
    }
    to{
        opacity: 1;
    }

}
</style>

<!--The ACTUAL HTML DISPLAY-->
<div class="modal">
      <div id="result" class="modal-content">
          <h1>Thank you!</h1>
          <p>Form successfully submitted. We will reply to you shortly.</p>
          <a href="index.html">Back</a>
      </div>
  </div>

 
<?php
 
}
?>
