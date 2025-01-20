<?php
// Paramètres de connexion
$host = 'terraform-20250120212850653000000007.cl2kgaoimc9v.eu-west-3.rds.amazonaws.com';
$username = 'admin';
$password = 'SuperSecretPassword123';
$database = 'terraform-20250120212850653000000007';

$test_result = '';

// Tester la connexion si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn = new mysqli($host, $username, $password, $database);

        // Vérifier la connexion
        if ($conn->connect_error) {
            $test_result = "<p style='color: red;'>Échec de la connexion à la base de données : " . $conn->connect_error . "</p>";
        } else {
            $test_result = "<p style='color: green;'>Connexion à la base de données réussie !</p>";
        }
    } catch (Exception $e) {
        $test_result = "<p style='color: red;'>Une erreur est survenue : " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Connexion Base de Données</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .result {
            margin-top: 20px;
            font-size: 1.2em;
        }
    </style>
</head>
<body>

    <h1>Test de Connexion à la Base de Données</h1>
    
    <!-- Formulaire pour déclencher le test -->
    <form method="POST">
        <button type="submit">Test Connexion</button>
    </form>
    
    <!-- Afficher le résultat du test -->
    <div class="result">
        <?php echo $test_result; ?>
    </div>

</body>
</html>
