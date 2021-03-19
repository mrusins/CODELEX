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
        <th>Availability</th>
        <th>Rent</th>
        <th>Return</th>
    </tr>

    <?PHP

    use App\view\ViewFunctions;

    foreach ($run->dbService() as $key => $value) {
        $colour = new ViewFunctions();
        $statusColour = $colour->avaibilityColour($value->status);
        $buttonDisable = $colour->disabledButton($value->status);
        echo "
    <tr>
        <td>$value->model</td>
        <td>$value->price</td>
        <td>$value->odometer</td>
        <td>$value->fuel</td>
        <td><p style='color:$statusColour' >$value->status</p>
        </td>
        <td><form  method='post'> <input type='submit' $buttonDisable name=$value->id value='RENT'></form></td>
        <td><form  method='post'> <input type='submit' $buttonDisable name=$value->id value='RETURN'></form></td>
    </tr>
    ";
    }
    ?>

    <style>
        p {
            margin-top: 0em;
            margin-bottom: 0em;
            text-indent: 30px;
            text-transform: uppercase;
        }

        table {
            font-family: monospace, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        h1 {
            font-family: arial, sans-serif;
            color: green;
        }

        td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        th {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
            background: darkgray;
        }

        tr:nth-child(even) {
            background-color: lightgrey;
        }
    </style>
</body>
</html>
