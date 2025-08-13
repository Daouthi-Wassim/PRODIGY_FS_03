
This is a basic PHP-based e-commerce website called "Local Store" that implements a simple online shopping system with the following architecture:

Database Structure
The system uses a MySQL database named ecommerce_db with a products table containing:

id - Product identifier
name - Product name
price - Product price
description - Product description
image - Product image filename
Core Functionality & File Structure
1. Homepage (index.php)

Serves as the main landing page
Displays featured products (currently hardcoded with 2 sample products)
Uses logo.jpg as placeholder images
Provides navigation to other sections
2. Products Catalog (products.php)

Connects to the MySQL database using mysqli
Dynamically fetches all products from the database
Displays products in a grid layout with images, names, and prices
Each product links to its detail page via product.php?id=X
3. Product Details (product.php)

Accepts product ID via GET parameter ($_GET['id'])
Retrieves specific product details from the database
Displays comprehensive product information (image, name, price, description)
Includes an "Add to Cart" form that posts to cart.php
4. Shopping Cart (cart.php)

Implements session-based cart functionality using session_start()
Handles POST requests to add products to cart
Stores cart items in $_SESSION['cart'] array
Displays all cart items with images, names, and prices
Provides a "Proceed to Checkout" button (not implemented)
Data Flow
Product Browsing: Users start at index.php → navigate to products.php to see all products
Product Selection: Click "View Details" → redirects to product.php?id=X
Add to Cart: Click "Add to Cart" → POST request to cart.php with product ID
Cart Management: cart.php retrieves product data from database and stores in session
Technical Implementation
Database Connection: Each page establishes its own MySQL connection to localhost with credentials (root, no password)
Session Management: Cart uses PHP sessions to persist items across page loads
Security Note: The system has SQL injection vulnerabilities (direct variable insertion in queries)
Styling: All pages use styles.css for consistent responsive design with flexbox layouts

<img width="1912" height="900" alt="Capture d’écran 2025-08-13 055031" src="https://github.com/user-attachments/assets/719295c7-9843-48ba-b6d0-3cb5a6b1a03d" />

