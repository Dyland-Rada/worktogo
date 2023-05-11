<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <title>index</title>
</head>

<body>
    <?php
    echo '
<head>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head> 
';
    $connection_obj = mysqli_connect("localhost", "root", "", "cliente");
    if (!$connection_obj) {
        echo "Error No: " . mysqli_connect_errno();
        echo "Error Description: " . mysqli_connect_error();
        exit;
    }
    // prepare the select query 
    $query = "SELECT * FROM empleados";
    // execute the select query 
    $result = mysqli_query($connection_obj, $query) or die(mysqli_error($connection_obj));

    echo '<table border="2px">';

    echo '<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
            <tr class="table-active">
                <th>ID</td>
                <th>Nombre</td>
                <th>Telefono</td>
                <th>Email</td>
                <th>Direccion</td>
            </tr>
            </thead>
            <tbody>';
            

    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
        echo "<tr>
                <td>" . $row['codigo'] . "</td>
                <td>" . $row['nombre'] . "</td>
                <td>" . $row['telefono'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['direccion'] . "</td>
                </tr>";
    }
    echo '
            </tbody>
        </table>
    </div>
</div>
</div>';


    // close the db connection 
    mysqli_close($connection_obj);
    ?>
</body>

</html>