@extends('frontend.layouts.template')

@section('content')
<div class="container">
    <div class="row page-title text-center">
        <h2>Резюме. Ідентифікаційний номер: {{ $executor->id }}</h2>
    </div>

    <div class="row">
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">

            <br>
            <p class=" text-info">{{ $executor->created_at }} </p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$executor->executor_fname }} {{$executor->executor_sname }} {{$executor->executor_thname }}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="{{ empty($executor->logo)? 'http://placehold.it/250x300' : url('/executor/image/'.$executor->logo) }}" class="img-circle img-responsive"> </div>

                        <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                          <dl>
                            <dt>DEPARTMENT:</dt>
                            <dd>Administrator</dd>
                            <dt>HIRE DATE</dt>
                            <dd>11/12/2013</dd>
                            <dt>DATE OF BIRTH</dt>
                               <dd>11/12/2013</dd>
                            <dt>GENDER</dt>
                            <dd>Male</dd>
                          </dl>
                        </div>-->
                        <div class=" col-md-9 col-lg-9 "> 
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>День народження</td>
                                        <td>{{$executor->date_birth }}</td>
                                    </tr>
                                    <tr>
                                        <td>Досвід роботи</td>
                                        <td>{!!$executor->experience!!}</td>
                                    </tr>

                                    <tr>
                                        <td>Освіта</td>
                                        <td>{!!$executor->education!!}</td>
                                    </tr>
                                    <tr>
                                        <td>Практики та стажування</td>
                                        <td> {!!$executor->internship!!} </td>
                                    </tr>
                                    <tr>
                                        <td>Участь у проектах</td>
                                        <td>{!! $executor->participation_projects!!}</td>
                                    </tr>
                                    <tr>
                                        <td>Здібності та уміння</td>
                                        <td>{!! $executor->description !!}</td>
                                    </tr>
                                    <tr style="display:none">
                                        <td>Контактні дані(адреса, телефон,ел.пошта)</td>
                                        <td>{!!$executor->contacts!!}</td>
                                    </tr>



                                </tbody>
                            </table>

                            <!--<a href="#" class="btn btn-primary">My Sales Performance</a>
                            <a href="#" class="btn btn-primary">Team Sales Performance</a>-->
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <a data-original-title="Надіслати повідомлення" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                    <span class="pull-right">
                        @if(Auth::check() && Auth::user()->id == $executor->author_id)
                        <div class="btn-group pull-lef">
                            <a href="{{route('executor.edit',['executor'=>$executor->id])}}" class="btn-primary btn">Оновити</a>
                        </div>
                        <div class="btn-group pull-lef">
                            <a href="#" class="btn-danger btn">Видалити</a>
                        </div>
                        @endif
                    </span>
                </div>

            </div>
        </div>
    </div>

</div>

@stop
