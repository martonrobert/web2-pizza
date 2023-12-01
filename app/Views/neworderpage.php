<div class="container" id="orderView">
    <div class="page-header">
        <h1>Rendelés</h1>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <form class="form-horizontal" method="post" action="/orders" >
                <input type="hidden" value="<?= $order->id ?>" />
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-4">Pizza</label>
                    <div class="col-xs-12 col-sm-8">
                        <input type="text" class="form-control" name="nev" value="<?= $pizza->nev ?>" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-4">Egységár</label>
                    <div class="col-xs-6 col-sm-3">
                        <p class="form-control-static"><span id="unitPrice"><?= $pizza->ar ?></span><span> Ft</span></p>
                    </div>
                </div>                 
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-4">Rendelt mennyiség</label>
                    <div class="col-xs-6 col-sm-3">
                        <input type="text" class="form-control" id="quantity" name="quantity" value="<?= $order->quantity ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-4">Érték</label>
                    <div class="col-xs-6 col-sm-3">
                        <p class="form-control-static"><span id="sum"><?= $pizza->ar ?></span><span> Ft</span></p>
                    </div>
                </div>                
                <div class="form-group">
                    <div class="col-xs-12 text-center">
                        <button class="btn btn-default" id="cancel">Mégsem</button>
                        <button type="submit" class="btn btn-primary" name="save">Mentés</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#quantity').change(function() {
            $('#sum').text(parseInt($('#unitPrice').text()) * parseInt($('#quantity').val()));
        });

        $('#cancel').click(function() {
            window.location.href='http://pizza.martonrobert.hu/orders';
            return false;
        });
    });
</script>
