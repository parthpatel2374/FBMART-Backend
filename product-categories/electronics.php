<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered 2 Cards</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="images/FBMart_Final.png">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>

<body class="bg-gray-100 ">
    <header class="bg-gray-400 px-6 flex flex-wrap justify-between items-center h-36 relative">
        <!-- Logo Section -->
        <div class="flex items-center">
            <img src="1(1).png"
                class="h-28 w-56 sm:h-28 sm:w-64 md:h-32 md:w-64 lg:h-28 lg:w-56 xl:h-28 xl:w-56">
            <!-- Increased logo sizes -->
         </div>

        <!-- Search Section -->
       

        <!-- Mobile Menu Toggle (Hamburger) -->
        

        <!-- Right Section (Profile and Cart) -->
        <div class="flex space-x-5  sm:mt-0 items-center  lg:flex">


            <!-- Cart Icon -->
            <a href="cart.html">
                <div class="flex flex-col items-center">
                    <i class="fa-solid fa-cart-shopping fa-2xl"></i>
                </div>
            </a>
        </div>
    </header>

 
    
    <div class="max-w-7xl mx-auto p-6">
    <!-- Card Container -->
    <?php
        include '../db.php';

        // Check if the form was submitted and the variable is set
        if (isset($_POST['category'])) {
            $category = $_POST['category'];
        }
        // Ensure category
        if (empty($category)) {
            echo "<p class='text-gray-500 text-center col-span-full'>Category is required!</p>";
            exit;
        }

        // Fetch subcategories dynamically
        $sql = "SELECT id, category_id, name 
                FROM subcategories 
                WHERE category_id = (SELECT id FROM categories WHERE name = ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $category);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if data exists
        if ($result->num_rows > 0) {

            // Count the number of cards
            $numCards = $result->num_rows;

            // Use a responsive flexbox layout to center cards for any number
            $layoutClasses = 'flex flex-wrap justify-center gap-6';

            echo "<div class='$layoutClasses'>";

            $colors = [
                'from-indigo-100 via-gray-200 to-indigo-100',
                'from-pink-100 via-gray-200 to-pink-100',
                'from-yellow-100 via-gray-200 to-yellow-100',
                'from-green-100 via-gray-200 to-green-100',
                'from-blue-100 via-gray-200 to-blue-100',
                'from-purple-100 via-gray-200 to-purple-100',
            ];

            $index = 0; // Initialize the color index

            while ($row = $result->fetch_assoc()) {
                $subcategory_id = $row['id'];
                $name = $row['name'];
                $description = isset($row['description']) ? $row['description'] : ''; // Assuming description is optional
                $colorClass = $colors[$index % count($colors)]; // Cycle through the colors

                echo "
                    <div
                        class='bg-gradient-to-r $colorClass p-4 rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105 text-center w-64'>
                        <div class='relative'>
                            <img src='' alt='$name' class='w-full h-48 object-contain mb-3'>
                            <div
                                class='absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 hover:opacity-70 transition-opacity duration-300 flex items-end justify-center p-0'>
                                <p class='text-white text-lg font-bold'>$description</p>
                            </div>
                        </div>
                        <h2 class='text-xl font-semibold text-gray-800 mb-3'>$name</h2>
                        <!-- Form for POST request -->
                        <form action='../productspage.php' method='POST'>
                            <input type='hidden' name='category' value='$category'>
                            <input type='hidden' name='subcategory' value='$name'>
                            <button type='submit' class='bg-indigo-500 text-white font-medium py-2 px-6 rounded-full shadow-md hover:text-black hover:shadow-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none transition-all'>
                                Shop
                            </button>
                        </form>
                    </div>";

                $index++; // Increment the index to cycle through colors
            }
            echo '</div>';
        } else {
            echo "<p>No subcategories found for $category</p>";
        }

        //Close the connection
        $conn->close();
    ?>

    </div>
</body>

</html>