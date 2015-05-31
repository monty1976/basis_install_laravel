@extends('layout.employee.dashboard_employee')
@section('content')

<div class="container">
    <div class="panel-group" id=" accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                       Opret Stue
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    {!! Form::open(array('url' => 'nursery/create'), ['class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('nursery_name', 'Type navn') !!}
                        {!! Form::text('nursery_name', null, ['placeholder' => 'Navn', 'class' => 'form-control']) !!}
                    </div>

                      <div class="form-group">
                        {!! Form::label('nursery_type', 'Stue Type') !!}
                        <div class="dropdown">
                            {!! Form::select('nursery_type', $nursery_types) !!}
                        </div>
                    </div>

                     <div class="form-group">
                    {!! Form::label('nursery_color', 'Farve kode') !!}
                    {!! Form::text('nursery_color', null, ['class' => 'form-control nurseryColor']) !!}
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
