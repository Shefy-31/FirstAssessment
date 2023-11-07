<?php
require_once 'dbConnection.php';

class ViewFAQ extends Database {
    public function displayFAQ() {
        $sql = "SELECT * FROM ceymox_faq";
        $result = $this->connection->query($sql);
        echo"<h1>FAQ</h1>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Question: " . $row["question"] . " <br> Answer: " . $row["answer"] . "<br><br>";
            }
        } else {
            echo "No FAQ found.";
        }
    }
}

$viewFAQ = new ViewFAQ();
$viewFAQ->displayFAQ();
?>
