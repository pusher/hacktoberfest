<?php

require_once 'conn.php';

$sql="SELECT * FROM users ORDER BY user_id DESC";
$result = $conn -> query($sql);

if($result->num_rows > 0){
    while ($row = $result ->fetch_assoc()){
        $date= strtotime($row['created_at']);
                        ?>
                        <tr>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo daet(format: 'd-M-y', $date); ?></td>
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
