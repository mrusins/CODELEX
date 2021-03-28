<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Admin page</h1>

<form action="/admin" method="post" id="nameform">

    <label for="id">Enter persons id number:</label>
    <input type="text" id="id" name="id">
</form>


<button type="submit" form="nameform" value="Submit">Submit</button>
<br><br><br>

<?PHP
$description = '';
$id = 0;
foreach ($run->search() as $search => $persons) {
    foreach ($persons as $person=>['name'=>$name, 'surname' => $surname,'id_number'=>$id, 'description'=>$description ]) {
        echo " name: <b>$name</b> surname: <b>$surname</b> personal id: <b>$id</b> personal info: <b>$description</b> "  . "<br>";
    }
}

?>
<br>
<form action="/admin" method="post" id="usrform">

<textarea rows="4" cols="50" name="newDescription" ><?PHP
 echo $description;
?>

</textarea>
    <input type="hidden"  name="id" value="<?PHP echo $id?>">
    <br><br>
    <input type="submit">
</form>
<h2>Add new person</h2>

<form action="/admin" method="post">
    <input type="hidden"  name="newUser" value="newUser">
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname" required><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname" required><br>
    <label for="lname">Personal ID: (xxxx or xx-xx)</label><br>
    <input type="text" id="lname" name="id" required><br>
    <?PHP
    if($run->addNewPerson() == true){
        echo "<p style='color:red'>Wrong ID number</p><br>";
    }
    ?>

    <label for="lname">Description:</label><br>
    <input type="text" id="lname" name="description" ><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>