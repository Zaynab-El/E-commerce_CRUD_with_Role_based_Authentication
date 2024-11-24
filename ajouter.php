<?php
require 'db.php';

$id = null; // Auto-incrémenté, laissez null si votre colonne 'id' est définie comme clé primaire auto-incrémentée.
$name = 'Admin'; // Nom d'utilisateur
$email = 'admin@gmail.com'; // Email de l'administrateur
$password = password_hash('admin123', PASSWORD_BCRYPT); // Hachage du mot de passe
$role = 'admin'; // Rôle de l'utilisateur
$created_at = date('Y-m-d H:i:s'); // Date de création actuelle
$updated_at = $created_at; // Date de mise à jour initiale identique à la création

try {
    $stmt = $pdo->prepare("
        INSERT INTO users (id, name, email, password, created_at, updated_at, role) 
        VALUES (:id, :name, :email, :password, :created_at, :updated_at, :role)
    ");
    $stmt->execute([
        'id' => $id, // Peut être omis si `id` est auto-incrémenté.
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'created_at' => $created_at,
        'updated_at' => $updated_at,
        'role' => $role,
    ]);
    echo "Admin ajouté avec succès.";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
