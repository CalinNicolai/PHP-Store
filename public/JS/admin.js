function openEditModal(id) {
    console.log("Opening modal for ID:", id);
    $('#editProductModal').modal('show');
    $('#editProductId').val(id);
    $('#ID').val(id);
    console.log("ID value in form:", $('#ID').val());
}
