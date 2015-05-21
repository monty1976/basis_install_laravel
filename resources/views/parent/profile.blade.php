@extends('layout.parent.dashboard_parent')
@section('content')

<div class="container">
    <div class="panel-group" id=" accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Rediger kontaktinformation
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    {!! Form::open(array('url' => 'parent/profile', 'files' => true), ['class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('email', 'E-mail/Brugernavn') !!}
                        {!! Form::text('email', $user->email, ['placeholder' => 'email', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('first_name', 'Fornavn') !!}
                        {!! Form::text('first_name', $user->first_name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('last_name', 'Efternavn') !!}
                        {!! Form::text('last_name', $user->last_name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::label('adress', 'Adresse') !!}
                                {!! Form::text('street', $adress->street, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('number', 'Nummer') !!}
                                {!! Form::text('number', $adress->number, ['class' => 'form-control']) !!}
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
                        {!! Form::text('phone', $phone->number, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Nuværende password') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('new_password', 'Nyt password') !!}
                        {!! Form::password('new_password', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <strong>Ønsker du din adresse kan ses af andre forældre i Børneriget</strong><br>
                        {!! Form::checkbox('is_public', $user->is_public, $checkboxClass) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Billede') !!}
                        {!! Form::file('image', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Rediger', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
