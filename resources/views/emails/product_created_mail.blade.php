<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product Created</title>
</head>
<body>
    <h1>Product Created Successfully</h1>
    <p>Hi {{ $user->name }},</p>
    <p>Your product has been created successfully with the following details:</p>

    <ul>
        <li>Title: {{ $product->title }}</li>
        <li>Description: {{ $product->dec }}</li>
        <li>Price: {{ number_format($product->price, 2) }}</li>
        <li>Category: {{ optional($product->category)->name ?? 'N/A' }}</li>
    </ul>

    <p>Thank you for adding a product to the store.</p>
    <p>Regards,<br>Eraasoft Team</p>
</body>
</html>
