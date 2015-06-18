@extends('app')

@section('content')
<div class="col-md-8 col-md-offset-2">
{!! Form::open(array('url' => 'books')) !!}

@foreach ($books as $book)
<article>
	<h2>{{$book->name}} <?php echo Form::radio('delete' , $book->id) ?></h2>
	
</article>
@endforeach

{!! Form::submit('Loeschen', ['class' => 'btn btn-primary form control']) !!}

{!! Form::close() !!}

</div>
@endsection
