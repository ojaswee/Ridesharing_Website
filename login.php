<!--  
This page is desiged to log you in the Rideshare page
-->

<?php

   session_start();
   include("config.php");
   $error = "";   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM student WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     // $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
	
      if($count == 1) {
         //session_register("myusername");
		 $_SESSION['myusername']="something";
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   <head>
   <link rel="stylesheet" href="styles/style.css" media="all"/>
      <title>Login Page</title>  
   </head>
   
   <body >
   	  <h1>Please login</h1>
		<div id="head_wrap">
		</div>	
		</br>
      <div align = "center">              
               <form action = "login.php" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Login "/> 
				  <a href="registration.php">New User Register</a><br /> 
               </form>
               
               <!--div style = "font-size:11px; color:#cc0000; margin-top:10px"--><?php echo $error; ?>
			   <!--/div-->		
      </div>

   </body>
   
</html>