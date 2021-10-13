<?php
$sql_admin_data = mysqli_query($host,"SELECT * FROM admin_data WHERE id_perawat='$user_check'");
$count_admin    = mysqli_num_rows($sql_admin_data);