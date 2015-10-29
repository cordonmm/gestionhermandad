@extends('site.layouts.default')

@section('content')
    <div class="matter">
        <div class="container">

            @include('notifications')


            <div class="row">
                <div class="col-md-12">
                    <!-- Quick setting -->
                    <div class="widget">
                        <div class="widget-head">
                            <div class="pull-left">Rellene sus datos</div>
                            <div class="widget-icons pull-right">
                                <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-content">
                            <div class="padd">

                                <div class="form quick-post">
                                    <!-- Quick setting form (not working)-->
                                    <form class="form-horizontal" role="form" method="post" action="@if (isset($papeleta)){{ URL::to('gestionhdad/papeleta/') }}@endif" autocomplete="on">

                                        <!-- description -->

                                        <!-- Comments
                                        <div class="form-group">
                                          <label class="control-label col-lg-2">Comments</label>
                                          <div class="col-lg-7">
                                              <div class="checkbox">
                                                  <label>
                                                      <input type="checkbox" value="value1" checked="checked"> Something
                                                  </label>
                                              </div>
                                          </div>
                                        </div>   -->
                                        <!-- Registraion -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Opcional</label>
                                            <div class="col-lg-7">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" id="simbolica" name="simbolica" value="true"> Papeleta de sitio simbólica
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Date Format -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Ubicación </label>
                                            <div class="col-lg-7" >

                                                @foreach(Paso::orderby('id','asc')->get() as $paso)
                                                    <div class="radio">
                                                        @if($papeleta->id != 0)

                                                            @if($paso->id == $papeleta->paso->id)
                                                                <label><input type="radio" name="paso" checked="checked"  value="{{$paso->id}}"> {{$paso->descripcion}}</label>
                                                            @else
                                                                <label><input type="radio" name="paso"  value="{{$paso->id}}"> {{$paso->descripcion}}</label>
                                                            @endif
                                                        @else
                                                            <label><input type="radio" name="paso"  value="{{$paso->id}}"> {{$paso->descripcion}}</label>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <!-- User role Format -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Portando </label>
                                            <div class="col-lg-4">

                                                <select class="form-control" id="tipos_papeleta" name="tipos_papeleta">
                                                    @foreach(DB::table('tipos_papeleta')->orderby('id','asc')->get() as $tipo)
                                                        @if($papeleta->id != 0)
                                                            @if($tipo->id == $papeleta->tipo->id)
                                                                <option selected="selected" value='{{$tipo->id}}'>{{$tipo->descripcion}}</option>
                                                            @else
                                                                <option value='{{$tipo->id}}'>{{$tipo->descripcion}}</option>
                                                            @endif
                                                        @else
                                                            <option value='{{$tipo->id}}'>{{$tipo->descripcion}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <!-- Name -->
                                        <div class="form-group">
                                            <label class="control-label col-md-2" for="donativo"> Donativo</i></label>
                                            <div class="col-md-4">
                                                <input min="0" type="number" class="form-control" id="donativo" name="donativo" placeholder="Introduzca un donativo si lo desea">
                                            </div>
                                            <label for="sitename">NOTA: si introduce un donativo tendrá que realizar el pago de éste.</label>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="observaciones"> Observaciones</label>
                                            <div class="col-lg-5">
                                                <textarea class="form-control" rows="5" id="observaciones" name="observaciones">{{ Input::old('observaciones', isset($papeleta->observaciones) ? HTML::decode($papeleta->observaciones) : null) }}</textarea>
                                            </div>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="form-group">
                                            <!-- Buttons -->
                                            <div class="col-lg-9 col-lg-offset-2">
                                                <button type="submit" class="btn btn-info">Reservar</button>
                                                <button type="reset" class="btn btn-default">Limpiar</button>
                                                @if(isset($papeleta))
                                                    <button onclick="window.location.href='{{URL::to('gestionhdad/'.$papeleta->id.'/cancelar-papeleta/')}}'" type="button" class="btn btn-sm btn-danger">Eliminar</button>

                                                @endif
                                            </div>
                                        </div>
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
            <div class="row">
                <!-- google maps widget -->
                <div class="col-md-12">
                    <div class="widget">
                        <div class="widget-head">
                            <div class="pull-left">Recogida de papeletas de sitio</div>
                            <div class="widget-icons pull-right">
                                <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-content">
                            <div class="gmap">
                                <iframe height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1584.9450346522983!2d-6.000125661376941!3d37.392431948145806!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6d6a5b107206cfe5!2sHermandad+del+Museo!5e0!3m2!1ses!2ses!4v1443178591003" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                            </div>
                            <div class="widget-foot">
                                <!-- Footer goes here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
