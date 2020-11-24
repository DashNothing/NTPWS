<h1>Sign In</h1>

<?php
  if ($_POST["_action_"] == FALSE) {
    include("signinform.php");
  } else {
    $query = "SELECT * FROM user";
    $query .= " WHERE username='" . $_POST["username"] . "'";
    $result = mysqli_query($MySQL, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($row["role"] != null) {
      if (password_verify($_POST["password"], $row["password"])) {
        $_SESSION["user"]["valid"] = "true";
        $_SESSION["user"]["id"] = $row["id"];
        $_SESSION["user"]["firstname"] = $row["first_name"];
        $_SESSION["user"]["lastname"] = $row["last_name"];
        $_SESSION["user"]["role"] = $row["role"];
        $_SESSION["message"] = "Dobrodošli, " . $_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"];
      
        header("Location: index.php?menu=9");
      } else {
        unset($_SESSION["user"]);
        $_SESSION["message"] = "Wrong email or password!";
        header("Location: index.php?menu=8");
      }
    } else {
      unset($_SESSION["user"]);
      $_SESSION["message"] = "Account not verified! Please wait for your account to be verified by an admin.";
      header("Location: index.php?menu=8");
    }
    
  }

?>