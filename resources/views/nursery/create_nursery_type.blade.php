@extends('layout.employee.dashboard_employee')
@section('content')

<div class="container">
    <div class="panel-group" id=" accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                       Opret Stue type
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    {!! Form::open(array('url' => 'nursery/create_type'), ['class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('nursery_type_name', 'Type navn') !!}
                        {!! Form::text('nursery_type_name', null, ['placeholder' => 'Type navn', 'class' => 'form-control']) !!}
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
