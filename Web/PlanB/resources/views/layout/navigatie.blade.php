<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="true" aria-controls="navbar">
                <span class="sr-only">Toggle menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


            <a class="navbar-brand"
               href="{{route('home')}}"><span>{!! Html::image('images/A_logo_200_RGB_NEG.svg','Antwerpen logo',['class'=>'nav-logo']) !!}</span> {{trans('common.sitenaam')}}
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                {{--<li class="active"><a href="#">Home</a></li>--}}
                <li @if(isset($active)&&$active=='projecten')class="active"@endif><a
                            href="{{route('projecten.index')}}">Projecten</a>
                </li>
                <li><a href="#contact">Kaart</a></li>
                <li role="separator" class="divider visible-xs-block"></li>
                @if(!Auth::check())
                    <li><a href="{{route('auth.login')}}" class="visible-xs-block">Login</a></li>
                    <li><a href="{{route('auth.register')}}" class="visible-xs-block">Registreer</a></li>
                @else
                    <li><a href="{{route('auth.logout')}}" class="visible-xs-block">Uitloggen</a></li>
                    <li role="separator" class="divider visible-xs-block"></li>
                    @if(Auth::user()->admin)
                        <li class="dropdown@if(isset($active)&&$active=='admin') active@endif">
                            <a href="{{route('admin')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Adminpanel <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('admin.user.index')}}">Gebruikers</a></li>
                            </ul>
                        </li>
                        <li @if(isset($active)&&$active=='admin')class="active"@endif><a
                                    href="{{route('admin')}}">Adminpanel</a></li>
                        <li @if(isset($active)&&$active=='filemanager')class="active"@endif><a
                                    href="{{route('upload.index')}}">Filemanager</a>
                        </li>
                    @endif
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right text-right">
                @if(!Auth::check())
                    <li><a href="{{route('auth.login')}}">Login</a></li>
                    <li><a href="{{route('auth.register')}}">Registreer</a></li>
                @else
                    <li><a href="{{route('auth.logout')}}">Uitloggen</a></li>
                @endif
                <li>
                    <i class="fa fa-user fa-3x"></i></li>
            </ul>
        </div>
    </div>
</nav>