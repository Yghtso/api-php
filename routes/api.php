<?php

require_once __DIR__ . '/../src/Controllers/BookController.php';

function route($uri, $method)
{
    $bookController = new BookController();

    if ($uri === '/books' && $method === 'GET') {
        $bookController->index();
    } elseif ($uri === '/books' && $method === 'POST') {
        $bookController->store();
    } elseif (preg_match('#^/books/(\d+)$#', $uri, $matches) && $method === 'DELETE') {
        $bookController->destroy((int) $matches[1]);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Not Found']);
    }
}
