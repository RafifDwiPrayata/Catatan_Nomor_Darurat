<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kontak</title>

    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #ff6347;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="text"],
        button {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="text"]:focus {
            border-color: #ff6347;
        }

        button {
            background-color: #ff6347;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #e5533d;
        }

        .back-button {
            background-color: #f4f4f4;
            color: #ff6347;
            border: 1px solid #ff6347;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #ff6347;
            color: white;
        }
    </style>
    
</head>

<body>
    <div class="container">
        <h1>Tambah Kontak Darurat Pribadi</h1>
        <form action="add.php" method="post">
            <input type="text" name="name" placeholder="Nama Kontak" required>
            <input type="text" name="phone" placeholder="Nomor Telepon" required>
            <button type="submit" name="submit">Simpan</button>
        </form>
        <div class="align-right">
            <a href="personal.php">
                <button class="back-button">Kembali</button>
            </a>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $stmt = $db->prepare("INSERT INTO personal_contacts (name, phone) VALUES (?, ?)");
        $stmt->execute([$name, $phone]);
        header("Location: personal.php");
    }
    ?>
</body>

</html>