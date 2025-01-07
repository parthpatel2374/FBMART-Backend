<?php
// Database connection
$host = "localhost"; // Replace with your database host
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "your_database_name"; // Replace with your database name

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read category and subcategory from URL parameters
$category = isset($_GET['category']) ? $_GET['category'] : '';
$subcategory = isset($_GET['subcategory']) ? $_GET['subcategory'] : '';
// Validate and prepare SQL query
if (!empty($category) && !empty($subcategory)) {
    $stmt = $conn->prepare(
        "SELECT p.id, p.name, p.description, p.price, sc.name AS subcategory_name, c.name AS category_name
         FROM products p
         INNER JOIN subcategories sc ON p.subcategory_id = sc.id
         INNER JOIN categories c ON sc.category_id = c.id
         WHERE c.name = ? AND sc.name = ?"
    );

    // Bind parameters
    $stmt->bind_param("ss", $category, $subcategory);

    // Execute and fetch results
    $stmt->execute();
    $result = $stmt->get_result();

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($products);
} else {
    // Return an error if category or subcategory is missing
    header('Content-Type: application/json', true, 400);
    echo json_encode(["error" => "Category and subcategory are required."]);
}
?>