<!DOCTYPE html>
<html>
<body>
<h1>Flowers</h1>
<br>
<table>
    <tr>
        <th>Name</th>
        <th>Amount</th>
        <th>Price</th>
    </tr>

    Gender:
    <form method="post">
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?>
               value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?>
               value="male">Male<br>
        <input type="submit">


        <?PHP
        $discount = 0;
        if (isset($_POST["gender"]) && $_POST["gender"] == 'male') {
            $discount = 0;
        } elseif (isset($_POST["gender"]) && $_POST["gender"] == 'female') {
            $discount = 20;
        } else {
            echo "Please select your gender";
        }

        foreach ($allItems->getFromTotal() as $item => $flower) {
            $finalPrice = $flower->price * 1.8 / 100;
            $finalPriceDiscount = round($finalPrice - ($finalPrice / 100 * $discount), 2);
            echo "
    <tr>
        <td>$flower->name</td>
        <td>$flower->amount</td>
        <td>$finalPriceDiscount</td>
    </tr>
    ";
        }

        ?>

        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
</body>
</html>
