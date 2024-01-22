<?php
include 'app/functions.php';

$recipeId = $_GET['id'];

deleteRecipe($recipeId);

header("Location: recipes.php");
