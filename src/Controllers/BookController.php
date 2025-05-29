<?php

require_once __DIR__ . '/../Models/Book.php';

class BookController
{
    public function index()
    {
        echo json_encode(Book::all());
    }

    public function store()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!$this->validate($data)) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid input']);
            return;
        }

        $data['published_at'] = date('Y-m-d H:i:s', strtotime($data['published_at']));
        $id = Book::create($data);
        echo json_encode(['message' => 'Book created', 'id' => $id]);
    }

    public function destroy($id)
    {
        $success = Book::delete($id);
        echo json_encode(['deleted' => $success]);
    }

    private function validate($data)
    {
        return isset($data['title'], $data['author'], $data['published_at'], $data['cover_image']);
    }
}