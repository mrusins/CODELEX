<!DOCTYPE html>
<html>
<body>
<h1>CAR RENTAL</h1>
<br>
<table>
    <tr>
        <th>Model</th>
        <th>Price</th>
        <th>Mileage</th>
        <th>Fuel</th>
        <th>Status</th>
        <th>Rent</th>
        <th>Return</th>
    </tr>

    <?PHP

    foreach ($run->dbService() as $key => $value) {
        echo "
    <tr>
        <td>$value->model</td>
        <td>$value->price</td>
        <td>$value->odometer</td>
        <td>$value->fuel</td>
        <td>$value->status</td>
        <td><form  method='post'> <input type='submit' name=$value->id value='RENT'></form></td>
        <td><form  method='post'> <input type='submit' name=$value->id value='RETURN'></form></td>
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

        h1 {
            font-family: arial, sans-serif;
            color: green;
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
