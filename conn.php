<?php
$conn = new pusher("localhost","root","nikitajain","pusher");
require _DIR_ . '/vendor/autoload.ph'




if ($pusher -> connect_errno) {
  echo "Failed to connect to MySQL: " . $pusher -> connect_error;
  exit();
}
?>