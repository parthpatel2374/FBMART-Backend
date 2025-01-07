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

// Get the current URL path
$url_path = $_SERVER['REQUEST_URI'];
$path_parts = explode('/', $url_path);

// Get category from URL
$category = isset($path_parts[2]) ? $path_parts[2] : '';
$subcategory = isset($_GET['subcategory']) ? $_GET['subcategory'] : '';

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
            pi.image_name,
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
                $image = !empty($product['image_data']) ? 'data:image/jpeg;base64,' . base64_encode($product['image_data']) : ''; // Can Add Fallback to a placeholder image
                
                echo "<div class='card bg-white rounded-lg shadow-lg overflow-hidden transition transform hover:scale-105 w-full max-w-xs'>";
                // Display the image or image_name if image is not available
                if ($image) {
                    echo "<img class='w-full h-48 object-cover' src='{$image}' alt='{$product['product_name']}'>";
                } else {
                    echo "<div class='text-center text-gray-500 mt-4'>{$product['image_name']}</div>";
                }
                echo "<div class='p-4'>";
                echo "<h3 class='text-lg font-bold text-gray-700 mt-4 text-center'>{$product['name']}</h3>";
                echo "<div class='text-lg font-bold text-gray-800 mt-2 text-center'>₹ {$product['price']}</div>";
                // View Details button and hidden description
                echo "<button onclick='toggleDescription(this)' class='bg-blue-500 text-white px-4 py-2 rounded-lg mt-4 hover:bg-blue-600 transition'>View Details</button>";
                echo "<div class='product-description hidden mt-4 text-sm text-gray-600 text-center'>{$product['description']}</div>";
    
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p class='text-gray-500 text-center col-span-full'>No products found for the selected category and subcategory.</p>";
        }
        ?>
    </div>
    <script>
        // Function to toggle visibility of the product description
        function toggleDescription(button) {
            // Get all visible descriptions and hide them
            const allDescriptions = document.querySelectorAll('.product-description:not(.hidden)');
            allDescriptions.forEach(description => {
                description.classList.add('hidden');
                description.previousElementSibling.textContent = 'View Details';
            });

            // Toggle the clicked product's description
            const description = button.nextElementSibling;
            if (description.classList.contains('hidden')) {
                description.classList.remove('hidden');
                button.textContent = 'Hide Details';
            } else {
                description.classList.add('hidden');
                button.textContent = 'View Details';
            }
        }
    </script>
</body>

</html>
