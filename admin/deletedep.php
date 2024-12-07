<?php
$connection=mysqli_connect("localhost","root","","online_examination_with_security");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($connection) {
        $dept=$_POST['dept'];
        $query = "DELETE from departments WHERE department_names='$dept'";
        mysqli_query($connection, $query);
        mysqli_close($connection);
        header('location:department-show.php');
    } else {
        die('something went wrong with database' . mysqli_connect_error());
    }
}
?>