<?php


$db = "playground1";
$table = "user";


function newObjectFromPDO()
{

    $host = 'mysqlsql';
    $user = 'root';
    $pass = 'password';
    $pdo = new PDO("mysql:host=$host;", $user, $pass);
    return $pdo;
}
//  create a connection to db
//create db
//create database sql_playgroup
//create table
//insert data
//delete data
//receive data...


function doesDBExists($host, $user, $pass, $db)
{
    try {
        newObjectFromPDO();
        echo "connection made with already created db";
        return TRUE;
    } catch (\PDOException $e) {

        return FALSE;
        //throw "test " . $e->getMessage();
        //throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}

function createDB($db)
{
    $pdoNewDB = newObjectFromPDO();

    $pdoNewDB->exec(
        "CREATE DATABASE $db;"
    );
    echo "new db created";
}


function createTable($table)
{
    $pdoNewDB = newObjectFromPDO();
    $pdoNewDB->exec(
        "CREATE TABLE $table(
            id int not null auto_increment,
            user varchar(255),
            primary key(id)

        );"

    );
}

function getData($table)
{
    $pdo = newObjectFromPDO();
    $stmt = $pdo->query(
        "SELECT * FROM $table;"
    )->fetchAll();

    return $stmt;
}

function insertData($table, $newUser)
{
    $pdoNewDB = newObjectFromPDO();

    $stmt = $pdoNewDB->prepare(
        "INSERT INTO $table (
       user) VALUES (:name);"
    );
    $stmt->execute(["name" => $newUser]);

    die();
}



function deleteData($table, $id)
{

    $pdoNewDB = newObjectFromPDO();
    $pdoNewDB->exec(
        "DELETE FROM $table WHERE id = $id;"
    );
}

function updateData($table, $id, $modifiedUser)
{

    $pdoNewDB = newObjectFromPDO();
    $pdoNewDB->exec(
        "UPDATE $table SET user = '$modifiedUser' WHERE id = $id;"
    );
}

function initFunc($host, $user, $pass, $db, $table)
{
    $DBExists = doesDBExists($host, $user, $pass, $db);
    echo $DBExists;
    $converted_function = $DBExists ? 'true' : 'false';
    echo "this is converted function" . $converted_function;
    echo "after deosExists";
    if (!$DBExists) {
        createDB($host, $user, $pass, $db);
        createTable($host, $db, $user, $pass, $table);
        echo "func createdDB initieted!";
        return;
    }
    echo "nothing happend";
}

//initFunc($host, $user, $pass, $db, $table);
//createTable($host, $db, $user, $pass, $table);
echo "test";
insertData($host, $db, $pass, $user, $table, 'test00051');
//deleteData($host, $db, $pass, $user, $table, 1);
//updateData($host, $db, $pass, $user, $table, 2, 'peppone');
// echo '<pre>';
// var_dump(getData($host, $db, $user, $pass, $table));
// echo '</pre>';

//insert
//delete
//update
//and than replace hardcoded data with real data and send a request from frontend to your backend php file
echo "post";
var_dump($_POST);
// if (isset($_POST['name'])) {
//     echo "it has been posted";
// }


if (isset($_POST['delete'])) {
    echo "it has been posted and this is delete: ";
    var_dump($_POST);
}


?>
<h1>List</h1>
<form method="post">
    <label for="name"></label>
    <input id="name" name="name" type="text" />
    <input type="submit" name="save" value="save" />

</form>




<?php
// $users = getData($host, $db, $user, $pass, $table);
// $users = getData($host, $db, $user, $pass, $table);
