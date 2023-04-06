<?php
    $FirstName = $_POST['FirstName'];
    $Email = $_POST['Email'];
    $Message = $_POST['Message'];

    //Database connection
    $connect = mysqli_connect("localhost", "root", "", "test");
        // Checking the connection
    if ($connect === false) {
        die("Connection failed: ");
    }
    // This will insert the student information to the database
    $sql = "INSERT INTO contact (FirstName, Email, Message) VALUES ('$FirstName', '$Email', '$Message')";
        echo $sql;
    if (mysqli_query($connect, $sql)) {
        echo "Your Message has been sent. Thank you for contacting us!! We will get back to yoy as soon as possible.";
    } else {
        echo "Error adding record ";
    }
        // Close database connection
        mysqli_close($connect);
?>
