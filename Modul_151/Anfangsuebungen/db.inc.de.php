<?php
            global $verbindung1;
            $server = "localhost";
            $user = "root";
            $pass = "";
            $db = "bankleitzahlen";

            //Verbindungsaufnahme MySQL-Server
            $verbindung1 = mysqli_connect($server, $user, $pass, $db);

            if (!$verbindung1)
            {
                die("Connection failed: " . mysqli_connect_error());
            }
?>