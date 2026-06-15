<?php

namespace Parad\PhpPoo;

class Resource
{
    public $id;
    public $title;
    public $type;
    public $status;
    public $borrower;

    public function __construct($id, $title, $type, $status, $borrower = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->type = $type;
        $this->status = $status;
        $this->borrower = $borrower;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            isset($data['id']) ? (int) $data['id'] : null,
            trim($data['title'] ?? ''),
            trim($data['type'] ?? ''),
            $data['status'] ?? 'disponible',
            trim($data['borrower'] ?? '') ?: null
        );
    }
}
