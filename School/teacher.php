<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> 
    <!--Making it compatible-->
    <meta http-equiv="X-UA-Compatible" content="IE-edge"> 
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <!--Title of the webpage-->
    <title>Teachers</title>
    <link rel="stylesheet" href="teacher-style.css">
    <!--Bootstrap link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e930d49b89.js" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light py-1 fixed-top" style="background-color: #0f0f0f;">
    <div class="container">
      <!--Putting the company logo in the navbar-->
      <a href="index.php"><img src="logo.jpg" alt="" width="200" height="120"></a>
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
      // Check connection
      if ($connect === false) {
        die("Connection failed: ");
      }
		?>
    <!--Displays Teachers Information-->
    <h3>See All Teachers</h3>
	  <table>
		  <tr>
				<th width="250px">Full Name<br><hr></th>
				<th width="250px">Home Address<br><hr></th>
				<th width="250px">Email Address<br><hr></th>
        <th width="250px">Annual Salary<br><hr></th>
				<th width="250px">Background Check<br><hr></th>
				<th width="250px">Phone Number<br><hr></th>
        <th width="250px">Teacher ID<br><hr></th>
        <th width="250px">Class ID<br><hr></th>
      </tr>
				
      <?php
        // Displays Teachers details //
        $sql = mysqli_query($connect, "SELECT Teacher_Name, Home_Address, Email_Address, Annual_Salary, Background_Check, Phone_Number, Teacher_ID, Class_ID  FROM teachers");
        while ($row = $sql->fetch_assoc()){
          echo "
            <th>{$row['Teacher_Name']}</th>
            <th>{$row['Home_Address']}</th>
            <th>{$row['Email_Address']}</th>
            <th>{$row['Annual_Salary']}</th>
            <th>{$row['Background_Check']}</th>
            <th>{$row['Phone_Number']}</th>
            <th>{$row['Teacher_ID']}</th>
            <th>{$row['Class_ID']}</th>
            </tr>";
          
        }
      ?>
    </table>
    <br><br>  
    <hr>
    <!--ADD new Teacher Information-->
    <h3>Add a New Teacher</h3>
	  <br>
		<form method="post" action="teacher.php">
		  <label>Full Name:</label>
			  <input type="text" name="Teacher_Name">

      <label>Email:</label>
			  <input type="text" name="T_email">

      <label>Teacher New ID:</label>
			  <input type="text" name="Teacher_ID">

      <br><br>
      <label>Address:</label>
			  <input type="text" name="T_address" maxlenght = "150" style="width: 500px; height: 100px;">
      <br><br>
      <label>Phone Number:</label>
			  <input type="text" name="T_phone">

      <label>Annual Salary:</label>
			  <input type="text" name="T_annualSalary">

      <label>Background Check:</label>
			<select type="text" name="Teacher_Background">
        <option value = "Yes"> Yes </option>
        <option value = "No"> No </option>

      </select>
      <label>Enter Year:</label>
        <input type="text" name = "Class_ID">
      <br><br>
      <br>
      <input type="submit" name="addteacher" class="btn">
    </form>
    <br>
		
    <?php
      /// -------Lets get error Report------------ ///
      error_reporting(1);
      /// --------Error Report End--------- ///
		  if (isset($_POST['addteacher'])) {
        // Hold information typed from user input

        $Full_name = $_POST['Teacher_Name'];
        $T_email = $_POST['T_email'];
        $T_address = $_POST['T_address'];
        $T_phonenumber = $_POST['T_phone'];
        $T_annual_salary = $_POST['T_annualSalary'];
        $T_background_check = $_POST['Teacher_Background'];
        $className = $_POST['Class_ID'];
        $Teacher_ID = $_POST['Teacher_ID'];

        // Insert Information into database //
			  $sql = "INSERT INTO teachers (Teacher_Name, Email_Address, Home_Address, Phone_Number, Annual_Salary, Background_Check, Teacher_ID, 
        Class_ID) VALUES ('$Full_name', '$T_email', '$T_address', '$T_phonenumber', '$T_annual_salary', '$T_background_check', '$Teacher_ID', '$className')";
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
    <!--Delete Teachers Information-->
    <h3>Delete Teacher:</h3>
    <br>
	  <th>
    <form action="teacher.php" method="POST">
      <label for="row_id">Enter Teachers ID to delete:</label>
        <input type="text" name="row_id" id="row_id">
        <button type="submit" name="delete_teacher" class="btn">Delete</button>
    </form>
    <?php
      // Check if form is submitted
      if (isset($_POST['delete_teacher'])) {
        // Get row ID to delete
        $row_id = $_POST['row_id'];
   
        // Delete row from database
        $sql = "DELETE FROM teachers WHERE Teacher_ID = $row_id";
   
        if (mysqli_query($connect, $sql)) {
          echo "Teacher deleted successfully.";
        } else {
          echo "Error deleting row: " . mysqli_error($connect);
        }
        // Close database connection
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


