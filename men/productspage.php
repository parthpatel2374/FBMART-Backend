<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "fbmart";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted and the variable is set
if (isset($_POST['category']) && isset($_POST['subcategory'])) {
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
} else {
    echo "No category and subcategory selected.";
}
// Ensure category and subcategory are set
if (empty($category) || empty($subcategory)) {
    echo "<p class='text-gray-500 text-center col-span-full'>Category and Subcategory are required!</p>";
    exit;
}

// Prepare SQL query
$stmt = $conn->prepare(
    "SELECT p.id, p.name, 
            p.description, 
            p.price, 
            sc.name AS subcategory_name, 
            c.name AS category_name,
            pi.image_id,
            pi.image_data
     FROM products p
     INNER JOIN subcategories sc ON p.subcategory_id = sc.id
     INNER JOIN categories c ON sc.category_id = c.id
     LEFT JOIN product_images pi ON p.id = pi.product_id
     WHERE c.name = ? AND sc.name = ?"
);

// Bind parameters
$stmt->bind_param("ss", $category, $subcategory);

// Execute and fetch results
if ($stmt->execute()) {
    $result = $stmt->get_result();
} else {
    die("SQL query execution failed: " . $stmt->error);
}

// Fetch products
$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Product Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans min-h-screen flex flex-col items-center">

    <!-- Header -->
    <div class="w-full flex justify-between px-8 py-4 bg-white shadow-md">
        <h1 class="text-2xl font-bold text-gray-800">Dynamic Products</h1>
    </div>

    <!-- Product Cards Grid -->
    <div id="products-container" class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 sm:gap-8 md:gap-10 lg:gap-12 mt-10 mb-8 w-full max-w-screen-2xl px-4 lg:px-8 xl:px-12">
        <?php
        // Check if products were found
        if (!empty($products)) {
            foreach ($products as $product) {
                // Base64 encode image data for inline display
                $image = !empty($product['image_data']) ? 'data:image/jpeg;base64,' . base64_encode($product['image_data']) : 'https://via.placeholder.com/150'; // Can Add Fallback to a placeholder image
                
                echo "<div class='card bg-white rounded-lg shadow-lg overflow-hidden transition transform hover:scale-105 w-full max-w-xs'>";
                // Display the image or image_id if image is not available
                if ($image) {
                    echo "<img class='w-full h-48 object-cover' src='{$image}' alt='{$product['name']}'>";
                } else {
                    echo "<div class='text-center text-gray-500 mt-4'>{$product['image_id']}</div>";
                }
                echo "<div class='p-4'>";
                echo "<h3 class='text-lg font-bold text-gray-700 mt-4 text-center'>{$product['name']}</h3>";
                echo "<div class='text-lg font-bold text-gray-800 mt-2 text-center'>₹ {$product['price']}</div>";

                // Form to submit the product details as a POST request
                echo "<div class='flex justify-center mt-4'>";  // Added a flex container to center the button
                echo "<form action='product-detail.html' method='POST'>";
                echo "<input type='hidden' name='category' value='{$category}'>";
                echo "<input type='hidden' name='subcategory' value='{$subcategory}'>";
                echo "<input type='hidden' name='product_id' value='{$product['id']}'>";
                echo "<button type='submit' class='bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition text-center'>View Details</button>";
                echo "</form>";
                echo "</div>"; // Close the flex container

                echo "<div class='product-description hidden mt-4 text-sm text-gray-600 text-center'>{$product['description']}</div>";
                echo "</div>";
                echo "</div>";

            }
        } else {
            echo "<p class='text-gray-500 text-center col-span-full'>No products found for the selected category and subcategory.</p>";
        }
        ?>
    </div>
</body>

</html>
