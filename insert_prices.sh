#!/usr/bin/php

<?php
error_reporting(E_ALL & ~E_NOTICE);

$datum = date('d-m-Y');
$dsn = "mysql:host=localhost;dbname=jeroendev_orders";
$user = "jeroendev_orders";                                                                                                                                                                                                                                                                                                                                                                                                                               $passwd = "x";                                                                                                                                                                                                                                                                                                                                                                                                                             
$passwd = "hPmsEGP51BBftkWh9CyO";

try {
  $pdo = new PDO($dsn, $user, $passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

// GET
$stmt = $pdo->prepare("SELECT `naam`, `bestelling`, `restaurant`, `amount`, `datum` FROM `orders` WHERE `datum` = :datum ORDER BY `naam` DESC");
$stmt->bindParam(":datum", $datum);
$stmt->execute();

// Prepared update query
$stmt2 = $pdo->prepare("UPDATE `orders` SET `amount` = :amount WHERE `naam` = :name AND `bestelling` = :bestelling");
$amount = 0;
$name = $bestelling = "";
$stmt2->bindParam(":amount", $amount);
$stmt2->bindParam(":name", $name);
$stmt2->bindParam(":bestelling", $bestelling);


$pdo->beginTransaction();

if ($stmt->rowCount() > 0) {
	    while($row = $stmt->fetchObject()) {
		            printf("%s %s %s\nPrice: ", $row->naam, $row->restaurant, $row->bestelling);
			            $amount     = fgets(STDIN);
				    $name       = $row->naam;
				    $bestelling = $row->bestelling;
				    $stmt2->execute();
				        }
				}

				$pdo->commit();
