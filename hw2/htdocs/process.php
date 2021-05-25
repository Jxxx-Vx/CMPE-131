
<html>
  <head>
    <title>Processing</title>
  </head>
  <body>
    <h1>Processing</h1>

    <?php
     if (isset($_POST["username"]) && isset($_POST["password"])) {
       if($_POST["username"] && $_POST["password"]){
        $username = $_POST["username"];
        $password = $_POST["password"];



      // create connection
        $conn = mysqli_connect("localhost", "root", "", "users");
        // check connection
        if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
        }
        // register user
        $sql = "INSERT INTO users (username, password) VALUES
         ('$username', '$password')";
        $results = mysqli_query($conn, $sql);
        if ($results) {
         echo "The user has been added.";
         echo "<br>";
         date_default_timezone_set('America/Los_Angeles');
         echo "Registered date for this user is " . date("m-d-Y");
         echo ", " . date("h:i:sa").".";
        } else {
         echo mysqli_error($conn);
        }
        mysqli_close($conn); // close connection
       }
       else {
         echo "Username or Password is Empty.";
       }
    }
     else {
       echo "Form was not submitted.";
     }
    ?>
  </body>
</html>
