@extends('layouts.app')

@section('content')

<h1 class="text-center" style="font-size: 7em; margin-top: 1em; color: rgb(179, 179, 179)">404</h1>
<p class="text-center" style="font-size: 1.5em;  color: rgb(179, 179, 179)">
	{{ $exception->getMessage() }}
</p>

@endsection