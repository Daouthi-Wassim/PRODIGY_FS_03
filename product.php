<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - Local Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Product Details</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="products.php">Products</a>
            <a href="cart.php">Cart</a>
        </nav>
    </header>
    <main>
        <?php
            $conn = new mysqli('localhost', 'root', '', 'ecommerce_db');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $product_id = $_GET['id'];
            $sql = "SELECT * FROM products WHERE id='$product_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<div class="product-details">';
                echo '<img src="images/' . $row["image"] . '" alt="' . $row["name"] . '">';
                echo '<h2>' . $row["name"] . '</h2>';
                echo '<p>$' . $row["price"] . '</p>';
                echo '<p>' . $row["description"] . '</p>';
                echo '<form action="cart.php" method="post">';
                echo '<input type="hidden" name="product_id" value="' . $row["id"] . '">';
                echo '<button type="submit">Add to Cart</button>';
                echo '</form>';
                echo '</div>';
            } else {
                echo "Product not found.";
            }
            $conn->close();
        ?>
    </main>
    <footer>
        <p>&copy; 2024 Local Store</p>
    </footer>
</body>
</html>
