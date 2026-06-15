<?php
// config/database.php
return [
    'host'     => '127.0.0.1', // On utilise l'IP directe pour éviter le bug du double @@
    'username' => 'root',
    'database' => 'mediatheque_poo', // Mets le nom EXACT que tu vois dans phpMyAdmin
    'password' => ''           // ON ENLÈVE 'olivier' ET ON MET UNE CHAÎNE VIDE
];