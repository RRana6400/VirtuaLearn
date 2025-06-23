<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />
</head>

<body>

<header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">VirtuaLearn</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Help</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li> -->
          <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
          <!-- <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Contact US</a>
        </li> -->
        </ul>

        <!-- <button class="btn btn-outline-success" type="button">Log Out</button> -->
      </div>
    </div>
  </nav>
  <a href="http://127.0.0.1:5500/main_dashboard.html">
          <button type="button"style="border:1px solid dark;font-size:10px;border- radius: 20px;" class="btn btn-warning rounded-4 shadow-lg p-3 mb-5  "> Back
          </button>
        </a>
</header>
  <?php

    if($_SERVER['REQUEST_METHOD']== 'POST'){
      $name = $_POST['name'];
      $roll_no = $_POST['roll_no'];
      $email = $_POST['email'];
      $phone_no = $_POST['phone_no'];

      

    //ADDING DATA to the database


      $servername = "127.0.0.1:3307";
      $username = "root";
      $password = "";
      $database = "vc_records";

      // Connecting to database
      $conn = mysqli_connect($servername, $username, $password, $database);

      //Error handling
      if(!$conn){
          echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error!</strong> There is an issue on connecting to the database.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> ';
      }
      else{

        //sql query to data insertion
        $sql = "UPDATE `vc_student` SET `name` = '$name', `email` = '$email', `phone_no` = '$phone_no' WHERE `vc_student`.`roll_no` = $roll_no;";

        
        //Exception Handling
        try{
          $result = mysqli_query($conn, $sql);
          echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> The data has been successfully updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div> ';
        }
        catch(Exception $e){
          echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> The data has <strong>NOT</strong> been successfully updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div> ';
        }
   
      }

    }
  ?>
  <div
    class="container p-3 mb-2 bg-success-subtle text-dark-emphasis shadow-lg p-3 mb-5 bg-body-tertiary rounded text-success rounded-5 mx-auto p-2"
    style="margin: 100px; padding: 100px; max-width: 60%">
    <div class="p-3 text-$green-900 -emphasis bg-warning -subtle border border-success-subtle rounded-3"
      style="text-align: center; font-weight: 700">
      UPDATION OF RECORD
    </div>
    <hr />
    <form action="/RR/updation.php" method="post">
      <div class="mb-3">
        <label for="rollNo" class="form-label fs-5 fw-bolder">Existing Roll No</label>
        <input type="text" class="form-control" id="rollNo" placeholder="Roll No" name="roll_no" />
      </div>
      <div class="mb-3">
        <label for="name" class="form-label fs-5 fw-bolder">New Name</label>
        <input type="text" class="form-control" id="name" placeholder="Name" name="name" />
      </div>
      

      <div class="mb-3">
        <label for="email" class="form-label fs-5 fw-bolder">New Email</label>
        <input type="email" class="form-control" id="email" placeholder="Email" name="email" />
      </div>
      <div class="mb-3">
        <label for="phoneNo" class="form-label fs-5 fw-bolder">New Phone No.</label>
        <input type="text" class="form-control" id="phoneNo" placeholder="Phone No" name="phone_no" />
      </div>
      <div class="d-grid gap-2">
        <button class="btn btn-success" type="submit">Update</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js"
    integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D"
    crossorigin="anonymous"></script>
</body>

</html>