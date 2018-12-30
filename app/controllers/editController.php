<?php

class editController
{
    public function index()
    {
        // redirect user to home if not logged in
        if (!isset($_SESSION['admin'])) {
            header("Location: /home");
        }

        $posts = Connection::$pdo->query('SELECT title, content, created_at FROM posts')->fetchAll(PDO::FETCH_ASSOC);

        View()->setBody('edit', $posts);
    }

    public function store()
    {
        // check if Title and content is set
        if (isset($_POST['create_post']) && $_POST['content'] == TRUE && $_POST['title'] == TRUE) {
            // check if title allready exitst
            if (!$this->titleAllreadyUsed()) { 
                $this->createPost();
            } else {
                echo "Title allready used";
            }
        }
    }

    protected function createPost() {
        $stmt = Connection::$pdo->prepare("INSERT INTO posts(title, content, created_at) VALUES (:title, :content, :created_at)");
        $stmt->execute(['title' => $_POST['title'], 'content' => $_POST['content'], 'created_at' => date('Y-m-d')]);
    }

    protected function titleAllreadyUsed() {
        $titles = Connection::$pdo->query('SELECT title FROM posts');
        foreach ($titles as $title) {
            if ($title['title'] == $_POST['title']) {
                return TRUE;
            }
        }
    }
}