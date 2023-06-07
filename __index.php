<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Exemple PHP</h1>

    <?php
    // Déclaration de la variable $name avec la valeur "John"
    $name = "John";
    ?>

    <!-- Affichage de la valeur de la variable $name -->
    <div>Username : <?= $name ?></div>
    <div>Username : <?php echo $name ?></div>


    <hr>

    <?php
    // Tableau numérique
    $fruits = [
        /* 0 */
        "Pomme",
        /* 1 */ "Poire",
        /* 2 */ "Banane"
    ];
    ?>

    <ul>
        <li><?= $fruits[0] ?></li>
        <li><?= $fruits[1] ?></li>
        <li><?= $fruits[2] ?></li>
    </ul>

    <ul>
        <?php foreach ($fruits as $key => $value) { ?>
            <!-- Parcours du tableau $fruits et affichage des paires clé-valeur -->
            <li><?= $key ?> - <?= $value ?></li>
        <?php } ?>
    </ul>
    <ul>
        <?php foreach ($fruits as $value) { ?>
            <!-- Parcours du tableau $fruits et affichage des valeurs -->
            <li><?= $value ?></li>
        <?php } ?>
    </ul>


    <ul>
        <?php foreach ($fruits as $key => $value) : ?>
            <!-- Syntaxe alternative pour la boucle foreach -->
            <li><?= $key ?> - <?= $value ?></li>
        <?php endforeach; ?>
    </ul>
    <ul>
        <?php foreach ($fruits as $value) : ?>
            <!-- Syntaxe alternative pour la boucle foreach -->
            <li><?= $value ?></li>
        <?php endforeach; ?>
    </ul>


    <?php
    // Tableau numérique
    $user_1 = [
        "John",
        "DOE"
    ];
    ?>
    <!-- Affichage du tableau $user_1 à l'aide de la fonction print_r() -->
    <pre><?php print_r($user_1) ?></pre>


    <?php
    // Tableau associatif
    $user_2 = [
        'firstname' => "John",
        'lastname' => "DOE"
    ];
    ?>
    <!-- Affichage du tableau $user_2 à l'aide de la fonction print_r() -->
    <pre><?php print_r($user_2) ?></pre>

    <hr>
    <pre><?php print_r(array(
                "chaine de caractère",
                true,
                false,
                42,
                21.5,
                [1, 2, 3],
                (object) [
                    'firstname' => "John",
                    'lastname' => "DOE"
                ],
                new stdClass,

            )) ?></pre>

    <hr>

    <?php
    // Tableau associatif
    $user_arr = [
        'firstname' => "John",
        'lastname' => "DOE"
    ];
    ?>
    <ul>
        <!-- Accès et affichage des éléments du tableau $user_arr -->
        <li><?= $user_arr['firstname'] ?></li>
        <li><?= $user_arr['lastname'] ?></li>
    </ul>

    <?php
    // Objet
    $user_obj = (object) [
        'firstname' => "John",
        'lastname' => "DOE"
    ];
    ?>
    <ul>
        <!-- Accès et affichage des propriétés de l'objet $user_obj -->
        <li><?= $user_obj->firstname ?></li>
        <li><?= $user_obj->lastname ?></li>
    </ul>


    <hr>

    <?php
    // Tableau contenant un objet
    $myArray = [
        (object) [
            'key' => 1,
            'value' => "something"
        ]
    ];

    // Ajout d'un nouvel objet au tableau $myArray
    array_push($myArray, (object) [
        'key' => 2,
        'value' => "something"
    ]);

    // Ajout d'un nouvel objet au tableau $myArray avec une clé calculée
    array_push($myArray, (object) [
        'key' => end($myArray)->key + 1,
        'value' => "something"
    ]);


    // Appel de la fonction addToArray pour ajouter un nouvel élément au tableau $myArray
    addToArray($myArray, [
        'key' => end($myArray)->key + 1,
        'value' => "something "
    ]);

    // Fonction pour ajouter un élément au tableau
    function addToArray(array &$haystack, array $value)
    {
        $haystack[] = (object) $value;
    }

    ?>

    <!-- Affichage du contenu du tableau $myArray à l'aide de la fonction print_r() -->
    <pre><?php print_r($myArray) ?></pre>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

</body>

</html>