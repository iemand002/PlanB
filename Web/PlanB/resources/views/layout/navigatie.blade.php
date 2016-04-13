<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        {!! Html::image('images/A_logo_RGB.svg','Antwerpen logo',['class'=>'nav-logo']) !!}

        <a class="" href="#">Inspraak in Antwerpen</a>

        <div class="pull-right hidden-xs">
            <div class="col-sm-7">
                <ul class="nav nav-pills nav-stacked text-right">
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Registreer</a></li>
                </ul>
            </div>
            <div class="col-sm-5">
                <i class="fa fa-user fa-5x"></i>
            </div>
        </div>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="true" aria-controls="navbar">
            <span class="sr-only">Toggle menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="container">
        <nav id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                {{--<li class="active"><a href="#">Home</a></li>--}}
                <li><a href="{{route('projecten.index')}}" @if($active='projecten')class="active"@endif>Projecten</a>
                </li>
                <li><a href="#contact">Kaart</a></li>
                <li role="separator" class="divider visible-xs-block"></li>
                <li><a href="#" class="visible-xs-block">Login</a></li>
                <li><a href="#" class="visible-xs-block">Registreer</a></li>
            </ul>
        </nav><!--/.nav-collapse -->
    </div>
</nav>