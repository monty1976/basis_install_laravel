@extends('layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Meddel fravær</div>
                {!! Form::open(array('url' => 'form'), ['class' => 'form-horizontal']) !!}
                {!! Form::text('child_id', $child->id) !!}
                <div class="form-group">
                    {!! Form::label('children', 'Barn') !!}
                    {{$child->first_name}} {{$child->last_name}}
                </div>
                <div class="form-group">
                    {!! Form::label('nurseries', 'Stue') !!}
                    {{$child->nursery->nursery_name}}
                </div>
                <div class="form-group">
                    {!! Form::label('form_types', 'Fravær') !!}
                    {!! Form::select('form_types', $form_types) !!}
                </div>
                <div>
                    <h5><strong>Dato</strong><h5>
                    <div class="form-group">
                        {!! Form::label('date_from', 'Fra', ['class' => 'col-sm-1', 'control-label']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('date_from', '', ['id' => 'datepicker']) !!}
                        </div>
                        {!! Form::label('date_to', 'Til', ['class' => 'col-sm-1', 'control-label']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('date_to', '', ['id' => 'datepicker']) !!}
                        </div>
                    </div>
                </div>
                <div>
                    <h5><strong>Tid</strong><h5>
                    <div class="form-group">
                        {!! Form::label('time_start', 'Start', ['class' => 'col-sm-1', 'control-label']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('time_start', null, ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::label('time_end', 'Slut', ['class' => 'col-sm-1', 'control-label']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('time_end', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Besked') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Fravær', ['class' => 'btn btn-primary form-control']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    kalender
                </div>
            </div>
        </div>
    </div>
</div>
@endsection