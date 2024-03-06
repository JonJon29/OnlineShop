<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "yoursql123";
$database = "AudioVision";

$conn = new mysqli($servername, $username, $password, $database);

if (isset($_SESSION["costumerID"]) && isset($_GET['prodID'])){
    $prodID = $_POST['prodID'];
    echo "This is Prod" . $prodID;
    $costumerID = $_SESSION['costumerID'];
    echo "Hier istg gurt";
    $sql = "INSERT INTO Cart (costumerID, prodID) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $costumerID, $prodID);
    $result = $stmt->execute();
    if ($result) {
        echo "Erfolg";
    }
}else{
    echo "Fehler";
}
?>