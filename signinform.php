<form action="" method="POST">
  <input type="hidden" id="_action_" name="_action_" value="TRUE"/>

  <label for="username">Username</label>
  <input type="text" id="username" name="username" placeholder="Your username..." pattern=".{5,10}" required/>

  <label for="password">Password</label>
  <input type="password" id="password" name="password" placeholder="Your password" pattern=".{4,}" required/>

  <input type="submit" value="Submit"/>
</form>