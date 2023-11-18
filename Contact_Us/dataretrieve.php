<?php
$servername = "localhost";
$username = "root";  // default username for XAMPP
$password = "";      // default password for XAMPP
$dbname = "contact_form";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM form";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Data</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa; /* Light gray background color */
            color: #333; /* Dark text color */
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            color: #555; /* Dark gray heading color */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff; /* White table background color */
            color: #333; /* Dark table text color */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle box shadow */
        }

        th, td {
            border: 1px solid #ddd; /* Light border color */
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2; /* Light gray background for header */
            color: #333; /* Dark text color for header */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* Lighter even row background color */
        }
    </style>
</head>
<body>

    <h2>Contact Us Data</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['message'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data found</td></tr>";
        }
        ?>

        </tbody>
    </table>

</body>
</html>

<?php
$conn->close();
?>
