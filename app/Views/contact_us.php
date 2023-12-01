<div class="container">
    <div class="page-header">
        <h1>Kapcsolat <small>...ha kérdésed van...</small></h1>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <form class="form-horizontal" method="post" action="/orders" >
            <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-4">Név</label>
                    <div class="col-xs-12 col-sm-8">
                        <input type="text" class="form-control" name="name" />
                    </div>
                </div>                
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-4">E-mail cím</label>
                    <div class="col-xs-12 col-sm-8">
                        <input type="text" class="form-control" name="email" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-4">Tárgy</label>
                    <div class="col-xs-12 col-sm-8">
                        <input type="text" class="form-control" name="subject" />
                    </div>
                </div>                 
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-4">Üzenet</label>
                    <div class="col-xs-12 col-sm-8">
                        <textarea class="form-control" name="message" rows="10"></textarea>
                    </div>
                </div>              
                <div class="form-group">
                    <div class="col-xs-12 text-center">
                        <button class="btn btn-default" id="cancel">Mégsem</button>
                        <button type="submit" class="btn btn-primary" name="send">Küldés</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {

        $('#cancel').click(function() {
            window.location.href='http://pizza.martonrobert.hu';
            return false;
        });
    });
</script>