<?php
session_start();

if( !isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}
require'koneksi.php';

//pagination
$records_per_page = 10;
$recordsData = count(query("SELECT * FROM city"));
$recordsPage = ceil($recordsData / $records_per_page);
$pageActive = (isset($_GET["page"])) ? $_GET["page"] : 1;
$firstData = ($records_per_page * $pageActive) - $records_per_page;

$db = query("SELECT * FROM city LIMIT $firstData, $records_per_page ");
// $result = mysqli_query($con,"SELECT * FROM city");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Login</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
	<nav>
		<input id="nav-toggle" type="checkbox">
		<div class="logo">To<strong>Can</strong></div>
		<ul class="links">
			<li><a href="#home">Home</a></li>
			<li><a href="logout.php">Logout</a></li>

		</ul>
	</nav>

	<div class="container">
        <h2>Daftar Mahasiswa</h2>

        <table border="1" cellpadding="10" cellspacing="0" >
            <thead>
                <tr>
                    <th>ID.</th>
                    <th>Name</th>
                    <th>CountryCode</th>
                    <th>District</th>
                    <th>Population</th>
                </tr>

            </thead>

            <tbody>
                <?php $i = 1; ?>
                <?php foreach($db as $row) :?>

                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row["Name"]; ?></td>
                    <td><?= $row["CountryCode"]; ?></td>
                    <td><?= $row["District"]; ?></td>
                    <td><?= $row["Population"]; ?></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagnation">
            <?php for($i = 1; $i <= $records_per_page; $i++) : ?>
                <?php if( $i == $pageActive) :?> 
                    <a href="?page=<?= $i; ?>" style="font-weight:bold; color:red;"><?= $i; ?></a>
                <?php else: ?>
                    <a href="?page=<?= $i; ?>"><?= $i; ?></a>

                <?php endif;?>


        <?php endfor;?>
        </div>
                
	</div>

    </body>
</html> 
