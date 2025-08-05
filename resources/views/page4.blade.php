@extends('layout')

@section('css')
	<link rel="stylesheet" href="/css/flatpickr.min.css">
@endsection

@section('content')
<div id="contentPage4">

	<div class="progressContent">
		<h1 class="position">Wann soll der Mitarbeiter beginnen?</h1>

	</div>
	<div class="flexContent">
		<div class="leftBigger">
			<form action="/page7" method="POST">
				@csrf
				@if ($errors->has('datumStart'))
				<p class="errorMessage">Please choose start datum</p>
			@endif
				<div class="flexRowPage4 mb_7">
					<div class="form-item">
						<label for="ws_datumStart">Starttermin </label>
						<span class="pickDate">
							<input class="datePicker" class="@if ($errors->has('datumStart')) inputerror @endif" type="date" id="ws_datumStart" name="datumStart" placeholder="JJJJ-MM-TT" value="{{ old('datumStart', $randstad->page7datumStart)}}" />
						</span>


					</div>
					<div class="form-item wsInputCont">
						<label for="ws_datumBis">bis <span class="optional">optional</span></label>
						<span class="pickDate">
							<input class="datePicker" type="date" id="ws_datumBis" name="datumEnd" placeholder="JJJJ-MM-TT" value="{{ old('datumEnd', $randstad->page7datumEnd)}}" />
						</span>
					</div>

				</div>


			<div class="tooltip">
				<div class="tooltip-img-wrapper">
					<div class="tooltip-picture">
						<img src="img/pic_woman_agent.jpg" alt="">
					</div>
				</div>
				<div class="tooltipText">
					<p>Bitte teilen Sie uns das Startdatum mit, wann der/die Mitarbeiter beginnen sollen. Wenn es ein zeitlich begrenzter Einsatz ist, geben Sie gerne auch das Datum an bis wann der Einsatz geplant ist.</p>
				</div>
			</div>


				<div class="buttons mt_8">
					<a href="{{ route('page3') }}" class="rd-button-invert wsStoreButton hideButton"><i class="fas fa-chevron-left"></i> &nbsp; zurück </a>
					<button class="rd-button wsStoreButton hideButton" type="submit">weiter &nbsp; <i class="fas fa-chevron-right"></i></button>
					<a href="page-zusammenfassung.html" class="rd-button wsStoreButton editButton">zurück zur Zusammenfassung &nbsp; <i class="fas fa-chevron-right"></i></a>

				</div>
			</form>

				<div class="block">
					<div class="block__wrapper wrapper">
						<div class="block__content">
							<div class="indicator-percentage">
								<div class="indicator-percentage__background">
									<div class="indicator-percentage__amount" style="width: 191px"></div>
								</div>
								<span class="indicator-percentage__percentage">30%</span>
							</div>
						</div>
					</div>
				</div>

		</div>
	</div>
</div>

@endsection

@section('javascript')
<script src="js/flatpickr.min.js"></script>
<script src="js/de.js"></script>

<script>
	flatpickr(".datePicker", {
		"locale": "de"
	});
</script>
	
@endsection