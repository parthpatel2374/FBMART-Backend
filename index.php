
 <?php
// Retrieve the username from the query string, if available
$username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : null;
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FB Mart</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="images/FBMart_Final.png">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>



  <style>
    /* General Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Ensure body and html take up full width and height */
html, body {
  width: 100%;
  height: 100%;
  overflow-x: hidden;
}

/* Make the main container span full width */
.container {
  width: 100%;
  max-width: 100%;
}

/* Fix for images */
img {
  max-width: 100%;
  height: auto;
  display: block;
}

/* Header/Nav adjustments */
header, nav {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  nav ul {
    flex-direction: column;
    text-align: center;
  }
}

@media (max-width: 480px) {
  header {
    flex-direction: column;
  }
}

    @keyframes slide {
      0% {
        transform: translateX(0%);
      }

      100% {
        transform: translateX(0%);
      }
    }

    @layer utilities {
      .animate-slide {
        animation: slide 10s linear infinite;
      }
    }


    .hover-animation::before {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 2px;
      background-color: black;
      transition: width 0.3s ease-in-out;
    }

    .hover-animation:hover::before {
      width: 100%;
    }


    .opacity-0 {
      opacity: 0;
    }


    .dropdown:hover .dropdown-menu {
      display: block;
    }

    .dropdown-menu {
      display: none;
      z-index: 50;
      /* Ensure it appears above other content */
      position: absolute;
      /* Required to position it relative to the dropdown */
    }

    nav {
      position: relative;
      /* Ensure dropdown menus are positioned relative to the navigation */
      z-index: 40;
      /* Higher than other content like the slider */
    }

    body {
      font-family: sans-serif;

      padding-bottom: 4rem;
      margin: 0;
      /* Remove any default body margin */
      padding: 0;
    }

    main {
      padding-bottom: 4rem;
      /* Or add this to any other main container that holds your content */
    }

    header {
      background-color: #f2f2f2;
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    /* .logo img {
      height: 50px;
    } */

    .search-bar {
      display: flex;
      align-items: center;
      position: relative;
    }

    .search-bar input {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 200px;
    }

    .search-bar button {
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
    }

    .mobile-menu {
      display: none;
    }

    .mobile-menu-icon {
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      background: transparent;
      border: none;
      cursor: pointer;
      font-size: 24px;
      color: #333;
    }

    @media (max-width: 768px) {
      .mobile-menu {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #f2f2f2;
        padding: 1rem;
      }

      .search-bar {
        width: calc(100% - 50px);
        /* Adjust width to accommodate the hamburger icon */
      }

      .search-bar input {
        width: 100%;
      }
    }

    .dropdown-menu {
      display: none;
    }

    .group:hover .dropdown-menu {
      display: block;
    }


    /* Apply transition to the mobile menu */
    #mobile-menu {
      transition: transform 0.8s ease-in-out, opacity 0.5s ease-in-out;
      opacity: 0;
      /* Initially hidden */
    }

    #mobile-menu.open {
      opacity: 1;
      /* When the menu is open */
    }

    /* Initially position the menu off-screen */
    #mobile-menu.closed {
      transform: translateX(-100%);
    }

    /* Smooth transition for submenu */
    .submenu {
      display: none;
      transition: max-height 0.3s ease-in-out;
      max-height: 0;
      overflow: hidden;
      transition-delay: 0.3s;
      /* Add a delay for submenu */
    }

    .submenu.open {
      display: block;
      max-height: 1000px;
      /* Or any other large value */
    }


    .dropdown-menu {
      opacity: 0;
      max-height: 0;
      visibility: hidden;
      transition: opacity 0.3s ease, max-height 0.3s ease;
      overflow: hidden;
    }

    /* Make the dropdown visible with opacity 1 and a sufficient max-height */
    .dropdown-menu.show {
      opacity: 1;
      max-height: 400px;
      /* Adjust to the max height of the menu */
      visibility: visible;
    }








    .slider {
      position: relative;
      max-width: 100%;
      margin: 20px auto;
      overflow: hidden;

      /* Optional: Adds rounded corners */
    }

    .slides {
      display: flex;
      transition: transform 0.9s ease-in-out;
      /* Smooth transition */
    }

    .slides img {
      width: 100%;
      height: auto;
      flex-shrink: 0;
    }




    /* Slider container */
    .image-slider {
      display: flex;
      overflow-x: auto;
      scroll-snap-type: x mandatory;
      gap: 1rem;
      /* Space between slides */
      padding: 1rem;
      /* Optional padding for slider container */
      -webkit-overflow-scrolling: touch;
      /* Smooth scrolling on iOS */
      scroll-behavior: smooth;
      /* Smooth scroll for other browsers */
    }

    /* Individual slide item */
    .slider-item {
      flex: none;
      scroll-snap-align: start;
      width: auto;
      height: 300px;
      background-color: #fff;
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      box-sizing: border-box;
    }

    /* Image styling */
    .slider-img {
      width: 100%;
      /* Fit container width */
      height: 100%;
      /* Fit container height */
      object-fit: contain;
      /* Ensure image fits without cropping */
      border-radius: 0.5rem;
      /* Match slide container's rounded corners */
    }
  </style>
</head>

