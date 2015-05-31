@extends('layout.employee.dashboard_employee')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div>
                <h1>Aktivitet</h1>
            </div>
            <hr>
            {!! Form::open(array('url' => 'activity'), ['class' => 'form-horizontal']) !!}
            {!! Form::hidden('nursery_id', $nursery->id) !!}
            <div class="form-group">
                {!! Form::label('headline', 'Overskrift') !!}
                {!! Form::text('headline', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('date', 'Dato') !!}
                {!! Form::text('date', '', ['id' => 'datepicker',  'class' => 'bootDatePicker']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('content', 'Indhold:') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Billede') !!}
                {!! Form::file('image', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Ny aktivitet', ['class' => 'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection