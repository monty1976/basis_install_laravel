@extends('layout.parent.dashboard_parent')
@section('content')

<div class="container">
    <div class="panel-group" id=" accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Rediger kontaktinfo
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
            {!! Form::open(array('url' => 'parent/profile'), ['class' => 'form-horizontal']) !!}
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
                {!! Form::label('adress', 'Adresse') !!}
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::text('street', $adress->street, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::text('number', $adress->number, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('postal_code', 'Postnr og By') !!}
                <div class="dropdown">
                    {!! Form::select('postal_code', $postal_codes, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('phone', 'Telefon') !!}
                {!! Form::text('phone', $phone->number, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::text('password', null, ['class' => 'form-control']) !!}
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                {!! Form::label('is_public', 'Ønsker du din adresse kan ses af andre forældre i Børneriget') !!}
                </div>
                <div class="col-md-6 checkbox">
                    {!! Form::checkbox('name', 'value', null) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('image', 'Billede') !!}
                {!! Form::text('image', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Rediger', ['class' => 'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}
</div>

@endsection
