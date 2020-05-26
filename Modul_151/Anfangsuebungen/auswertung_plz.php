<?php
	header('Content-Type: text/html; charset=utf-8');
	require_once("db.inc.php");

	//Abschnitt BEARBEITEN
	if(isset($_POST['edit']))
	{
		if(isset($_POST['auswahl']))
			{
				$sql = "SELECT *
						FROM fi
						WHERE fi.id = " .$_POST['auswahl'];
				$abfrage = mysqli_query($verbindung, $sql);
				if( ! $abfrage)
				{
					echo "\n<p>Die SQL-Anweisung ist fehlgeschlagen: " .mysqli_error() ."</p>";
				}
				else
				{
					$zeile = mysqli_fetch_array($abfrage);
					echo "<form action='" .$_SERVER['PHP_SELF'] ."' method='POST'>\n
					<table border='1'><tr><td width='100'>ID</td>
					<td width='400'> " .$zeile['id'] ."<input type='hidden' name='id' value='" .$zeile['id'] ."'></td></tr>
					<tr><td>ID</td><td><input type='text' name='plz' value='" .$zeile['id'] ."' size='60'></td></tr>
					<tr><td>Countrycode</td><td><input type='text' name='countrycode' value='" .$zeile['countrycode'] ."' size='60'></td></tr>
					<tr><td>Zipcode</td><td><input type='text' name='zipcode' value='" .$zeile['zipcode'] ."' size='60'></td></tr>
					<tr><td>City</td><td><input type='text' name='city' value='" .$zeile['city'] ."' size='60'></td></tr>
					<tr><td colspan='2' align='center'>
				    <input type='submit' name='edit-submit' value='Werte setzen'>
				    <input type='submit' name='abbruch' value='Aktion abbrechen'></td></tr>
					</table></form>";
				}
			}
			else
			{
				echo "<p>Bitte waehlen Sie einen Datensatz aus. Zurueck zum Formular: <a href='manipulation2_plz.php'>klicken Sie hier</a>.</p>";
			}
		}

	if(isset($_POST['edit-submit']))
	{
		$sql  = "UPDATE fi 
				 SET countrycode = '" .$_POST['countrycode'] ."', ";
		$sql .= "zipcode = '" .$_POST['zipcode'] ."', ";
		$sql .= "city = '" .$_POST['city'] ."' ";
		$sql .= "WHERE fi.id = " .$_POST['id'];
		$abfrage = mysqli_query($verbindung, $sql);
		header("Location: manipulation2_plz.php");
	}

	if(isset($_POST['abbruch']))
	{
		header("Location: manipulation2_plz.php");
	}

	if(isset($_POST['delete']))
	{
        $sql  = "DELETE 
				 FROM fi
				 WHERE fi.id = " .$_POST['auswahl'];
        $abfrage = mysqli_query($verbindung, $sql);
		header("Location: manipulation2_plz.php");
	}

	if(isset($_POST['add']))
	{
		echo "<form action='" .$_SERVER['PHP_SELF'] ."' method='POST'>\n
		<table border='1'><tr><td width='100'>ID</td>
		<td width='400'><i>wird automatisch gesetzt</i></td></tr>	
		<tr><td>Countrycode</td><td><input type='text' name='countrycode' size='60'></td></tr>	
		<tr><td>Zipcode</td><td><input type='text' name='zipcode' size='60'></td></tr>	
		<tr><td>City</td><td><input type='text' name='city' size='60'></td></tr>	
		<tr><td colspan='2' align='center'>
        <input type='submit' name='add-submit' value='Datensatz hinzufuegen'>
        <input type='submit' name='abbruch' value='Aktion abbrechen'></td></tr>
		</table></form>";
	}
		
	if(isset($_POST['add-submit']))
	{
		$sql  = "INSERT INTO fi(countrycode, zipcode, city)
        VALUES(" .$_POST['countrycode'] .", ";
		$sql .= "'" .$_POST['zipcode'] ."', ";
		$sql .= "'" .$_POST['city'] ."')";
		$abfrage = mysqli_query($verbindung, $sql);
		header("Location: manipulation2_plz.php");
	}

	if(isset($_POST['abbruch']))
	{
		header("Location: manipulation2_plz.php");
	}

	mysqli_close($verbindung);
?>