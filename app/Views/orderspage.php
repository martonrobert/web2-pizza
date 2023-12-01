<div class="container">
    <div class="page-header">
        <h1>Rendelések</h1>
    </div>

    <?php if (isset($orderSaved) and (string) $orderSaved !== '') : ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Bezár"><span aria-hidden="true">&times;</span></button>
        <p><?= $orderSaved ?></p>
    </div>
    <?php endif; ?> 

    <div class="">
        <form class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1" name="closed" <?= ($viewData['closed'] == 1 ? 'checked' : '') ?>> Kiszállítottak
                        </label>
                    </div>
                </div>
               <div class="col-sm-8 text-right">
                    <button type="submit" class="btn btn-primary">Keresés</button>
               </div>
            </div>
        </form>
    </div>
    <hr />

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <row>
                    <th>Rendelés ID</th>
                    <th>Pizza neve</th>
                    <th>Kategória</th>
                    <th>Vega</th>
                    <th>Egységár</th>
                    <th>Mennyiség</th>
                    <th>Érték</th>
                    <th>Rögzítve</th>
                    <th>Kiszállítva</th>
                    <th>&nbsp;</th>
                </row>
            </thead>
            <tbody>
            <?php foreach($orderList as $order) : ?>
                <tr>
                    <th><?= $order->az ?></th>
                    <th><?= $order->pizzanev ?></th>
                    <td><?= $order->kategorianev ?></td>
                    <td><?= ((int) $order->vegetarianus == 1 ? 'igen' : 'nem') ?></td>
                    <td class="text-right"><?= number_format($order->ar, 2, ' ') ?></td>
                    <td class="text-right"><?= $order->darab ?></td>
                    <td class="text-right"><?= number_format($order->ar * $order->darab, 2, ' ') ?></td>
                    <td><?= $order->felvetel ?></td>
                    <td><?= $order->kiszallitas ?></td>
                    <td>
                        <?php if ($order->kiszallitas == '') : ?>
                        <a role="button" class="shipped" data-id="<?= $order->az ?>">Kiszállítva</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.shipped').click(function() {
            var id = $(this).attr('data-id');
            $.ajax({
                url: '/orders/' + id,
                method: 'post',
                success: function(data) {
                    window.location.reload();
                }
            });
        });
    });
</script>