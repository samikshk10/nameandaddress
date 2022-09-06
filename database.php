<?php
$hostname='db4free.net';
$username='samik_db';
$password='samik1234';
$dbname='practisedbss';

$con=new mysqli($hostname,$username,$password,$dbname);
if(!$con)
{
    echo("connection is not established");
}

?>