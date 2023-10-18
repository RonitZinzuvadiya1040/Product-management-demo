<!DOCTYPE html>
<html>
<head>
    <title>Image Upload Form</title>
</head>
<style>
    p{
        color: red;
    }
</style>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="image">Select Image(s):</label>
        <input type="file" name="image[]" id="image" multiple accept="image/*" />
        <p>Max file size: 2MB per image</p>

        <div id="image-preview" src="" class="preview1"></div>

        <input type="submit" value="Upload Images" />
    </form>

    <script type="text/javascript">
        // Function to display selected images as a preview
        document.getElementById('image').addEventListener('change', function (e) {
            const previewDiv = document.getElementById('image-preview');
            previewDiv.innerHTML = '';

            for (let i = 0; i < e.target.files.length; i++) {
                const file = e.target.files[i];
                if (file.size <= 2097152) { // 2MB in bytes
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.style.maxWidth = '200px'; // Adjust as needed
                    img.style.maxHeight = '200px'; // Adjust as needed
                    previewDiv.appendChild(img);
                }
            }
        });
    </script>
</body>
</html>
