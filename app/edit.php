<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

    // Récupération du paramètre passé en GET
    $idClient = $_GET['id'];
    // ATTENTION, il FAUT filtrer cette valeur!!!!!!!!!!!!!

    $stmt = $dbh->prepare ( "SELECT * FROM Clients WHERE id= :idclient");

    // Création de la requête en utilisant la valeur issue du paramètre
    
    $stmt->bindParam( ':idclient' , $idClient, PDO::PARAM_INT);
    

    // Exécution de la requête préparée
    $stmt->execute();

    // Récupération du résultat de la requête
    $client = $stmt->fetch();
    var_dump($client);

    
}
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}
?>
</body>
</html>