<?php

class Book
{
    public static function all()
    {
        $stmt = db()->query('SELECT * FROM books');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $stmt = db()->prepare("
            INSERT INTO books (title, author, published_at, cover_image)
            VALUES (:title, :author, :published_at, :cover_image)
        ");
        $stmt->execute([
            ':title' => $data['title'],
            ':author' => $data['author'],
            ':published_at' => $data['published_at'],
            ':cover_image' => $data['cover_image']
        ]);
        return db()->lastInsertId();
    }

    public static function delete($id)
    {
        $stmt = db()->prepare("DELETE FROM books WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
