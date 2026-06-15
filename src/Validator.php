<?php

namespace Parad\PhpPoo;

class Validator
{
    public const ALLOWED_STATUSES = ['disponible', 'emprunte', 'maintenance'];

    public static function validate(array $data): array
    {
        $errors = [];

        if (trim($data['title'] ?? '') === '') {
            $errors['title'] = 'Le titre est obligatoire.';
        }

        if (trim($data['type'] ?? '') === '') {
            $errors['type'] = 'Le type est obligatoire.';
        }

        if (!in_array($data['status'] ?? '', self::ALLOWED_STATUSES, true)) {
            $errors['status'] = 'Le statut est invalide.';
        }

        return $errors;
    }
}
