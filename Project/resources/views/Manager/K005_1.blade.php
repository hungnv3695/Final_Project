@foreach($room as $data)
    <p>{{$data->room_id}}  {{$data->type_name}}  {{$data->floor}}   {{$data->price}} {{$data->description }}  {{$data->status }} </p>  <a href= {!! url('/K005_1/K005_2/' . $data->room_id) !!} "> Update </a> <br>
@endforeach