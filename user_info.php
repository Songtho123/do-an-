<!-- user-info.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: flex-start; /* align items to the top left */
            justify-content: flex-start; /* justify content to the top left */
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px; /* Adjusted width for longer input fields */
            margin: auto; /* Center the container horizontally */
            margin-top: 50px; /* Added margin-top for better spacing */
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: calc(100% - 16px); /* Adjusted width */
            padding: 10px; /* Increased padding for longer input fields */
            margin-bottom: 15px;
            box-sizing: border-box; /* Added for better sizing */
            border: 1px solid #ccc; /* Added a border for clarity */
            border-radius: 5px; /* Added border radius */
        }

        .action-buttons {
            text-align: right;
            position: fixed;
            bottom: 10px;
            right: 10px;
            display: flex;
        }

        .action-buttons button {
            margin-left: 5px;
            cursor: pointer;
            padding: 12px 18px; /* Adjusted padding for larger buttons */
            border-radius: 10px; /* Added border radius for rounder buttons */
            border: none;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
        }

        .edit-mode input {
            background-color: #f0f8ff; /* Light blue background in edit mode */
            border: 1px solid #000; /* Change the border color in edit mode */
        }

        .edit-button {
            background-color: #3498db; /* Blue color for edit button */
        }

        .save-button {
            background-color: #2ecc71; /* Green color for save button */
        }

        .delete-button {
            background-color: #e74c3c; /* Red color for delete button */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thông tin</h2>
        <label for="Iduser">ID:</label>
        <input type="text" id="Iduser" value="123" readonly>

        <label for="Name">Tên:</label>
        <input type="text" id="Name" value="John Doe" readonly>

        <label for="LoginName">Tên đăng nhập:</label>
        <input type="text" id="LoginName" value="johndoe" readonly>

        <label for="PasswordField">Mật khẩu:</label>
        <input type="password" id="PasswordField" value="********" readonly>

        <label for="Email">Email:</label>
        <input type="email" id="Email" value="john.doe@example.com" readonly>

        <label for="BirthDate">:Ngày sinh</label>
        <input type="date" id="BirthDate" value="1990-01-01" readonly>
    </div>

    <div class="action-buttons">
        <button class="edit-button" onclick="toggleEditMode()">Chỉnh sửa</button>
        <button class="save-button" onclick="saveField()">Lưu</button>
        <button class="delete-button" onclick="deleteField()">Xóa</button>
    </div>

    <script>
        function toggleEditMode() {
            var container = document.querySelector('.container');
            container.classList.toggle('edit-mode');

            var inputs = document.querySelectorAll('.container input');
            inputs.forEach(function (input) {
                input.readOnly = !input.readOnly;
            });
        }

        function saveField() {
            var container = document.querySelector('.container');
            container.classList.remove('edit-mode');

            var inputs = document.querySelectorAll('.container input');
            inputs.forEach(function (input) {
                input.readOnly = true;
            });
        }

        function deleteField() {
            // Implement logic to delete the user
            alert('Delete user');
        }
    </script>
</body>
</html>
