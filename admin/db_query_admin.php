<?php
include '../db_connection.php';
function addProduct($category, $name, $price, $description, $image) {
    $conn = ConnectDB();

    $sql = "INSERT INTO products (category, name, price, description, image) VALUES ('$category', '$name', $price, '$description', '$image')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

function updateProduct($id, $category, $name, $price, $description, $image) {
    $conn = ConnectDB();

    $sql = "UPDATE products SET category='$category', name='$name', price=$price, description='$description', image='$image' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

function getProductsByCategory($category) {
    $conn = ConnectDB();

    $sql = "SELECT * FROM products WHERE category='$category'";
    $result = $conn->query($sql);

    $products = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    return $products;
}
$conn = ConnectDB();
$conn->close();
?>
