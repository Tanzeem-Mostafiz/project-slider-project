<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>
    <div class="container">
        <h1>Products</h1>
        <div class="slider-container">
            <div class="slider">
                <?php
                include 'db_config.php';

                $sql = "SELECT * FROM Products";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='slide'>";
                        echo "<div class='product-card'>";
                        echo "<img src='images/" . $row['image'] . "' alt='" . $row['product_name'] . "'>";
                        echo "</div>";
                        echo "<div class='product-info'>";
                        echo "<p id='head'>" . $row['product_name'] . "</p>" .
     "<p>Category: " . $row['category'] . " | Manufacturing Date: " . $row['manufacturing_date'] . "</p>";

                        
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "No Products for Display";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
