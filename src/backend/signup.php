<?php
include('../../config/database.php');
 $fullname =$_POST['fname'];
 $email =$_POST['email'];
 $passwd =$_POST['passwd'];
 $enc_pass = md5($passwd);

 /* echo "Your fullname: ". $fullname."<br>";
 echo "Your email: ". $email."<br>";
 echo "Your password: ". $passwd."<br>";
 echo "Your password enc: ".$enc_pass."<br>";*/

 $sql = "INSERT INTO users (fullname, email, password ) values ('$fullname' , ' $email', '$enc_pass ')";
 
  $ans =pg_query($conn,$sql);
  if ($ans){
    echo "User has been created successfully";
  }else{
    echo "ERROR" , pg_last_error();
  }

  // close conection database
  pg_close($conn)

?>