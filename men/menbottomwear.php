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

// Fetch products for Men's Bottomwear from database
$sql = "SELECT p.id, p.name, p.description, p.price, sc.name as subcategory_name, c.name as category_name
        FROM products p
        INNER JOIN subcategories sc ON p.subcategory_id = sc.id
        INNER JOIN categories c ON sc.category_id = c.id
        WHERE c.name = 'Men' AND sc.name = 'Bottomwear'";

$result = $conn->query($sql);

$products = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = [
            "id" => $row["id"],
            "name" => $row["name"],
            "description" => $row["description"],
            "price" => $row["price"],
        ];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men's Bottomwear</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card:hover img {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="bg-gray-100 font-sans min-h-screen flex flex-col items-center">

    <!-- Header -->
    <div class="w-full flex justify-between px-8 py-4 bg-white shadow-md">
        <h1 class="text-2xl font-bold text-gray-800">Men's Bottomwear</h1>
        <a href="cart.html" class="bg-yellow-400 px-4 py-2 rounded-md hover:bg-green-600 hover:text-white">
            View Cart
        </a>
    </div>

    <!-- Product Cards Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 sm:gap-8 md:gap-10 lg:gap-12 mt-10 mb-8 w-full max-w-screen-2xl px-4 lg:px-8 xl:px-12">
        <?php foreach ($products as $product): ?>
            <div class="card bg-white rounded-lg shadow-lg overflow-hidden transition transform hover:scale-105 w-full max-w-xs">
                <!-- Product Name -->
                <h3 class="text-lg font-bold text-gray-700 mt-4 text-center">
                    <?php echo htmlspecialchars($product['name']); ?>
                </h3>

                <!-- Product Price -->
                <div class="text-lg font-bold text-gray-800 mt-2 text-center">
                    ₹ <?php echo htmlspecialchars($product['price']); ?>
                </div>

                <!-- Product Details Button -->
                <a href="product-detail.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="bg-blue-500 text-white font-medium px-4 py-2 mt-4 rounded-md shadow-md hover:bg-blue-600 transition block text-center w-full">
                    View Details
                </a>
            </div>
        <?php endforeach; ?>

        <?php if (empty($products)): ?>
            <div class="text-center text-gray-500 w-full col-span-full">
                No products found.
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
