@extends('layout.employee.dashboard_employee')
@section('content')

<div class="container">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Sovetid</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    {!! Form::open(array('url' => 'sleep'), ['class' => 'form-horizontal']) !!}
                    
                    <div class="form-group">
                        {!! Form::label('fullname', 'Vælg barn') !!}
                        <div class="dropdown">
                            {!! Form::select('fullname', $children) !!}     
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('date', 'Dato') !!}
                        {!! Form::text('date', '', ['id' => 'datepicker', 'class' => 'bootDatePicker']) !!}
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::label('start', 'Tid start') !!}
                                {!! Form::text('start', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('end', 'Tid til') !!}
                                {!! Form::text('end', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Register sovetid', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection



