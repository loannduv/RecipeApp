<?php
include 'templates/header.php';
include 'app/functions.php';
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>

    <?php
    global $pdo;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        $ingredients = implode(",", array_map('trim', $_POST['ingredients']));
        $steps = implode(",", array_map('trim', $_POST['steps']));

        $sql = "INSERT INTO recipes (name, description, ingredients, steps) VALUES (:name, :description, :ingredients, :steps)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'description' => $description, 'ingredients' => $ingredients, 'steps' => $steps]);

        header("Location: index.php");
    }
    ?>
    <div id="create_recipe_form">
        <h1 class="name">Création de Recette :</h1>
        <form method="post">
            <div class="form_container">
                <label for="name">Titre:</label>
                <input type="text" id="name" name="name">

                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="2"></textarea>

                <label for="ingredients">Ingrédients:</label>
                <p>Pour séparer chaque ingrédients, utilisez un point-virgule.</p>
                <textarea id="ingredients" name="ingredients[]" rows="6"></textarea>

                <label for="steps">Étapes:</label>
                <p>Pour séparer chaque étapes, utilisez un point-virgule.</p>
                <textarea id="steps" name="steps[]" rows="6"></textarea>

                <input class="submit_button" type="submit" value="Submit">
            </div>
        </form>
    </div>

    <?php
    include 'templates/footer.php';
    ?>

</body>

</html>