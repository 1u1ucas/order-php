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
			<input type="text" id="customerName" name="customerName" required pattern="^[a-zA-Z0-9\s-]{2,50}$">
			<br>

			<label for="product">Produit</label>

			<select id="product" name="products[]" multiple  required size="6" onchange="validateSelection()">
                <option value="Iphone">Iphone</option>
                <option value="Samsung">Samsung</option>
                <option value="Huawei">Huawei</option>
                <option value="Xiaomi">Xiaomi</option>
                <option value="Oppo">Oppo</option>
                <option value="Vivo">Vivo</option>
			</select>
			<br>

			<button type="submit">Ajouter</button>


    </form>

</main>

<script>
        function validateSelection() {
            const select = document.getElementById('product');
            const selectedOptions = Array.from(select.selectedOptions);
            if (selectedOptions.length < 1 || selectedOptions.length > 5) {
                select.setCustomValidity('Vous devez sélectionner entre 1 et 5 produits.');
            } else {
                select.setCustomValidity('');
            }
        }
    </script>
</body>
</html>
