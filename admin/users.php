<?php

  if (isset($_POST['edit']) && $_POST['_action_'] == 'TRUE') {
    $query  = "UPDATE user SET first_name='" . $_POST['firstname'] . "', last_name='" . $_POST['lastname'] . "', email='" . $_POST['email'] . "', username='" . $_POST['username'] . "', country='" . $_POST['country'] . "', role='" . $_POST['role'] . "'";
    $query .= " WHERE id=" . (int)$_POST['edit'];
    $query .= " LIMIT 1";
    $result = @mysqli_query($MySQL, $query);

    # Close MySQL connection
    @mysqli_close($MySQL);
    
    $_SESSION['message'] = '<p>User successfully changed!</p>';
    
    # Redirect
    header("Location: index.php?menu=9&action=1");
  }

  if (isset($_GET['edit']) && $_GET['edit'] != '') {
      include("userform.php");

      print '<p><a href="index.php?menu=' . $menu . '&amp;action=' . $action . '">Back</a></p>';
  } else {
    print '
      <h2>Users</h2>
      <table>
      <thead>
        <tr>
          <th></th>
          <th></th>
          <th></th>
          <th>First name</th>
          <th>Last name</th>
          <th>Email</th>
          <th>Country</th>
          <th>Role</th>
        </tr>
      </thead>
      <tbody>';

      $query = "SELECT * FROM user";
      $result = mysqli_query($MySQL, $query);
      while($row = mysqli_fetch_array($result)) {
        print '
          <tr>
            <td><a href="index.php?menu=' . $menu . '&amp;action=' . $action . '&amp;id=' . $row['id'] . '"><img src="img/icons/user.svg" alt="user"></a></td>
            <td><a href="index.php?menu=' . $menu . '&amp;action=' . $action . '&amp;edit=' . $row['id'] . '"><img src="img/icons/edit.svg" alt="edit"></a></td>
            <td><a href="index.php?menu=' . $menu . '&amp;action=' . $action . '&amp;delete=' . $row['id'] . '"><img src="img/icons/delete.svg" alt="delete"></a></td>
            <td>' . $row['first_name'] . '</td>
            <td>' . $row['last_name'] . '</td>
            <td>' . $row['email'] . '</td>
            <td>';
              $_query  = "SELECT * FROM country";
              $_query .= " WHERE code='" . $row['country'] . "'";
              $_result = @mysqli_query($MySQL, $_query);
              $_row = @mysqli_fetch_array($_result, MYSQLI_ASSOC);
              print $_row['name'] . '
            </td>
            <td>' . $row["role"] . '</td>
            </tr>
        ';
      }
      print '
      </tbody>
      </table>
      ';
  }
?>

