@extends('layout')
@section('content')

<div class="container">
	<div class="row">
	    @foreach($children as $child)
		<div class="col-md-3 col-md-offset-1">
		<a href="{{ url('child', array('child_id' => $child->id))  }}"><img style="background-color: #{{$child->nursery->nursery_color}}" src="data:image/jpg;base64,{{$child->image->image_base_64}}" class="img-responsive img-thumbnail"  height="180" alt="Cinque Terre" ></a>
		</div>
		@endforeach
	</div>
	<div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Opslags Tavle</div>
                    <div class="panel-body">opslag</div>
                </div>
            </div>
    	</div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Kalender</div>
                <div class="panel-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
            <p id="modalContent"></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
  </div>
</div>


@endsection