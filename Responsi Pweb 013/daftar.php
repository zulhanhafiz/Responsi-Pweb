<?php
session_start();
$data = $_SESSION['pendaftar'] ?? [];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Pendaftar</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #e0eafc, #cfdef3);
      margin: 0;
      padding: 40px 20px;
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }

    table {
      width: 90%;
      max-width: 800px;
      margin: auto;
      border-collapse: collapse;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      background: white;
      border-radius: 12px;
      overflow: hidden;
    }

    th, td {
      padding: 14px 20px;
      text-align: left;
    }

    th {
      background-color: #4a90e2;
      color: white;
      font-weight: bold;
    }

    tr:nth-child(even) {
      background-color: #f6f9fc;
    }

    tr:hover {
      background-color: #e0f0ff;
    }

    td {
      color: #333;
      border-bottom: 1px solid #ddd;
    }

    .back-btn-container {
      text-align: center;
      margin-top: 30px;
    }

    .back-btn {
      background-color: #4a90e2;
      color: white;
      padding: 12px 24px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
      transition: background-color 0.3s ease, transform 0.2s;
    }

    .back-btn:hover {
      background-color: #357bd8;
      transform: scale(1.03);
    }

    @media screen and (max-width: 600px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }

      tr {
        margin-bottom: 15px;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 8px;
        background: #fff;
      }

      th {
        background-color: #4a90e2;
        color: white;
        text-align: center;
      }

      td {
        text-align: right;
        padding-left: 50%;
        position: relative;
      }

      td::before {
        content: attr(data-label);
        position: absolute;
        left: 15px;
        width: 45%;
        text-align: left;
        font-weight: bold;
        color: #555;
      }
    }
  </style>
</head>
<body>
  <h2>Ringkasan Data Pendaftar</h2>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Tanggal Lahir</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $i => $p): ?>
        <tr>
          <td data-label="No"><?= $i + 1 ?></td>
          <td data-label="Nama"><?= htmlspecialchars($p['nama']) ?></td>
          <td data-label="Email"><?= htmlspecialchars($p['email']) ?></td>
          <td data-label="Tanggal Lahir"><?= htmlspecialchars($p['tanggal']) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <div class="back-btn-container">
    <a href="register.html" class="back-btn">Kembali ke Formulir</a>
  </div>
</body>
</html>
