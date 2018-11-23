<h1> Admin Section </h1>

<form method="post">
    <p> Username or Emailaddress </p>
    <input name="username" type="text">

    <p> Password </p>
    <input name="password" type="password">

    <button type="submit" name="submit">OK</button> 
</form>

<?php
if (isset($_POST['submit'])) {
    if ($_POST['username'] == TRUE && $_POST['password'] == TRUE) {
        $con = connectToDB('admin', 'Password#123');
        
        $stmt = $con->prepare('SELECT * FROM admins WHERE name = :user');
        $stmt->execute(['user' => $_POST['username']]);
        $user = $stmt->fetch();

        if ($user['password'] == $_POST['password']) {
            render('edit');             
        } else {
            echo "wrong pw";
        }
    } else {
        echo "false";
    }
}
