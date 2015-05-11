@extends('layout.masterpage')


<div class="row">
    @section('content')
    <div class="col-md-3">
        @include('layout.partials.sidebar_menu')
    </div>
    <div class="col-md-9">
        <h1>Hvem er vi</h1>
        <div>
            <img src="" alt="" width="100%" height="300px" style="background-color: blue">
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec maximus sapien leo, quis faucibus quam vehicula quis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus a porta nibh. Vestibulum a nunc vel metus venenatis sodales. Integer nibh erat, iaculis id accumsan vel, sagittis venenatis diam. Vestibulum ipsum purus, commodo non viverra malesuada, semper at urna. Morbi venenatis, sem sed lacinia suscipit, tortor lacus placerat metus, non gravida nibh purus in ipsum. Pellentesque interdum elementum sem id placerat. Aliquam ornare ligula sed massa venenatis fringilla. Nam quam eros, lacinia a lacinia eget, placerat sit amet libero.</p>
        <div class="row">
            <div class="col-md-6">
                <img src="" alt="" width="100%" height="125px" style="background-color: red">
            </div>
            <div class="col-md-6">
                <img src="" alt="" width="100%" height="125px" style="background-color: yellowgreen">
            </div> 
        </div>
        <p>Fusce convallis dui ut mi tempor, nec dictum sem bibendum. Donec vitae luctus diam. Proin nunc purus, fringilla a tortor vel, viverra semper dolor. Nunc vitae arcu nec nunc elementum aliquet. Suspendisse maximus eros et nunc pellentesque laoreet. Sed at ex non ligula maximus venenatis. Aenean vitae fringilla urna. In orci elit, rutrum et risus ac, semper venenatis diam.</p>
    </div>
    @endsection
</div>

