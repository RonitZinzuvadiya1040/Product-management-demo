function imagerender() {
    document.getElementById('product_image').addEventListener('change', function (e) {
        const previewDiv = document.getElementById('image-preview');
        previewDiv.innerHTML = '';

        console.log(e.target.files);
        
        for (let i = 0; i <= e.target.files.length; i++) {
            const file = e.target.files[i];
            // console.log(file);
            // console.log("----------------------------"+i);
            if (file.size <= 2097152) { // 2MB in bytes
                const container = document.createElement('div');
                container.classList.add('image-preview-item');
                console.log(file);
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.style.maxWidth = '100px'; // Adjust as needed
                img.style.maxHeight = '100px'; // Adjust as needed

                const deleteBtn = document.createElement('div');
                deleteBtn.classList.add('delete-button');
                deleteBtn.innerHTML = 'x';
                deleteBtn.addEventListener('click', function () {
                    container.remove(); // Remove the entire container (image + delete button)
                });

                container.appendChild(img);
                container.appendChild(deleteBtn);
                previewDiv.appendChild(container);
            }
            else{
                console.log("else");
            }
        }
    });
}


function success() {
    Swal.fire({
        title: 'Product added successfully!',
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