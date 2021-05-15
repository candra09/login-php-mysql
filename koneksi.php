<?php
$con = mysqli_connect("localhost","root","","uts192410102009");

function query($query){
    global $con;
    $result = mysqli_query($con, $query);
    $rows =[];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
?>
