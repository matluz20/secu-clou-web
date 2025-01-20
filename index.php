<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Connexion à la Base de Données</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>Test de Connexion à la Base de Données</h1>

    <!-- Bouton pour tester la connexion -->
    <button onclick="testerConnexion()">Tester Connexion</button>

    <!-- Zone pour afficher le message -->
    <div id="message"></div>

    <script>
        // Fonction pour appeler le fichier PHP et tester la connexion
        function testerConnexion() {
            // Afficher un message de chargement
            document.getElementById('message').innerHTML = "Test en cours...";

            // Créer un objet XMLHttpRequest
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "test_connexion.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Afficher la réponse du fichier PHP (message)
                    document.getElementById('message').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>

</body>
</html>