<body class="bg-gray-100">


  <!-- Header Section -->
  <header class="bg-gray-400 px-4 sm:px-6 flex flex-col lg:flex-row justify-between items-center h-auto py-2">
    <!-- Logo Section -->
    <div class="flex flex-col lg:flex-row items-center lg:space-x-4 w-full">
      <div class="flex justify-center lg:justify-start">
        <img src="images/logos/1(1).png"
          class="h-28 w-56 sm:h-28 sm:w-64 md:h-32 md:w-64 lg:h-28 lg:w-56 xl:h-28 xl:w-56 ">
      </div>


      <!-- Search Section -->
      <div class="w-full mt-2 lg:mt-0 lg:flex-1">
        <div class="flex justify-center lg:justify-start relative gap-4 sm:gap-8">
          <!-- Hamburger Menu (only visible on mobile) -->
          <button id="mobile-menu-button" class="lg:hidden text-black hover:text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>


          <!-- Search Bar -->
          <div class="relative w-11/12 lg:w-10/12 ml-12">
            <input type="text" placeholder="Search..."
              class="w-full p-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 pr-16">
            <button
              class="absolute right-1 top-1/2 transform -translate-y-1/2 bg-blue-500 text-white px-4 py-1 rounded-lg">Search</button>
          </div>
        </div>
      </div>


    </div>

     <!-- Right Section (Profile and Cart) -->
    <div class="flex space-x-5 mt-4 sm:mt-0 items-center hidden lg:flex">
      <?php if ($username): ?>
        <!-- Show username when logged in -->
        <div class="flex flex-col items-center">
          <span class="font-bold text-lg">Hello, <?php echo $username; ?></span>
        </div>
        <a href="footercontent/loginsignup.php">
          <div class="flex flex-col items-center">
            <i class="fa-solid fa-sign-out fa-2xl"></i>
            <span>Logout</span>
          </div>
        </a>
      <?php else: ?>
        <!-- Show login/signup link if not logged in -->
        <a href="footercontent/loginsignup.php">
          <div class="flex flex-col items-center">
            <i class="fa-solid fa-user fa-2xl"></i>
          </div>
        </a>
      <?php endif; ?>
      <a href="cart.html">
        <div class="flex flex-col items-center">
          <i class="fa-solid fa-cart-shopping fa-2xl"></i>
        </div>
      </a>
    </div>
  </header>

  <?php
    // Include database connection
    include 'db.php';

    // Fetch categories from the database
    $sql_categories = "SELECT id, name FROM categories";
    $result_categories = $conn->query($sql_categories);

    if ($result_categories->num_rows > 0) {
        echo '<div class="hidden lg:flex justify-center gap-6 w-full space-x-6">';

        // Loop through categories
        while ($category = $result_categories->fetch_assoc()) {
            $category_id = $category['id'];
            $category_name = $category['name'];

            // Fetch subcategories for the current category
            $sql_subcategories = "SELECT name FROM subcategories WHERE category_id = ?";
            $stmt = $conn->prepare($sql_subcategories);
            $stmt->bind_param("i", $category_id);
            $stmt->execute();
            $result_subcategories = $stmt->get_result();

            echo '<div class="group relative">';
            echo "<button class='font-medium hover:text-purple-400'>$category_name</button>";

            // Subcategories dropdown
            if ($result_subcategories->num_rows > 0) {
                echo '<div class="dropdown-menu absolute bg-blue-100 text-gray-800 shadow-lg rounded-lg mt-0 w-48">';
                while ($subcategory = $result_subcategories->fetch_assoc()) {
                    $subcategory_name = $subcategory['name'];

                    // Form to send category and subcategory via POST
                    echo "
                        <form action='productspage.php' method='POST'>
                            <input type='hidden' name='category' value='$category_name'>
                            <input type='hidden' name='subcategory' value='$subcategory_name'>
                            <button type='submit' class='block px-4 py-2 hover:bg-blue-200 text-left w-full'>$subcategory_name</button>
                        </form>
                    ";
                }
                echo '</div>';
            } else {
                echo '<div class="dropdown-menu absolute bg-gray-100 text-gray-800 shadow-lg rounded-lg mt-0 w-48">';
                echo '<p class="block px-4 py-2 text-gray-400">No subcategories</p>';
                echo '</div>';
            }

            echo '</div>';
        }

        echo '</div>';
    } else {
        echo '<p>No categories found.</p>';
    }
  ?>

  </div>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Get all dropdown group elements
      const dropdownGroups = document.querySelectorAll('.group');

      dropdownGroups.forEach(group => {
        const dropdownMenu = group.querySelector('.dropdown-menu');
        let hoverTimeout;

        // Set the delay time (in milliseconds)
        const delayTime = 300;

        // Toggle the dropdown menu on click
        group.addEventListener('click', (e) => {
          // Prevent click event bubbling
          e.stopPropagation();

          // Toggle the visibility of the dropdown
          const isMenuVisible = dropdownMenu.classList.contains('show');
          if (isMenuVisible) {
            dropdownMenu.classList.remove('show');
          } else {
            // Close all other dropdowns
            document.querySelectorAll('.dropdown-menu.show').forEach(menu => menu.classList.remove('show'));
            dropdownMenu.classList.add('show');
          }
        });

        // Add hover functionality for showing the dropdown
        group.addEventListener('mouseenter', () => {
          clearTimeout(hoverTimeout);
          dropdownMenu.classList.add('show');
        });

        group.addEventListener('mouseleave', () => {
          // Close the dropdown with a delay when leaving the menu
          hoverTimeout = setTimeout(() => {
            dropdownMenu.classList.remove('show');
          }, delayTime);
        });

        // Prevent the dropdown from closing when hovering over it
        dropdownMenu.addEventListener('mouseenter', () => {
          clearTimeout(hoverTimeout); // Ensure no timeout closes the menu
        });

        dropdownMenu.addEventListener('mouseleave', () => {
          hoverTimeout = setTimeout(() => {
            dropdownMenu.classList.remove('show');
          }, delayTime);
        });
      });

      // Close dropdowns when clicking outside
      document.addEventListener('click', () => {
        document.querySelectorAll('.dropdown-menu.show').forEach(menu => menu.classList.remove('show'));
      });
    });

  </script>

  <?php

    // Mobile Menu
    if ($result_categories->num_rows > 0) {
        echo '<div id="mobile-menu"
              class="lg:hidden fixed top-0 left-0 w-7/12 md:w-5/12 sm:w-5/12 h-full bg-gray-700 text-white z-50 transform -translate-x-full transition-transform duration-500 ease-in-out">
              <div class="relative h-full overflow-y-auto px-4">
                <button id="close-menu-button" class="absolute top-4 right-4 text-2xl font-bold text-white hover:text-purple-400">
                  &times;
                </button>
                <div class="py-6">';

        // Reset category pointer
        $result_categories->data_seek(0);

        // Loop for mobile categories
        while ($category = $result_categories->fetch_assoc()) {
            $category_id = htmlspecialchars($category['id']);
            $category_name = htmlspecialchars($category['name']);

            // Fetch subcategories
            $stmt->bind_param("i", $category_id);
            $stmt->execute();
            $result_subcategories = $stmt->get_result();

            // Mobile Category
            echo '<div class="py-2">';
            echo "<button class='w-full text-left font-medium hover:text-purple-400'>$category_name</button>";
            
            if ($result_subcategories->num_rows > 0) {
                echo '<div class="pl-4 hidden bg-gray-700 rounded-lg shadow-md border border-gray-300">';
                while ($subcategory = $result_subcategories->fetch_assoc()) {
                    $subcategory_name = htmlspecialchars($subcategory['name']);
                    echo "
                        <form action='productspage.php' method='POST'>
                            <input type='hidden' name='category' value='$category_name'>
                            <input type='hidden' name='subcategory' value='$subcategory_name'>
                            <button type='submit' class='block py-2 px-3 text-sm text-white hover:bg-purple-100 hover:text-purple-600 rounded-md'>$subcategory_name</button>
                        </form>
                    ";
                }
            } else {
                echo '<p class="block py-2 px-3 text-sm text-gray-400">No subcategories</p>';
            }
            echo '</div></div>';
        }

        echo '</div></div></div>'; // End of mobile menu
    } else {
        echo '<p>No categories found.</p>';
    }
    ?>


  </nav>
    <script>
      document.addEventListener("DOMContentLoaded", () => {
      const mobileMenuButton = document.getElementById("mobile-menu-button");
      const mobileMenu = document.getElementById("mobile-menu");
      const closeMenuButton = document.getElementById("close-menu-button");
      const mobileDropdownButtons = document.querySelectorAll("#mobile-menu button");

      // Open Mobile Menu
      if (mobileMenuButton) {
        mobileMenuButton.addEventListener("click", () => {
          mobileMenu.classList.remove("-translate-x-full");
          mobileMenu.classList.add("open");
          document.body.style.overflow = "hidden"; // Disable scrolling
        });
      }

      // Close Mobile Menu
      if (closeMenuButton) {
        closeMenuButton.addEventListener("click", () => {
          mobileMenu.classList.add("-translate-x-full");
          mobileMenu.classList.remove("open");
          document.body.style.overflow = ""; // Enable scrolling
        });
      }
// -----------------------------------------------------------------------------------------ERROR--------------------------------------|
      // Toggle dropdowns in mobile menu
      if (mobileDropdownButtons.length > 0) {
        mobileDropdownButtons.forEach(button => {
          const dropdown = button.nextElementSibling;

          // if (dropdown) {
          //   dropdown.classList.add("hidden"); // Initially hide all dropdowns
          // }

          button.addEventListener("click", (e) => {
            // Close other dropdowns
            mobileDropdownButtons.forEach(otherButton => {
              const otherDropdown = otherButton.nextElementSibling;
              if (otherDropdown && otherDropdown !== dropdown) {
                otherDropdown.classList.add("hidden");
              }
            });

            // Toggle the current dropdown
            if (dropdown) {
              dropdown.classList.toggle("hidden");
            }
          });
        });
      }
    });
  </script>



  <!-- Fixed Bottom Icons for Mobile -->
  <div id="bottom-fixed-content"
    class="lg:hidden fixed bottom-0 left-0 right-0 bg-gradient-to-r from-gray-500 via-gray-400 to-gray-500 flex justify-around items-center h-16 z-40 shadow-md">
    <a href="footercontent/loginsignup.html" class="flex flex-col items-center text-white w-1/2 relative group">
      <div
        class="bg-gradient-to-b from-blue-500 to-blue-700 w-12 h-12 rounded-full flex items-center justify-center shadow-lg transform group-hover:scale-110 transition-transform duration-300 ease-in-out">
        <i class="fa-solid fa-user fa-lg"></i>
      </div>
      <span class="text-sm mt-2 group-hover:text-blue-400 font-bold transition-colors duration-300">Profile</span>
    </a>

    <a href="cart.html" class="flex flex-col items-center text-white w-1/2 group">
      <div
        class="bg-gradient-to-b from-green-500 to-green-700 w-12 h-12 rounded-full flex items-center justify-center shadow-lg transform group-hover:scale-110 transition-transform duration-300 ease-in-out">
        <i class="fa-solid fa-cart-shopping fa-lg"></i>
      </div>
      <span class="text-sm mt-2 group-hover:text-green-400 font-bold transition-colors duration-300">Cart</span>
    </a>
  </div>


  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const menuToggle = document.getElementById("menuToggle");
      const closeMenu = document.getElementById("closeMenu");
      const categoryMenu = document.getElementById("categoryMenu");

      if (menuToggle && closeMenu && categoryMenu) {
        menuToggle.addEventListener("click", () => {
          categoryMenu.classList.remove("-translate-x-full");
        });

        closeMenu.addEventListener("click", () => {
          categoryMenu.classList.add("-translate-x-full");
        });
      }
    });
  </script>


