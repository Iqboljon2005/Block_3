<!DOCTYPE html>
<html lang="en">

<!--Header-->
<head>
    <meta charset="UTF-8"> 
    <!--Making it compatible-->
    <meta http-equiv="X-UA-Compatible" content="IE-edge"> 
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <!--Title of the webpage-->
    <title>RISHTON ACADEMY PRIMARY SCHOOL</title>
    <link rel="stylesheet" href="style1.css">
    <!--Bootstrap link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Font and icons used in the HTML link-->
    <script src="https://kit.fontawesome.com/e930d49b89.js" crossorigin="anonymous"></script>
</head>

<!--Body of the webpage-->
<body>
    
   <!--Navigation-->
   <nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top" style="background-color: black;">
        <div class="container">
            <!--Putting the company logo in the navbar-->
            <a href="index.html"><img src="logo.jpg" alt="" width="200" height="120"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i id="bar" class="fa-solid fa-bars" style="background-color: white;"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!--Navigation list of the webpages-->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="">Home</a>
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
  
  <!--Section 1 of the body-->
  <section id="home">
    <div class="container">
        <h1>Rishton Academy Primary School</h1>
        <p>Rishton Academy Primary School is a renowned educational institution that
             provides quality education to students from diverse backgrounds. 
             The school is located in the town of Rishton, in the county of Lancashire,
              in the north-west of England. Established in 1874, Rishton Academy has a rich history
             of providing excellent education
             to children, and has earned a reputation as a center of academic excellence in the region.
        </p>
        <!--Button to send the user to the featured section-->
        <a href="student.php"><button>Start</button></a>
    </div>
  </section>
  
  

  <!--Bootstrap links used to make the website responsive-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" 
        crossorigin="anonymous"></script>

</body>
</html>