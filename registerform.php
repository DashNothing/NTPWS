<form action="" method="POST">
  <input type="hidden" id="_action_" name="_action_" value="TRUE" />

  <label for="firstName">First name</label>
  <input id="firstName" name="firstname" type="text" placeholder="Your name..." required />

  <label for="lastName">Last name</label>
  <input id="lastName" name="lastname" type="text" placeholder="Your last name..." required />

  <label for="email">Email</label>
  <input type="email" id="email" name="email" placeholder="Your email..." required />

  <label for="username">Username <small>*min 5 characters, max 10 characters</small></label>
  <input type="text" id="username" name="username" placeholder="Username..." required />

  <label for="password">Password</label>
  <input type="password" id="password" name="password" placeholder="Password..." required />

  <label for="country">Country</label>
  <select name="country" id="country">
    <option value="">Choose a country</option>
    <?php
      $query = "SELECT * FROM country";
      $result = @mysqli_query($MySQL, $query);
      while ($row = @mysqli_fetch_array($result)) {
        print '<option value="' . $row["code"] . '">' . $row["name"] . "</option>";
      }
    ?>
  </select>

  <label for="city">City</label>
  <input type="text" id="city" name="city" placeholder="Your city..." required/>

  <label for="street">Street</label>
  <input type="text" id="street" name="street" placeholder="Your street..." required/>

  <label for="dob">Date of birth</label>
  <input type="date" id="dob" name="dob" placeholder="Your date of birth" required/>

  <input type="submit" value="Submit">

</form>