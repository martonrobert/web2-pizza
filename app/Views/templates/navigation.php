<nav class="navbar navbar-default navbar-fixed-top" id="navigationBar">
    <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">PizzaJo</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <?php if (isset($auth) and $auth->isLoggedIn) : ?>
        <ul class="nav navbar-nav">
            <li><a href="/">Pizzák</a></li>
            <li><a href="/orders">Rendelések</a></li>
            <li><a href="/arfolyamok">Árfolyamok</a></li>
        </ul>
        <?php endif; ?>
        
        <?php if (!isset($auth) or $auth->isLoggedIn == false) : ?>
        <ul class="nav navbar-nav">
            <li><a href="/arfolyamok">Árfolyamok</a></li>
            <li><a href="/login">Bejelentkezés</a></li>
        </ul>
        <?php endif; ?>    
        <?php if (isset($auth) and $auth->isLoggedIn) : ?> 
        <ul class="nav navbar-nav navbar-right">
            <li><p class="navbar-text"><?php echo $auth->userName . ' (' . $auth->email . ')' ?></p></li>
            <li><a href="/logout">Kilépés</a></li>
        </ul>
        <?php endif; ?>
        <?php if (!isset($auth) or $auth->isLoggedIn == false) : ?> 
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/about">Rólunk</a></li>
            <li><a href="/contact-us">Kapcsolat</a></li>
        </ul>
        <?php endif; ?>
    </div>
    </div>
</nav>