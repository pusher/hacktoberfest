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
            <table class="table table-bordered" style="margin-top: 100px;">
            <table>
                <thead>
                    <tr>
                        <th>first name</th>
                        <th>last name</th>
                        <th>created date</th>
                    </tr>
                </thead>
                <tbody id="result">
                <?php
                if($result-> num_rows>0){
                    while($row = $result->fetch_assoc()){
                        $date= strtotime($row['created_at']);
                        ?>
                        <tr>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo date(format: 'd-M-y', $date); ?></td>
                        </tr>
                        <?php
                    }
                }else {
                    ?>
                    <tr>
                        <td colspan="3">No users found</td>
                    </tr>
                <?php
                }
                ?>

                    <tr>
                        <td>john </td>
                        <td>joe</td>
                        <td>15-june-2002  </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('a2336d24bf1a8aca349d', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      // alert(JSON.stringify(data));
      $.ajax({url: "userws.php", success: function(result){
    $("#result").html(result);
  }});
    });
  </script>
</body>
</html>


