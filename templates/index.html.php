<form method="post">
    <div class="header-bg">
        <div class="list-header">
            <h2>Product List</h2>
            <div class="buttons">
                <a href="addproduct.php" class='button'>ADD</a>
                <button type="submit" id='delete-product-btn'>MASS DELETE</button>
            </div>
        </div>
    </div>
    <div class="list-body">

        <?= $ui->html ?>

    </div>

</form>