<!DOCTYPE html>
<html>
<head>
    <title>We zijn zo terug.</title>

    <style>
        @font-face {
            font-family: 'AntwerpenTallTall';
            src: url('../fonts/antwerpen/tall/AntwerpenTall-Tall.eot'); /* IE9 Compat Modes */
            src: url('../fonts/antwerpen/tall/AntwerpenTall-Tall.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */ url('../fonts/antwerpen/tall/AntwerpenTall-Tall.woff') format('woff'), /* Modern Browsers */ url('../fonts/antwerpen/tall/AntwerpenTall-Tall.ttf') format('truetype'), /* Safari, Android, iOS */ url('../fonts/antwerpen/tall/AntwerpenTall-Tall.svg#AntwerpenTall-Tall') format('svg'); /* Legacy iOS */
            font-style: normal;
            font-weight: normal;
            text-rendering: optimizeLegibility;
        }

        @font-face {
            font-family: SunAntwerpen500;
            src: url('../fonts/antwerpen/sun/500/SunAntwerpen_500.eot');
            src: url('../fonts/antwerpen/sun/500/SunAntwerpen_500.woff') format('woff'),
            url("../fonts/antwerpen/sun/500/SunAntwerpen_500.svg#SunAntwerpen_500") format("svg");
        }

        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #000000;
            display: table;
            font-weight: 100;
            font-family: SunAntwerpen500, "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .container {
            width: 1170px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 15px;
            padding-right: 15px;
        }

        h1 {
            font-family: AntwerpenTallTall;
        }

        .navbar {
            position: relative;
            height: 50px;
        }

        .navbar-inverse {
            background-color: #cf0039;
            border-color: #9c002b;
        }

        .navbar-fixed-top {
            border-width: 0 0 1px;
            top: 0;
        }

        .navbar::after {
            clear: both;
        }

        .navbar::before, .navbar::after {
            content: " ";
            display: table;
        }

        .nav-logo {

            height: 50px;
            vertical-align: middle;
        }

        .text-center {
            text-align: center;
        }

        .navbar-brand {
            float: left;
            font-size: 18px;
            height: 50px;
            line-height: 20px;
            padding: 0px 10px 0 0;
            color: #fff;
        }

        .navbar-header::before, .navbar-header::after {
            content: " ";
            display: table;
        }

        footer.inverse {
            background-color: #081f2c;
            color: #e1e1e1;
        }

        footer.pull-right {
            margin-right: -15px;
            line-height: 50px;
        }

        .foot-logo {
            height: 50px;
            /*margin-left: -15px;*/
            padding-right: 5px;
            float: left;
        }

        footer.inverse {
            background-color: #081F2C;
            color: #e1e1e1;
        }

        .pull-right {
            /*margin-right: -15px;*/
            line-height: 50px;
            float: right;
        }
        .break{
            line-height:50px;
            float: left;
        }
        

        @media (max-width: 992px) {

            span.break, .pull-right {
                padding-right: 10px;
            }

        }

        @media (max-width: 750px) {

            span.break, .pull-right {
                display: block;
                padding-top: 5px;;
                float: left !important;
            }

            .foot-logo {
                float: left;
                padding-right: 5px;
            }

            .pull-right {
                line-height: 1.428571429;
                padding-left: 5px;
            }

        }

        /* Sticky footer styles
        -------------------------------------------------- */
        html {
            position: relative;
            min-height: 100%;
        }

        body {
            /* Margin bottom by footer height */
            margin-bottom: 70px;
            position: static;
            height: auto;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            min-height: 50px;
        }

        /* Sticky footer styles
        -------------------------------------------------- */
        html {
            position: relative;
            min-height: 100%;
        }

        body {
            /* Margin bottom by footer height */
            margin-bottom: 70px;
            position: static;
            height: auto;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            min-height: 50px;
        }
    </style>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <div class="navbar-brand">
                <span>{!! Html::image('images/A_logo_200_RGB_NEG.svg','Antwerpen logo',['class'=>'nav-logo']) !!}</span> {{trans('common.sitenaam')}}
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="text-center">
        <h1>We zijn zo terug!</h1>
        <p>Momenteel voeren we een paar wijzigingen uit.</p>
        <p>Kom over minuten nog eens terug.</p>
    </div>
</div>
@include('layout.footer')
</body>
</html>
