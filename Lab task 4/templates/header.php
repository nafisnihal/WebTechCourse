<nav >
<?php 
if (isset($_SESSION['uname'])) {
    echo '<span>Logged in as '.$_SESSION['uname'] .'</span> | ';
    echo '<a href="logout.php">Logout</a>';
    echo '<hr>';
} else {
    echo '
    <a href="/WebTechCourse/Lab task 4/Home.php">Home</a> |
    <a href="/WebTechCourse/Lab task 4/login.php">Login</a> |
  <a href="/WebTechCourse/Lab task 4/registration.php">Registration</a>
  <hr>
</nav>';
}
?>

