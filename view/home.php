<?php require_once 'parts/header.php'; ?>

<main>
    <form method="POST" action="create-order.php">

    <label for="customerName">Nom du client</label>
    <input type="text" id="customerName" name="customerName" required pattern="^[a-zA-Z0-9\s-]{2,50}$" title="Le nom doit contenir entre 2 et 50 caractères alphanumériques, des espaces ou des tirets.">
    <br>

    <label for="product">Produit</label>
    <select id="product" name="products[]" multiple required size="6" onchange="validateSelection()">
        <option value="Iphone">Iphone</option>
        <option value="Samsung">Samsung</option>
        <option value="Huawei">Huawei</option>
        <option value="Xiaomi">Xiaomi</option>
        <option value="Oppo">Oppo</option>
        <option value="Vivo">Vivo</option>
    </select>
    <br>

    <button type="submit">Commander</button>
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

    document.querySelector('form').addEventListener('submit', function(event) {
        validateSelection();
        if (!this.checkValidity()) {
            event.preventDefault();
        }
    });
</script>

<?php require_once 'parts/footer.php'; ?>
