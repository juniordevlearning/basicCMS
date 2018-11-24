
<form method="post" id="post">
    <p>Title:</p>
    <p><input type="text" name="title"></p>
    <p>Content:</p>
    <p><textarea name="content" rows="5" cols="40"></textarea></p>
    <input type="submit" name="submit_post" value="Submit Post">
</form>

<?php
include 'helpers.php';

if (isset($_POST['submit_post'])) {
    if ($_POST['content'] == TRUE && $_POST['title'] == TRUE) {
        echo 'Title: '.$_POST['title'].'</br>Content: '.$_POST['content'];

        $con = connect('admin', 'Password#123');
        var_dump($con);
        $stmt = $con->prepare("INSERT INTO posts(title, content) VALUES (:title, :content)");
        $stmt->execute(['title' => $_POST['title'], 'content' => $_POST['content']]);
    }
}
