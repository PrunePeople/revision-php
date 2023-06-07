<?php
// Config
// --

// Inclusion du fichier de configuration
require_once "config.php";

// DB Connection
// --

try {
    // Construction de la chaîne de connexion à la base de données
    $database_dsn = 'mysql:host=' . $db_host . ';port=' . $db_port . ';dbname=' . $db_schema . ';charset=' . $db_charset;
    // Création de l'objet PDO pour établir la connexion à la base de données
    $pdo = new PDO($database_dsn, $db_user, $db_pass);
} catch (Exception $e) {
    // Gestion des erreurs lors de la connexion à la base de données
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die;
}

// Form treatment
// --

$firstname = null;
$lastname = null;

// Traitement du formulaire lors d'une requête POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = false;
    $data = $_POST;

    // Récupération des valeurs du formulaire
    $firstname = isset($data['firstname']) ? trim($data['firstname']) : $firstname;
    $lastname = isset($data['lastname']) ? trim($data['lastname']) : $lastname;

    // Vérification des champs du formulaire
    if (strlen($firstname) <= 0) {
        $error = true;
    }

    if (strlen($lastname) <= 0) {
        $error = true;
    }

    // Insertion des données dans la base de données s'il n'y a pas d'erreur
    if (!$error) {
        $sql = "INSERT INTO users (`firstname`, `lastname`) VALUES (:firstname, :lastname)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);

        // Redirection vers une autre page ou exécution d'une autre action si nécessaire
        // header("Location: ".$_SERVER['HTTP_HOST']);
        // exit;
    } else {
        // Affichage des erreurs éventuelles
        echo "Affiche les erreurs";
    }
}

// Retrieve DB Data
// --

// Récupération des données de la base de données
$stmt = $pdo->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!-- Titre du formulaire -->
    <h2>Form</h2>

    <!-- Formulaire pour saisir les informations -->
    <form method="POST">
        <div>
            <label for="firstname_field">Firstname</label>
            <input type="text" id="firstname_field" name="firstname" value="<?= $firstname ?>">
        </div>
        <div>
            <label for="lastname_field">Lastname</label>
            <input type="text" id="lastname_field" name="lastname" value="<?= $lastname ?>">
        </div>
        <button type="reset">cancel</button>
        <button type="submit">submit</button>
    </form>

    <hr>
    <!-- En-tête pour afficher les résultats -->
    <h2>Results</h2>

    <!-- Affichage du nombre total d'utilisateurs -->
    <div>
        Total users : <?= count($users) ?>
    </div>

    <!-- Liste des utilisateurs -->
    <ul>
        <?php foreach ($users as $user) : ?>
            <!-- Chaque utilisateur est représenté par un élément de liste -->
            <li><?= $user->id ?> - <?= $user->firstname ?> <?= $user->lastname ?></li>
        <?php endforeach; ?>
    </ul>

</body>

</html>
