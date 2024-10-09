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
    <form method="POST" action="../controller/add-shipping-adress.php">

    <label for="ShippingCountry">Pays de livraison</label>
			<input type="text" id="ShippingCountry" name="ShippingCountry" required pattern="^[a-zA-Z0-9\s.-]{5,50}$" title="Le pays doit contenir entre 5 et 50 caractères et des espaces.">

            <br>
    <label for="ShippingCity">Ville de livraison</label>
            <input type="text" id="ShippingCity" name="ShippingCity" required pattern="^[a-zA-Z0-9\s.-]{5,50}$" title="La Ville doit contenir entre 5 et 50 caractères.">

            <br>
    <label for="ShippingAdress">Adresse de livraison</label>
            <input type="text" id="ShippingAdress" name="ShippingAdress" required pattern="^[a-zA-Z0-9\s.-]{5,50}$" title="L'adresse doit contenir entre 5 et 50 caractères et des espaces.">
			

			<button type="submit">Ajouter</button>


    </form>

    
</body>
</html>
