function editProduct(productId) {
    window.location.href = 'edit-product.php?product_id=' + productId;
    return productId;
}

function success() {
    Swal.fire({
        title: 'Product updated successfully!',
        text: '',
        icon: 'success', // Use 'success' icon for success message
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK',
    }).then((result) => {
        // Redirect to view-product.php after the user clicks OK
        window.location.href = "view-product.php";
    });
}