<h1> Welcome to Homepage </h1>
<form method="post">
    <button type="submit" name="unset">Unset Session</button>
</form>
<?php
if (isset($_POST['unset'])) {
    unset($_SESSION['admin']);
}
?>
<h2> Newest Blogpost </h2>
<p> We got some posts balbliblu... </p>
<span> Some Image </span>


<h3> Comment section </h3>

<p> User: schalalalalalom </p>
<p> Fuck all this </p>

