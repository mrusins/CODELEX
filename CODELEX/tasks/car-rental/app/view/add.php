<!DOCTYPE html>

<html>
<body>

<h1>Add car</h1>

<form action="/add" method="post" target="">

    <label for="lname">Model:</label>
    <input type="text" id="lname" name="model"><br><br>
    <label for="fname">Odometer:</label>
    <input type="number" id="fname" name="odometer"><br><br>

    <label for="lname">Fuel:</label>

    <select id="cars" name="fuel">
        <option value="petrol">Petrol</option>
        <option value="diesel">Diesel</option>
        <option value="electricity">Electricity</option>
        <option value="hybrid">Hybrid</option>
    </select><br><br>

    <label for="fname">Price:</label>
    <input type="text" id="fname" name="price"><br><br>
    <label for="lname">Status:</label>

    <select id="cars" name="status">
        <option value="yes">Avail</option>
        <option value="no">Not avail</option>
        <option value="in service">in service</option>

    </select><br><br>

    <input type="submit" value="Submit">
</form>

<p>Click on the submit button.</p><br>
<h1>Remove car</h1>


<form action="/add" method="post" target="">



    <select id="cars" name="delete">

        <?PHP
        foreach ($add->allCars() as $item=>$value) {
            $name = $value->model;
            $id = $value->id;
            echo "<option value=$id>$name</option> ";
        }
        ?>


    </select><br><br>

    <input type="submit" value="Submit">
    <p>Click on the submit button to delete car.</p>
</form>



</body>
</html>
