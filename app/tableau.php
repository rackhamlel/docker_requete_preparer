<!DOCTYPE html>
<html>
<head>
    <title>Cours Requêtes préparées</title>
    <meta charset="utf-8">
</head>
<h2>
<h1>Bases de données MySQL</h1>

<h2>Affichage de tous les clients</h2>
<?php
// Informations de connexion au serveur de base de données
$servname = 'mysql-vulnerable';
$dbname = 'pdodb';
$user = 'pdodb';
$pass = 'pdodb';

global $dbh;

try{
    // Connexion à la base avec PDO
    $dbh = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);

    // Création de la requête
    $sql = "SELECT * FROM Clients;";

    // Exécution réelle de la requête créée ci-dessus
    $statement = $dbh->query($sql);

    //var_dump( $statement->fetchAll() );
    // Récupération de tous les clients
    $listeclients = $statement->fetchAll();

    // Affichage dans un joli tableau
    echo "<table>";
        echo "<thead>";
            echo "<th>ID</th>";
            echo "<th>Nom</th>";
            echo "<th>Modifier</th>";
            echo "<th>Supprimer</th>";
        echo "</thead>";


        foreach ($listeclients as $client)
        {
            echo "<tr>";

                // Préparation d'une ligne avec sprintf
                $clientLine = sprintf(
                    "<td>%s</td>
                            <td>%s</td>
                            <td><a href='edit.php?id=%s'>Modifier</a></td>
                            <td><a href='delete.php?id=%s'>Supprimer</a></td>",
                    $client['Id'],
                    $client['Nom'],
                    $client['Id'],
                    $client['Id']
                );

                echo $clientLine;

            echo "</tr>";
        }
    echo "</table>";
}

catch(PDOException $e){
    //$dbh->rollBack();
    echo "Requête exécutée: " . $sql;
    echo "Erreur : " . $e->getMessage();
}
?>
</body>
</html>