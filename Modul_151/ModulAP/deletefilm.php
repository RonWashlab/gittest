<?php include("berechtigung.php"); ?>
<?php
    if($_SESSION["uname"] != 'admin')
    {
        header("Location: keinzutritt.php");
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Film löschen</title>
    </head>
        <body>
            <h1>Filme</h1>

                <?php

                    require_once("dbconlaki.php");

                    for($i=1; $i<=999; $i++)
                    {
                        if(isset($_POST["auswahl$i"]))
                        {
                            $delete = "DELETE
                                       FROM film
                                       WHERE id = $i";
                            $result = mysqli_query($verbindung, $delete);
                            echo "<h3>Datensatz mit der Film-ID '$i' wurde gelöscht.</h3>";
                            echo "<br><br>";
                        }
                    }
                ?>

                <a href='filme.php'><button>zur&uuml;ck</button></a>
    </body>
</html>