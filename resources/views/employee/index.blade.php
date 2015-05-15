@extends('layout')
@section('content')

<div class="container">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Opret post</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    {!! Form::open(array('url' => 'post'), ['class' => 'form-horizontal']) !!}
                    {!! Form::text('nursery_id', $nursery->id) !!}
                    <div class="form-group">
                        {!! Form::label('date', 'Dato') !!}
                        {!! Form::text('date', '', ['id' => 'datepicker']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('headline', 'Overskrift') !!}
                        {!! Form::text('headline', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content', 'Beskrivelse') !!}
                        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Post', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