</body>



<div class="slider">
  <div class="slides">
    <img src="images/1.jpg" alt="">
    <img src="images/2.jpg" alt="">
    <img src="images/3.jpg" alt="">
    <img src="images/4.jpg" alt="">
    <img src="images/5.jpg" alt="">
    <img src="images/6.jpg" alt="">
    <img src="images/7.jpg" alt="">
    <img src="images/8.jpg" alt="">
    <img src="images/9.jpg" alt="">
    <img src="images/10.jpg" alt="">
  </div>
</div>

<script>
let currentIndex = 0; // Start with the first slide
const slides = document.querySelector('.slides');
const slideImages = document.querySelectorAll('.slides img');
const totalSlides = slideImages.length;

// Function to move to the next slide
function nextSlide() {
  currentIndex = (currentIndex + 1) % totalSlides; // Loop back to the first slide
  updateSliderPosition();
}

// Function to update the slider position
function updateSliderPosition() {
  slides.style.transition = 'transform 1s ease'; // Add transition effect for smooth sliding
  slides.style.transform = `translateX(-${currentIndex * 100}%)`;

  // After the last slide (when the index is the last one), reset the transition and loop smoothly
  if (currentIndex === totalSlides - 1) {
    setTimeout(() => {
      slides.style.transition = 'none'; // Remove the transition immediately
      currentIndex = 0; // Reset to the first slide
      updateSliderPosition(); // Update position immediately without transition

      // Re-enable the transition after a short delay to make the movement smooth again
      setTimeout(() => {
        slides.style.transition = 'transform 1s ease'; // Re-enable smooth transition
      }, 50);
    }, 1000); // Wait for the last slide transition to finish
  }
}

