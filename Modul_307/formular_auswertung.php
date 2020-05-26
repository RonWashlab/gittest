<?php
    echo "<p>Folgende Daten wurden übermittelt:</p>";
    echo "<p>Vorname: " . $_POST["Vorname"] . "<br>";
    echo "<p>Nachname: " . $_POST["Nachname"] . "<br>";
    echo "<p>Wohnort: " . $_POST["Ort"] . "</p>";

    echo "_____________________________________________";

    echo "<pre>";
    print_r ($_POST);
    var_dump ($_POST);
    echo "</pre>";
?>

