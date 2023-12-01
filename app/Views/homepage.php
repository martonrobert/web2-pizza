<div class="container">
    <div class="page-header">
        <h1>Pizzák <small>...a teljes választék...</small></h1>
    </div>

    <?php if (isset($orderSaved) and (string) $orderSaved !== '') : ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Bezár"><span aria-hidden="true">&times;</span></button>
        <p><?= $orderSaved ?></p>
    </div>
    <?php endif; ?> 

    <div class="">
        <form class="form-horizontal" id="filter">
            <div class="form-group">
                <label class="control-label col-sm-2">Kategória</label>
                <div class="col-sm-4">
                    <select name="kategoria" class="form-control" id="kategoria">
                        <option value="">--</option>
                        <?php foreach($kategoriaList as $kategoria) : ?>
                            <option value="<?= $kategoria->nev ?>" <?= ($kategoria->nev == $selectedKategoria ? 'selected' : '') ?>><?= $kategoria->nev ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
               <div class="col-sm-3">
                    <input type="text" class="form-control" name="term" id="term" placeholder="pizza keresése" value="<?= $term ?>" onfocus="this.value = this.value;" />
               </div>
            </div>
        </form>
    </div>
    <hr />

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

<script>
    $(document).ready(function() {

        $('#term').focus();

        $('#kategoria').change(function() {
            $('#filter').submit();
        });

        $('#term').change(function() {
            $('#filter').submit();
        });        

    });
</script>