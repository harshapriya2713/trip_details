<?php
$host = "localhost";
$port = "5432";
$dbname = "tripform";
$user = "postgres";
$password = "Chandaka@2627";

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $searchCriteria = $_POST["searchCriteria"];

    $sql_main = "SELECT * FROM trip_details WHERE full_name = :name";
    $stmt_main = $conn->prepare($sql_main);
    $stmt_main->bindParam(':name', $searchCriteria, PDO::PARAM_STR);
    $stmt_main->execute();
    $mainResult = $stmt_main->fetch(PDO::FETCH_ASSOC);

    if ($mainResult) {
        echo "ID: " . $mainResult['id'] . "<br>";
        echo "Full Name: " . $mainResult['full_name'] . "<br>";
        echo "Phone Number: " . $mainResult['phone_number'] . "<br>";
        echo "Email: " . $mainResult['email'] . "<br>";
        echo "Destination: " . $mainResult['destination'] . "<br>";
        echo "Mode Of Travel: ". $mainResult['mode_of_travel'] . "<br";
        echo "Count Of Travel: " . $mainResult['count_of_people'] . "<br>";
        echo "Start Date: " . $mainResult['startdate'] . "<br>";
        echo "End Date: " . $mainResult['end_date'] . "<br>";
        echo "Purpose Of Trip: " . $mainResult['purpose_of_trip'] . "<br";
        echo "Mention Other Facilities: " . $mainResult['mention_other_facilities'] . "<br>";
        echo "<hr>"; 

        $sql_people = "SELECT * FROM trip_people WHERE full_name = :name";
        $stmt_people = $conn->prepare($sql_people);
        $stmt_people->bindParam(':name', $searchCriteria, PDO::PARAM_STR);
        $stmt_people->execute();
        $peopleResult = $stmt_people->fetchAll(PDO::FETCH_ASSOC);

        if ($peopleResult) {
            foreach ($peopleResult as $person) {
                echo "Person Name: " . $person['person_name'] . "<br>";
                echo "<hr>";
            }
        }

        $sql_purpose = "SELECT * FROM trip_purpose WHERE full_name = :name";
        $stmt_purpose = $conn->prepare($sql_purpose);
        $stmt_purpose->bindParam(':name', $searchCriteria, PDO::PARAM_STR);
        $stmt_purpose->execute();
        $purposeResult = $stmt_purpose->fetchAll(PDO::FETCH_ASSOC);

        if ($purposeResult) {
            foreach ($purposeResult as $purpose) {
                echo "Purpose Description: " . $purpose['purpose_description'] . "<br>";
                echo "<hr>";
            }
        }
    } else {
        echo "No records found for the given full_name";
    }

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>





