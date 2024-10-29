<?
$hostname = 'localhost';
$dbname = 'demo';
$password = '';
$username = 'root';

try{
    $connect = new PDO("mysql:host=$hostname;charset=utf8;dbname=$dbname",$username,$password);
}catch(PDOException $e){
    echo $e;
}
?>