// Automatic sliding every 6 seconds
setInterval(nextSlide, 6000);

</script>








<h1 class="text-2xl font-bold text-center mb-6 mt-12">Top Categories To Choose From</h1>
<div class="grid grid-cols-2 md:grid-cols-3 gap-7 w-full bg-gray-200 p-3">


  <div
    class="bg-gradient-to-r from-blue-100 via-gray-200 to-blue-50 p-4 rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
    <div class="relative">
      <img src="images/mens clothing.jpg" alt="Men" class="w-full h-48 object-contain mb-3">
      <div
        class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 hover:opacity-70 transition-opacity duration-300 flex items-end justify-center p-0  ">
        <p class="text-white text-lg font-bold">Discover Men's Collection</p>
      </div>
    </div>
    <div class="text-center">
      <h2 class="text-lg font-semibold text-gray-800 mb-2">Men's Clothing</h2>
      <p class="text-sm text-gray-600 mb-4">Explore the latest fashion trends for men.</p>
      <!-- Form for POST request -->
      <form action="product-categories/menproducts.php" method="POST">
          <input type="hidden" name="category" value="men">
          <button
          class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:text-black hover:shadow-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all">
          Explore Now
        </button>
      </form>
    </div>
  </div>



  <div
    class="bg-gradient-to-r from-pink-100 via-gray-200 to-pink-50 p-4 rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
    <div class="relative">
      <img src="images/burgess-milner-OYYE4g-I5ZQ-unsplash.jpg" alt="Women" class="w-full h-48 object-contain mb-3">
      <div
        class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 hover:opacity-70 transition-opacity duration-300 flex items-end justify-center p-0">
        <p class="text-white text-lg font-bold">Discover Women's Collection</p>
      </div>
    </div>
    <div class="text-center">
      <h2 class="text-lg font-semibold text-gray-800 mb-2">Women's Clothing</h2>
      <p class="text-sm text-gray-600 mb-4">Explore the latest fashion trends for women.</p>
      <!-- Form for POST request -->
      <form action="product-categories/womenproducts.php" method="POST">
          <input type="hidden" name="category" value="women">
          <button
          class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:text-black hover:shadow-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all">
          Explore Now
        </button>
      </form>
    </div>
  </div>



  <div
    class="bg-gradient-to-r from-yellow-100 via-gray-200 to-yellow-50 p-4 rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
    <div class="relative">
      <img src="images/one-year-old-toddlers-twins-family-children-photography-004.jpg" alt="Kids"
        class="w-full h-48 object-contain mb-3">
      <div
        class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 hover:opacity-70 transition-opacity duration-300 flex items-end justify-center p-0">
        <p class="text-white text-lg font-bold">Discover Kid's Wear</p>
      </div>
    </div>
    <div class="text-center">
      <h2 class="text-lg font-semibold text-gray-800 mb-2">Kids' Wear</h2>
      <p class="text-sm text-gray-600 mb-4">Fun and stylish clothing for kids of all ages.</p>
      <!-- Form for POST request -->
      <form action="product-categories/kidproducts.php" method="POST">
          <input type="hidden" name="category" value="kids">
          <button
          class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:text-black hover:shadow-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all">
          Explore Now
        </button>
      </form>
    </div>
  </div>




  <div
    class="bg-gradient-to-r from-pink-100 via-gray-200 to-pink-50 p-4 rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
    <div class="relative">
      <img src="images/premium_photo-1669374216974-ae28097f1ceb.avif" alt="Jewellery & Accessories"
        class="w-full h-48 object-contain mb-3">
      <div
        class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 hover:opacity-70 transition-opacity duration-300 flex items-end justify-center p-0">
        <p class="text-white text-lg font-bold">Exquisite Jewellery</p>
      </div>
    </div>
    <div class="text-center">
      <h2 class="text-lg font-semibold text-gray-800 mb-2">Jewellery & Accessories</h2>
      <p class="text-sm text-gray-600 mb-4">Elegant designs to enhance your style.</p>
      <!-- Form for POST request -->
      <form action="product-categories/jewellery.php" method="POST">
          <input type="hidden" name="category" value="jewellery">
          <button
          class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:text-black hover:shadow-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all">
          Explore Now
        </button>
      </form>
    </div>
  </div>



  <div
    class="bg-gradient-to-r from-yellow-100 via-gray-200 to-yellow-50 p-4 rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
    <div class="relative">
      <img src="images/home and kitchen.jpg" alt="Home & Kitchen" class="w-full h-48 object-contain mb-3">
      <div
        class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 hover:opacity-70 transition-opacity duration-300 flex items-end justify-center p-0">
        <p class="text-white text-lg font-bold">Comfort & Style</p>
      </div>
    </div>
    <div class="text-center">
      <h2 class="text-lg font-semibold text-gray-800 mb-2">Home & Kitchen</h2>
      <p class="text-sm text-gray-600 mb-4">Enhance your living space with ease.</p>
      <!-- Form for POST request -->
      <form action="product-categories/h&k.php" method="POST">
          <input type="hidden" name="category" value="home&kitchen">
          <button
          class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:text-black hover:shadow-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all">
          Explore Now
        </button>
      </form>
    </div>
  </div>




  <div
    class="bg-gradient-to-r from-pink-100 via-gray-200 to-pink-50 p-4 rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
    <div class="relative">
      <img src="images/beauty and heath.jpg" alt="Beauty & Health" class="w-full h-48 object-contain mb-3">
      <div
        class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 hover:opacity-70 transition-opacity duration-300 flex items-end justify-center p-0">
        <p class="text-white text-lg font-bold">Glow Inside & Out</p>
      </div>
    </div>
    <div class="text-center">
      <h2 class="text-lg font-semibold text-gray-800 mb-2">Beauty & Health</h2>
      <p class="text-sm text-gray-600 mb-4">Explore essentials for your wellbeing.</p>
      <!-- Form for POST request -->
      <form action="product-categories/b&t.php" method="POST">
          <input type="hidden" name="category" value="beauty">
          <button
          class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:text-black hover:shadow-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all">
          Explore Now
        </button>
      </form>
    </div>
  </div>




  <div
    class="bg-gradient-to-r from-yellow-100 via-gray-200 to-yellow-50 p-4 rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
    <div class="relative">
      <img src="images/wander-fleur-gNN4jwQ-ZuA-unsplash.jpg" alt="Bags & Footwear"
        class="w-full h-48 object-contain mb-3">
      <div
        class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 hover:opacity-70 transition-opacity duration-300 flex items-end justify-center p-0">
        <p class="text-white text-lg font-bold">Carry Style Everywhere</p>
      </div>
    </div>
    <div class="text-center">
      <h2 class="text-lg font-semibold text-gray-800 mb-2">Bags</h2>
      <p class="text-sm text-gray-600 mb-4">Discover stylish and functional bags.</p>
      <!-- Form for POST request -->
      <form action="product-categories/bags.php" method="POST">
          <input type="hidden" name="category" value="bags">
          <button
          class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:text-black hover:shadow-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all">
          Explore Now
        </button>
      </form>
    </div>
  </div>



  <div
    class="bg-gradient-to-r from-green-100 via-gray-200 to-green-50 p-4 rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
    <div class="relative">
      <img src="images/apostolos-vamvouras-YQbJLyY0hFU-unsplash.jpg" alt="Footwear"
        class="w-full h-48 object-contain mb-3">
      <div
        class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 hover:opacity-70 transition-opacity duration-300 flex items-end justify-center p-0">
        <p class="text-white text-lg font-bold">Step into Comfort & Style</p>
      </div>
    </div>
    <div class="text-center">
      <h2 class="text-lg font-semibold text-gray-800 mb-2">Footwear</h2>
      <p class="text-sm text-gray-600 mb-4">Explore our collection of stylish and comfortable footwear.</p>
      <!-- Form for POST request -->
      <form action="product-categories/footwear.php" method="POST">
          <input type="hidden" name="category" value="footwear">
          <button
          class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:text-black hover:shadow-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all">
          Explore Now
        </button>
      </form>
    </div>
  </div>




  <div
    class="bg-gradient-to-r from-blue-100 via-gray-200 to-blue-50 p-4 rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
    <div class="relative">
      <img src="images/electronics.jpg" alt="Electronics" class="w-full h-48 object-contain mb-3">
      <div
        class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 hover:opacity-70 transition-opacity duration-300 flex items-end justify-center p-0">
        <p class="text-white text-lg font-bold">Innovative Electronics for Every Need</p>
      </div>
    </div>
    <div class="text-center">
      <h2 class="text-lg font-semibold text-gray-800 mb-2">Electronics</h2>
      <p class="text-sm text-gray-600 mb-4">Browse our range of cutting-edge electronics and gadgets.</p>
      <!-- Form for POST request -->
      <form action="product-categories/electronics.php" method="POST">
          <input type="hidden" name="category" value="electronics">
          <button
          class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:text-black hover:shadow-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all">
          Explore Now
        </button>
      </form>
    </div>
  </div>




  <div
    class="bg-gradient-to-r from-green-100 via-gray-200 to-green-50 p-4 rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
    <div class="relative">
      <img src="images/grocery.jfif" alt="Grocery" class="w-full h-48 object-contain mb-3">
      <div
        class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 hover:opacity-70 transition-opacity duration-300 flex items-end justify-center p-0">
        <p class="text-white text-lg font-bold">Fresh Groceries, Delivered to You</p>
      </div>
    </div>
    <div class="text-center">
      <h2 class="text-lg font-semibold text-gray-800 mb-2">Grocery</h2>
      <p class="text-sm text-gray-600 mb-4">Shop for fresh groceries and essentials online.</p>
      <!-- Form for POST request -->
      <form action="product-categories/grocery.php" method="POST">
          <input type="hidden" name="category" value="grocery">
          <button
          class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:text-black hover:shadow-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all">
          Explore Now
        </button>
      </form>
    </div>
  </div>




  <div
    class="bg-gradient-to-r from-yellow-100 via-gray-200 to-yellow-50 p-4 rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
    <div class="relative">
      <img src="images/OIP (1).jpeg" alt="Automobile Accessories" class="w-full h-48 object-contain mb-3">
      <div
        class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 hover:opacity-70 transition-opacity duration-300 flex items-end justify-center p-0">
        <p class="text-white text-lg font-bold">Top-Quality Automobile Accessories</p>
      </div>
    </div>
    <div class="text-center">
      <h2 class="text-lg font-semibold text-gray-800 mb-2">Automobile</h2>
      <p class="text-sm text-gray-600 mb-4">Find premium car accessories and parts for your ride.</p>
      <!-- Form for POST request -->
      <form action="product-categories/automobileproducts.php" method="POST">
          <input type="hidden" name="category" value="automobile">
          <button
          class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:text-black hover:shadow-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all">
          Explore Now
        </button>
      </form>
    </div>
  </div>


  <div
    class="bg-gradient-to-r from-green-100 via-gray-200 to-green-50 p-4 rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
    <div class="relative">
      <img src="images/stationary.jfif" alt="Stationary" class="w-full h-48 object-contain mb-3">
      <div
        class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 hover:opacity-70 transition-opacity duration-300 flex items-end justify-center p-0">
        <p class="text-white text-lg font-bold">Quality Stationary for Your Needs</p>
      </div>
    </div>
    <div class="text-center">
      <h2 class="text-lg font-semibold text-gray-800 mb-2">Stationary</h2>
      <p class="text-sm text-gray-600 mb-4">Explore a wide variety of stationary products for school and office.</p>
      <!-- Form for POST request -->
      <form action="product-categories/statinaryproducts.php" method="POST">
          <input type="hidden" name="category" value="stationary">
          <button
          class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:text-black hover:shadow-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all">
          Explore Now
        </button>
      </form>
    </div>
  </div>
