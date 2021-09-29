<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('ControlPanel/assets/modules/izitoast/css/iziToast.min.css') }}">
    <style>
        .cursor{
            position: absolute;
            top: 36px;
            left: 0px;
            color: red;
            font-size: 25px;

            z-index:999;background-color:crimson;width:2px;height:365px;color:white;


        }
        .startduration {
            position: absolute;
            color: cornflowerblue;
            top: 15px;
            left: 3px;}

        .totalduration {
            position: absolute;
            color: cornflowerblue;
            top: 15px;
            right: 0px;}

        .pointer
        {    position: absolute;
            top: 5px;
            font-size: 10px;
            left: -12px;
            background-color: crimson;
            color: white;
            z-index: 999;}

        .border-gray{
            border:1px solid #c4c4c4;padding:0px;}

        .divmaingloss
        {position: absolute;
            height: 362px;
            border: 2px solid #FFC107;
            background-color: rgba(255, 193, 7, 0.2);}


        .divfacialexpression
        {    position: absolute;
            height: 35px;
            border: 2px solid #99c0df;
            background-color: rgb(33 150 243 / 0.1);
            top: 4px;
            border-radius: 15px;}
        .divsecondGloss
        {    position: absolute;
            height: 35px;
            border: 2px solid #99c0df;
            background-color: rgb(33 150 243 / 0.1);
            top: 4px;
            border-radius: 15px;}


    </style>

    @yield("head")
    <title>Jumla Annotation Tool for Sign Language</title>
    @livewireStyles
    <script src="{{asset("js/alpine.min.js")}}" defer></script>
</head>
<body>
{{$slot}}
@yield("footer")
@livewireScripts
<script src="{{ asset('ControlPanel/assets/modules/izitoast/js/iziToast.min.js') }}"></script>
<script src="{{asset("js/livewire-turbolinks.js")}}" data-turbolinks-eval="false"></script>
</body>
</html>
