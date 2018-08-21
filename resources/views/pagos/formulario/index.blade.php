@extends('layout')

<div id='content' class='container-fluid'>
    <div class='col-md-12'>
        <div class='panel panel-success'>
            <div class='panel-heading'>
                <div class='text-center'>
                        <span class='pull-left'>
                                <a title='Crear otro pago' class='btn btn-success btn-xs'
                                   href="{{ route('pagos.formulario.create') }}" role='button'><span
                                            class='glyphicon glyphicon-plus'></span> Crear otro pago</a>
                                <a title='Inicio' class='btn btn-info btn-xs' href="{{ url('/') }}" role='button'><span
                                            class='glyphicon glyphicon-home'></span> Inicio</a>
                        </span>
                    <span class='pull-center'><span class='glyphicon glyphicon-barcode'></span> Lista de Pagos</span>
                    <span class='pull-right'>{{  $transactionresultfiltrarypaginar->total() }} pagos</span>
                </div>
            </div>
            <div class="table-responsive">
                <table class='table table-striped table-hover'>
                    <thead>
                    <tr>
                        <th>Codigo transacción</th>
                        <th>Documento pagador</th>
                        <th>Nombre pagador</th>
                        <th>Documento comprador</th>
                        <th>Nombre comprador</th>
                        <th>Documento receptor</th>
                        <th>Codigo Entidad</th>
                        <th>Total recaudar</th>
                        <th>Referencia
                        <th>
                        <th>Fecha solicitud
                        <th>
                        <th>Fecha procesamiento
                        <th>
                        <th>Codigo respuesta
                        <th>
                        <th>Estado transacción
                        <th>
                        <th>Respuesta de envio
                        <th>
                        <th>Respuesta entidad
                        <th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($transactionresultfiltrarypaginar as $item)
                            <tr>
                                <td><span class='label label-info'>{{ $item->transactionID}}</span></td>
                                <td>{{ $item->payerdocument}}</td>
                                <td>{{ $item->payerfirstName.' '.$item->payerlastName}}</td>
                                <td>{{ $item->buyerdocument}}</td>
                                <td>{{ $item->buyerfirstName.' '.$item->buyerslastName}}</td>
                                <td>{{ $item->shippingdocument}}</td>
                                <td>{{ $item->bankCode}}</td>
                                <td>{{ $item->totalAmount}}</td>
                                <td>{{ $item->reference}}</td>
                                <td></td>
                                <td>{{ $item->requestDate}}</td>
                                <td></td>
                                <td>{{ $item->bankProcessDate}}</td>
                                <td></td>
                                <td>{{ $item->returnCode}}</td>
                                <td></td>
                                <td>@if($item->transactionState=="OK") <span
                                            class='label label-primary'>Aprobado</span> @endif @if($item->transactionState=="FAILED")
                                        <span class='label label-danger'>Fallido</span> @endif @if($item->transactionState=="PENDING")
                                        <span class='label label-info'>Pendiente</span> @endif @if($item->transactionState=="NOT_AUTHORIZED")
                                        <span class='label label-warning'>Rechazado</span>  @endif </td>
                                <td></td>
                                <td>{{ $item->responseReasonTextresult}}</td>
                                <td></td>
                                <td>{{ $item->responseReasonTextbank}}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class='panel-footer'>{!!$transactionresultfiltrarypaginar->setPath('')->appends(Request::all())->render()!!}
            </div>
        </div>
    </div>
</div>
