function confirmDelete(productId) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you really want to delete this product?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete',
        cancelButtonText: 'No, cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // alert("dfd00");
            // exit;
            // If the user confirms, submit the form to delete the product
            const form = document.createElement('form');
            form.method = 'get';
            form.action = 'delete-product.php?id=' + productId;

            const productIdInput = document.createElement('input');
            productIdInput.type = 'hidden';
            productIdInput.name = 'id';
            productIdInput.value = productId;

            // const deleteProductInput = document.createElement('input');
            // deleteProductInput.type = 'hidden';
            // deleteProductInput.name = 'delete_product';
            // deleteProductInput.value = '1';

            form.appendChild(productIdInput);
            // form.appendChild(deleteProductInput);
            document.body.appendChild(form);
            form.submit();
        }
    });
}