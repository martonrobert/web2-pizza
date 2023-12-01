<div class="container">
    <h2>Pizzák</h2>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <row>
                    <th>Pizza neve</th>
                    <th>Kategótia</th>
                    <th>Vega</th>
                    <th>Ár</th>
                    <th>&nbsp;</th>
                </row>
            </thead>
            <tbody>
            <?php foreach($pizzaList as $pizza) : ?>
                <tr>
                    <th><?= $pizza->nev ?></th>
                    <td><?= $pizza->kategorianev ?></td>
                    <td><?= ((int) $pizza->vegetarianus == 1 ? 'igen' : 'nem') ?></td>
                    <td class="text-right"><?= number_format($pizza->ar, 2, ' ') ?></td>
                    <td><a href="/order-pizza/<?= $pizza->nev ?>" role="button">Rendelés</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>