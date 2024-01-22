<?php
include 'templates/header.php';
include 'app/functions.php';

$allRecipes = getAllRecipes();

?>

<div id="recipes_list">
    <h1>Liste des Recettes :</h1>
    <ul>
        <?php
        foreach ($allRecipes as $recipe) {
            $recipeId = $recipe['id'];
            $recipeName = htmlspecialchars($recipe['name']);
            echo "<li>";
            echo "<div class='recipe_item'>";
            echo "<a class='recipe_link' href='recipe.php?id=$recipeId'>$recipeName</a>";
            echo "<a class='delete_btn' href='delete_recipe.php?id=$recipeId'>&#x2715;</a>";
            echo "</div>";
            echo "</li>";
        }
        ?>
    </ul>
</div>

<?php
include 'templates/footer.php';
?>