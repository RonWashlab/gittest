<?php
    $db = new PDO("mysql:host=localhost;dbname=bankleitzahlen", "root", "");

    $db->query("CREATE TABLE IF NOT EXISTS
                pass(id int(11) auto_increment
                    ,name varchar(50)
                    ,kennwort varchar(32)
                    ,PRIMARY KEY (id))
                    ENGINE = InnoDB");
    
    $db->beginTransaction();
    $count = $db->exec("INSERT INTO pass(name, kennwort)
                        VALUES ('Andreas', '" .md5("meinpass1") ."')");
    $fehlercode = $db->errorcode();
    $count += $db->exec("INSERT INTO pass(name, kennwort)
                        VALUES ('Paul', '" .md5("meinpass2") ."')");
    $fehlercode += $db->errorcode();
    $count += $db->exec("INSERT INTO pass(name, kennwort)
                        VALUES ('Corinna', '" .md5("meinpass3") ."')");
    $fehlercode += $db->errorcode();
    $count += $db->exec("INSERT INTO pass(name, kennwort)
                        VALUES ('George', '" .md5("meinpass4") ."')");
    $fehlercode += $db->errorcode();
    $count += $db->exec("INSERT INTO pass(name, kennwort)
                        VALUES ('Lisa', '" .md5("meinpass5") ."')");
    $fehlercode += $db->errorcode();
    if($fehlercode === 0)
    {
        $db->commit();
        echo "<p>$count Datensätze wurden eingetragen.</p>";
    }
    else
    {
        $db->rollback();
    }

    $db = NULL;
?>