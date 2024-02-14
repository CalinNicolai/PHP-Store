<?php
include 'db_query_admin.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_product'])) {
        $category = $_POST['category'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image = $_POST['image'];

        $result = addProduct($category, $name, $price, $description, $image);

        if ($result === true) {
            echo "Product added successfully!";
        } else {
            echo "Error: " . $result;
        }
    } elseif (isset($_POST['update_product'])) {
        $id = $_POST['id'];
        $category = $_POST['category'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image = $_POST['image'];

        $result = updateProduct($id, $category, $name, $price, $description, $image);

        if ($result === true) {
            echo "Product updated successfully!";
        } else {
            echo "Error: " . $result;
        }
    }
}

$headings = array("ID", "Category", "Name", "Price", "Description", "Image");
$categories = array("Headphones", "Speakers", "Microphones");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

    <h2>Add Product</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" name="category">
                <?php foreach ($categories as $cat) {
                    echo "<option value='$cat'>$cat</option>";
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" name="price" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image URL:</label>
            <input type="text" class="form-control" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary" name="add_product">Add Product</button>
    </form>

    <hr>

    <h2>Update Product</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="id">Product ID:</label>
            <input type="number" class="form-control" name="id" required>
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" name="category">
                <?php foreach ($categories as $cat) {
                    echo "<option value='$cat'>$cat</option>";
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" name="price" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image URL:</label>
            <input type="text" class="form-control" name="image
