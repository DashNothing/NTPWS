<?php
  $query  = "SELECT * FROM user";
  $query .= " WHERE id=" . $_GET['edit'];
  $result = @mysqli_query($MySQL, $query);
  $row = @mysqli_fetch_array($result);

  print '<h2>Edit ' . $row["first_name"] . " " . $row["last_name"] . '</h2>';

  print '
<form action="" name="registration_form" method="POST">
  <input type="hidden" id="_action_" name="_action_" value="TRUE">
  <input type="hidden" id="edit" name="edit" value="' . $_GET['edit'] . '">

  <label for="fname">First Name *</label>
  <input type="text" id="fname" name="firstname" value="' . $row['first_name'] . '" placeholder="User name.." required>
  <label for="lname">Last Name *</label>
  <input type="text" id="lname" name="lastname" value="' . $row['last_name'] . '" placeholder="User last natme.."
    required>

  <label for="email">Your E-mail *</label>
  <input type="email" id="email" name="email" value="' . $row['email'] . '" placeholder="User e-mail.." required>

  <label for="username">Username *<small>(Username must have min 5 and max 10 char)</small></label>
  <input type="text" id="username" name="username" value="' . $row['username'] . '" pattern=".{5,10}"
    placeholder="Username.." required>

  <label for="country">Country</label>
  <select name="country" id="country">
    <option value="">molimo odaberite</option>';
    $_query = "SELECT * FROM country";
    $_result = @mysqli_query($MySQL, $_query);
    while($_row = @mysqli_fetch_array($_result)) {
    print '<option value="' . $_row['code'] . '"';
      if ($row['country'] == $_row['code']) {
        print ' selected';
      }
        print '>' . $_row['name']
      . '</option>' ;
    }
    print '
  </select>
  
  <label for="role">Role</label>
  <select name="role" id="role" selected="' . $row["role"] . '">
    <option value="">Unassigned</option>
    <option value="user" selected>User</option>
    <option value="editor">Editor</option>
    <option value="admin">Admin</option>
  </select>
  
  <input type="submit" value="Submit">
</form>
';
?>