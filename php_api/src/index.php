<?php

// Database connection settings
require_once 'config.php';

$table_name = "users";

$query = "SELECT * FROM $table_name";

echo "<br/><strong>$table_name: </strong><br/>";
try {
  // Prepare the query
  $statement = $pdo->prepare($query);

  // Execute the query
  $statement->execute();

  // Fetch all rows from the result set
  $users = $statement->fetchAll(PDO::FETCH_ASSOC);

  // Output or process the fetched data
  print_r($users);
} catch (PDOException $e) {
  die("Error executing query: " . $e->getMessage());
}

echo "<br/><br/><strong>Modifying user balance in cents: </strong><br/>";
// Database connection settings
$host = 'mysql-db';
$dbname = 'test_database';
$username = 'db_user';
$password = 'password';

$conn = new mysqli($host, $username, $password, $dbname);

function modifyUserBalance($conn, $userid, $amount) {
  // Validate inputs
  if (!is_numeric($userid) || !is_numeric($amount)) {
      return false;
  }
  
  // Fetch current balance
  $sql = "SELECT balance FROM users WHERE id = $userid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $currentBalance = $row["balance"];
      $newBalance = $currentBalance + $amount;
      
      // Update balance
      $sql = "UPDATE users SET balance = $newBalance WHERE id = $userid";
      if ($conn->query($sql) === TRUE) {
          return true;
      } else {
          return false;
      }
  } else {
      return false;
  }
}

// Function to insert or update a message
function insertOrUpdateMessage($conn, $date, $title, $msg, $status) {
  // Validate inputs
  if (empty($date) || empty($title) || empty($msg) || empty($status)) {
      return false;
  }
  
  // Check if message exists
  $sql = "SELECT id FROM messages WHERE title = '$title'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
      // Update existing message
      $sql = "UPDATE messages SET date = '$date', msg = '$msg', status = '$status', last_update_date = NOW() WHERE title = '$title'";
  } else {
      // Insert new message
      $sql = "INSERT INTO messages (date, title, msg, status, last_update_date) VALUES ('$date', '$title', '$msg', '$status', NOW())";
  }

  if ($conn->query($sql) === TRUE) {
      return true;
  } else {
      return false;
  }
}

// Example usage:
$userid = 1;
$amount = 20; 
if (modifyUserBalance($conn, $userid, $amount)) {
    echo "User balance modified successfully.";
} else {
    echo "Failed to modify user balance.";
}

$date = date("Y-m-d H:i:s");
$title = "Test Message";
$msg = "This is a test message.";
$status = "pending";
if (insertOrUpdateMessage($conn, $date, $title, $msg, $status)) {
    echo "Message: inserted/updated successfully.";
} else {
    echo "Failed to insert/update message.";
}

// Close connection
$conn->close();
echo "<br/><br/><strong>New balance available for $table_name: </strong><br/>";
try {
  // Prepare the query
  $statement = $pdo->prepare($query);

  // Execute the query
  $statement->execute();

  // Fetch all rows from the result set
  $users = $statement->fetchAll(PDO::FETCH_ASSOC);

  // Output or process the fetched data
  print_r($users);
} catch (PDOException $e) {
  die("Error executing query: " . $e->getMessage());
}
?>
