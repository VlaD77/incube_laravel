@extends('frontend.layouts.template')

@section('content')

    <div class="container">
        <div class="page-title text-center">
            <h2>Усы подані матеріали</h2>
        </div>
        <hr/>
        <div class="text-center">
            <p>На даній сторінці Ви маєте змогу продивитися активніі подані питання(проблеми), проекти, заявки на інвестування, резюме та пропозицій роботи.</p>
             
        </div>
        <hr/>
        <div class="page-title text-center">
            <h2>Подані матеріали</h2>
        </div>
        <div class="select-tabs">
            <ul class="nav nav-pills nav-stacked text-center" id="myTab">
                <li class="active"><a href="#problem" data-toggle="tab">Проблеми</a></li>
                <li><a href="#invest" data-toggle="tab">Заявки на інвестування</a></li>
                <li><a href="#project" data-toggle="tab">Проекти</a></li>
                <li><a href="#employer" data-toggle="tab">Пропозиції роботи</a></li>
                <li><a href="#executor" data-toggle="tab">Резюме</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div id="problem" class="tab-pane fade in active">
                @forelse($allMaterials as $item)
                    <div class="carusel" id="problems">
                        @include('frontend.partials.carusel_item',['item'=>$item])
                    </div>
                @empty
                    <div class="row text-center">
                        <h3>Проблеми відсутні</h3>
                    </div>
                @endforelse
            </div>

            <div id="invest" class="tab-pane fade">
                
            </div>
            
            <div id="project" class="tab-pane fade">
                
            </div>
            
            <div id="employer" class="tab-pane fade">
                
            </div>
            
            <div id="executor" class="tab-pane fade">
               @for($i=0;$i<10;$i++)
               <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="carusel-block">
                            <div class="carusel-block-content">
                                <a class="img-responsive" href="#">
                                    <img src="{{ asset('img/250n300.png') }}" alt="polo shirt img" class="carusel-block-img">
                                </a>
                                <h4 class="carusel-block-content-title">
                                    Обновление экосистемы города запорожье и запорожской области
                                </h4>
                                <div class="carusel-block-content-description">
                                    <p class="">Текст на 3 строки Текст на 3 строки Текст на 3 строки Текст на 3 строки Текст на 3 строки Текст на 3 строки Текст на 3 строки Текст на 3 строки Текст на 3 строки Текст на 3 строки Текст на 3 строки Текст на 3 строки</p> 
                                </div>
                                <a class="show-btn hvr-rectangle-out" href="#">Продивитись</a>
                            </div>
                            <span class="carusel-id-badge" href="#">{{ $i }}</span>
                            <span class="carusel-price-badge" href="#">{{ $i+1344  }}$</span>
                        </div>  
               </div>   
                @endfor
                
                
            </div>
        </div>
   

    </div>
@stop


