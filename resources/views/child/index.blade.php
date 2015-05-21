@extends('layout.parent.dashboard_parent')
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
                    {!! Form::hidden('child_id', $child->id) !!}
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
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Opslagstavle</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    @foreach($post_with_nursery as $posts)
                        <p><img style="border: none; background-color: #{{$posts->nursery->nursery_color}}" height="12" width="12">&nbsp;&nbsp;{{$posts->nursery->nursery_name}}</p>
                        <p>{{$posts->date}}</p>
                        <h4>{{$posts->headline}}</h4>
                        <p>{{$posts->content}}</p>
                        <hr> 
                    @endforeach
                </div>
            </div>
        </div>
        
        @if(count($sleeps) > 0)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading1">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Sovetider</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    @foreach($sleeps as $sleep)
                        <p>{{$sleep->date}}</p>
                        <p>Fra: {{$sleep->start}} - Til: {{$sleep->end}}</p>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection