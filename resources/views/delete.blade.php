@extends('layout')

@section('content')
<div id="contentPage4">
	<form action="/resume/delete" method="POST">
		@csrf
		<h1>Are you sure to empty the database?</h1>
		<button class="rd-button wsStoreButton hideButton" type="submit">Empty DB  &nbsp; <i class="fas fa-chevron-right"></i></button>
	</form>
</div>


@endsection