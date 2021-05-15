<?php
$con = mysqli_connect("localhost","root","","user");

function query($query){
    $result = mysqli_query($con, $query);
    $rows =[];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
?>