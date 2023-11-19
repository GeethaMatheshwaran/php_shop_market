<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <div class="container my-3">
        <h1 class="text-center">Product Details</h1>
            <button type="button" class="btn btn-success my-3" data-toggle="modal" data-target="#createProductModal">
                Add New Product
            </button>
            <div id="ProductDisplayDataTable"></div>

    </div>

    <!--Add the Product Modal -->
    <div class="modal" id="createProductModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="productForm">
                        <div class="form-group">
                            <label for="productName">Product Name</label>
                            <input type="text" class="form-control" id="productName" required>
                        </div>
                        <div class="form-group">
                            <label for="productDescription">Product Description</label>
                            <textarea class="form-control" id="productDescription"></textarea>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="productStatus">
                            <label class="form-check-label" for="productStatus">Product Status</label>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="saveProduct()">
                            Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Edit the Product Modal -->
    <div class="modal" id="updateProductModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="productForm">
                        <div class="form-group">
                            <label for="updateProductName">Product Name</label>
                            <input type="text" class="form-control" id="updateProductName" required>
                        </div>
                        <div class="form-group">
                            <label for="updateProductDescription">Product Description</label>
                            <textarea class="form-control" id="updateProductDescription"></textarea>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="updateProductStatus">
                            <label class="form-check-label" for="updateProductStatus">Product Status</label>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="updateProduct()">
                            Update</button>
                            <input type="hidden" id="hiddenUpdateId">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../../common/shopmarket.js"></script>
<script>
    $(document).ready(function(){
    ProductDisplayData();
});
</script>
    
    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>