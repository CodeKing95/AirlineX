<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Passenger's Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>
    /* ===== GLOBAL ===== */
    body {
        background: linear-gradient(135deg, #f0f4ff, #e8f0ff);
        min-height: 100vh;
        font-family: 'Segoe UI', sans-serif;
        animation: pageEnter 1s ease forwards;
        opacity: 0;
    }

    @keyframes pageEnter {
        to { opacity: 1; }
    }

    /* ===== GLASS CONTAINER ===== */
    .glass-card {
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(14px);
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.08);
        animation: slideUp 1s ease forwards;
        transform: translateY(40px);
        opacity: 0;
    }

    @keyframes slideUp {
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* ===== HEADING ===== */
    h2 {
        font-weight: 700;
        text-align: center;
        position: relative;
        margin-bottom: 10px;
        animation: fadeDown 1s ease forwards;
        opacity: 0;
    }

    h2::after {
        content: "";
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #0d6efd, #6610f2);
        display: block;
        margin: 10px auto 0;
        border-radius: 5px;
        animation: growLine 1s ease forwards;
    }

    @keyframes fadeDown {
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes growLine {
        from { width: 0; }
        to { width: 80px; }
    }

    /* ===== TABLE ===== */
    table {
        border-radius: 12px;
        overflow: hidden;
    }

    thead th {
        background: linear-gradient(90deg, #0d6efd, #6610f2);
        color: #fff;
        border: none;
    }

    tbody tr {
        opacity: 0;
        transform: translateY(15px);
        animation: rowFade 0.5s ease forwards;
    }

    @keyframes rowFade {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    tbody tr:hover {
        background-color: #f4f7ff;
        transform: scale(1.01);
        transition: all 0.2s ease;
    }

    /* ===== BUTTONS ===== */
    .btn {
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
    }

    .btn-warning:hover {
        box-shadow: 0 0 12px rgba(255,193,7,0.6);
    }

    .btn-danger:hover {
        box-shadow: 0 0 12px rgba(220,53,69,0.6);
    }

    /* ===== FLOATING ADD BUTTON ===== */
    .add-btn {
        position: fixed;
        bottom: 30px;
        right: 30px;
        border-radius: 50px;
        padding: 14px 22px;
        font-weight: 600;
        box-shadow: 0 15px 30px rgba(13,110,253,0.4);
        animation: float 2.5s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }
</style>

    
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="text-center mb-4">Passenger Details</h2>
    <p>Please Enter Your Details Below</p>

    <a href="create.php" class="btn btn-primary mb-3 add-btn">Add New Passenger</a>

    <table class="table table-bordered table-striped">
        <tr class="table-dark">
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>DOB</th>
            <th>Country</th>
            <th>City</th>
            <th>Address</th>
            <th>Postcode</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Passport No</th>
            <th>Passport ID</th>
            <th>Action</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM passengers");

        while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['firstname'] ?></td>
                <td><?= $row['lastname'] ?></td>
                <td><?= $row['dob'] ?></td>
                <td><?= $row['country'] ?></td>
                <td><?= $row['city'] ?></td>
                <td><?= $row['address'] ?></td>
                <td><?= $row['postcode'] ?></td>
                <td><?= $row['mobile'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['passport'] ?></td>
                <td><?= $row['passportid'] ?></td>

                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" 
                       onclick="return confirm('Delete this passenger?')" 
                       class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

</div>

</body>
</html>
