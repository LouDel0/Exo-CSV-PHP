<?php

$error = '';
$name = '';
$firstname = '';
$age = '';
$formation = '';

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if (isset($_POST["submit"])) {
    if (empty($_POST["name"])) {
        $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
    } else {
        $name = clean_text($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
        }
    }
    if (empty($_POST["firstname"])) {
        $error .= '<p><label class="text-danger">Please Enter your firstname</label></p>';
    } else {
        $firstname = clean_text($_POST["firstname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
        }
    }
    if (empty($_POST["age"])) {
        $error .= '<p><label class="text-danger">age is required</label></p>';
    } else {
        $age = clean_text($_POST["age"]);
    }
    if (empty($_POST["formation"])) {
        $error .= '<p><label class="text-danger">formation is required</label></p>';
    } else {
        $formation = clean_text($_POST["formation"]);
    }

    if ($error == '') {
        $file_open = fopen("afpa.csv", "a");
        $no_rows = count(file("afpa.csv"));
        $form_data = array(
            'name'  => $name,
            'firstname'  => $firstname,
            'age' => $age,
            'formation' => $formation
        );
        fputcsv($file_open, $form_data);
        $error = '<label class="text-success">Thank you for contacting us</label>';
        $name = '';
        $firstname = '';
        $age = '';
        $formation = '';
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Ecriture fichier csv</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <br />
    <div class="container">
        <h2 align="center">Ajouter un étudiant à l'AFPA</h2>
        <br />
        <div class="col-md-6" style="margin:0 auto; float:none;">
            <form method="post">
                <?php echo $error; ?>
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" />
                </div>
                <div class="form-group">
                    <label>Prénopm</label>
                    <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>" />
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="text" name="age" class="form-control" value="<?php echo $age; ?>" />
                </div>
                <div class="form-group">
                    <label>Formation</label>
                    <input type="text" name="formation" class="form-control" value="<?php echo $formation; ?>" />
                </div>
                <div class="form-group" align="center">
                    <input type="submit" name="submit" class="btn btn-info" value="Envoyer" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>