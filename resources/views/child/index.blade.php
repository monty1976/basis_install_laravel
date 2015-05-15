@extends('layout')
@section('content')

<div class="container">
    <div class="panel-group" id=" accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Meddel fravær
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
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
        
        
        
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading1">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        Opslagstavle
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div>
                        <h5>Bla bla bla</h5>
                        <p>20-05-2015</p>
                    </div>
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
                <div class="panel-body">
                    <div>
                        <h5>Test test</h5>
                        <p>15-04-2015</p>
                    </div>
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection