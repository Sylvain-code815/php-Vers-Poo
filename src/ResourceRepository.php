<?php

namespace Parad\PhpPoo;

use PDO;

class ResourceRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM resources ORDER BY created_at DESC');

        return array_map(fn(array $r) => Resource::fromArray($r), $stmt->fetchAll());
    }

    public function find(int $id): ?Resource
    {
        $stmt = $this->pdo->prepare('SELECT * FROM resources WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        return $row ? Resource::fromArray($row) : null;
    }

    public function create(Resource $resource): bool
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO resources (title, type, status, borrower)
             VALUES (:title, :type, :status, :borrower)'
        );

        return $stmt->execute([
            'title'    => $resource->title,
            'type'     => $resource->type,
            'status'   => $resource->status,
            'borrower' => $resource->borrower,
        ]);
    }

    public function update(Resource $resource): bool
    {
        $stmt = $this->pdo->prepare(
            'UPDATE resources
                SET title = :title, type = :type, status = :status, borrower = :borrower
              WHERE id = :id'
        );

        return $stmt->execute([
            'title'    => $resource->title,
            'type'     => $resource->type,
            'status'   => $resource->status,
            'borrower' => $resource->borrower,
            'id'       => $resource->id,
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM resources WHERE id = :id');

        return $stmt->execute(['id' => $id]);
    }
}
