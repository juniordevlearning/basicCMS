
<form method="post" id="post">
    <p>Title:</p>
    <p><input type="text" name="title"></p>
    <p>Content:</p>
    <p><textarea name="content" rows="5" cols="40"></textarea></p>
    <input type="submit" name="create_post" value="Create">
</form>

<?php
// redirect user to home if not logged in
if (!isset($_SESSION['admin'])) {
    header("Location: /home");
}
// check if Title and content is set
if (isset($_POST['create_post']) && $_POST['content'] == TRUE && $_POST['title'] == TRUE) {
    // check if title allready exitst
    if (!titleAllreadyUsed($this->pdo)) { 
        createPost($this->pdo);
    } else {
        echo "Title allready used";
    }
}

function titleAllreadyUsed($pdo) {
    $titles = $pdo->query('SELECT title FROM posts');
    foreach ($titles as $title) {
        if ($title['title'] == $_POST['title']) {
            return TRUE;
        }
    }
}

function createPost($pdo) {
    $stmt = $pdo->prepare("INSERT INTO posts(title, content, created_at) VALUES (:title, :content, :created_at)");
    $stmt->execute(['title' => $_POST['title'], 'content' => $_POST['content'], 'created_at' => date('Y-m-d')]);
}

$posts = $this->pdo->query('SELECT title, content, created_at FROM posts');
foreach ($posts as $post)
{
    echo "Title: ".$post['title'] . '<br>';
    echo "Content: ".$post['content'].'<br>';
    echo "Date: ".$post['created_at'].'<br>';
    echo "<br><br>";
}
?>

