<!DOCTYPE html>
<html lang="nl">
<head>
    <meta content="utf-8" http-equiv="encoding">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Stad Antwerpen">
    {{--<link rel="icon" href="../../favicon.ico">--}}

    <title>@yield('pagetitle') - {{trans('common.sitenaam')}}</title>

{!! Html::style('css/app.css') !!}
{!! Html::style('css/kristof.css') !!}
@if($loggedInUser&&$loggedInUser->admin)
    {!! Html::style('css/admin.css') !!}
@endif
@yield('css')

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{{--<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">--}}

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

@include('layout.navigatie')
<div class="container" id="content">
    @include('partials.success')
    @include('errors.list')

    @yield('content')

</div><!-- /.container -->

@include('layout.footer')


<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
{!! Html::script('js/all.js') !!}
@if($loggedInUser&&$loggedInUser->admin)
    {!! Html::script('js/admin.js') !!}
@endif
<script src="http://maps.googleapis.com/maps/api/js?libraries=places"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{{--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>--}}
{!! Html::script('js/kristof.js') !!}
@yield('js')
</body>
</html>
