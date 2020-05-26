<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
                <title>Projektverwaltung</title>
                <link rel="stylesheet" type="text/css" href="startdesign.css">
	</head>
	<body>
                <div class="flex-container">
                        <div class="main">
                                
                                <h1><u>Projektverwaltung</u></h1>
                                <h2>Login</h2>
                                
                                <?php
                                    include("db.inc.firma.php");

                                    session_start();

                                    if(isset($_POST["login"]))
                                    {
                                        $sql = "SELECT  *
                                        FROM    login
                                        WHERE   (benutzername LIKE '" . $_POST["name"] . "') AND (passwort = '" . md5($_POST["pwd"]) . "')";
                                        $result = mysqli_query($verbindung, $sql);

                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            $data = mysqli_fetch_array($result);

                                            $_SESSION["uname"] = $data["benutzername"];
                                            $_SESSION["utype"] = $data["usertype"];

                                            header("Location: projektverwaltung.php");
                                        }

                                        else
                                        {
                                            echo "Die Zugangsdaten waren falsch bitte versuchen Sie es erneut.";
                                        }  
                                    }
                                ?>

                                <form action="login.php" method="post">
                                    <label for="name">Username:</label>
                                    <input type="text" class="input" name="name" size="20"><br><br>
                                    <label for="name">Passwort:</label>
                                    <input type="password" class="input" name="pwd" size="20"><br><br>
                                    <input type="submit" name="login" class="button button1" value="Login">
                                </form>
                        </div>
                </div>
	</body>
</html>  