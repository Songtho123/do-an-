<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            border: 2px solid #007bff; /* Highlighted border color */
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
        }

        input {
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        p {
            margin-top: 15px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="register_process.php" method="post">
            <h2>Đăng ký</h2>
            <label for="full_name">Họ và tên:</label>
            <input type="text" name="full_name" required>

            <label for="username">Tên đăng nhập:</label>
            <input type="text" name="username" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" required>

            <label for="confirm_password">Xác nhận mật khẩu:</label>
            <input type="password" name="confirm_password" required>

            <label for="birthdate">Ngày sinh:</label>
            <input type="date" name="birthdate" required>

            <button type="submit">Đăng ký</button>
        </form>
        <p>Đã có tài khoản?<a href="login.php">Đăng nhập</a>.</p>
    </div>
</body>
</html>