</div>


<h1 class="text-2xl font-bold text-gray-800 text-center my-14">Explore Men’s Products</h1>
<div class="image-slider -mt-10">
  <div class="slider-item p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8bWVuJTIwcHJvZHVjdHN8ZW58MHx8MHx8fDA%3D"
      alt="Slide 1" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1714935101690-f9e9bce595c6?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fG1lbiUyMHByb2R1Y3RzfGVufDB8fDB8fHww"
      alt="Slide 2" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1524738258074-f8125c6a7588?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8bWVuJTIwcHJvZHVjdHN8ZW58MHx8MHx8fDA%3D"
      alt="Slide 3" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1604368640692-027f44ffb8cf?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fG1lbiUyMHByb2R1Y3RzfGVufDB8fDB8fHww"
      alt="Slide 4" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1603251578711-3290ca1a0187?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fG1lbiUyMHByb2R1Y3RzfGVufDB8fDB8fHww"
      alt="Slide 5" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1722938203650-99afb12419f8?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fG1lbiUyMHByb2R1Y3RzfGVufDB8fDB8fHww"
      alt="Slide 6" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1604368640692-027f44ffb8cf?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fG1lbiUyMHByb2R1Y3RzfGVufDB8fDB8fHww"
      alt="Slide 7" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1519058082700-08a0b56da9b4?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NzF8fG1lbiUyMHByb2R1Y3R8ZW58MHx8MHx8fDA%3D"
      alt="Slide 8" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1491553895911-0055eca6402d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OTl8fG1lbiUyMHByb2R1Y3R8ZW58MHx8MHx8fDA%3D"
      alt="Slide 9" class="slider-img w-full h-auto rounded-lg">
  </div>
