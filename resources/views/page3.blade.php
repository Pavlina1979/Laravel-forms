@extends('layout')

@section('css')
	<link rel="stylesheet" href="css/datepicker.css">
@endsection

@section('content')
<div id="contentPage4">

	<div class="progressContent">
		<h1 class="position">
			@if ($randstad->page3mitarbeitern > 1)
			Wo sollen die Mitarbeiter arbeiten?
			@else
			Wo soll der Mitarbeiter arbeiten?
			@endif
			</h1>

	</div>
	<div class="flexContent">
		<div class="leftBigger">
			<form action="/page8" method="POST">
				@csrf
				@if ($errors->has('ort'))
					<p class="errorMessage">Please insert the address</p>
				@endif
			<div class="form-item wsInputCont mb_3-5">
				<select id="ws_kontaktLand" name="land">
					<option value="Deutschland" @if ($randstad->page8land === 'Deutschland') selected @endif>Deutschland</option>
					<option value="Großbritannien" @if ($randstad->page8land === 'Großbritannien') selected @endif>Großbritannien</option>
					<option value="Frankreich" @if ($randstad->page8land === 'Frankreich') selected @endif>Frankreich</option>
					<option value="Schweiz" @if ($randstad->page8land === 'Schweiz') selected @endif>Schweiz</option>
					<option value="Polen">Polen</option>
					<option value="Ungarn">Ungarn</option>
				</select>

			</div>

					<div class="form-item wsInputCont mb_7">

						<input class="@if ($errors->has('ort')) inputerror @endif" type="text" id="ws_inlandOrt" name="ort" placeholder="PLZ oder Ort eingeben/auswählen" value="{{ old('ort', $randstad->page8ort)}}" />

					</div>



				<div class="tooltip">
					<div class="tooltip-img-wrapper">
						<div class="tooltip-picture">
							<img src="img/pic_woman_agent.jpg" alt="">
						</div>
					</div>
					<div class="tooltipText">
						<p>Mit dieser Angabe helfen Sie uns dabei, passende Kandidaten in Ihrer Nähe zu finden.</p>
					</div>
				</div>


				<div class="buttons mt_8">
					<a href="{{ route('page2') }}" class="rd-button-invert wsStoreButton hideButton"><i class="fas fa-chevron-left"></i> &nbsp; zurück </a>
					<button class="rd-button wsStoreButton hideButton" type="submit">weiter &nbsp; <i class="fas fa-chevron-right"></i></button>

				</div>
			</form>

				<div class="block">
					<div class="block__wrapper wrapper">
						<div class="block__content">
							<div class="indicator-percentage">
								<div class="indicator-percentage__background">
									<div class="indicator-percentage__amount" style="width: 127px"></div>
								</div>
								<span class="indicator-percentage__percentage">20%</span>
							</div>
						</div>
					</div>
				</div>

		</div>
	</div>
</div>

@endsection

@section('javascript')
<script src="js/awesomplete.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
	var input = document.getElementById("ws_inlandOrt");
	var awesomplete = new Awesomplete(input,{minChars: 1});

	awesomplete.list = ["32049, Herford, Kreis, Herford, Nordrhein-Westfalen","32120, Hiddenhausen, Kreis Herford, Nordrhein-Westfalen","37671, Höxter, Kreis Höxter, Nordrhein-Westfalen","32825, Blomberg/Lippe, Kreis Lippe, Nordrhein-Westfalen","48727 Billerbeck, Kreis Coesfeld, Nordrhein-Westfalen","51674 Wiehl, Oberbergischer Kreis, Nordrhein-Westfalen","59969 Hallenberg, Hochsauerlandkreis, Nordrhein-Westfalen"];

	$('#ws_kontaktLand').on('change', function() {
	  if (this.value === 'Deutschland') {
		awesomplete.list = ["32049, Herford, Kreis, Herford, Nordrhein-Westfalen","32120, Hiddenhausen, Kreis Herford, Nordrhein-Westfalen","37671, Höxter, Kreis Höxter, Nordrhein-Westfalen","32825, Blomberg/Lippe, Kreis Lippe, Nordrhein-Westfalen","48727 Billerbeck, Kreis Coesfeld, Nordrhein-Westfalen","51674 Wiehl, Oberbergischer Kreis, Nordrhein-Westfalen","59969 Hallenberg, Hochsauerlandkreis, Nordrhein-Westfalen"];
	  }
	  if (this.value === 'Großbritannien') {
		awesomplete.list = ["109  Guild Street, LONDON","89  Crown Street, LONDON","47  Nith Street, GLASGOW","99  Nith Street, GLASGOW","121  Park Row, EDINBURGH","56  Nith Street, GLASGOW","74  Iffley Road, BRISTOL"];
	  }
	  if (this.value === 'Frankreich') {
		awesomplete.list = ["91  place de Miremont, VILLEPARISIS, Île-de-France","55  Place de la Madeleine, PARIS, Île-de-France","103  rue de la République, LYON, Rhône-Alpes","55  rue des Chaligny, NICE, Provence-Alpes-Côte d","127  rue Beauvau, MARSEILLE, Provence-Alpes-Côte d","37  cours Jean Jaures, BORDEAUX, Aquitaine"];
	  }
	  if (this.value === 'schweiz') {
		autocomplete(land, orteSchweiz);
	  }

});
</script>

@endsection