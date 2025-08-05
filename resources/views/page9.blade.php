@extends('layout')

@section('css')
	<link rel="stylesheet" href="css/datepicker.css">
@endsection

@section('content')
<div id="contentPage4">

	<div class="progressContent">
		<h1 class="position">Wie können wir Sie erreichen?</h1>
	</div>
	<div class="flexContent">
		<div class="leftBigger">
			<form action="/page9" method="POST">
				@csrf


					<h4 class="mb_1-5">Ihre Kontaktdaten</h4>
					<div class="form-item wsInputCont mb_2">
						<label for="ws_kontaktAnrede">Anrede</label>
						<select id="ws_kontaktAnrede" name="kontaktAnrede">
							<option value="none">- Auswählen -</option>
							<option value="Herr" @if ($randstad->page9kontaktAnrede === 'Herr' || old('kontaktAnrede') === 'Herr') selected @endif>Herr</option>
							<option value="Frau" @if ($randstad->page9kontaktAnrede === 'Frau' || old('kontaktAnrede') === 'Frau') selected @endif>Frau</option>
						</select>

					</div>
					<div class="form-item wsInputCont mb_2">
						<input type="text" id="ws_kontaktVorname" name="kontaktVorname" placeholder="Vorname" value="{{ old('kontaktVorname', $randstad->page9vorname)}}" />

					</div>
					<div class="form-item wsInputCont mb_2">
						<input class="@if ($errors->has('kontaktNachname')) inputerror @endif" type="text" id="ws_kontaktNachname" name="kontaktNachname" placeholder="Nachname" value="{{ old('kontaktNachname', $randstad->page9nachname)}}" />
						@if ($errors->has('kontaktNachname'))
						<p class="errorMessage">Bitte insert Nachname</p>
					@endif
					</div>
					<div class="form-item wsInputCont mb_5">
						<input class="@if ($errors->has('kontaktFirma')) inputerror @endif" type="text" id="ws_kontaktFirma" name="kontaktFirma" placeholder="Firma" value="{{ old('kontaktFirma', $randstad->page9firma)}}" />
						@if ($errors->has('kontaktFirma'))
						<p class="errorMessage">Bitte insert Firmenname</p>
					@endif
					</div>

					<div class="form-item mb_2 wsInputCont">
						<label for="ws_kontaktLand">Land</label>
						<select id="ws_kontaktLand" name="kontaktLand">
							<option value="Deutschland" @if ($randstad->page9kontaktLand === 'Deutschland' || old('kontaktLand') === 'Deutschland') selected @endif>Deutschland</option>
							<option value="Großbritannien" @if ($randstad->page9kontaktLand === 'Großbritannien' || old('kontaktLand') === 'Großbritannien') selected @endif>Großbritannien</option>
							<option value="Frankreich" @if ($randstad->page9kontaktLand === 'Frankreich' || old('kontaktLand') === 'Frankreich') selected @endif>Frankreich</option>
							<option value="Schweiz" @if ($randstad->page9kontaktLand === 'Schweiz' || old('kontaktLand') === 'Schweiz') selected @endif>Schweiz</option>
							<option value="Polen" @if ($randstad->page9kontaktLand === 'Polen' || old('kontaktLand') === 'Polen') selected @endif>Polen</option>
							<option value="Ungarn" @if ($randstad->page9kontaktLand === 'Ungarn' || old('kontaktLand') === 'Ungarn') selected @endif>Ungarn</option>
						</select>

					</div>

					<div class="form-item wsInputCont mb_2">
						<input class="@if ($errors->has('kontaktPLZ')) inputerror @endif" type="text" id="ws_kontaktPLZ" name="kontaktPLZ" placeholder="Postleitzahl" value="{{ old('kontaktPLZ', $randstad->page9postleitzahl)}}" />
						@if ($errors->has('kontaktPLZ'))
						<p class="errorMessage">Bitte insert Postleitzahl</p>
					@endif
					</div>

					<div class="form-item wsInputCont mb_2">
						<input class="@if ($errors->has('kontaktEMail')) inputerror @endif" type="email" id="ws_kontaktEMail" name="kontaktEMail" placeholder="E-Mail Adresse" value="{{ old('kontaktEMail', $randstad->page9email)}}">
						@if ($errors->has('kontaktEMail'))
					<p class="errorMessage">Please insert valied email adresse</p>
				@endif
					</div>

					<div class="form-item wsInputCont mb_8">
						<input type="text" id="ws_kontaktTel" name="kontaktTel" placeholder="Telefon" value="{{ old('kontaktTel', $randstad->page9telefon)}}" />
					</div>

					{{-- <h3 class="color2">Zu welcher Branche gehört Ihr Unternehmen?</h3>
					<div class="form-item wsInputCont mb_5">
						<label for="ws_kontaktBranche">Branchen</label>
						<select id="ws_kontaktBranche" name="kontaktBranche">
							<option value="Kaufmaennisches Personal" @if ($randstad->page9branche === 'Kaufmaennisches Personal' || old('kontaktBranche') === 'Kaufmaennisches Personal') selected @endif>Kaufmännisches Personal</option>
							<option value="Medical"  @if ($randstad->page9branche === 'Medical' || old('kontaktBranche') === 'Medical') selected @endif>Medical</option>
							<option value="Call Center"  @if ($randstad->page9branche === 'Call Center' || old('kontaktBranche') === 'Call Center') selected @endif>Call Center</option>
							<option value="IT Engineering"  @if ($randstad->page9branche === 'IT Engineering' || old('kontaktBranche') === 'IT Engineering') selected @endif>IT/Engineering</option>
							<option value="Facharbeiter"  @if ($randstad->page9branche === 'Facharbeiter' || old('kontaktBranche') === 'Facharbeiter') selected @endif>Facharbeiter</option>
							<option value="Gastro"  @if ($randstad->page9branche === 'Gastro' || old('kontaktBranche') === 'Gastro') selected @endif>Gastro</option>
							<option value="Helfer"  @if ($randstad->page9branche === 'Helfer' || old('kontaktBranche') === 'Helfer') selected @endif>Helfer</option>
						  </select>
					</div>

					<h5>Ihre Branche ist nicht dabei? Bitte hier eintragen</h5>
					<div class="form-item wsInputCont mb_5">
						<input type="text" id="ws_kontaktBrancheWeitere" name="kontaktBrancheWeitere" placeholder="weitere..." value="{{ old('kontaktBrancheWeitere', $randstad->page9weitereBranche)}}" />
					</div> --}}

					<div class="form-item tick mb_7">
						<label class="checkbox labelSmallText flexCheckbox wsInputCont">
							<input type="checkbox" id="ws_zustimmungDaten" name="stimme" value="stimme" {{$randstad->page9stimme === 'stimme' ? 'checked' : ''}} />
							<span>Ich stimme der Datenspeicherung zum Zweck der Personalfrage durch Randstad zu.</span>
						</label>
						</div>
						@if ($errors->has('stimme'))
					<p class="errorMessage">You must agree with our conditions</p>
				@endif

				<div class="tooltip">
					<div class="tooltip-img-wrapper">
						<div class="tooltip-picture">
							<img src="img/pic_woman_agent.jpg" alt="">
						</div>
					</div>
					<div class="tooltipText">
						<p>Sobald Ihre Anfrage bei uns eingegangen ist machen wir uns an die Arbeit. Wie sind Sie für meine Kollegen am besten erreichbar?</p>
					</div>
				</div>


				<div class="buttons mt_8">
					@if ($randstad->page1radio === 'Festanstellung')
					<a href="{{ route('page8') }}" class="rd-button-invert wsStoreButton hideButton"><i class="fas fa-chevron-left"></i> &nbsp; zurück </a>
					@else
					<a href="{{ route('page7') }}" class="rd-button-invert wsStoreButton hideButton"><i class="fas fa-chevron-left"></i> &nbsp; zurück </a>
					@endif
					<button class="rd-button wsStoreButton hideButton" type="submit">weiter &nbsp; <i class="fas fa-chevron-right"></i></button>

				</div>
			</form>

				<div class="block">
					<div class="block__wrapper wrapper">
						<div class="block__content">
							<div class="indicator-percentage">
								<div class="indicator-percentage__background">
									<div class="indicator-percentage__amount" style="width: 509px"></div>
								</div>
								<span class="indicator-percentage__percentage">80%</span>
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