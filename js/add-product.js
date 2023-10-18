document.getElementById("product_image").addEventListener("change", function () {
    var imagePreview = document.getElementById("image-preview");
    imagePreview.innerHTML = "";

    for (var i = 0; i < this.files.length; i++) {
        var file = this.files[i];

        if (file.type.match('uploads.*')) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var image = document.createElement("img");
                image.src = e.target.result;
                image.style.maxHeight = "200px";
                image.style.maxWidth = "200px";
                image.style.margin = "5px";
                imagePreview.appendChild(image);
            };
            reader.readAsDataURL(file);
        }
    }
});

function success(){
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

// document.getElementById("submit").addEventListener("click", function (event) {
//     event.preventDefault(); // Prevent the default form submission
//     success();
//     // Simulate a successful product addition
    
// });