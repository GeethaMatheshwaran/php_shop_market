// Function to handle login validation and process
function handleLogin() {
    const username = $('#user_name').val();
    const password = $('#password').val();

    $.ajax({
        url: 'common/model.php?action=handleLogin',
        type: 'post',
        data: {
            username: username,
            password: password,
        },
        success: function (data) {
            if (data === 'yes') {
                alert('Login successful!');
                // Redirect the user to another page after successful login
                window.location.replace('view/product/index.php'); // Replace 'dashboard.php' with your desired page
            } else {
                alert('Invalid username or password.');
                // Display an error message on the page or perform other actions for failed login
            }
        },
        error: function () {
            alert('Error occurred during login.');
        }
    });
}

function saveProduct() {
    const productName = $('#productName').val();
    const productDescription = $('#productDescription').val();
    let productStatusId = document.getElementById('productStatus');
    let productStatus;
    if (productStatusId.checked) {
        productStatus = '1';
    } else {
        productStatus = '0';
    }

    if (productName && productDescription && productStatus) {
        $.ajax({
            type: 'POST',
            url: '../../common/model.php?action=saveProduct',
            data: {
                productName: productName,
                productDescription: productDescription,
                productStatus: productStatus
            },
            success: function (data, response) {
                $('#productName').val('');
                $('#productDescription').val('');
                $('#productStatus').prop('checked', false); // Set as unchecked if status is not 1
                $('#createProductModal').modal("hide");
                ProductDisplayData();
            },
        });
    }
}

function ProductDisplayData() {
    var ProductDisplayData = "true";
    $.ajax({
        url: '../../common/model.php?action=listProduct',
        type: 'post',
        data: {
            ProductDisplayData: ProductDisplayData
        },
        success: function (data, status) {
            $('#ProductDisplayDataTable').html(data);
        }
    });

}
function getProductDetails(updateId) {
    $('#hiddenUpdateId').val(updateId);
    $.post("../../common/model.php?action=getProductDetails", { updateId }, function (data, status) {
        const product = JSON.parse(data);
        $('#updateProductName').val(product.name);
        $('#updateProductDescription').val(product.description);
        if (product.status == 1) {
            $('#updateProductStatus').prop('checked', true); // Set as checked if status is 1
        } else {
            $('#updateProductStatus').prop('checked', false); // Set as unchecked if status is not 1
        }

    });
    $('#updateProductModal').modal("show");

}

function updateProduct() {
    const hiddenUpdateId = $('#hiddenUpdateId').val();
    const productName = $('#updateProductName').val();
    const productDescription = $('#updateProductDescription').val();
    let productStatusId = document.getElementById('updateProductStatus');
    let productStatus;
    if (productStatusId.checked) {
        productStatus = '1';
    } else {
        productStatus = '0';
    }
    $.ajax({
        url: '../../common/model.php?action=updateProduct',
        type: 'post',
        data: {
            hiddenUpdateId: hiddenUpdateId,
            productName: productName,
            productDescription: productDescription,
            productStatus: productStatus,
        },
        success: function (data, status) {
            $('#updateProductModal').modal("hide");
            ProductDisplayData();
        }
    });
}

function deleteProduct(deleteId) {
    $.ajax({
        url: '../../common/model.php?action=deleteProduct',
        type: 'post',
        data: {
            deleteId: deleteId
        },
        success: function (data, status) {
            ProductDisplayData();
        }
    });

}