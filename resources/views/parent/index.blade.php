@extends('layout.parent.dashboard_parent')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @foreach($children as $child)
        <div class="col-md-2">
        <div class="img_container">
            <a href="{{ url('child', array('child_id' => $child->id))  }}"><img style="background-color: #{{$child->nursery->nursery_color}}" src="{{$child->image->image_base_64}}" class="img-responsive img-thumbnail"  alt="" ></a>
            <p class="overlay">TEst</p>
          </div>
        </div>
        @endforeach
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
            <h4 class="modal-title" id="myModalLabel"></h4>
        </div>
        <div class="modal-body">
            <p id="modalContent"></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Luk</button>
        </div>
    </div>
  </div>
</div>


@endsection

@section('scripts')
<script src="{{ asset('/js/our.js') }}" type="text/javascript"></script>
@endsection
