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
  <div
  
    class="container p-3 mb-2 bg-dark-subtle text-dark-emphasis shadow-lg p-3 mb-5 bg-body-tertiary rounded text-success rounded-5 mx-auto p-2"
    style="margin: 100px; padding: 100px; max-width: 60%">
    <div class="p-3 text-$green-900 -emphasis bg-warning -subtle border border-dark-subtle rounded-3"
      style="text-align: center; font-weight: 700">
      <div class="alert alert-info " role="alert" ">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Info:"><use xlink:href="#info-fill"/>
                        <symbol id="info-fill" viewBox="0 0 16 16">
                          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </symbol>
                    </svg>
                    <div>
                        <strong>Student Record</strong>
                    </div>
                  </div>
    </div>
    <hr />
    <form action="/RR/view.php" method="post">
      <!-- <div class="mb-3">
        <label for="name" class="form-label fs-5 fw-bolder">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Name" name="name" />
      </div>
      <div class="mb-3">
        <label for="rollNo" class="form-label fs-5 fw-bolder">Roll No</label>
        <input type="text" class="form-control" id="rollNo" placeholder="Roll No" name="roll_no" />
      </div>

      <div class="mb-3">
        <label for="email" class="form-label fs-5 fw-bolder">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Email" name="email" />
      </div>
      <div class="mb-3">
        <label for="phoneNo" class="form-label fs-5 fw-bolder">Phone No.</label>
        <input type="text" class="form-control" id="phoneNo" placeholder="Phone No" name="phone_no" />
      </div> -->
      <div class="d-grid gap-2">
        <button class="btn btn-dark" type="submit">View</button>
      </div>
    </form>
  </div>
<hr>

   <?php

    if($_SERVER['REQUEST_METHOD']== 'POST'){
      // $name = $_POST['name'];
      // $roll_no = $_POST['roll_no'];
      // $email = $_POST['email'];
      // $phone_no = $_POST['phone_no'];

      

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
        $sql = "SELECT * FROM `vc_student`";

        
        //Exception Handling
        try{
          $result = mysqli_query($conn, $sql);
          

          //collecting the data

          echo '<div class="container">
                <table class="table  table-bordered border border-black rounded-5 border-4">
                <thead>
                  <tr>
                    <th scope="col">Roll No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone No</th>
                    <th scope="col">Time of Entry</th>
                  </tr>
                </thead>
                <tbody>';
                while($row = mysqli_fetch_assoc($result)){
                  echo '
                    <tr>
                    <th scope="row">'.$row['roll_no'].'</th>
                    <td>'.$row["name"].'</td>
                    <td>'.$row["email"].'</td>
                    <td>'.$row["phone_no"].'</td>
                    <td>'.$row["time_of_entry"].'</td>
                    </tr>
                  ';
                }
                echo '</tbody>
                
              </table>
              </div>';

        }
        catch(Exception $e){
          echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> There is a problem in fetching the data from database.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div> ';
        }
   
      }

    }
  ?>

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