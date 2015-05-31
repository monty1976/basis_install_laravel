@extends('layout.employee.dashboard_employee')
@section('content')

<div class="container">
    <div class="panel-group" id=" accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                       Opret Forældre
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    {!! Form::open(array('url' => 'employee_parent', 'files' => true), ['class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('email', 'E-mail/Brugernavn') !!}
                        {!! Form::text('email', null, ['placeholder' => 'email', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('first_name', 'Fornavn') !!}
                        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('last_name', 'Efternavn') !!}
                        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::label('adress', 'Adresse') !!}
                                {!! Form::text('street', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('number', 'Nummer') !!}
                                {!! Form::text('number', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('postal_code', 'Postnr og By') !!}
                        <div class="dropdown">
                            {!! Form::select('postal_code', $postal_codes) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone', 'Telefon') !!}
                        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>

                     <div class="form-group">
                        {!! Form::label('nursery', 'Stue') !!}
                        <div class="dropdown">
                            {!! Form::select('nursery', $nurseries) !!}
                        </div>
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
