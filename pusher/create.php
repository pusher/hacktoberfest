<?php
require_once 'conn.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    
  $options = array(
    'cluster' => 'ap2',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    'a2336d24bf1a8aca349d',
    '430b5f98d6d6ef599595',
    '1491862',
    $options
  );


$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];


$sql = "INSERT INTO users (first_name, last_name, created_at)
VALUES ('$firstName', '$lastName', now())";

if ($conn->query($sql) === TRUE) {
    
  $data['message'] = $firstName . ' ' . $lastName;
  $pusher->trigger('my-channel', 'my-event', $data); 
 
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    
}


?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <form aciton="" method="POST" style="margin: top 100px;">
  <div class="form-group">
    <label for="firstName">First Name</label>
    <input type="text" class="form-control" id="fristName" aria-describedby="fristName" placeholder="Enter fristName">
  </div>
  <div class="form-group">
    <label for="lastName">last Name </label>
    <input type="text" class="form-control" id="lastName" aria-describedby="lastName" placeholder="Enter lastName">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
    </div>


</div>
    
</body>
</html>