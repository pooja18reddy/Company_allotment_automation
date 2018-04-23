<!DOCTYPE html>

<html>
<head>
<title>CAA</title>
<meta charset="utf-8">

<link href="layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">

<div class="wrapper row1">
  <header id="header" class="clear"> 
    
     <div id="logo" class="fl_left">
		 
			<img src="img/Capture.PNG">
    </div>
    
  
  </header>
</div>




<div class="wrapper row3">
  <main class="container clear"> 





<h2 align="center"> PREFERENCE FORM </h2>
<form action="" method="post" enctype="multipart/form-data">
      <table class="">
        <thead>
          <tr>
            <th>Company ID</th>
            <th>Company Name</th>
            <th>Preference No.</th>
          </tr>
        </thead>
        <tbody>
          <?php for ($i=1; $i<= $limit; $i++) {
            $row=mysqli_fetch_array($result);?>
            <tr>
              <input type="hidden" name="cid" value="<?php echo $row['sl_no'] ?>">
              <td><?php echo $i ?></td>
              <td><?php echo $row['cmp_name'] ?></td>
              <td>
                <select name="<?php echo 'select'.$i ?>">
                  <option value="0">select</option>
                  <?php for ($j=1; $j<= $limit; $j++) { ?>
                    <option value="<?php echo $j ?>"><?php echo $j ?></option>
                  <?php } ?>
                </select>

              </td>
            </tr>
              <?php } ?>
        </tbody>
		
      </table>
	<input type="submit" name="submit" value="Submit">
	<input type="reset" name="reset" value="reset">
    </form>
<?php
if(isset($_POST["submit"])){
 if(!empty($_POST['id']))
{

 $conn = new mysqli('localhost', 'root', '123456') or die (mysqli_error()); // DB Connection
 $db = mysqli_select_db($conn, 'cureall') or die("DB Error"); // Select DB from database
 //Selecting Database
 $query = mysqli_query($conn, "SELECT * FROM dor WHERE id='".$id."'");
 $numrows = mysqli_num_rows($query);
 if($numrows == 0)
  {
 //Insert to Mysqli Query
 $sql = "INSERT INTO doc_login(user,pass) VALUES('$id','$pass')";
 $result = mysqli_query($conn, $sql);
$picture=$_FILES['file']['name'];
$dir = "/var/www/html/FILES/";
move_uploaded_file($_FILES['file']['tmp_name'],$dir.$picture);


$sql = "INSERT INTO dor(id,pass,name,email,phone_1,phone_2,address,gender,qualification,field,file) VALUES('$id','$pass','$name','$email','$phone_1','$phone_2','$address','$gender','$qualification','$field','$picture')";
 $resul = mysqli_query($conn, $sql)or die("ERROR");


 if($result && $resul){
 echo "Sent Successfully";
 }
 else
 {
 echo "Failure!";
 }
 }
 else
 {
 echo "That Username already exists! Please try again.";
 }
 }
 else
 {
 ?>
 <!--Javascript Alert -->
<script>alert('Required all fields');</script>
 <?php
 }
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
