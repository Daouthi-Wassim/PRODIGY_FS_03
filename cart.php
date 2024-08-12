<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Local Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Your Shopping Cart</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="products.php">Products</a>
            <a href="cart.php">Cart</a>
        </nav>
    </header>
    <main>
        <div class="cart">
            <?php
                // Cart logic
                session_start();

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $product_id = $_POST['product_id'];
                    // Retrieve product details from database and add to session
                    $conn = new mysqli('localhost', 'root', '', 'ecommerce_db');
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT * FROM products WHERE id='$product_id'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $_SESSION['cart'][$product_id] = $row;
                    }
                    $conn->close();
                }

                if (!empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $item) {
                        echo '<div class="cart-item">';
                        echo '<img src="images/' . $item["image"] . '" alt="' . $item["name"] . '">';
                        echo '<h3>' . $item["name"] . '</h3>';
                        echo '<p>$' . $item["price"] . '</p>';
                        echo '</div>';
                    }
                    echo '<button>Proceed to Checkout</button>';
                } else {
                    echo '<p>Your cart is empty.</p>';
                }
            ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Local Store</p>
    </footer>
</body>
</html>
