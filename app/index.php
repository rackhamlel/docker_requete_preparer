<!DOCTYPE html>
<html>
<head>
    <title>Cours Requêtes préparées</title>
    <meta charset="utf-8">
</head>
<body>
<h1>Bases de données MySQL</h1>
<?php
// Informations de connexion au serveur de base de données
$servname = 'mysql-vulnerable';
$dbname = 'pdodb';
$user = 'pdodb';
$pass = 'pdodb';

/* On imagine qu'on récupère les valeurs suivantes à partir d'un formulaire envoyé par les utilisateurs */
$nom = 'Richard';
$prenom = 'Pierre';
$adresse = 'Rue de la Chèvre';
$ville = 'Toulon';
$cp = 83000;
$pays = 'France';
$mail = "'gg42@gmail.com'),('a','b','c','d',1,'e','f42'"; // Adresse mail valide

global $dbh;

try {
    // Connexion à la base avec PDO
    $dbh = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);

    // Création de la requête préparée
    $sql = "INSERT INTO Clients(Nom, Prenom, Adresse, Ville, Codepostal, Pays, Mail) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);

    // Liaison des valeurs aux paramètres de la requête
    $stmt->bindParam(1, $nom, PDO::PARAM_STR);
    $stmt->bindParam(2, $prenom, PDO::PARAM_STR);
    $stmt->bindParam(3, $adresse, PDO::PARAM_STR);
    $stmt->bindParam(4, $ville, PDO::PARAM_STR);
    $stmt->bindParam(5, $cp, PDO::PARAM_INT);
    $stmt->bindParam(6, $pays, PDO::PARAM_STR);
    $stmt->bindParam(7, $mail, PDO::PARAM_STR);

    // Exécution de la requête préparée
    $stmt->execute();

    echo 'Entrée ajoutée dans la table';
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
</body>
</html>
