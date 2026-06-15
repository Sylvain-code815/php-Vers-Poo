<?php

require __DIR__ . '/../bootstrap.php';

$resources = $repository->findAll();

require __DIR__ . '/../views/partials/index.view.php';
