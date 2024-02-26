<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="public/CSS/admin.css"/>
</head>

<body>

<div class="container mt-4">

    <h2>Add Product</h2>
    <form method="post" action="index.php?page=admin/panel">
        <div class="form-group">
            <input type="hidden" name="action" value="add_product">
            <label for="category">Category:</label>
            <select class="form-control" name="category">
                <?php
                $headings = array("ID", "Category", "Name", "Price", "Description");
                $categories = array("Headphones", "Speakers", "Microphones");
                foreach ($categories as $cat) {
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

    <hr>

    <h2>Products</h2>
    <table class="table">
        <thead>
        <tr>
            <?php foreach ($headings as $heading) {
                echo "<th>$heading</th>";
            } ?>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($products as $product) {
            echo "<tr>";
            echo "<td>{$product['id']}</td>";
            echo "<td>{$product['category']}</td>";
            echo "<td>{$product['name']}</td>";
            echo "<td>{$product['price']}</td>";
            echo "<td>{$product['description']}</td>";
            echo "<td><button class='btn btn-primary edit-product' data-id='{$product['id']}' onclick='openEditModal({$product['id']})'>Edit</button></td>";
            echo "<td>
                    <form id='deleteProductForm' action='index.php?page=admin/panel' method='POST'>
                    <input type='hidden' name='action' value='delete_product'>
                    <input type='hidden' name='ID' id='ID' value='{$product['id']}'>
                    <button type='submit' class='btn btn-danger' id='deleteProductBtn'>Delete Product</button>
                </form>
                </td>
                </tr>
            ";

        }
        ?>


        </tbody>
    </table>
</div>

<!-- Модальное окно для редактирования/удаления продукта -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" action="index.php?page=admin/panel" method="post">
                    <input type="hidden" name="action" value="update_product">
                    <input type="hidden" name="id" id="editProductId" value="">
                    <div class="form-group">
                        <label for="editCategory">Category:</label>
                        <input type="text" class="form-control" id="editCategory" name="category" required>
                    </div>
                    <div class="form-group">
                        <label for="editName">Name:</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="editPrice">Price:</label>
                        <input type="number" class="form-control" id="editPrice" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="editDescription">Description:</label>
                        <textarea class="form-control" id="editDescription" name="description" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="updateProductBtn">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="../../public/JS/admin.js"></script>


</body>

</html>
