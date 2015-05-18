@extends('layout.masterpage')

<div class="row">
    @section('content')
    <div class="col-md-3">
        @include('layout.partials.sidebar_menu')
    </div>
    <div class="col-md-9">
        <h1>Kontakt og Åbningstider</h1>
        <div>
            Billede af institutionen
            <img src="" alt="" width="100%" height="300px" style="background-color: blue">
        </div>
        <div>
            <h4>Børneriget</h4>
            <p>Vordingborggade 25<br>
                2100 Kbh Ø<br>
                T: 50 80 58 00<br>
                M: boerneriget@boerneriget.dk</p>
        </div>
        <div>
            <p><strong>Leder</strong><br>
                xxx xxxxxx</p>          
            <p><strong>Souschef</strong><br>
                Louise xxxxxx</p>
        </div>
        <div class="marginTop30">
            <h4>Åbningstider</h4>
            <p>Mandag - Fredag: 06.30 - 17.30</p>
        </div>
        <div class="marginTop30">
            <h4>Kontakt os</h4>
            {!! Form::open() !!}
            <div class="form-group">
                {!! Form::label('name', 'Navn') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('adress', 'Adresse') !!}
                {!! Form::text('adress', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('postal', 'Postnr') !!}
                {!! Form::text('postal', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('city', 'By') !!}
                {!! Form::text('city', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('mail', 'E-mail') !!}
                {!! Form::text('mail', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('phone', 'Telefon') !!}
                {!! Form::text('city', null, ['class' => 'form-control']) !!}
            </div>
            <div>
                {!! Form::label('heard', 'Hvor har du hørt om os') !!}
                {!! Form::select('heard', ['Anbefalet af andre','Internet','Københavns Kommunes hjemmeside', 'Lokalavisen', 'Andet'], 'null', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('message', 'Besked') !!}
                {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Send', ['class' => 'btn btn-default']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="marginTop30">
            <h4>Find os her</h4>
            <div>
                Link til Google maps
                <img src="" alt="" width="100%" height="300px" style="background-color: lightskyblue">
            </div>
        </div>
    </div>
    @endsection
</div>



