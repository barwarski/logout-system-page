<!-- /*checked die Verbindung zur Datenbank ab */-->

<?php 
//echo "hallo"//phpversion()

$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='credentials';

$con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

if($con){
    echo"Connection successfully";
}else{
    echo"etwas ist schief geluafen";
    die('Could not connect: '. mysqli_error($con));
}
/**/


?>

