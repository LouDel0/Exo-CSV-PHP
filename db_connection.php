<?php

// Chemin du fichier CSV
$file = 'afpa.csv';

// Ouvre le fichier CSV en lecture
$file = fopen($file, 'r');

// Initialise un tableau pour stocker les données
$data = array();

// Boucle sur chaque ligne du fichier
while (($line = fgetcsv($file)) !== FALSE) {
    // Ajoute chaque ligne à notre tableau de données
    $data[] = $line;
}

// Ferme le fichier
fclose($file);



// foreach ($data as list($nom, $prenom, $age, $formation)) {
//     echo "<tr><td>" . $nom .   "</td>
//     <td>" . $prenom . "</td>
//     <td>" . $age . "</td>
//     <td>" . $formation . "</td></tr>";
// }
