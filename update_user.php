<?php
include 'dbcon.php';

$id =  $_GET['id'];

$query = "SELECT * FROM users WHERE id = :id LIMIT 1";

$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$results = $stmt->fetch(PDO::FETCH_ASSOC);


if (isset($_POST['submit'])) {
      $firstName = $_POST['first_name'];
      $lastName = $_POST['last_name'];
      $email = $_POST['email'];
      $gender = $_POST['gender'];


      $query = "UPDATE users SET first_name = :fname, last_name = :lname,email = :email, gender = :gender WHERE id = :id";

      $statement = $conn->prepare($query);
       $statement->bindParam(':id', $id, PDO::PARAM_INT);
       $statement->bindParam(':fname', $firstName);
       $statement->bindParam(':lname', $lastName);
       $statement->bindParam(':email', $email);
       $statement->bindParam(':gender', $gender);

      $result = $statement->execute();    

       if ($result) {
              header("location: index.php?msg=Data updated successfully");
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
           <h1>Edit user</h1>   
       </div>

       <form method="post">
              <label class="form-label">First Name:</label>
              <input type="text" name="first_name" value="<?php echo $results['first_name'] ?>">

              <label class="form-label">Last Name:</label>
              <input type="text" name="last_name" value="<?php echo $results['last_name'] ?>">

              <div class="mb-3">
                     <label class="form-label">Email:</label>
                     <input type="email" name="email" value="<?php echo $results['email'] ?>">
              </div>
              
              <div class="mb-3">
                     <label>Gender:</label>
                     <input type="radio" name="gender" id="male" value="male" <?php  echo ($results['gender'] == "male")? "checked": ""; ?>>
                     <label for="male">Male</label>

                     <input type="radio" name="gender" id="female" value="female" <?php  echo ($results['gender'] == "female")? "checked": ""; ?>>
                     <label for="female">Female</label>
              </div>
              

              <div>
                  <button type="submit" class="btn btn-success" name="submit">Update</button>
                  <a href="index.php" class="btn btn-danger">Cancel</a>   
              </div>

       </form>

</div>


</body>
</html>