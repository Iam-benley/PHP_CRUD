<?php

include 'dbcon.php';

if (isset($_POST['submit'])) {
      $firstName = $_POST['first_name'];
      $lastName = $_POST['last_name'];
      $email = $_POST['email'];
      $gender = $_POST['gender'];


      $query = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `gender`) VALUES (:fname,:lname,:email,:gender)";

      $statement = $conn->prepare($query);

      $result = $statement->execute([
	       ':fname' => $firstName,
              ':lname' => $lastName,
              ':email' => $email,
              ':gender' => $gender
       ]);    

       if ($result) {
              header("location: index.php?msg=New record created successfully");
       }else{
              echo "Failed";
       }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>PHP CRUD Application</title>

        <!-- Bootstrap -->

       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


</head>
<body>

<div class="container">

       <div>
           <h1>Add user</h1>   
       </div>
       <div>

     
       <form method="post">
              
                     <div >
                            <label class="form-label">First Name:</label>
                            <input type="text" name="first_name" class="form-control">
                     </div>
                     <div>
                            
                            <label class="form-label">Last Name:</label>
                            <input type="text" name="last_name" class="form-control">
                     </div>
         
            
              <div class="mb-3">
                     <label class="form-label">Email:</label>
                     <input type="email" name="email" class="form-control">
              </div>
              
              <label>Gender:</label>

              <div class="form-check">
                     <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                     <label class="form-check-label" for="male">Male</label>
                     <input type="radio" name="gender" id="female" value="female">
                     <label for="female">Female</label>
              
              </div>
                     
                    

                     
              

              <div>
                  <button type="submit" class="btn btn-success" name="submit">Add</button>
                  <a href="index.php" class="btn btn-danger">Cancel</a>   
              </div>

       </form>

</div>


</body>
</html>