<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="col-md-1">
            {!! Html::image('images/A_logo_RGB.svg','Antwerpen logo',['class'=>'nav-logo']) !!}
        </div>
        <div class="col-md-8">
            <a class="navbar-brand center-block" href="#">Project naam</a>
        </div>
        <div class="col-md-3">
            <div class="col-md-4">
                <div class="row">Login</div>
                <div class="row">Registreer</div>
            </div>
            <div class="col-md-8">
                img
            </div>
        </div>
    </div>
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                {{--<li class="active"><a href="#">Home</a></li>--}}
                <li><a href="#about">Projecten</a></li>
                <li><a href="#contact">Kaart</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>