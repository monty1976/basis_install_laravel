<p>Kære børneriget</p>

@if($data['form_type_id'] === 1)
    <p>{{$data['child_name']}} er syg</p>
@else
    <p>{{$data['child_name']}} holder ferie</p>
@endif

<p>Besked: {{$data['description']}}</p>
<p>Fra: {{$data['date_from']}}</p>
<p>Til: {{$data['date_to']}}</p>

<p>Med venlig hilsen</p>

<p>{{$data['user_name']}}</p>
