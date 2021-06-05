<?php

class Post extends Db
{
    public function getAllPosts()
    {
        $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function getUserPosts($username)
    {
        $sql = "SELECT * FROM posts WHERE author=:author ORDER BY created_at DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["author" => $username]);

        while ($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function getSinglePost($id)
    {
        $sql = "SELECT * FROM posts WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["id" => $id]);
        $post = $stmt->fetch();

        return $post;
    }

    public function addPost($title, $content, $author)
    {
        $sql = "INSERT INTO posts(title, content, author) VALUES (:title, :content, :author)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([
            "title" => $title,
            "content" => $content,
            "author" => $author
        ]);
    }

    public function updatePost($title, $content, $id)
    {
        $sql = "UPDATE posts SET title=:title, content=:content WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([
            "title" => $title,
            "content" => $content,
            "id" => $id
        ]);
    }

    public function deletePost($id)
    {
        $sql = "DELETE FROM posts WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["id" => $id]);
    }
}