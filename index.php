<?php
include "database.php";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            padding: 20px;
            background: #f1f1f1;
            font-size: 2em;
            font-family: sans-serif;
            border-radius: 15px;
            margin: 100px auto 0;
        }

        th {
            text-align: left;
            color: #4eb4ff;
            padding: 5px 15px;
        }

        td {
            padding: 5px 15px 10px;
        }

        h2 {
            text-align: center;
            font-family: sans-serif;
        }

        form {
            background: #f1f1f1;
            width: 200px;
            padding: 20px 10px 0;
            margin: 0 auto;
            border-radius: 5px;
        }

        form input {
            border-radius: 5px;
            height: 25px;
            margin-bottom: 10px;
            border: 1px solid rgba(128, 128, 128, 0.29);
        }

        input[type="submit"] {
            background: #4eb4ff;
            color: white;
            font-size: 16px;
            height: 40px;
            margin-top: 10px;
        }

        form label {
            text-transform: uppercase;
            font-family: sans-serif;
            margin-bottom: 5px;
            display: block;
        }

    </style>
</head>
<body>
<h2>Ajouter Une Ville</h2>
<form action="" method="POST">
    <label for="ville">ville</label>
    <div>
        <input type="text" name="ville">
    </div>
    <label for="max">max</label>
    <div>
        <input type="number" name="haut">
    </div>
    <label for="min">min</label>
    <div>
        <input type="number" name="bas">
    </div>
    <input type="submit" value="valider">
</form>
<table>
    <tr>
        <th>Ville</th>
        <th>Max</th>
        <th>Min</th>
        <th>Delete</th>
    </tr>
    <?php
    foreach ($donnees as $ville) {
        echo "<tr>";
        echo "<td>$ville[0]</td>";
        echo "<td>$ville[1]</td>";
        echo "<td>$ville[2]</td>";
        echo "<td>
                <form method='post'>
                    <input type='checkbox' name='delete' onChange='this.form.submit()'>
                    <input type='hidden' value='$ville[0]' name='toDelete'>
                 </form>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
