<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Search persons</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="text-pink-900 bg-indigo-50">
<div class="container mx-auto bg-indigo-100 py-5 rounded-lg font-mono">
    <h2>Search Person by name, surname, age, personal ID or adress</h2><br>

    <form class="example" method="post" action="/">
        <input type="text" placeholder="Search.." name="search" class="">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>
<br>
<div class="container mx-auto bg-gray-200 py-5 rounded-lg font-mono text-sm">
    <h2>RESULTS:</h2>
    <?PHP

    if (isset($_POST['search']) && $run->getSearchResult()[0] != null) {
        foreach ($run->getSearchResult() as $search => $persons) {
            foreach ($persons as $person => ['name' => $name, 'surname' => $surname, 'id_number' => $id, 'age' => $age, 'adress' => $adress, 'description' => $description]) {
                echo " name: <b>$name</b> surname: <b>$surname</b> personal id: <b>$id</b> age: <b>$age</b> adress: <b>$adress</b> personal info: <b>$description</b> " . "<br>";
            }
        }
    } elseif (isset($_POST['search'])) {
        echo "nothing found";
    }
    ?>
</div>
<br>
<div class="container mx-auto bg-indigo-100 py-5 rounded-lg font-mono">

    <form action="/admin" method="post" target="_blank" class="font-mono text-sm">
        To Admin page:
        <button type="submit">Add/Remove</button>

    </form>
</div>
</body>
</html>