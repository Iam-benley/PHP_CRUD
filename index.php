<?php
include 'dbcon.php';

$query = 'SELECT * FROM users';

$statement = $conn->query($query);

$users = $statement->fetchAll(PDO::FETCH_ASSOC);

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
    <h1 class="mb-3 text-center">PHP CRUD Application</h1>
    <div class="d-flex justify-content-end">
            <a href="add_user.php" class="btn btn-primary mb-3">Add User</a>
    </div>
       
            
   
    
   

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($users) {
                    // show the users
                    foreach ($users as $user) { ?>

                        <tr>
                            <td><?php echo $user['first_name'] ?></td>
                            <td><?php echo $user['last_name'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo $user['gender'] ?></td>
                            <td>
                                <a href="update_user.php?id=<?php echo $user['id'] ?>" class="btn btn-primary">Update</a>

                                <a href="delete_user.php?id=<?php echo $user['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                      <?php
                    }
                }
            ?>
            
        </tbody>
</table>


</div>


</body>
</html>