</div>



<h1 class="text-2xl font-bold text-gray-800 text-center my-14">Explore women’s Products</h1>
<div class="image-slider -mt-10">
  <div class="slider-item p-4 rounded-lg shadow-md">
    <img
      src="https://plus.unsplash.com/premium_photo-1708333927400-95f51b4f6f83?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8d29tZW4lMjBwcm9kdWN0c3xlbnwwfHwwfHx8MA%3D%3D"
      alt="Slide 1" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://plus.unsplash.com/premium_photo-1679415150568-03cfd3dd8293?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzN8fHdvbWVuJTIwcHJvZHVjdHN8ZW58MHx8MHx8fDA%3D"
      alt="Slide 2" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://media.istockphoto.com/id/686260632/photo/black-simple-dress-with-lace-and-shoes-on-white-fur-a-fashionable-concept-top-view.webp?a=1&b=1&s=612x612&w=0&k=20&c=lMKYaidALpR1TZOIbgKSrYOApcnmu8mK3xJ3fuR5SBI="
      alt="Slide 3" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1551084804-4b60b3c10f9e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjN8fHdvbWVuJTIwYm90dG9tJTIwd2VhcnxlbnwwfHwwfHx8MA%3D%3D"
      alt="Slide 4" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1564584217132-2271feaeb3c5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjh8fHdvbWVuJTIwYm90dG9tJTIwd2VhcnxlbnwwfHwwfHx8MA%3D%3D"
      alt="Slide 5" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1562157873-818bc0726f68?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzV8fHdvbWVuJTIwYm90dG9tJTIwd2VhcnxlbnwwfHwwfHx8MA%3D%3D"
      alt="Slide 6" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8d29tZW4lMjBhbGwlMjBwcm9kdWN0fGVufDB8fDB8fHww"
      alt="Slide 7" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1556228578-567ba127e37f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8d29tZW4lMjBhbGwlMjBwcm9kdWN0fGVufDB8fDB8fHww"
      alt="Slide 8" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1615396899839-c99c121888b0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fHdvbWVuJTIwYWxsJTIwcHJvZHVjdHxlbnwwfHwwfHx8MA%3D%3Dx"
      alt="Slide 9" class="slider-img w-full h-auto rounded-lg">
  </div>
</div>


