<?php
$host = "localhost"; 
$port = "5432";
$dbname = "tripform";
$user = "postgres";
$password = "Chandaka@2627";

try { 
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $Full_Name = $_POST["Full_Name"];
    $Phone_Number = $_POST["Phone_Number"];
    $Email = $_POST["Email"];
    $Destination = $_POST["Destination"];
    $Mode_Of_Travel = $_POST["Mode_Of_Travel"];
    $Count_Of_People = $_POST["Count_Of_People"];
    $StartDate = $_POST["StartDate"];
    $End_Date = $_POST["End_Date"];
    $Purpose_Of_Trip = $_POST["Purpose_Of_Trip"];
    $Mention_Other_Facilities = $_POST["Mention_Other_Facilities"];
      
    $sql = "INSERT INTO trip_details (Full_Name, Phone_Number, Email, Destination, Mode_Of_Travel,Count_Of_People,StartDate, End_Date, Purpose_Of_Trip,Mention_Other_Facilities)
            VALUES ('$Full_Name', '$Phone_Number', '$Email', '$Destination', '$Mode_Of_Travel', $Count_Of_People, '$StartDate', '$End_Date', '$Purpose_Of_Trip', '$Mention_Other_Facilities')";


   $conn->exec($sql); {
        echo "Record submitted successfully";
    }

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>




