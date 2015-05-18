@extends('layout.employee.dashboard_employee')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div>
                <h1>Activity</h1>
            </div>
            <hr>
            {!! Form::open() !!}
            <div class="form-group">
                {!! Form::label('date', 'Dato') !!}
<!--                        {!! Form::text('date', null, ['class' => 'form-control']) !!}-->
                {!! Form::text('date', '', ['id' => 'datepicker']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('headline', 'Overskrift') !!}
                {!! Form::text('headline', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('content', 'Indhold:') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Ny aktivitet', ['class' => 'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection