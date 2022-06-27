<form action="" method="post" id='product_form'>
    <div class="header-bg">
        <div class="list-header">
            <h2>Product Add</h2>
            <div class="buttons">
                <button type="submit" id='add-product-btn' disabled='true'>Save</button>
                <a href="index.php" class='button'>Cancel</a>
            </div>
        </div>
    </div>

    <div class="form-body">
        <div class="form-fields">
            <p class='sku-exists'>
                <?php if (!empty($_POST)) {
                    echo "$dvd->skuExistsMsg";
                    echo "$book->skuExistsMsg";
                    echo "$furniture->skuExistsMsg";
                } ?>
            </p class='sku-exists'>
            <div class="field">
                <label for="SKU">SKU</label>
                <input name='sku' type="text" id='sku' required>
            </div>
            <div class="field">
                <label for="name">Name</label>
                <input name='name' type="text" id='name' required>
            </div>
            <div class="field">
                <label for="price">Price ($)</label>
                <input name='price' type="number" min='1' step="any" id='price'>
            </div>
            <div class="field">
                <label for="typeswitcher">Type Switcher</label>
                <select required name="typeswitcher" id="productType">
                    <option hidden value="null">Type Switcher</option>
                    <option value="dvd">DVD</option>
                    <option value="book">Book</option>
                    <option value="furniture">Furniture</option>
                </select>
            </div>
        </div>
    </div>
</form>

<script src="../typetoggler.js"></script>
<script>
    
</script>