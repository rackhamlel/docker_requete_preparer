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

    if($_SERVER['REQUEST_METHOD']=== 'POST')
        {
            // Connexion à la base avec PDO
        $dbh = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        

        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $adresse= $_POST["adresse"];
        $ville= $_POST["ville"];
        $cp= $_POST["cp"];
        $pays= $_POST["pays"];
        $mail= $_POST["mail"];


    }
    try{
        $sth = $dbh -> prepare("INSERT INTO Clients (Nom, Prenom, Adresse, Ville, Codepostal , Pays , Mail) VALUES (?,?,?,?,?,?,?)");

        $sth->bindParam(1, $nom, PDO::PARAM_STR);
        $sth->bindParam(2, $prenom, PDO::PARAM_STR);
        $sth->bindParam(3, $adresse, PDO::PARAM_STR);
        $sth->bindParam(4, $ville, PDO::PARAM_STR);
        $sth->bindParam(5, $cp, PDO::PARAM_INT);
        $sth->bindParam(6, $pays, PDO::PARAM_STR);
        $sth->bindParam(7, $mail, PDO::PARAM_STR);

        $sth ->execute();

        header("location:http://localhost:8000/index.html");


    }catch(PDOException $e){
        echo "erreur";
    }












