<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture fichier csv</title>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- Datatable -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">


<body>
    <h1 class="text-center">Stagiaire AFPA</h1>
    <?php include "db_connection.php"; ?>



    <table id="table_id">
        <thead>
            <tr>
                <?php
                foreach ($data[0] as $value) {
                    echo "<td>" . $value . "</td>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            array_shift($data);
            foreach ($data as $key => $value) {
                echo "<tr>";
                foreach ($value as $key2 => $val) {
                    echo "<td>" . $val . "</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Datatable -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <!-- JS -->
    <script src="main.js"></script>
</body>

</html>