<h1 class="text-2xl font-bold text-gray-800 text-center my-14">Explore kid’s Products</h1>
<div class="image-slider -mt-10">
  <div class="slider-item p-4 rounded-lg shadow-md">
    <img
      src="https://media.istockphoto.com/id/526495161/photo/baby-accessories.webp?a=1&b=1&s=612x612&w=0&k=20&c=YmuD64BJcdpxSWd9LRGi0bT27mMOhr5mCLmOv9_HX_M="
      alt="Slide 1" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://media.istockphoto.com/id/625379326/photo/organic-cosmetic-children-for-bath-on-wooden-bakground-close-up.webp?a=1&b=1&s=612x612&w=0&k=20&c=BZyUIwvbgE2tdoeDPoPQR3rM-tKS-RhiLlMjI8iAuTc="
      alt="Slide 2" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://media.istockphoto.com/id/1357487017/photo/mother-applying-sunscreen-cream-to-baby.webp?a=1&b=1&s=612x612&w=0&k=20&c=fKyZ2MFMa95ZMwZu6WhcRHSAc6uNWEEEOr8vfDhgV-8="
      alt="Slide 3" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1509695507497-903c140c43b0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzZ8fGtpZHMlMjBhbGwlMjBwcm9kdWN0fGVufDB8fDB8fHww"
      alt="Slide 4" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://plus.unsplash.com/premium_photo-1661630483890-e27e82a0e356?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDV8fGtpZHMlMjBhbGwlMjBwcm9kdWN0fGVufDB8fDB8fHww"
      alt="Slide 5" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://plus.unsplash.com/premium_photo-1661719873453-6c3652949446?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Njl8fGtpZHMlMjBhbGwlMjBwcm9kdWN0fGVufDB8fDB8fHww"
      alt="Slide 6" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1716790019972-2477cbeb261b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGtpZHMlMjBwbGF5fGVufDB8fDB8fHww"
      alt="Slide 7" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://plus.unsplash.com/premium_photo-1701984401514-a32a73eac549?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mzd8fGtpZHMlMjBwbGF5fGVufDB8fDB8fHww"
      alt="Slide 8" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1477511614005-61bd8b91d218?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDB8fGtpZHMlMjBwbGF5fGVufDB8fDB8fHww"
      alt="Slide 9" class="slider-img w-full h-auto rounded-lg">
  </div>
</div>


<h1 class="text-2xl font-bold text-gray-800 text-center my-14">Explore Footwear Products</h1>
<div class="image-slider -mt-10">
  <div class="slider-item p-4 rounded-lg shadow-md">
    <img
      src="https://plus.unsplash.com/premium_photo-1664202526744-516d0dd22932?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Zm9vdHdlYXJ8ZW58MHx8MHx8fDA%3D"
      alt="Slide 1" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1529810313688-44ea1c2d81d3?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Zm9vdHdlYXJ8ZW58MHx8MHx8fDA%3D"
      alt="Slide 2" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://plus.unsplash.com/premium_photo-1672883552548-091bbbfa595a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8Zm9vdHdlYXJ8ZW58MHx8MHx8fDA%3D"
      alt="Slide 3" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1570464197285-9949814674a7?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Zm9vdHdlYXJ8ZW58MHx8MHx8fDA%3D"
      alt="Slide 4" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://plus.unsplash.com/premium_photo-1661338815832-610d74cc7b2b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8Zm9vdHdlYXJ8ZW58MHx8MHx8fDA%3D"
      alt="Slide 5" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://plus.unsplash.com/premium_photo-1673367751771-f13597abadf3?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fGZvb3R3ZWFyfGVufDB8fDB8fHww"
      alt="Slide 6" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://plus.unsplash.com/premium_photo-1665664652418-91f260a84842?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fGZvb3R3ZWFyfGVufDB8fDB8fHww"
      alt="Slide 7" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://media.istockphoto.com/id/2163711487/photo/different-types-of-shoes-arranged-in-a-fair-shop-for-sale-in-india.webp?a=1&b=1&s=612x612&w=0&k=20&c=8H753olKcKTxGxCReoSjDksCAqXf-p3F1hlhLid6eQc="
      alt="Slide 8" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://media.istockphoto.com/id/1131576249/photo/women-shopping-for-footwear-at-street-market.webp?a=1&b=1&s=612x612&w=0&k=20&c=2ZrV2AQUcot1oS3hM84KxaGKaBv4clK8RVK9TRs2fWc="
      alt="Slide 9" class="slider-img w-full h-auto rounded-lg">
  </div>
</div>


<h1 class="text-2xl font-bold text-gray-800 text-center my-14">Explore Elecronics Products</h1>
<div class="image-slider -mt-10">
  <div class="slider-item p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1621009063622-4467e453c3c1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGVsZWN0cm9uaWMlMjBpdGVtc3xlbnwwfHwwfHx8MA%3D%3D"
      alt="Slide 1" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1591279304068-c997c097f2b7?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8ZWxlY3Ryb25pYyUyMGl0ZW1zfGVufDB8fDB8fHww"
      alt="Slide 2" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1486649961855-75838619c131?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fGVsZWN0cm9uaWMlMjBpdGVtc3xlbnwwfHwwfHx8MA%3D%3D"
      alt="Slide 3" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1487215078519-e21cc028cb29?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mzl8fGVsZWN0cm9uaWN8ZW58MHx8MHx8fDA%3D"
      alt="Slide 4" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1492140260770-41aec2341f6f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fGVsZWN0cm9uaWN8ZW58MHx8MHx8fDA%3D"
      alt="Slide 5" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1493200754321-b1d3cbc969a8?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGVsZWN0cm9uaWN8ZW58MHx8MHx8fDA%3D"
      alt="Slide 6" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://plus.unsplash.com/premium_photo-1681319553238-9860299dfb0f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDl8fGVsZWN0cm9uaWN8ZW58MHx8MHx8fDA%3D"
      alt="Slide 7" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1629196617890-d353d025ba0f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Njd8fGVsZWN0cm9uaWN8ZW58MHx8MHx8fDA%3D"
      alt="Slide 8" class="slider-img w-full h-auto rounded-lg">
  </div>
  <div class="slider-item bg-white p-4 rounded-lg shadow-md">
    <img
      src="https://images.unsplash.com/photo-1702390740712-ce6daf1673be?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NzN8fGVsZWN0cm9uaWN8ZW58MHx8MHx8fDA%3D"
      alt="Slide 9" class="slider-img w-full h-auto rounded-lg">
  </div>
</div>




