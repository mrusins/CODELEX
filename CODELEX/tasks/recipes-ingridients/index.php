<?php

require_once 'Recipe.php';
require_once 'RecipeCollection.php';
require_once 'Product.php';
require_once 'ProductCollection.php';

$fridge = new ProductCollection();
$fridge->addProduct(new Product('beets'));
$fridge->addProduct(new Product('AK47'));
$fridge->addProduct(new Product('love'));

$recipes = new RecipeCollection();

$recipes->setRecipeCollection(new Recipe('Rujiena salad', ['beets', 'onions', 'mayonnaise', 'love']));

$recipes->setRecipeCollection(new Recipe('Congo salad', ['childhood', 'empty stomach', 'AK47']));


$allRecipes = $recipes->getRecipeCollection();

var_dump($fridge->getProducts());


while (true) {
    echo "Choose the operation you want to perform \n";
    echo "Choose 0 for EXIT\n";
    echo "Choose 1 to add product in fridge\n";
    echo "Choose 2 to see products in fridge\n";
    echo "Choose 3 to print recipes-ingridients\n";
    echo "Choose 4 to print what you missing\n";

    $command = (int)readline();

    switch ($command) {
        case 0:
            echo "Bye!" . PHP_EOL;
            die;
        case 1:
            $newProduct = readline('Enter new product in fridge: ' . PHP_EOL);
            $fridge->addProduct(new Product($newProduct));
            break;
        case 2:
            echo PHP_EOL . 'Products in fridge: ';
            foreach ($fridge->getProducts() as $product) {
                echo $product->name . '  ';
            }
            echo PHP_EOL . PHP_EOL;
            break;
        case 3:
            echo PHP_EOL;
            foreach ($allRecipes as $recipes => $recipe) {
                echo '-' . $recipe->name . '-' . ': ' . implode(', ', $recipe->ingredients) . PHP_EOL;
            }
            echo PHP_EOL;
            break;
        case 4:
            echo PHP_EOL;
            $fridgeToArray = [];
            foreach ($fridge->getProducts() as $product) {
                array_push($fridgeToArray, $product->name);
            }
            foreach ($allRecipes as $recipes => $recipe) {

                $notForRecipe = array_diff($recipe->ingredients, $fridgeToArray);

                echo 'To make -' . $recipe->name . '- you missing: ' . implode(', ', $notForRecipe) . PHP_EOL;
            }
            echo PHP_EOL;
            break;

        default:
            echo "Sorry, I don't understand you..";
    }
}
