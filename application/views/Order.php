
<div class="container">
    <h2>Order</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 40px">S/N</th>
				<th>Order Name</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i = 0; $i < count($order_list); $i++) { ?>
                <tr class="order">
                    <td style="width: 40px">+</td>
                    <td>
                        <?= $order_list[$i]['name'] ?>
                    </td>
                </tr>
                <tr class="order-details" style="display: none">
                    <td style="width: 40px"></td>
                    <td>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Ingredient Name</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php asort($order_list[$i]['ingredient']); foreach($order_list[$i]['ingredient'] as $ingredient) { ?>
                                    <tr>
                                        <td><?= $ingredient['name'] ?></td>
                                        <td><?= $ingredient['amount'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    $('.order').click(function() {
        $(this).next('.order-details').toggle();
    })
</script>