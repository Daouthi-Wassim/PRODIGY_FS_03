
This is a basic PHP-based e-commerce website called "Local Store" that implements a simple online shopping system with the following architecture:

Database Structure
The system uses a MySQL database named ecommerce_db with a products table containing:

id - Product identifier
name - Product name
price - Product price
description - Product description
image - Product image filename
Data Flow
Product Browsing: Users start at index.php → navigate to products.php to see all products
Product Selection: Click "View Details" → redirects to product.php?id=X
Add to Cart: Click "Add to Cart" → POST request to cart.php with product ID
Cart Management: cart.php retrieves product data from database and stores in session
<img width="1912" height="900" alt="Capture d’écran 2025-08-13 055031" src="https://github.com/user-attachments/assets/719295c7-9843-48ba-b6d0-3cb5a6b1a03d" />

