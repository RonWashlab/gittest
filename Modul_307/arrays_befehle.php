<?php

// Erstellt die Arrays

$zahlen =  range(1, 9);

$grossbuchstaben =  range('A', 'Z');

$kleinbuchstaben = range('a', 'z');

$sonderzeichen = array('+' , '*', 'ç', '%', '&'); //usw.



//Verknüpft die Arrays miteinander

$ausgabe = array_merge($zahlen, $grossbuchstaben, $kleinbuchstaben, $sonderzeichen);


//Mischt die Arrays zufällig

shuffle ($ausgabe);



foreach ($ausgabe as $zeichenkette) {
    echo "$zeichenkette ";
}
?>