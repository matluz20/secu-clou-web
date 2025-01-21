<?php
// Informations de connexion à la base de données
$host = 'terraform-20250121115406880900000010.cxymgguk68ge.eu-west-3.rds.amazonaws.com'; 
$dbname = 'testdb';   
$username = 'admin';  
$password = 'SuperSecretPassword123'; // Mot de passe de la base de données

// Tentative de connexion au serveur MySQL (sans spécifier de base de données pour pouvoir créer la base)
try {
    // Création de la connexion PDO sans base de données (avec hôte)
    $pdo = new PDO("mysql:host=$host", $username, $password);
    
    // Paramétrer les erreurs en mode exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Vérifier si la base de données existe
    $result = $pdo->query("SHOW DATABASES LIKE '$dbname'");
    
    // Si la base de données n'existe pas, on la crée
    if ($result->rowCount() == 0) {
        $pdo->exec("CREATE DATABASE $dbname");
        echo "<p class='success'>Base de données '$dbname' créée avec succès !</p>";
    } else {
        echo "<p class='success'>La base de données '$dbname' existe déjà.</p>";
    }
    
    // Maintenant que la base de données existe, on se reconnecte à celle-ci
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Si la connexion réussit, renvoyer ce message
    echo "<p class='success'>Connexion réussie à la base de données MySQL !</p>";
} catch (PDOException $e) {
    // Si une erreur se produit, renvoyer ce message
    echo "<p class='error'>Erreur de connexion à la base de données: " . $e->getMessage() . "</p>";
}
?>
