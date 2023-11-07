<?php
session_start(); 
$username=$_SESSION["username"];
$password=$_SESSION["password"]; 
if ( $username == 'admin' && $password =='admin123' ){
    
    require_once 'dbConnection.php';

    class FAQ extends Database {
        public function insert($question, $answer) {
            $stmt = $this->connection->prepare("INSERT INTO ceymox_faq (question, answer) VALUES (?, ?)");
            $stmt->bind_param("ss", $question, $answer);
            $stmt->execute();
            $stmt->close();
        }
    }

    $faq = new FAQ();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $question = $_POST['question'];
        $answer = $_POST['answer'];

        if (!empty($question) && !empty($answer)) {
            $faq->insert($question, $answer);
            echo "Form submitted successfully!";
        } else {
            echo "Both fields are required!";
        }
    }
} else {
    alert('please login');
}
?>
