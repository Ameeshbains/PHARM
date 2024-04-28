<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - Update Products</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Admin Panel - Update Products</h1>
    </header>
    <main>
        <section class="product-list">
            <h2>Product List</h2>
            <ul>
                <li>
                    <span class="product-name">Product 1</span>
                    <button class="edit-btn">Edit</button>
                </li>
                <li>
                    <span class="product-name">Product 2</span>
                    <button class="edit-btn">Edit</button>
                </li>
                <li>
                    <span class="product-name">Product 3</span>
                    <button class="edit-btn">Edit</button>
                </li>
                <!-- Add more products here -->
            </ul>
        </section>
        <section class="edit-product">
            <h2>Edit Product</h2>
            <form action="#" method="post">
                <label for="product-name">Product Name:</label>
                <input type="text" id="product-name" name="product-name">
                <label for="product-price">Price:</label>
                <input type="text" id="product-price" name="product-price">
                <label for="product-description">Description:</label>
                <textarea id="product-description" name="product-description"></textarea>
                <button type="submit">Update</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Your Company</p>
    </footer>
</body>
</html>
