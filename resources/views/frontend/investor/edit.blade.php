@extends('frontend.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>ПОДАЧА ЗАЯВКИ НА ІНВЕСТУВАННЯ. Ідентифікаційний номер:{{$investor->id}}</h2>
</div>
<hr/>
<div class="container">

    @if(Session::has('message'))
    <p class="alert alert-info col-md-offset-2 col-md-10">{{ Session::get('message') }}</p>
    @endif

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" enctype="multipart/form-data" class="form-horizontal">
        {{ csrf_field() }}
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('investor_name')?'has-error':'' }}">
                    <label class="control-label" for="Назва інвестування">Назва інвестування:</label>
                    <input type="text" value="{{ $investor->investor_name }}" name="investor_name" class="form-control" id="text">
                    @if($errors->has('investor_name'))
                    <span class="control-label"> {{ $errors->first('investor_name') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('short_name')?'has-error':'' }}">
                    <label class="control-label" for="short_name">Коротка Назва інвестування:</label>
                    <input type="text" value="{{ $investor->short_name }}" name="short_name" class="form-control" id="text">
                    @if($errors->has('short_name'))
                    <span class="control-label"> {{ $errors->first('short_name') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('investor_contacts')?'has-error':'' }}">
                    <label class="control-label" for="Contacts">Контактні дані:</label>
                    <textarea rows="6" type="text" name="investor_contacts" class="form-control" id="text">{{ $investor->investor_contacts }}</textarea>
                    @if($errors->has('investor_contacts'))
                    <span class="control-label"> {{ $errors->first('investor_contacts') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('stage_project')?'has-error':'' }}">
                    <label class="control-label" for="email">Етап проекту:</label>
                    <input type="text" value="{{ $investor->stage_project }}" name="stage_project" class="form-control" id="text">
                    @if($errors->has('stage_project'))
                    <span class="control-label"> {{ $errors->first('stage_project') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="Галузь">Галузь:</label>

                    <select class="form-control" name="economic_activities_id">
                        @foreach($economicActivities as $i => $item)
                        <option value="{{ $i }}" {{ ( $investor->economic_activities_id == $i ? "selected":"") }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('region')?'has-error':'' }}">
                    <label class="control-label" for="region">Регіон інвестування:</label>
                    <input type="text" value="{{ $investor->region }}" name="region" class="form-control" id="text">
                    @if($errors->has('region'))
                    <span class="control-label"> {{ $errors->first('region') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('investor_cost')?'has-error':'' }}">
                    <label class="control-label" for="investor_cost">Сума, яку готові інвестувати:</label>
                    <input type="number" value="{{ $investor->investor_cost }}" name="investor_cost" class="form-control" id="text">
                    @if($errors->has('investor_cost'))
                    <span class="control-label"> {{ $errors->first('investor_cost') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('duration_project')?'has-error':'' }}">
                    <label class="control-label" for="email">Період реалізації інвестиційного проекту:</label>
                    <input type="text" value="{{ $investor->duration_project }}" name="duration_project" class="form-control" id="text">
                    @if($errors->has('duration_project'))
                    <span class="control-label"> {{ $errors->first('duration_project') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('term_refund')?'has-error':'' }}">
                    <label class="control-label" for="email">Термін повернення вкладених коштів:</label>
                    <input type="text" value="{{ $investor->term_refund }}" name="term_refund" class="form-control" id="text">
                    @if($errors->has('term_refund'))
                    <span class="control-label"> {{ $errors->first('term_refund') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('plan_rent')?'has-error':'' }}">
                    <label class="control-label" for="email">Планована рентабельність проекту:</label>
                    <input type="text" value="{{ $investor->plan_rent }}" name="plan_rent" class="form-control" id="text">
                    @if($errors->has('plan_rent'))
                    <span class="control-label"> {{ $errors->first('plan_rent') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('other')?'has-error':'' }}">
                    <label class="control-label" for="email">Інше:</label>

                    <textarea type="text" name="other" class="form-control" id="text" rows="6">{{ $investor->other }}</textarea>

                    @if($errors->has('other'))
                    <span class="control-label"> {{ $errors->first('other') }}</span>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="email">Логотип:</label>


                        <input type="file" name="logo_img_file" class="form-control" id="file_up">

                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <input value="Зберегти" type="submit" class="btn btn-success">
                </div>
            </div>
        </div>
    </form>
</div>
@stop
@section('js')
<script type="text/javascript">
    //    $('select').select2({
    //        placeholder: "Выберите регион",
    //        allowClear: true,
    //        width: 'resolve'
    //    });
    $("#file_up").fileinput({
    'showUpload'          : false,
            'previewFileType'     : 'image',
            'allowedFileTypes'    : ['image'],
            'initialPreview'      : [
                    @if (!empty($investor->logo)) '{{url('/investor/image/'.$investor->logo)}}' @endif,
            ],
            'initialPreviewAsData': true,
    });</script>
<script src="{{ asset('tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script>
            tinymce.init({
            selector: "textarea",
                    plugins: [
                            "advlist autolink lists link image charmap print preview anchor",
                            "searchreplace visualblocks code fullscreen",
                            "insertdatetime media table contextmenu paste"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
</script>
@stop
