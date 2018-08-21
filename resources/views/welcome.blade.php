@extends('layout')
        <!DOCTYPE html>
<html>
<head>
    <title>Laravel Pagos PSE</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Laravel 5 <br> PlacetoPay</div>
        <a href="{{route('pagos.formulario.create')}}" class="btn btn-info btn-lg btn-block" role="button">Pagar con PlacetoPay</a>
        <a @if($counttransaction==0) href="#" disabled="true"  @else href="{{route('pagos.formulario.index')}}" @endif class="btn btn-success btn-lg btn-block"  role="button" >Lista pagos PlacetoPay</a>
    </div>
</div>
</body>
</html>
