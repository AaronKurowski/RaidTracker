<?php

    try {
        $hostname = "localhost";
        $port = 3306;
        $dbname = "RaidTracker";
        $username = "raidtracker";
        $pw = "raidtracker";
        $db = new PDO ("mysql:host=$hostname:$port;dbname=$dbname", "$username", "$pw");
    }
    catch (PDOException $error) {
        echo "Failed to get DB handle: " . $error->getMessage() . "<br>";
        exit;
    }