
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />

  <!--EMAIL-->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
  </script>
  <script type="text/javascript">
    (function () {
      emailjs.init({
        publicKey: "JKTT9keHr4mwpccSW",
      });
    })();
  </script>
</head>
<body>
  <div class="card border-primary mb-3 p-3 mb-2 bg-info-subtle text-black-emphasis" style="max-width: 42rem">
            <div class="card-header" style="font-weight: 700;">ANNOUNCEMENT</div>
            <div class="card-body">
              <div class="container text-center">
                <div class="row">
                  <div class="col">
                    <!--share  class info-->
                    <div class="card border-primary mb-3" style="max-width: 28rem">
                      <div class="card-header">About Class</div>
                      <div class="card-body">
                        <!-- <form action="RR/index.php" method="post">
                          <button type="submit" id="SUBMIT_BUTTON"></button>
                        </form> -->
                        <form   class="row g-3">
                          <div class="col-">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" />
                          </div>
                          <div class="col-12">
                            <label for="inputSubject" class="form-label">Subject Name</label>
                            <input type="text" class="form-control" id="inputSubject" />
                          </div>
                          <div class="col-12">
                            <label for="inputTime" class="form-label">Class Meeting Link</label>
                            <input type="text" class="form-control" id="inputLink2" placeholder="" />
                          </div>
                          <div class="col-md-6">
                            <label for="inputTime" class="form-label">Class Time</label>
                            <input type="text" class="form-control" id="inputTime" placeholder="" />
                          </div>
                          <div class="col-md-6">
                            <label for="inputCode" class="form-label">Class Code</label>
                            <input type="text" class="form-control" id="inputCode" placeholder="" />
                          </div>
                          <div class="col-12">
                            <label for="inputNote" class="form-label">Note</label>
                            <input type="text" class="form-control" id="inputNote" />
                          </div>

                          <div class="col-12">
                            <button type="button" class="btn btn-primary" onclick="sendEmailSchedule()">
                              Send
                            </button>
                            
                          </div>
                        </form>
                        
                      </div>
                    </div>
                  </div>

                  <div class="col">
                    <!--share  class resources-->
                    <div class="container text-center">
                      <div class="row">
                        <div class="card border-primary mb-3" style="max-width: 28rem">
                          <div class="card-header">Resources</div>
                          <div class="card-body">
                            <form class="row g-3" action="/RR/index.php" method="post">
                              <div class="col-">
                                <label for="inputEmail42" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail42" />
                              </div>
                              <div class="col-12">
                                <label for="inputSubjectName" class="form-label">Subject Name</label>
                                <input type="text" class="form-control" id="inputSubjectName" />
                              </div>
                              <div class="col-12">
                                <label for="inputTypeOfResource" class="form-label">Type Of Resource</label>
                                <input type="text" class="form-control" id="inputTypeOfResource" />
                              </div>

                              <div class="col-12">
                                <label for="inputLink" class="form-label">Google Drive Link</label>
                                <input type="text" class="form-control" id="inputLink" />
                              </div>
                              <div class="col-12">
                                <label for="inputNote1" class="form-label">Note</label>
                                <input type="text" class="form-control" id="inputNote1" />
                              </div>

                              <div class="col-12">
                                <button type="button" class="btn btn-primary" onclick="sendEmailResource()"> 
                                  Send
                                </button>
                              </div>
                            </form>
                            
                          </div>
                        </div>

                      </div>

                      <div class="row">


                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php

    if($_SERVER['REQUEST_METHOD']== 'POST'){
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
              $arrayOfEmails  =  array();
              $arrayOfName = array();
                while($row = mysqli_fetch_assoc($result)){
                  array_push($arrayOfEmails,$row["email"]);
                  array_push($arrayOfName,$row["name"]);
                }
  
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

<script>
  let jarray = <?= json_encode($arrayOfEmails)?>;
  let nameArray = <?= json_encode($arrayOfName)?>;
  function sendEmailResource(){
    let i=0;
    while(i<jarray.length){
     var templateParams = {
        to_email: jarray[i],
        to_name: nameArray[i],
        name:'mohanLAL',
        sub_name: document.querySelector("#inputSubjectName").value,
        // from_email: document.querySelector("#inputEmail42").value,
        typeOfResource: document.querySelector("#inputTypeOfResource").value,
        link: document.querySelector("#inputLink").value,
        message: document.querySelector("#inputNote1").value,
        title: 'New Module !',
      };
      console.log("HARI BOL");
      emailjs.send('service_yjihxrw', 'template_1vti22w', templateParams).then(
        (response) => {
          console.log('SUCCESS!', response.status, response.text);
        },
        (error) => {
          console.log('FAILED...', error);
        },
      );
      i++;
    }
  } 
  function sendEmailSchedule(){
    let i=0;
      while(i < jarray.length){
        var templateParams = {
          to_email: jarray[i],
          sub_name: document.querySelector("#inputSubject").value,
          // from_email:document.querySelector("#inputEmail4").value,
          time: document.querySelector("#inputTime").value,
          message: document.querySelector("#inputNote").value,
          to_name: nameArray[i],
          name:'mohanLAL',
          title: 'New Class!',
          classCode: document.querySelector("#inputCode").value,
          classLink: document.querySelector("#inputLink2").value,
        };
        console.log("HARI BOL");
        emailjs.send('service_yjihxrw', 'template_1vti22w', templateParams).then(
          (response) => {
            console.log('SUCCESS!', response.status, response.text);
          },
          (error) => {
            console.log('FAILED...', error);
          },
        );
        i++;
      }
  }    
  
</script>
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