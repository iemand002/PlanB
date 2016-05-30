<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('pagetitle') - {{trans('common.sitenaam')}}</title>

    {!! Html::style('/css/app.css') !!}
    @if(Auth::check())
        {!! Html::style('/css/admin.css') !!}
    @endif

</head>
<body id="blank">

@yield('content')

{!! Html::script('/js/all.js') !!}
@if(Auth::check())
    {!! Html::script('/js/admin.js') !!}
@endif
@yield('javascript')
</body>
</html>
