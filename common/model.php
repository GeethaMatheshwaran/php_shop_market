<?php
include 'connection.php'; // Include your database connection file
$action = $_GET['action'];

switch ($action) {

    case "handleLogin":
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE user_name='$username' AND password='$password'";
        $res = mysqli_query($conn, $sql);

        if ($res && mysqli_num_rows($res) > 0) {
            echo "yes"; // Successful login
        } else {
            echo "no"; // Login failed
        }
        break;
    case "saveProduct":
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];
        $productStatus = $_POST['productStatus'];

        // Prepare and execute the SQL query to insert data into the 'categories' table
        $sql = "INSERT INTO products (name, description,status) VALUES ('$productName', '$productDescription','$productStatus')";

        $res = mysqli_query($conn, $sql);

        break;

    case "listProduct":
        $ProductDisplayData = $_POST['ProductDisplayData'];

        $table = '
        <table class="table table-striped">
        <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>';
        $sql = 'select * from products';
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            $sno = 1;
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $product_name = $row['name'];
                $product_description = $row['description'];
                $product_status = $row['status'];
                $table .= '<tr>
            <td scope="col">' . $sno . '</td>
            <td scope="col">' . $product_name . '</td>
            <td scope="col">' . $product_description . '</td>
            <td scope="col">' . $product_status . '</td>
            <td>
             <button class="btn btn-primary" onclick="getProductDetails(' . $id . ')">Update</button>
            <button class="btn btn-danger" onclick="deleteProduct(' . $id . ')">Delete</button>
            </td>
          </tr>';
                $sno++;

            }
        } else {
            $table .= '<tr>
        <td colspan="5" class="text-center">
            ' . "No Records Found" . '
        </td>
    </tr>';
        }


        $table .= '</table>';
        echo $table;

        break;

    case "getProductDetails":
        $updateId = $_POST['updateId'];
        $sql = "select * from products where id='$updateId' ";
        $res = mysqli_query($conn, $sql);
        $response = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $response = $row;
        }
        echo json_encode($response);
        break;

    case "updateProduct":
        $id = $_POST['hiddenUpdateId'];
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];
        $productStatus = $_POST['productStatus'];       
        $sql = "update products set name='$productName' ,description='$productDescription' , status='$productStatus' where id='$id' ";
        $res = mysqli_query($conn, $sql);

        break;

    case "deleteProduct";
        $deleteId = $_POST['deleteId'];
        $sql = "delete from products where id='$deleteId' ";
        $res = mysqli_query($conn, $sql);

        break;
}
?>