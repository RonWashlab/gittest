<?php
            global $verbindung;
            $server = "localhost";
            $user = "root";
            $pass = "";
            $db = "landkino";

            //Verbindungsaufnahme MySQL-Server
            $verbindung = mysqli_connect($server, $user, $pass, $db);

            if (!$verbindung)
            {
                die("Connection failed: " . mysqli_connect_error());
            }
?>