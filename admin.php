<h1> Admin Section </h1>

<form method="post">
<p> Username or Emailaddress </p>
<input name="username" type="text">


<p> Password </p>
<input name="password" type="password">
<button type="submit" name="submit">OK</button> 
</form>


<?php


if ($_POST['username'] == TRUE && $_POST['password'] == TRUE) {
    echo "true";
} else {
    echo "false";
}
