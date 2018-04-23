<!DOCTYPE html>

<html>
<head>
<title>CAA</title>
<meta charset="utf-8">

<link href="layout.css" rel="stylesheet" type="text/css" media="all">
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
<script>
function remove() {
    var txt;
    var person = prompt("Please enter Student ID:");
    if (person == null || person == "") {
        txt = "User cancelled the prompt.";
    } else {
        txt =person + "removed";
    }
    document.getElementById("demo").innerHTML = txt;
}
</script>
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



<h2 align="center"> STUDENT ELIGIBILITY LIST</h2>
 <table class="table table-hover">
           <tr>
               <th>Student ID</th>
               <th>Student Name</th>
			   <th>Branch</th>
			   <th>CGPA</th>
			   <th>Gender</th>
           </tr>
           
<?php
 $conn = new mysqli('localhost', 'root', '123456') or die (mysqli_error()); // DB Connection
 $db = mysqli_select_db($conn, 'IP') or die("DB Error"); // Select DB from database
 //Selecting Database
 $sql = "Select e.student_id,s.name,s.branch,s.cgpa,s.gender from eligibility e, student s where e.student_id = s.student_id and ";
 $result = $conn->query($sql);
 //Result Message
 if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
		 ?>
		                   <tr>
						   <td><?php echo $row['name']; ?></td> 
		                   <td><?php echo $row['field']; ?></td>
					   </tr>
		                 <?php
				     }
				 } else {
				     echo "0 results";
				 }
				 $conn->close();
				 ?>

		               </tr>
		        </table>
<button onclick="remove()">Remove Student</button>
<p id="demo"></p>
</div>






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
