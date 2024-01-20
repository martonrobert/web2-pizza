<div class="container">
    <div class="page-header">
        <h1>Bejelentkezés</h1>
    </div>

    <?php if (isset($error) and (string) $error !== '') : ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Bezár"><span aria-hidden="true">&times;</span></button>
        <p><?= $error ?></p>
    </div>
    <?php endif; ?> 

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <form class="form-horizontal" method="post" action="/login" >
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-4">E-mail cím</label>
                    <div class="col-xs-12 col-sm-8">
                        <input type="text" class="form-control" id="uname" name="uname" />
                    </div>
                </div>              
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-4">Jelszó</label>
                    <div class="col-xs-6 col-sm-3">
                        <input type="password" class="form-control" id="pwd" name="pwd" />
                    </div>
                </div>            
                <div class="form-group">
                    <div class="col-xs-12 text-center">
                        <button class="btn btn-default" id="cancel">Mégsem</button>
                        <button type="submit" class="btn btn-primary" name="save">Belépés</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#cancel').click(function() {
            window.location.href='http://pizza.martonrobert.hu/';
            return false;
        });
    });
</script>
