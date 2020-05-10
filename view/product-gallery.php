<div id="product-grid">
    <div class="txt-heading">Choose the categories you want to pay for</div>
    <div class="product-item">
        <div class="product-image">
            <img src="/img/children.jpg" id="<?php echo "children"; ?>" class="product-img">
        </div>
        <div>
            <strong><?php echo "Childrens"; ?></strong>
        </div>
        <div class="product-price"><?php echo "&#8358;200.00"; ?></div>

        <input type="button" id="add_<?php echo "children"; ?>" value="Add to cart" class="btnAddAction"
            onClick="cartAction('add', '<?php echo "children"; ?>','<?php echo "childrens"; ?>','<?php echo "200.00"; ?>')" />

    </div>
    <div class="product-item">
        <div class="product-image">
            <img src="/img/images.jpg" id="<?php echo "teachers"; ?>" class="product-img">
        </div>
        <div>
            <strong><?php echo "Teenagers"; ?></strong>
        </div>
        <div class="product-price"><?php echo "&#8358;200.00"; ?></div>

        <input type="button" id="add_<?php echo "teenagers"; ?>" value="Add to cart" class="btnAddAction"
            onClick="cartAction('add', '<?php echo "teenagers"; ?>','<?php echo "teenagers"; ?>','<?php echo "200.00"; ?>')" />
    </div>
    <div class="product-item">
        <div class="product-image">
            <img src="img/teachers.jpg" id="<?php echo "teachers"; ?>" class="product-img">
        </div>
        <div>
            <strong><?php echo "Teachers"; ?></strong>
        </div>
        <div class="product-price"><?php echo "&#8358;500.00"; ?></div>

        <input type="button" id="add_<?php echo "teachers"; ?>" value="Add to cart" class="btnAddAction"
            onClick="cartAction('add', '<?php echo "teachers"; ?>','<?php echo "teachers"; ?>','<?php echo "500.00"; ?>')" />
    </div>
</div>