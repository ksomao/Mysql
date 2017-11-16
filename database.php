<?php
try {
    $bd = new PDO('mysql:host=localhost;dbname=weatherapp', 'root', '');
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur :' . $e->getMessage());
}

$donnees = [];

$results = $bd->query("select * from meteo");
while ($row = $results->fetch()) {
    $row[0] = utf8_encode($row[0]);
    $donnees[] = $row;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    extract($_POST);
    if (isset($ville) && isset($haut) && isset($bas)) {
        $req = $bd->prepare("INSERT INTO meteo VALUES(?,?,?)");
        $req->execute([$ville, $haut, $bas]);
    }

    if (isset($delete)) {
        $bd->exec("DELETE FROM meteo WHERE ville = '{$toDelete}'");
    }

    $donnees = [];

    $results = $bd->query("select * from meteo");
    while ($row = $results->fetch()) {
        $row[0] = utf8_encode($row[0]);
        $donnees[] = $row;
    }


}
?>