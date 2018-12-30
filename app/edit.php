
<form method="post" id="post" action="">
    <p>Title:</p>
    <p><input type="text" name="title"></p>
    <p>Content:</p>
    <p><textarea name="content" rows="5" cols="40"></textarea></p>
    <input type="submit" name="create_post" value="Create">
</form>

<?php
/*
 * TODO:
 * gotta create a delet post and delete All posts button
 */

foreach ($this->vars as $post)
{
    echo "Title: ".$post['title'] . '<br>';
    echo "Content: ".$post['content'].'<br>';
    echo "Date: ".$post['created_at'].'<br>';
    echo "<br><br>";
}