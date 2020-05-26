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
        <title>Filmdaten ändern</title>
    </head>
        <body>
            <h1>Filme</h1>

                <?php
                    
                    echo "<b>Filmdaten anpassen:</b><br><br>";

                    if(isset($_POST["mov"]))
                    {
                        require_once("dbconlaki.php");
                        $id = $_POST["mov"];

                        $sql = "SELECT   *
                                FROM     film
                                WHERE    id = $id";

                        $abfrage = mysqli_query($verbindung, $sql);

                        $mov = mysqli_fetch_array($abfrage);
                        $id = $mov["id"];
                        $titel = $mov["titel"];
                        $vid = $mov["verleiher_id"];
                            

                        echo   "<form action='alterfilm.php' method='POST'>

                                <label for='id'>Film-ID:</label>
                                <input type='number' name='id' id='id' value=" . $id . " readonly='readonly'><br><br>

                                <label for='titel'>Titel:</label>
                                <input type='text' name='titel' id='titel' value=" . $titel . "><br><br>

                                <label for='vid'>Verleiher:</label>
                                <input type='number' name='vid' id='vid' value=" . $vid . "><br><br>

                                <br>

                                <input class='buttons' type='submit' name='best' value='best&auml;tigen'>
                                <input class='buttonr' type='reset' name='zur&uuml;cksetzen' value='zur&uuml;cksetzen'><br>
                                </form>";
                    }

                    if(isset($_POST["best"]))
                    {
                        require_once("dbconlaki.php");

                        $id = $_POST["id"];
                        $titel = $_POST["titel"];
                        $vid = $_POST["vid"];

                        $update = "UPDATE  film
                                   SET     titel = '$titel'
                                          ,verleiher_id = '$vid'
                                          
                                   WHERE   id = $id";
                        $abfrage = mysqli_query($verbindung, $update);
                    
                        echo "Der Datensatz mit der Film-Nr. " . $id . " wurde angepasst.<br><br>";
                    }

                    if(!isset($_POST["mov"]) && !isset($_POST["best"]))
                    {
                        echo "Es wurde kein Datensatz zur Bearbeitung ausgewählt.<br><br>";
                    }
                ?>

                <a href='filme.php'><button>zur&uuml;ck</button></a>
    </body>
</html>