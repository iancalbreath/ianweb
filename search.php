<?php
// Database connection
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = ""; // default XAMPP password
$dbname = "world_build";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch search query from the form
$search = isset($_POST['search']) ? $_POST['search'] : '';

// SQL query to search the characters table
$sql = "SELECT * FROM characters WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR species LIKE '%$search%' OR hometown LIKE '%$search%' OR height LIKE '%$search%' OR weight LIKE '%$search%' OR eye_color LIKE '%$search%' OR hair_color LIKE '%$search%' OR build LIKE '%$search%' OR positive_traits LIKE '%$search%' OR negative_traits LIKE '%$search%' OR motivations LIKE '%$search%' OR fears LIKE '%$search%' OR family_members LIKE '%$search%' OR education LIKE '%$search%' OR physical_perks LIKE '%$search%' OR magical_perks LIKE '%$search%' OR social_perks LIKE '%$search%' OR languages LIKE '%$search%' OR primary_weapon LIKE '%$search%' OR primary_armor LIKE '%$search%' OR unique_items LIKE '%$search%' OR social_status LIKE '%$search%' OR affiliations LIKE '%$search%' OR enemies LIKE '%$search%' OR backstory LIKE '%$search%'";

$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    die("Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Character Search</title>
</head>
<body>
    <h1>Search Characters</h1>
    <form method="post" action="search.php">
        <input type="text" name="search" placeholder="Search for characters">
        <input type="submit" value="Search">
    </form>

    <?php
    if ($search) {
        if ($result->num_rows > 0) {
            echo "<h2>Search Results:</h2>";
            echo "<table border='1'><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Species</th><th>Hometown</th><th>Height</th><th>Weight</th><th>Eye Color</th><th>Hair Color</th><th>Build</th><th>Positive Traits</th><th>Negative Traits</th><th>Motivations</th><th>Fears</th><th>Family Members</th><th>Education</th><th>Physical Perks</th><th>Magical Perks</th><th>Social Perks</th><th>Languages</th><th>Primary Weapon</th><th>Primary Armor</th><th>Unique Items</th><th>Social Status</th><th>Affiliations</th><th>Enemies</th></tr>";
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["species"]. "</td><td>" . $row["hometown"]. "</td><td>" . $row["height"]. "</td><td>" . $row["weight"]. "</td><td>" . $row["eye_color"]. "</td><td>" . $row["hair_color"]. "</td><td>" . $row["build"]. "</td><td>" . $row["positive_traits"]. "</td><td>" . $row["negative_traits"]. "</td><td>" . $row["motivations"]. "</td><td>" . $row["fears"]. "</td><td>" . $row["family_members"]. "</td><td>" . $row["education"]. "</td><td>" . $row["physical_perks"]. "</td><td>" . $row["magical_perks"]. "</td><td>" . $row["social_perks"]. "</td><td>" . $row["languages"]. "</td><td>" . $row["primary_weapon"]. "</td><td>" . $row["primary_armor"]. "</td><td>" . $row["unique_items"]. "</td><td>" . $row["social_status"]. "</td><td>" . $row["affiliations"]. "</td><td>" . $row["enemies"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }
    ?>

    <?php $conn->close(); ?>
</body>
</html>
