<?php
 $logged_in = false;
 if (isset($_POST["username"]) && isset($_POST["password"])) {
   if ($_POST["username"] && $_POST["password"]) {
     $username = $_POST["username"];
     $password = $_POST["password"];
     // create connection
     $conn = mysqli_connect("localhost", "root", "", "users");
     // check connection
     if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
     }
     // select user
     $sql = "SELECT password FROM users WHERE username = '$username'";
     $results = mysqli_query($conn, $sql);

     if ($results) {
       $row = mysqli_fetch_assoc($results);
       if ($row["password"] === $password) {
         $logged_in = true;
       }
    }
     else {
       echo mysqli_error($conn);
     }
     mysqli_close($conn); // close connection
   } else {
      echo "Nothing was submitted.";
   }
 }
?>

<html>
   <header>
   <title>Login Page</title>
   </header>
   <body>
     <h1>Login Here</h1>
     <form action="/login.php" method="post">
       <h3>Enter Username:</h3>
       <input type="text" name="username">
       <br>
       <h3>Enter Password:</h3>
       <input type="password" name="password">
       <input type="submit">
     </form>
     <br>
     <br>
     <br>
     <?php
     if($logged_in && $results){
       echo "SUCCESS!";
       echo "<br>";
       date_default_timezone_set('America/Los_Angeles');
       echo "You've logged in at ". date("m-d-Y");
       echo ", " . date("h:i:sa").".";
     }
     else {
       echo "FAILED!";
     }
     ?>

 </body>
</html
