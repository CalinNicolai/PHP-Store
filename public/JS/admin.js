$(document).ready(function () {
    $('.edit-product').on('click', function () {
        var productId = $(this).data('id');
        // Загрузка информации о продукте и отображение модального окна
        $('#editProductModal').modal('show');
        $.ajax({
            url: 'get_product.php',
            method: 'GET',
            data: { id: productId },
            success: function(response) {
                var product = JSON.parse(response);
                $('#editProductId').val(product.id);
                $('#editCategory').val(product.category);
                $('#editName').val(product.name);
                $('#editPrice').val(product.price);
                $('#editDescription').val(product.description);
                $('#editProductModal').modal('show');
            },
            error: function() {
                alert('Failed to fetch product data');
            }
        });
    });

    $('#editProductForm').on('submit', function(e) {
        e.preventDefault();
        var id = $('#editProductId').val();
        var category = $('#editCategory').val();
        var name = $('#editName').val();
        var price = $('#editPrice').val();
        var description = $('#editDescription').val();
        $.ajax({
            url: 'update_product.php',
            method: 'POST',
            data: {
                id: id,
                category: category,
                name: name,
                price: price,
                description: description
            },
            success: function(response) {
                if (response === 'success') {
                    alert('Product updated successfully');
                    $('#editProductModal').modal('hide');
                    // Обновление данных в таблице
                } else {
                    alert('Failed to update product');
                }
            },
            error: function() {
                alert('Error updating product');
            }
        });
    });

    $('#deleteProductBtn').on('click', function() {
        var confirmDelete = confirm("Are you sure you want to delete this product?");
        if (confirmDelete) {
            var id = $('#editProductId').val();
            $.ajax({
                url: '/adminPage/delete_product.php',
                method: 'POST',
                data: { id: id },
                success: function(response) {
                    if (response === 'success') {
                        alert('Product deleted successfully');
                        $('#editProductModal').modal('hide');
                        // Удаление строки из таблицы
                    } else {
                        alert('Failed to delete product');
                    }
                },
                error: function() {
                    alert('Error deleting product');
                }
            });
        }
    });
});