@extends('site.layouts.default')

@section('content')
    <div class="matter">
        <div class="container">

            <div class="row">

                <div class="col-md-12">


                    <div class="widget wgreen">

                        <div class="widget-head">
                            <div class="pull-left">Mis datos</div>
                            <div class="widget-icons pull-right">
                                <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                                <!--<a href="#" class="wclose"><i class="fa fa-times"></i></a>-->
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="widget-content">
                            <div class="padd">

                                <br />
                                <!-- Form starts.  -->
                                <form class="form-horizontal" role="form">

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nombre</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" placeholder="Nombre">
                                        </div>
                                        <label class="col-lg-2 control-label">Apellidos</label>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" placeholder="Apellidos">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">DNI</label>
                                        <div class="col-lg-3">
                                            <input readonly="" type="text" class="form-control" placeholder="DNI">
                                        </div>
                                        <label class="col-lg-2 control-label">Fecha de nacimiento</label>
                                        <div class="col-lg-5">
                                            <input type="date" class="form-control" placeholder="dd/mm/aaaa">
                                        </div>

                                    </div>

                                    <div class="form-group">



                                        <label class="col-lg-2 control-label">Número de cuenta</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" placeholder="CCC">
                                        </div>

                                        <label class="col-lg-2 control-label">Teléfono fijo</label>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" placeholder="Teléfono fijo">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Teléfono móvil</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" placeholder="Teléfono móvil">
                                        </div>
                                        <label class="col-lg-2 control-label">Correo electrónico</label>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" placeholder="Correo electrónico">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Dirección</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" placeholder="Dirección">
                                        </div>
                                        <label class="col-lg-2 control-label">Población</label>
                                        <div class="col-lg-5">
                                            <input type="text" class="form-control" placeholder="Población">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Código postal</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" placeholder="Código postal">
                                        </div>
                                        <label class="col-lg-2 control-label">Provincia</label>
                                        <div class="col-lg-5">
                                            <select class="form-control">
                                                <option>Sevilla</option>
                                                <option>Málaga</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Usuario</label>
                                        <div class="col-lg-3">
                                            <input readonly="" type="text" class="form-control" placeholder="Usuario">
                                        </div>
                                        <label class="col-lg-2 control-label">Contraseña</label>
                                        <div class="col-lg-5">
                                            <input type="password" class="form-control" placeholder="Contraseña">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Observaciones</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" rows="5" placeholder="Observaciones"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-6">
                                            <button type="button" class="btn btn-sm btn-danger">Modificar</button>
                                        </div>
                                    </div>

                                    <!--<div class="form-group">
                                      <label class="col-lg-2 control-label">Checkbox</label>
                                      <div class="col-lg-5">
                                        <label class="checkbox-inline">
                                          <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
                                        </label>
                                        <label class="checkbox-inline">
                                          <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
                                        </label>
                                        <label class="checkbox-inline">
                                          <input type="checkbox" id="inlineCheckbox3" value="option3"> 3
                                        </label>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">Radio Box</label>
                                      <div class="col-lg-5">
                                        <div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                            Option one
                                          </label>
                                        </div>
                                        <div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                            Option two
                                          </label>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">Select Box</label>
                                      <div class="col-lg-2">
                                        <select class="form-control">
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">Select Box</label>
                                      <div class="col-lg-2">
                                        <select multiple class="form-control">
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-lg-2 control-label">CLEditor</label>
                                      <div class="col-lg-6">
                                        <textarea class="cleditor" name="input"></textarea>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-6">
                                        <button type="button" class="btn btn-sm btn-default">Default</button>
                                        <button type="button" class="btn btn-sm btn-primary">Primary</button>
                                        <button type="button" class="btn btn-sm btn-success">Success</button>
                                        <button type="button" class="btn btn-sm btn-info">Info</button>
                                        <button type="button" class="btn btn-sm btn-warning">Warning</button>
                                        <button type="button" class="btn btn-sm btn-danger">Danger</button>
                                      </div>
                                    </div>-->
                                </form>
                            </div>
                        </div>
                        <div class="widget-foot">
                            <!-- Footer goes here -->
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
@stop
