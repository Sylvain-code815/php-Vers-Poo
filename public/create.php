<?php
require_once __DIR__ . '/../src/ResourceRepository.php';
require_once __DIR__ . '/../src/Validator.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = Validator::validate($_POST);

    if (empty($errors)) {
        $resource = new Resource($_POST);

        $repository = new ResourceRepository();
        if ($repository->create($resource)) {
            header('Location: index.php');
            exit;
        }
    }
}