<div class="container">
    <div class="page-header">
        <h1>Aktuális árfolyamok <small>...<?php echo $data['date']; ?>...</small></h1>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <row>
                    <th>Pénznem</th>
                    <th>Árfolyam</th>
                </row>
            </thead>
            <tbody>
            <?php foreach($data['rates'] as $rate) : ?>
                <tr>
                    <th><?= $rate['currency'] ?></th>
                    <td><?= $rate['rate'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
