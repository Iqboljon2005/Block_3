<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> 
    <!--Making it compatible-->
    <meta http-equiv="X-UA-Compatible" content="IE-edge"> 
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <!--Title of the webpage-->
    <title>Students</title>
    <link rel="stylesheet" href="student-style.css">
    <!--Bootstrap link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e930d49b89.js" crossorigin="anonymous"></script>
</head>

  
<body>
  <nav class="navbar navbar-expand-lg navbar-light py-0 fixed-top" style="background-color: #0f0f0f;">
      <div class="container">
        <!--Putting the company logo in the navbar-->
        <a href="index.php"><img src="logo.jpg" alt="" width="180" height="100"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i id="bar" class="fa-solid fa-bars" style="background-color: white;"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!--Navigation list of the webpages-->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="student.php">Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="parents.php">Parents</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="teacher.php">Teachers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Classes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact-us.php">Contact</a>
            </li>
          </ul>
        </div>
    </div>
  </nav>
  
  <div class="container-fluid mt-5 py-5">
  
    <?php
		
      $connect = mysqli_connect("localhost", "root", "", "school");
      // Checking the connection
      if ($connect === false) {
        die("Connection failed: ");
      }
		
    ?>

    <!--This will display all the students information-->
  
    <h3>See All Students</h3>
	    <table>
		    <tr>
          <th width="150px">Student ID<br><hr></th>
          <th width="250px">First Name<br><hr></th>
          <th width="250px">Last Name<br><hr></th>
          <th width="250px">Home Address<br><hr></th>
          <th width="250px">Student Age<br><hr></th>
          <th width="250px">Parents Name<br><hr></th>
          <th width="250px">Class Name<br><hr></th>
          
        </tr>
				
        <?php
          /*This will bring the whole table from the database*/	
          $sql = mysqli_query($connect, "SELECT Student_ID, First_Name, Last_name, Student_Age, Home_Address, Parents_ID, Class_ID  FROM students");
          while ($row = $sql->fetch_assoc()){
            echo "
              <tr>
                <th>{$row['Student_ID']}</th>
                <th>{$row['First_Name']}</th>
                <th>{$row['Last_name']}</th>
                <th>{$row['Home_Address']}</th>
                <th>{$row['Student_Age']}</th>
                <th>{$row['Parents_ID']}</th>
                <th>{$row['Class_ID']}</th>
            </tr>";
          }
        ?>
      </table>

    <br><br>  
    <hr>
    
    <!--Adding new Students Information-->     
		<h3>Add a New Student</h3>
	
    <br>
		<form method="post" action="student.php">
		
			<label>First Name:</label>
			  <input type="text" name="First_Name">

      <label>Last Name:</label>
			  <input type="text" name="Last_Name">

      <label>Age:</label>
			  <input type="text" name="Student_age">

      <br><br>
      
      <label>Home Address:</label>
			  <input type="text" name="Home_Address" maxlenght = "150" style="width: 500px; height: 100px;">

      <br><br>

      <label>New Student ID:</label>
			  <input type="text" name="Student_ID">
			
      <label>Parents Name:</label>
			  <input type="text" name="Parents_ID">
			<br><br>
       
      <label>Enter the class name:</label>
			  <input type="text" name="Class_ID">
			<br>
			<input type="submit" name="addstudent" class="btn">
		
		</form>

    <br>
		<?php
      /// -------Lets check the errors------------ ///
      error_reporting(E_ALL);
      /// --------Error Report End--------- ///
		
      if (isset($_POST['addstudent'])) {
        // Hold information typed from user input
        $S_ID = $_POST['Student_ID'];
        $Student_Name = $_POST['First_Name'];
        $Last_Name = $_POST['Last_Name'];
        $S_age = $_POST['Student_age'];
        $S_address = $_POST['Home_Address'];
        $Parents_Id = $_POST['Parents_ID'];
        $ClassName = $_POST['Class_ID'];


			  // This will insert the student information to the database
			  $sql = "INSERT INTO students (Student_ID, First_Name, Last_Name, Student_Age, Home_Address, Parents_ID, Class_ID) VALUES ('$S_ID', '$Student_Name', '$Last_Name', '$S_age', '$S_address', '$Parents_Id', '$ClassName')";
			  echo $sql;
        if (mysqli_query($connect, $sql)) {
			    echo "New record created successfully";
			  } else {
			    echo "Error adding record ";
			  }
		    // Close database connection
        mysqli_close($connect);
      }
    ?>

    <hr>
    <!--Lets delete Student Information-->
      <h3>Delete Student</h3>
      <br>
	    <th>
      <form action="student.php" method="POST">
        <label for="row_id">Enter Student ID to delete:</label>
            <input type="text" name="row_id" id="row_id">
        <button type="submit" name="delete_student" class="btn">Delete</button>
      </form>

      <?php
        // This will check if the form has worked
        if (isset($_POST['delete_student'])) {
          // Get the row ID to delete
          $ROW_ID = $_POST['row_id'];
          // To Delete the row from database
          $sql = "DELETE FROM students WHERE Student_ID = $ROW_ID";
   
          if (mysqli_query($connect, $sql)) {
            echo "Student deleted successfully.";
          } else {
            echo "Error deleting row: " . mysqli_error($connect);
          }
   
          // This code will close the SQL
          $connect->close();
        }
      ?>
  </div>
  <!--Bootstrap links used to make the website responsive-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" 
        crossorigin="anonymous"></script>      
</body>
</html>


