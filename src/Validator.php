<?php


class Validator
{
    public static function validate(array $data): array
    {
        $errors = [];

        // Validation du titre
        if (empty(trim($data['title'] ?? ''))) {
            $errors['title'] = "Le titre est obligatoire.";
        } elseif (strlen($data['title']) < 3) {
            $errors['title'] = "Le titre doit contenir au moins 3 caractères.";
        }

        // Validation du type
        if (empty(trim($data['type'] ?? ''))) {
            $errors['type'] = "Le type de ressource est obligatoire.";
        }

        // Validation logique du statut et de l'emprunteur
        $status = $data['status'] ?? 'disponible';
        $borrower = trim($data['borrower'] ?? '');

        if ($status === 'emprunté' && empty($borrower)) {
            $errors['borrower'] = "Vous devez indiquer le nom de l'emprunteur si la ressource est empruntée.";
        }

        return $errors;
    }
}