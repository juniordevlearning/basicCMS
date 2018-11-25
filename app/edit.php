
<form method="post" id="post">
    <p>Title:</p>
    <p><input type="text" name="title"></p>
    <p>Content:</p>
    <p><textarea name="content" rows="5" cols="40"></textarea></p>
    <input type="submit" name="submit_post" value="Submit Post">
</form>

<?php
include 'connection.php';

if (isset($_POST['submit_post'])) {
    if ($_POST['content'] == TRUE && $_POST['title'] == TRUE) {

        $con = new Connection('admin', 'Password#123');
        $pdo = $con->getPdo();

        $stmt = $pdo->prepare("INSERT INTO posts(title, content) VALUES (:title, :content)");
        $stmt->execute(['title' => $_POST['title'], 'content' => $_POST['content']]);
    }
}
