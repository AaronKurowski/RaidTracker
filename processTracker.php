<?php

    echo PopulateRaids();

    function PopulateRaids() {
        include("db.php");

        $query = "SELECT * FROM Raids";
    
        $stmt = $db->prepare($query);
    
        if($stmt->execute()) {
            // $returnArray = array();
            // fetch(PDO::FETCH_BOTH) to access the index
    
            // while($result = $stmt->fetch(PDO::FETCH_BOTH)) {
            while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $returnArray['raids'][] = $result;
                $returnArray['headers'] = array_keys($result);


                // $returnArray[] = array(
                //     "id" => $result["ID"],
                //     "name" => $result['Name'],
                //     "guild" => $result['Guild'],
                //     "date" => $result['Completed On'],
                //     "wipes" => $result['Wipes'],
                //     "time" => $result['Clear Time']
                // );
            }

            // print_r($returnArray);
            return json_encode($returnArray);
        }
        else {
            return json_encode(array("error" => "Unable to lock this query into execution. Try again pl0x"));
        }
    }

