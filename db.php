<?php

    try {
        $hostname;
        $port;
        $dbname;
        $username;
        $pw;
        $db;
    }
    catch (PDOException $error) {
        echo "Failed to get DB handle: " . $error->getMessage() . "<br>";
        exit;
    }