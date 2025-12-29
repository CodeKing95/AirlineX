<!DOCTYPE html>
<html>
    <head>
        <title>Payment Booking</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4 mx-auto" style="max-width:500px">
        <h3 class="text-center mb-4">Payment Detail</h3>

        <form method="POST" action="process_payment.php">

        <div class="mb-3">
            <label>Cardholder Name</label>
            <input type="text" name="card_name" class="form-control" required>
</div>

<div class="mb-3">
    <label>Card Number</label>
    <input type="text" name="card_number" class="form-control" maxlength="19"required>
</div>

<div class="row">
    <div class="col">
        <label>Expiry (MM/YY)</label>
        <input type="text" name="expiry" class="form-control" placeholder="MM/YY" required>
</div>

<div class="col">
    <label>CVV</label>
    <input type="password" name="cvv" class="form-control"maxlength="4"required>
</div>

<div class="mb-3 mt-3">
    <label>Amount ($)</label>
    <input type="number" name="amount" class="form-control" step="0.01"required>
</div>

<button class="btn btn-success w-100">Pay Now</button>
</form>
</div>
</div>
