<div class="modal-body">
    <?php if(!empty($_SESSION['cart'])): ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($_SESSION['cart'] as $id => $item): ?>
                <tr>
                    <td><a href="#"><img src="img/<?=$item['image'];?>" alt="<?=$item['title'];?>"></a></td>
                    <td><a href="#"><?=$item['title'];?></a></td>
                    <td><?=$item['price'];?></td>
                    <td><?=$item['qty'];?></td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <td colspan="4">
                    Products in cart: <span id="modal-cart-qty"><?=$_SESSION['cart.qty'];?></span>
                    <br>
                    Sum: <?=$_SESSION['cart.sum'];?> euro.
                </td>
            </tr>

            </tbody>
        </table>
    <?php else: ?>
        <p>Cart is empty</p>
    <?php endif; ?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary modal-footer-close" data-dismiss="modal">Close</button>
    <?php if(!empty($_SESSION['cart'])): ?>
        <button type="button" class="btn btn-primary">Buy products</button>
        <button type="button" class="btn btn-danger" id="clear-cart">Clear cart</button>
    <?php endif; ?>
</div>

<script src="js/main.js"></script>
