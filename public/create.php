<?php

use Parad\PhpPoo\Resource;
use Parad\PhpPoo\Validator;

require __DIR__ . '/../bootstrap.php';

$errors = [];
$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    $errors = Validator::validate($data);

    if (empty($errors)) {
        $resource = Resource::fromArray($data);

        if ($repository->create($resource)) {
            header('Location: index.php');
            exit;
        }
    }
}

require __DIR__ . '/../views/partials/create.view.php';
