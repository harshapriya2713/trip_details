<?php

$host = 'localhost';
$port = '5432'; 
$user = 'postgres';
$password = 'Chandaka@2627';
$dbname = 'tripform';

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"."<br>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchCriteria = $_POST["searchCriteria"];
    
    $query = "SELECT * FROM trip_details WHERE full_name ILIKE :name";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $searchCriteria, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    if (isset($result) && count($result) > 0) {
        foreach ($result as $row) {
        echo "<p>Full Name: " . $row['full_name'] . "</p>";
        echo "<p>Phone Number: " . $row['phone_number'] . "</p>";
        echo "<p>Email: " . $row['email'] . "</p>";
        echo "<p>Destination: " . $row['destination'] . "</p>";
        echo "<p>Mode Of Travel: ". $row['mode_of_travel'] . "</p>";
        echo "<p>Count Of Travel: " . $row['count_of_people'] . "</p>";
        echo "<p>Start Date: " . $row['startdate'] . "</p>";
        echo "<p>End Date: " . $row['end_date'] . "</p>";
        echo "<p>Purpose Of Trip: " . $row['purpose_of_trip'] . "</p>";
        echo "<p>Mention Other Facilities: " . $row['mention_other_facilities'] . "</p>";
        echo "<hr>"; 
    }
} else {
    echo "No results";
}


$conn = null;
?>