<div class="flex flex-wrap justify-center items-center gap-8 py-20">
  <div class="flex flex-col items-center text-center max-w-xs">
    <i class="fa-solid fa-credit-card fa-xl"></i>
    <h3 class="font-bold text-xl text-gray-900 mt-4">Secure Payments</h3>
    <p class="text-gray-500 text-sm">Shop with confidence knowing that your transactions are safeguarded.</p>
  </div>

  <div class="flex flex-col items-center text-center max-w-xs">
    <i class="fa-sharp fa-solid fa-truck-fast fa-xl"></i>
    <h3 class="font-bold text-xl text-gray-900 mt-4">Free Shipping</h3>
    <p class="text-gray-500 text-sm">Shopping with no extra charges - savor the liberty of free shipping on all
      orders.</p>
  </div>

  <div class="flex flex-col items-center text-center max-w-xs">
    <i class="fa-sharp fa-solid fa-headset fa-xl"></i>
    <h3 class="font-bold text-xl text-gray-900 mt-4">24/7 Support</h3>
    <p class="text-gray-500 text-sm">Our team is here to assist you anytime, day or night.</p>
  </div>

  <div class="flex flex-col items-center text-center max-w-xs">
    <i class="fa-sharp fa-solid fa-right-left fa-xl"></i>
    <h3 class="font-bold text-xl text-gray-900 mt-4">Easy Returns</h3>
    <p class="text-gray-500 text-sm">Hassle-free returns within 30 days of purchase.</p>
  </div>

  <div class="flex flex-col items-center text-center max-w-xs">
    <i class="fa-solid fa-medal fa-xl"></i>
    <h3 class="font-bold text-xl text-gray-900 mt-4">Quality Assurance</h3>
    <p class="text-gray-500 text-sm">We ensure the highest quality standards for all our products.</p>
  </div>
</div>

<div class=" overflow-hidden relative bg-gray-400">
  <div class=" flex animate-slide">
    <div class="  min-w-full text-center px-4 py-16 bg-gray-400 text-white">
      <h1 class="text-4xl font-bold md:text-5xl text-black">FB MART: Your One-Stop Shop For All Your Needs</h1>
      <h2 class="text-lg mt-4 md:text-3xl">Effortless Finds, Exceptional Prices. Redefine Your Shopping Journey.</h2>
    </div>
  </div>
</div>


<footer class="bg-gray-200 py-10 -mt-1">
  <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
    <!-- Brand and Contact Info -->
    <div>
      <div class="text-2xl font-bold mb-4">
        <span class="text-yellow-600">Fayda</span><span class="text-blue-800">bazar</span>
      </div>

      <div class="space-y-4">
        <p>
          <i class="fas fa-map-marker-alt"></i>
          <a href="https://maps.app.goo.gl/5aN6nKgQAkXutcxC6" class="text-gray-800  block" target="_blank">
            Office.no 423, 4th Floor, Northplaza Complex Motera Ahmedabad Gujarat
          </a>
        </p>
        <p>
          <i class="fa-solid fa-phone"></i>
          <span class="text-gray-800">+91 8799606056</span>
        </p>
        <p>
          <i class="fas fa-envelope"></i>
          <a href="mailto:Faydabazar499@gmail.com"
            class="hover-animation relative text-black text-base font-sans no-underline">
            fbmart256@gmail.com
          </a>
        </p>
      </div>
      <div class="flex space-x-4 mt-4">
        <a href="https://www.facebook.com/profile.php?id=61551037958979&mibextid=ZbWKwL" target="_blank"
          class="text-gray-800 hover:text-gray-500">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://x.com/Faydabazar_Tech?t=m72mkaG_YXBihxBJKCiVuA&s=09" target="_blank"
          class="text-gray-800 hover:text-gray-500">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="https://www.instagram.com/fb_faydabazar?igsh=aDhubjMyZ2tkZWNk" target="_blank"
          class="text-gray-800 hover:text-gray-500">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.linkedin.com/in/getkey-solution-llp-901a56198" target="_blank"
          class="text-gray-800 hover:text-gray-500">
          <i class="fab fa-linkedin-in"></i>
        </a>

      </div>
    </div>

    <!-- Quick Links -->
    <div>
      <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
      <ul class="space-y-1">
        <li><a href="#" class="hover-animation relative text-black text-lg font-sans no-underline ">Home</a></li>
        <li><a href="about.html" class="hover-animation relative text-black text-lg font-sans no-underline">About</a>
        </li>
        <li><a href="#" class="hover-animation relative text-black text-lg font-sans no-underline">Product</a></li>

        <li><a href="contact.html"
            class="hover-animation relative text-black text-lg font-sans no-underline">Contact</a></li>
      </ul>
    </div>

    <!-- Privacy and Legal -->
    <div>
      <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
      <ul class="space-y-2">
        <li><a href="privacy.html" class="hover-animation relative text-black text-lg font-sans no-underline">Privacy
            Policy</a></li>
        <li><a href="t&c.html" class="hover-animation relative text-black text-lg font-sans no-underline">Terms &
            Conditions</a></li>
        <li><a href="return.html" class="hover-animation relative text-black text-lg font-sans no-underline">Shipping
            & Return
            Policy</a></li>
        <li><a href="https://play.google.com/store/apps/details?id=com.faydabazar"
            class="hover-animation relative text-black text-lg font-sans no-undeline">Download An App</a>
        </li>
      </ul>
    </div>

    <!-- About Us -->
    <div>
      <h3 class="text-lg font-semibold mb-4">About Us</h3>
      <p class="text-gray-800 text-lg">To Know More About FB MART Click On Above Link</p>
    </div>
  </div>
</footer>



<script>
  // Close dropdowns if clicked outside
  document.addEventListener('click', function (e) {
    if (!e.target.closest('[x-data]')) {
      document.querySelectorAll('[x-data]').forEach(function (el) {
        el.__x.$data.openDropdown = false;
        el.__x.$data.openProfileDropdown = false;
      });
    }
  });
</script>
</body>

</html>