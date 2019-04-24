<?php

$servername = "localhost"; // change to the right one when uploaded
$username = "root"; // change to your own, my personal local credentials
$password = "1squidward"; // change to your own, my personal local credentials
$dbName = "Book"; // from assignment requirements

try {

    $conn = new PDO( "mysql:host=$servername;dbname=$dbName", $username, $password );
    // set the PDO error mode to exception
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $connectStatus = 'success';
    $connection = 'MySQL Connection Established';
    
    $sql = "CREATE TABLE IF NOT EXISTS `Book` (
        `BookID` INT AUTO_INCREMENT NOT NULL,
        `BookTitle` varchar(200) NOT NULL,
        `BookFirstAuthor` varchar(200) NOT NULL,
        `BookYear` int(4) NOT NULL,
        PRIMARY KEY (`BookID`)
    ) CHARACTER SET utf8 COLLATE utf8_general_ci";

    if( $conn->exec( $sql ) !== false ){

        $connection .= ' & Table Created';
    } else {

        $connection .= ' & Table Not Created';
    }
} catch( PDOException $e ) {

    $connectStatus = 'failed';
    $connection = 'MySQL Connection Failed';
}

?>

<div class="connection-wrap">

    <h3>Connection Status</h3>
    <p class="<?= $connectStatus; ?>"><?= $connection; ?></p>
</div>