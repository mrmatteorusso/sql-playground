<?php

$_POST["asd"];

//require_once('index.php');
function deleteData($host, $db, $pass, $user, $table, $id)
{

    $pdoNewDB = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
    $pdoNewDB->exec(
        "DELETE FROM $table WHERE id = $id;"
    );
}


foreach ($users as $user) : ?>
    <form method="post">
        <p><?= $user['id'] ?></p>
        <button type="submit" name="delete" value=<?= $user['id'] ?>>Delete</button>
        <a href="/delete/$user['id']">Delete link</a>

    </form>

<?php endforeach; ?>