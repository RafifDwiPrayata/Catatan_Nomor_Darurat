<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Darurat Pribadi</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            color: #ff6347;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ff6347;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #ff6347;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        a {
            text-decoration: none;
            color: #ff6347;
        }

        a {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 15px;
            background-color: #ff6347;
            color: white;
            border-radius: 5px;
        }

        a:hover {
            background-color: #e5533d;
        }
    </style>

</head>

<body>
    <div class="container">
        <h1>Kontak Darurat Pribadi</h1>
        <table>
            <tr>
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>Aksi</th>
            </tr>
            <?php
            $stmt = $db->query("SELECT * FROM personal_contacts");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>{$row['name']}</td><td>{$row['phone']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a> 
                    <span style='margin: 0 10px;'>|</span> 
                    <a href='delete.php?id={$row['id']}'>Hapus</a>
                </td></tr>";
            }
            
            ?>
        </table>
        <a href="index.html" class="align-right">
            < Kembali</a>
                <a href="add.php">Tambah Kontak</a>
    </div>
</body>

</html>