<?php

	$anzahl =  5;
	$start = 1;
	
	echo "<table width='100%' border='1px'>
	<tr bgcolor=#F7BE81><th></th><th>A</th><th>B</th><th>C</th><th>D</th><th>E</th><th>F</th><th>G</th></tr>" ; //Header wird generiert
		
	/* Datensätze aus Ergebnis ermitteln */
	/* in Array speichern und ausgeben */
	while ($start <= $anzahl)
	{
		echo "<tr><td align=center bgcolor=#819FF7>" . $start . "</td><td align=center>"
						. "L" . $start . "</td><td align=center>"
						. "M" . $start . "</td><td align=center>"
						. "N" . $start . "</td><td align=center>"
						. "O" . $start . "</td><td align=center>"
						. "P" . $start . "</td><td align=center>"
						. "Q" . $start . "</td><td align=center>"
						. "X" . $start . "</td><tr align=center>";
		$start++;
	}
	echo "</table>";
?>
	