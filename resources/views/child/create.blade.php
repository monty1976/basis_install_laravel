@extends('layout.employee.dashboard_employee')
@section('content')

<div class="container">
    <div class="panel-group" id=" accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Opret Barn
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    {!! Form::open(array('url' => 'create_child', 'files' => true), ['class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('first_name', 'Fornavn') !!}
                        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('last_name', 'Efternavn') !!}
                        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                                {!! Form::label('birthday', 'Fødselsdag') !!}
                                {!! Form::text('birthday', null, ['class' => 'form-control bootDatePicker']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('nursery', 'Stue') !!}
                        <div class="dropdown">
                            {!! Form::select('nursery', $nurseries) !!}
                        </div>
                    </div>
                    <div class="form-group">
                            {!! Form::label('parent', 'Forældre') !!}
                        <div class="dropdown">
                        {!! Form::select('parent', $parents) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('Billede') !!}
                        {!! Form::file('image', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Gem', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
