@extends('site.layouts.default')

@section('content')
    <div class="matter">
        <div class="container">
            @include('notifications')
            <div class="row">

                <div class="col-md-12">
                    <!-- List starts -->
                    <ul class="today-datas">
                        <!-- List #1 -->
                        <li>
                            <!-- Graph -->
                            <div><span id="todayspark1" class="spark"><canvas width="77" height="30" style="display: inline-block; width: 77px; height: 30px; vertical-align: top;"></canvas></span></div>
                            <!-- Text -->
                            <div class="datas-text">12 cuotas pendientes</div>
                        </li>

                        <li>
                            <div><span id="todayspark3" class="spark"><canvas width="77" height="30" style="display: inline-block; width: 77px; height: 30px; vertical-align: top;"></canvas></span></div>
                            <div class="datas-text">79 insignias reservadas</div>
                        </li>

                        <li>
                            <div><span id="todayspark2" class="spark"><canvas width="77" height="30" style="display: inline-block; width: 77px; height: 30px; vertical-align: top;"></canvas></span></div>
                            <div class="datas-text">793 papeletas</div>
                        </li>

                        <li>
                            <div><span id="todayspark4" class="spark"><canvas width="77" height="30" style="display: inline-block; width: 77px; height: 30px; vertical-align: top;"></canvas></span></div>
                            <div class="datas-text">12 donativos realizados</div>
                        </li>
                    </ul>
                </div>

                <div class="col-md-12">
                    <!-- Widget -->
                    <div class="widget">
                        <!-- Widget title -->
                        <div class="widget-head">
                            <div class="pull-left">Úlimas noticias publicadas</div>
                            <div class="widget-icons pull-right">
                                <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-content">
                            <!-- Widget content -->
                            <div class="padd">

                                <ul class="recent">

                                    {{--*/ $noticias = Noticia::orderBy('created_at','desc')->paginate(2); /*--}}

                                    @foreach($noticias as $noti)

                                        <li>

                                            <div class="recent-content">
                                                <div class="recent-meta">Publicada el {{date("d-m-Y - h:i",strtotime($noti->created_at))}}</div>
                                                <h5>{{$noti->titulo}}</h5>
                                                <div align="justify">{{$noti->contenido}}</div>

                                                <div class="clearfix"></div>
                                            </div>
                                        </li>
                                    @endforeach




                                </ul>

                            </div>
                            <!-- Widget footer -->
                            <div class="widget-foot">


                                <ul class="pagination-list">
                                    {{$noticias->links()}}
                                </ul>

                                <div class="clearfix"></div>

                            </div>
                        </div>

                    </div>

                </div>


                <div class="col-md-12">
                    <div class="widget">
                        <div class="widget-head">
                            <div class="pull-left">Publicar noticia interna</div>
                            <div class="widget-icons pull-right">
                                <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-content">
                            <div class="padd">

                                <div class="form quick-post">
                                    <!-- Edit profile form (not working)-->
                                    <form class="form-horizontal" method="post" action="{{ URL::to('gestionhdad/noticias/crear') }}" autocomplete="off">
                                        <!-- CSRF Token -->
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <!-- ./ csrf token -->

                                        <!-- Title -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Título</label>
                                            <div class="col-lg-8 {{ $errors->has('titulo') ? 'error' : '' }}">
                                                <input name="titulo" type="text" class="form-control" id="title" value="{{ Input::old('titulo', isset($noticia) ? $noticia->titulo : null) }}">
                                                {{ $errors->first('titulo', '<span class="help-block">:message</span>') }}
                                            </div>
                                        </div>
                                        <!-- Content -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="content">Contenido</label>
                                            <div class="col-lg-8 {{ $errors->has('contenido') ? 'error' : '' }}">
                                                <textarea class="form-control" rows="5" id="content" name="contenido">{{ Input::old('contenido', isset($noticia) ? $noticia->contenido : null) }}</textarea>
                                                {{ $errors->first('contenido', '<span class="help-block">:message</span>') }}
                                            </div>
                                        </div>


                                        <!-- Buttons -->
                                        <div class="form-group">
                                            <!-- Buttons -->
                                            <div class="col-lg-offset-2 col-lg-6">
                                                <button type="submit" class="btn btn-sm btn-success">Publicar</button>
                                                <button type="reset" class="btn btn-sm btn-default">Limpiar</button>
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

            </div>

        </div>
    </div>
@stop
