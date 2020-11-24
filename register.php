<h1>Register</h1>

<?php
  if ($_POST["_action_"] == FALSE) {
    include("registerform.php");
  } else {
    $query = "SELECT * FROM user";
    $query .= " WHERE email='" . $_POST["email"] . "'";
    $query .= " OR username='" . $_POST["username"] . "'";

    $result = @mysqli_query($MySQL, $query);
    $row = @mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($row == NULL) {
      $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ["cost" => 12]);
    
      $query = "INSERT INTO user (first_name, last_name, email, username, password, country, city, street, dob)";
      $query .= " VALUES ('" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "', '" . $_POST['email'] . "', '" . $_POST['username'] . "', '" . $pass_hash . "', '" . $_POST['country'] . "', '" . $_POST['city'] . "', '" . $_POST['street'] . "', '" . $_POST['dob'] . "')";
      $result = @mysqli_query($MySQL, $query);

      $_SESSION["message"] = "Registration successful!";
      header("Location: index.php?menu=8");
    } else {
      print '<p>User with this email or username already exists!</p>';
      print '<a href="index.php?menu=6" class="primary-btn">Back to registration</a>';
    }
  }
?>

