<?php

/*
SQL class
- Functions to run through commands are here.
*/

class SQL {
    private $query, $params; // Sent query

    // Get and set sent values.
    public function __construct($sentQuery, $sentParams = []) {
        $this->query = $sentQuery;
        $this->params = $sentParams;
    }

    // Executes the query.
    public function Execute($returnResult = false, $forceRows = false, $returnID = false) {
        global $Conn, $query, $params;

        try { // Prepare and execute the statement.
            $stmt = $Conn->prepare($this->query);

            // Bind params
            foreach ($this->params as $key => &$val)
                $stmt->bindParam($key + 1, $val);
            
            $response = $stmt->execute(); // Execute!

            if ($returnID) // Only want the returned ID?
                $returnID = $Conn->lastInsertId();

            // Only want the response?
            if ($returnResult)
                return $response;

            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC); // Return all rows

            if ($returnID) // Get if above actually worked.
                return $returnID;
            
            // If result length only 1, print only that row.
            if (!$forceRows && count($result) == 1) 
                return $result[0];
            else return $result;

        } catch (PDOException $e) { // Catch errors
            echo "Something went wrong :/";
        }
    }
}