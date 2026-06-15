<?php

use Parad\PhpPoo\Resource;
use Parad\PhpPoo\Validator;

require __DIR__ . '/../bootstrap.php';

$id = (int) ($_GET['id'] ?? 0);
$resource = $repository->find($id);

if (!$resource) {
    header('Location: index.php');
    exit;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = Validator::validate($_POST);

    if (empty($errors)) {
        $data = $_POST;
        $data['id'] = $id;

        if ($repository->update(Resource::fromArray($data))) {
            header('Location: index.php');
            exit;
        }
    }
}

require __DIR__ . '/../views/partials/edit.view.php';
