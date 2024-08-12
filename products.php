<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Local Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Our Products</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="products.php">Products</a>
            <a href="cart.php">Cart</a>
        </nav>
    </header>
    <main>
        <div class="products">
            <!-- Example of product listing -->
            <?php
                // Connect to the database and fetch products
                $conn = new mysqli('localhost', 'root', '', 'ecommerce_db');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="product">';
                        echo '<img src="images/' . $row["image"] . '" alt="' . $row["name"] . '">';
                        echo '<h3>' . $row["name"] . '</h3>';
                        echo '<p>$' . $row["price"] . '</p>';
                        echo '<a href="product.php?id=' . $row["id"] . '">View Details</a>';
                        echo '</div>';
                    }
                } else {
                    echo "No products found.";
                }
                $conn->close();
            ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Local Store</p>
    </footer>
</body>
</html>
