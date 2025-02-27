<?php
session_start();
session_destroy();
header("Location: /Lab3/task_files/auth.php");
exit;
?>