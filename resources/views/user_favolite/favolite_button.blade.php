@if (Auth::user()->is_favolite($micropost->id))
  {!! Form::open(['route' => ['user.unfavo', $micropost->id], 'method' => 'delete']) !!}
    {!! Form::submit('Unfavolite', ['class' => "btn btn-danger btn-xs"]) !!}
  {!! Form::close() !!}
@else
  {!! Form::open(['route' => ['user.favo', $micropost->id]]) !!}
    {!! Form::submit('Favolite', ['class' => "btn btn-primary btn-xs"]) !!}
  {!! Form::close() !!}
@endif