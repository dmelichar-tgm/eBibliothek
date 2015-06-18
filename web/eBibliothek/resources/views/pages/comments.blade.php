@extends('app')

@section('content')
<div class="col-md-8 col-md-offset-2">
@foreach ($comments as $comment)
	<h4>{{$comment->text}}</h4>
@endforeach

{!! Form::open(array('url' => 'comments')) !!}

{!! Form::label('text', 'Text:') !!}
{!! Form::textarea('text', null, ['class' => 'form-control']) !!}

{!! Form::submit('Kommentieren', ['class' => 'btn btn-primary form control']) !!}

{!! Form::close() !!}

</div>
@endsection
