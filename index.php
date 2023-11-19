<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        /* Center align content */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        form {
            width: 380px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">User Login Form</h1><br>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form >
                    <div class="form-group">
                        <label for="user_name">User Name</label>
                        <input type="text" class="form-control" id="user_name" placeholder="Enter User Name" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" autocomplete="off" required>
                    </div>
                    <button type="button" class="btn btn-primary btn-block" onclick="handleLogin()">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="common/shopmarket.js"></script>

</body>
</html>
