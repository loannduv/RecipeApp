<?php
include 'config/database.php';

/**
 * Fetch all recipes from the database.
 * @return array An array of recipes.
 */
function getAllRecipes()
{
    global $pdo;

    try {
        $sql = "SELECT id, name FROM recipes";
        $query = $pdo->prepare($sql);

        $query->execute();

        $recipes = $query->fetchAll(PDO::FETCH_ASSOC);

        return $recipes;
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}

/**
 * Fetch a specific recipe from the database.
 * @param int $id The ID of the recipe.
 * @return array The recipe data.
 */
function getRecipe($id)
{
    global $pdo;

    try {
        $sql = "SELECT * FROM recipes WHERE id = :id";
        $query = $pdo->prepare($sql);

        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $recipe = $query->fetch(PDO::FETCH_ASSOC);

        return $recipe;
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}

/**
 * Delete a specific recipe from the database.
 * @param int $id The ID of the recipe.
 */
function deleteRecipe($id)
{
    global $pdo;

    try {
        $sql = "DELETE FROM recipes WHERE id = :id";
        $query = $pdo->prepare($sql);

        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}
