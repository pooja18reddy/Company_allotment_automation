<!DOCTYPE html>

<html>
<head>
<title>CAA</title>
<meta charset="utf-8">

<link href="layout.css" rel="stylesheet" type="text/css" media="all">
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
</head>
<body id="top">

<div class="wrapper row1">
  <header id="header" class="clear"> 
    
     <div id="logo" class="fl_left">
		 
			<img src="img/Capture.PNG">
    </div>
    
  
  </header>
</div>

<div class="wrapper row2">
  <nav id="mainav" class="clear"> 
 
    <ul class="clear">
      <li class="button"><a href="ip.html">IP</a></li>
              <li class ="button"><a href="companies.php">Companies</a></li>

<li class ="active"><a href="LOGIN.php"> LOGIN</a></li>
                
    </ul>
   
  </nav>
</div>


<div class="wrapper row3">
  <main class="container clear"> 


<h1>Login</h1>
<form action="" method="post">
<p>
<label>Login As:</label><select name="select">
	<option value="non"> Select</option>
        <option value="admin"> Admin</option>
        <option value="student">Student</option>
		<option value="hod">HOD</option><br>
		<option value="coe">COE</option><br>
		<option value="accountant">Accountant</option><br>

    </select>
Username:<input type="text" name="username"></p>
<label>Password:</label><input type="password" name="password"><br/>
<input type="submit" value="Login" name="submit"><br/>

<!--New user Register Link -->
<p>
<a href="student_reg.php">New User Registeration for Student</a></p>
</form>
<?php
if(isset($_POST["submit"])){
 if(!empty($_POST['username']) && !empty($_POST['password'])){
 $select = $_POST['select']; 
$username = $_POST['username'];
 $password = $_POST['password'];

 //DB Connection
 $conn = new mysqli('localhost', 'root', '123456') or die(mysqli_error());
 //Select DB From database
 $db = mysqli_select_db($conn, 'IP') or die("databse error");

 //Selecting database
if ($select == 'admin')
{

 $query = mysqli_query($conn, "SELECT * FROM login WHERE username='".$username."' AND password='".$password."'AND category_id=1");
 $numrows = mysqli_num_rows($query);
 if($numrows !=0)
 {
 while($row = mysqli_fetch_assoc($query))
 {
 $dbusername=$row['username'];
 $dbpassword=$row['password'];
 }
 if($username == $dbusername && $password == $dbpassword)
 {
 session_start();
 $_SESSION['sess_user']=$username;
 
echo "<script type='text/javascript'> document.location = 'comp_req.php'; </script>";
 }
 
 else
 {
 echo "Invalid Username or Password!";
 }
 }
 else
 {
 echo "Error";
 }

}
else if ($select == 'hod')
{

 $query = mysqli_query($conn, "SELECT * FROM login WHERE username='".$username."' AND password='".$password."' AND category_id=3");
 $numrows = mysqli_num_rows($query);
 if($numrows !=0)
 {
 while($row = mysqli_fetch_assoc($query))
 {
 $dbusername=$row['username'];
 $dbpassword=$row['password'];
 }
 if($username == $dbusername && $password == $dbpassword)
 {
 session_start();
 $_SESSION['sess_user']=$username;
 //Redirect Browser
 echo "<script type='text/javascript'> document.location = 'sdi.php'; </script>";
 }
 else
 {
 echo "Invalid Username or Password!";
 }
 }
 else
 {
 echo "Error";
 }
}
else if ($select == 'coe')
{

 $query = mysqli_query($conn, "SELECT * FROM login WHERE username='".$username."' AND password='".$password."' AND category_id=4");
 $numrows = mysqli_num_rows($query);
 if($numrows !=0)
 {
 while($row = mysqli_fetch_assoc($query))
 {
 $dbusername=$row['username'];
 $dbpassword=$row['password'];
 }
 if($username == $dbusername && $password == $dbpassword)
 {
 session_start();
 $_SESSION['sess_user']=$username;
 //Redirect Browser
 echo "<script type='text/javascript'> document.location = 'COE.php'; </script>";
 } 
 else
 {
 echo "Invalid Username or Password!";
 }
 }
 else
 {
 echo "Error";
 }
}
else if ($select == 'accountant')
	{
	 $query = mysqli_query($conn, "SELECT * FROM login WHERE username='".$username."' AND password='".$password."' AND category_id=5");
	 $numrows = mysqli_num_rows($query);
	 if($numrows !=0)
	 {
	 while($row = mysqli_fetch_assoc($query))
	 {
	 $dbusername=$row['username'];
	 $dbpassword=$row['password'];
 }
 if($username == $dbusername && $password == $dbpassword)
	 {
	 session_start();
	 $_SESSION['sess_user']=$username;
	 //Redirect Browser
	 echo "<script type='text/javascript'> document.location = 'acc_det.php'; </script>";
 } 
 else
 {
	 echo "Invalid Username or Password!";
 }
 }
 else
 {
	 echo "Error";
 }
}
else
{
 $query = mysqli_query($conn, "SELECT * FROM login WHERE username='".$username."' AND password='".$password."' AND category_id=2");
 $numrows = mysqli_num_rows($query);
 if($numrows !=0)
 {
 while($row = mysqli_fetch_assoc($query))
 {
 $dbusername=$row['username'];
 $dbpassword=$row['password'];
}
if($username == $dbusername && $password == $dbpassword)
 {
 session_start();
 $_SESSION['sess_user']=$username;
 //Redirect Browser
 echo "<script type='text/javascript'> document.location = 'undertaking.php'; </script>";
 }
 else
 {
 echo "Invalid Username or Password!";
 }
}
 else
 {
 echo "Error";
 }
}}
}
?>







</div>
    




  

<div class="wrapper row4">
  <footer id="footer" class="clear"> 
  <div class="row">
	







    
  </footer>
</div>
</div>
<div class="wrapper row5">
  <div id="copyright" class="clear"> 
    
    <p class="fl_left">&copy; 2018 CompanyAllotment. All Rights Reserved by Presidency University</p>
    
</div>
  </div>

</html>
