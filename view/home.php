<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<header>
    <h1>Le Eshop au top</h1>
</header>

<main>
    <form method="POST" action="../controller/create-order.php">

    <label for="customerName">Nom du client</label>
			<input type="text" id="customerName" name="customerName" required>
			<br>

			<label for="product">Produit</label>

			<select id="product" name="products[]" multiple>
                <option value="1">Iphone</option>
                <option value="2">Samsung</option>
                <option value="3">Huawei</option>
                <option value="4">Xiaomi</option>
                <option value="5">Oppo</option>
                <option value="6">Vivo</option>
			</select>
			<br>

			<button type="submit">Ajouter</button>


    </form>

    
</body>
</html>
