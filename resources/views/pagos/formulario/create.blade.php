@extends('layout')
<div id='content' class='container-fluid'>
    <div class='row'>
        <div class='col-sm-12'>
            <div class='panel panel-success'>
                <div class='panel-heading'>
                    <div class='text-center'>
                        <span class='pull-left'> <a href="{{ url('/') }}" class='btn btn-success btn-xs'><span
                                        class='glyphicon glyphicon-chevron-left'></span> Atrás</a></span>
                      <span class="pull-center">
                         <img class="mb-4 img-responsive" src="{{asset('img/logo.png')}}" alt=""  height="158" width="656">
                      </span>
                    </div>
                </div>

                <div class='panel-body'>
                    {!! Form::open(['route'=>'pagos.formulario.store','method'=>'POST','autocomplete'=>'off','onsubmit'=>'$("#guardar").button("loading");']) !!}
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            <div class='text-center'>
                                <span class='pull-center'><span
                                            class='glyphicon glyphicon-user'></span> Datos del Pagador</span>
                            </div>
                        </div>
                        <div class='panel-body'>
                            <div class='form-horizontal'>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Documento</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('document',null,['class'=>'form-control input-sm','maxlength'=>'12','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Tipo de documento</label>
                                    <div class="col-lg-4">
                                        {!! Form::select('documenttype',$arraydocumenttype,null,['class'=>'form-control input-sm','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Nombres</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('fristname',null,['class'=>'form-control input-sm','maxlength'=>'60','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Apellidos</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('lastname',null,['class'=>'form-control input-sm','maxlength'=>'60','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Nombre de la compañia donde labora o
                                        representa</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('company',null,['class'=>'form-control input-sm','maxlength'=>'60','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Correo electronico</label>
                                    <div class="col-lg-4">
                                        {!! Form::email('email',null,['class'=>'form-control input-sm','maxlength'=>'80','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Direccion postal completa</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('address',null,['class'=>'form-control input-sm','maxlength'=>'100','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Ciudad</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('city',null,['class'=>'form-control input-sm','maxlength'=>'50','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Departamento o provincia</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('province',null,['class'=>'form-control input-sm','maxlength'=>'50','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Codigo Pais</label>
                                    <div class="col-lg-4">
                                        {!! Form::select('country',$arraycountry,null,['class'=>'form-control input-sm','maxlength'=>'2','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Telefono fijo</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('phone',null,['class'=>'form-control input-sm','maxlength'=>'30','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Telefono Celular</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('mobile',null,['class'=>'form-control input-sm','maxlength'=>'30','required']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            <div class='text-center'>
                                <span class='pull-center'><span
                                            class='glyphicon glyphicon-user'></span> Datos del Comprador</span>
                            </div>
                        </div>
                        <div class='panel-body'>
                            <div class='form-horizontal'>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Documento</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('documentbuyer',null,['class'=>'form-control input-sm','maxlength'=>'12','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Tipo de documento</label>
                                    <div class="col-lg-4">
                                        {!! Form::select('documenttypebuyer',$arraydocumenttype,null,['class'=>'form-control input-sm','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Nombres</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('fristnamebuyer',null,['class'=>'form-control input-sm','maxlength'=>'60','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Apellidos</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('lastnamebuyer',null,['class'=>'form-control input-sm','maxlength'=>'60','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Nombre de la compañia donde labora o
                                        representa</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('companybuyer',null,['class'=>'form-control input-sm','maxlength'=>'60','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Correo electronico</label>
                                    <div class="col-lg-4">
                                        {!! Form::email('emailbuyer',null,['class'=>'form-control input-sm','maxlength'=>'80','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Direccion postal completa</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('addressbuyer',null,['class'=>'form-control input-sm','maxlength'=>'100','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Ciudad</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('citybuyer',null,['class'=>'form-control input-sm','maxlength'=>'50','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Departamento o provincia</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('provincebuyer',null,['class'=>'form-control input-sm','maxlength'=>'50','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Codigo Pais</label>
                                    <div class="col-lg-4">
                                        {!! Form::select('countrybuyer',$arraycountry,null,['class'=>'form-control input-sm','maxlength'=>'2','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Telefono fijo</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('phonebuyer',null,['class'=>'form-control input-sm','maxlength'=>'30','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Telefono Celular</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('mobilebuyer',null,['class'=>'form-control input-sm','maxlength'=>'30','required']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            <div class='text-center'>
                                <span class='pull-center'><span
                                            class='glyphicon glyphicon-user'></span> Datos del Receptor</span>
                            </div>
                        </div>
                        <div class='panel-body'>
                            <div class='form-horizontal'>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Documento</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('documentshipping',null,['class'=>'form-control input-sm','maxlength'=>'12','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Tipo de documento</label>
                                    <div class="col-lg-4">
                                        {!! Form::select('documenttypeshipping',$arraydocumenttype,null,['class'=>'form-control input-sm','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Nombres</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('fristnameshipping',null,['class'=>'form-control input-sm','maxlength'=>'60','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Apellidos</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('lastnameshipping',null,['class'=>'form-control input-sm','maxlength'=>'60','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Nombre de la compañia donde labora o
                                        representa</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('companyshipping',null,['class'=>'form-control input-sm','maxlength'=>'60','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Correo electronico</label>
                                    <div class="col-lg-4">
                                        {!! Form::email('emailshipping',null,['class'=>'form-control input-sm','maxlength'=>'80','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Direccion postal completa</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('addressshipping',null,['class'=>'form-control input-sm','maxlength'=>'100','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Ciudad</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('cityshipping',null,['class'=>'form-control input-sm','maxlength'=>'50','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Departamento o provincia</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('provinceshipping',null,['class'=>'form-control input-sm','maxlength'=>'50','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Codigo Pais</label>
                                    <div class="col-lg-4">
                                        {!! Form::select('countryshipping',$arraycountry,null,['class'=>'form-control input-sm','maxlength'=>'2','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Telefono fijo</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('phoneshipping',null,['class'=>'form-control input-sm','maxlength'=>'30','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Telefono Celular</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('mobileshipping',null,['class'=>'form-control input-sm','maxlength'=>'30','required']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            <div class='text-center'>
                                <span class='pull-center'><span
                                            class='glyphicon glyphicon-download-alt'></span> Data PSETransactionRequest</span>
                            </div>
                        </div>
                        <div class='panel-body'>
                            <div class='form-horizontal'>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Banco</label>
                                    <div class="col-lg-4">
                                        {!! Form::select('bankcode',$arraybanks,null,['class'=>'form-control input-sm','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Tipo de interfaz</label>
                                    <div class="col-lg-4">
                                        {!! Form::select('bankinterface',$arraybankinterfaces,null,['class'=>'form-control input-sm','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label">URL de retorno</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('urlreturn',null,['class'=>'form-control input-sm','maxlength'=>'255','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Referencia de pago</label>
                                    <div class="col-lg-4">
                                        {!! Form::text('reference',null,['class'=>'form-control input-sm','maxlength'=>'32','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Descripcion del pago</label>
                                    <div class="col-lg-4">
                                        {!! Form::textarea('description',null,['class'=>'form-control input-sm','maxlength'=>'255','rows'=>3,'required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Idioma para la transaccion</label>
                                    <div class="col-lg-4">
                                        {!! Form::select('language',$arraylanguage,null,['class'=>'form-control input-sm','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Moneda a usuar</label>
                                    <div class="col-lg-4">
                                        {!! Form::select('currency',$arraymonedas,null,['class'=>'form-control input-sm','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Valor total</label>
                                    <div class="col-lg-4">
                                        {!! Form::number('totalamount',null,['class'=>'form-control input-sm','step'=>'0.01','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Discriminación del impuesto</label>
                                    <div class="col-lg-4">
                                        {!! Form::number('taxamount',null,['class'=>'form-control input-sm','step'=>'0.01','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Devolución para el impuesto</label>
                                    <div class="col-lg-4">
                                        {!! Form::number('devolutionbase',null,['class'=>'form-control input-sm','step'=>'0.01','required']) !!}
                                    </div>
                                </div>
                                 <input type="hidden" value="{{$ip}}" name="ipaddress">
                                <input type="hidden" value="{{$navegadorusado}}" name="useragent">
                                <div class="form-group">
                                    <label class="col-lg-4 control-label">Propina u otros valores exentos de impuesto</label>
                                    <div class="col-lg-4">
                                        {!! Form::number('tipamount',null,['class'=>'form-control input-sm','step'=>'0.01','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class='panel panel-default'>
                                        <div class='panel-heading'>
                                            <div class='text-center'>
                                <span class='pull-center'><span
                                            class='glyphicon glyphicon-plus'></span> Datos adicionales de la transacción</span>
                                            </div>
                                        </div>
                                        <div class='panel-body'>
                                            <div class='form-horizontal'>
                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Codigo</label>
                                                    <div class="col-lg-4">
                                                        {!! Form::text('nameadicional',null,['class'=>'form-control input-sm','maxlength'=>'30']) !!}
                                                    </div>
                                                    <label class="col-lg-4 control-label">Valor</label>
                                                    <div class="col-lg-4">
                                                        {!! Form::text('valueadicional',null,['class'=>'form-control input-sm','maxlength'=>'128']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='panel-footer'>
                    <div class='text-center'>
                        {!! Form::button('Guardar',['type'=>'submit','value'=>'Guardar','class'=>'btn btn-primary','data-loading-text'=>'Guardando...','id'=>'guardar']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</div>