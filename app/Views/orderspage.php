<div class="container">
    <h2>Rendelések</h2>
    <hr />
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
                        <a href="/order-pizza ?>" role="button">Kiszállítva</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>