<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial;
        }

        * {
            box-sizing: border-box;
        }

        form.example input[type=text] {
            padding: 10px;
            font-size: 17px;
            border: 1px solid grey;
            float: left;
            width: 80%;
            background: #f1f1f1;
        }

        form.example button {
            float: left;
            width: 20%;
            padding: 10px;
            background: #2196F3;
            color: white;
            font-size: 17px;
            border: 1px solid grey;
            border-left: none;
            cursor: pointer;
        }

        form.example button:hover {
            background: #0b7dda;
        }

        form.example::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>
<body>

<h2>Search Person by name, surname or personal ID</h2>

<form class="example" method="post" action="/">
    <input type="text" placeholder="Search.." name="search">
    <button type="submit"><i class="fa fa-search"></i></button>
</form>
<br>

<?PHP
foreach ($run->search() as $search => $persons) {
    foreach ($persons as $person => ['name' => $name, 'surname' => $surname, 'id_number' => $id, 'description' => $description]) {
        echo " name: <b>$name</b> surname: <b>$surname</b> personal id: <b>$id</b> personal info: <b>$description</b> "  . "<br>";
    }
}
?>
<br>
<form action="/admin" method="post" target="_blank">
    To Admin page:
    <button type="submit">Add/Remove</button>

</form>

</body>
</html>