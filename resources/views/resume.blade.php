@extends('layout')

@section('css')
	<link rel="stylesheet" href="/css/flatpickr.min.css">
@endsection

@section('content')
<div id="contentPage4">

	<div class="progressContent">
		<h1 class="position">Bitte überprüfen Sie Ihre Angaben</h1>

	</div>
	<div class="flexContent">
		<div class="leftBigger">
			@if (session()->has('message'))
			<p class="errorMessage">{{ session()->get('message') }}</p>
				@endif
				@if ($errors->has('datumStart'))
				<p class="errorMessage">Please choose start datum</p>
			@endif
			@if ($errors->has('qualification'))
					<p class="errorMessage">Please choose your position</p>
				@endif


				<div class="summaryContent"><h3 class="sumaryHeader">Für welche Stelle/Position suchen Sie Mitarbeiter?</h3>
					@if ($errors->has('qualification'))
					<p class="errorMessage">Please choose your position</p>
				@endif
					<div class="editIcon">{{ $randstad->page2position }} <a class="icon"></a>


							<div class="form-item resume-hidden mt_2">
								<form action="/page2" method="POST">
									@csrf
								<input type="text" id="qualification" class="awesomplete" value="{{$randstad->page2position ?? ''}}" name="qualification" placeholder="Qualifikation eingeben und/oder auswählen">

								<button class="mt_2 rd-button wsStoreButton hideButton" type="submit">save </button>
								</form>
							</div>



					</div></div>

					<div class="summaryContent"><h3 class="sumaryHeader">Wie viele Mitarbeiter suchen Sie für diese Stelle?</h3>
						<div class="editIcon">{{$randstad->page3mitarbeitern}}<a class="icon"></a>
								<div class="form-item resume-hidden mt_2">
									<form action="/page3" method="POST">
										@csrf
									<span class="number-wrapper wsInputCont">
										<span id="up"><i class="fas fa-chevron-up"></i></span>
										<span id="down"><i class="fas fa-chevron-down"></i></span>
									<input onkeypress='validate(event)' value="{{$randstad->page3mitarbeitern ?? 1}}" type="number" id="number" min="1" value="1" name="number"/>
									</span>

									<button class="mt_2 rd-button wsStoreButton hideButton" type="submit">save </button>
									</form>
								</div>

						</div>
					</div>


					<div class="summaryContent">
						<h3 class="sumaryHeader">Wo soll der Mitarbeiter arbeiten?</h3>
						<div class="editIcon">Der Arbeitsort befindet sich außerhalb von Deutschland: <br />
						Land: <span class="summaryColor">{{ $randstad->page8land }}</span>. Ort: <span class="summaryColor">{{ $randstad->page8ort }}</span>. <a class="icon"></a>

						<div class="resume-hidden mt_2">
							<form action="/page8" method="POST">
								@csrf
							<div class="form-item wsInputCont mb_2">
								<select id="ws_kontaktLand" name="land">
									<option value="Deutschland" @if ($randstad->page8land === 'Deutschland') selected @endif>Deutschland</option>
							<option value="Großbritannien" @if ($randstad->page8land === 'Großbritannien') selected @endif>Großbritannien</option>
							<option value="Frankreich" @if ($randstad->page8land === 'Frankreich') selected @endif>Frankreich</option>
							<option value="Schweiz" @if ($randstad->page8land === 'Schweiz') selected @endif>Schweiz</option>
									<option value="Polen">Polen</option>
									<option value="Ungarn">Ungarn</option>
								</select>

							</div>

							<div class="form-item wsInputCont mb_3-5">

								<input class="awesomland" type="text" id="ws_inlandOrt" name="ort" placeholder="PLZ oder Ort eingeben/auswählen" value="{{ old('ort', $randstad->page8ort)}}" />

							</div>

							<button class="mt_2 rd-button wsStoreButton hideButton" type="submit">save </button>
							</form>
						</div>


					</div>
					</div>


					<div class="summaryContent">
						<h3 class="sumaryHeader">Wann soll der Mitarbeiter beginnen?</h3>
						<?php
							function printDate($date) {
								$explodedDate = explode('-', $date);
								$reverseDate = array_reverse($explodedDate);
								return implode('. ', $reverseDate);
							}
						?>
						<div class="editIcon">Starttermin <span class="summaryColor">{{ printDate($randstad->page7datumStart) }}</span>
							@if ($randstad->page7datumEnd)
							bis <span class="summaryColor">{{ printDate($randstad->page7datumEnd) }}</span>
							@endif
							@if ($errors->has('datumStart'))
				<p class="errorMessage">Please choose start datum</p>
			@endif
							<a class="icon"></a>
							<div class="resume-hidden mt_2">
								<form action="/page7" method="POST">
									@csrf
								<div class="form-item">
									<label for="ws_datumStart">Starttermin </label>
									<span class="pickDate">
										<input  class="datePicker" type="date" id="ws_datumStart" name="datumStart" placeholder="JJJJ-MM-TT" value="{{ old('datumStart', $randstad->page7datumStart)}}" />
									</span>


								</div>
								<div class="form-item wsInputCont mt_2">
									<label for="ws_datumBis">bis <span class="optional">optional</span></label>
									<span class="pickDate">
										<input class="datePicker" type="date" id="ws_datumBis" name="datumEnd" placeholder="JJJJ-MM-TT" value="{{ old('datumEnd', $randstad->page7datumEnd)}}" />
									</span>
								</div>

								<button class="mt_2 rd-button wsStoreButton hideButton" type="submit">save </button>
								</form>
							</div>

						</div>
					</div>


			<div class="summaryContent"><h3 class="sumaryHeader">Welche Vertragsart bevorzugen Sie?</h3>
			<div class="editIcon">{{ $randstad->page1radio }}<a class="icon"></a>
				<div class="resume-hidden mt_2">
					<form action="/" method="POST">
						@csrf
					<div class="form-item mb_2">
						<label class="radioContainer wsInputCont labelBigText" for="ws_arbeitnehmer">Arbeitnehmerüberlassung
							<div class="infoIcon infoIconOne"><img  src="img/Information_icon_blue_rgb.svg" alt="">
								<div class="infoBox infoBoxOne">
									<strong>Arbeitnehmerüberlassung</strong> <br />
									Randstad stellt Ihnen Personal für einen begrenzten Zeitraum zur Verfügung (Zeitarbeit).
								</div>
							</div>

							<input type="radio" id="ws_arbeitnehmer" name="radio1" {{$randstad->page1radio === 'Arbeitnehmerüberlassung' ? 'checked' : ''}} value="Arbeitnehmerüberlassung">
							<span class="checkmark"></span>
						</label>
					</div>

					<div class="form-item mb_2">
						<label class="radioContainer wsInputCont labelBigText" for="ws_festanstellung">Festanstellung
							<div class="infoIcon infoIconTwo"><img  src="img/Information_icon_blue_rgb.svg" alt="">
								<div class="infoBox infoBoxTwo">
									<strong>Festanstellung</strong> <br />
									Randstad vermittelt Ihnen Mitarbeiter, die Sie in Ihrem Unternehmen selbst fest anstellen (Personalvermittlung).
								</div>
							</div>
							<input type="radio" id="ws_festanstellung" name="radio1" {{$randstad->page1radio === 'Festanstellung' ? 'checked' : ''}} value="Festanstellung">
							<span class="checkmark"></span>
						</label>
					</div>

					<div class="form-item">
						<label class="radioContainer wsInputCont labelBigText" for="ws_beides">steht noch nicht fest
							<input type="radio" id="ws_beides" name="radio1" {{$randstad->page1radio === 'Arbeitnehmerüberlassung und Festanstellung' ? 'checked' : ''}} value="Arbeitnehmerüberlassung und Festanstellung">
							<span class="checkmark"></span>
						</label>
					</div>
					<button class="mt_2 rd-button wsStoreButton hideButton" type="submit">save </button>
					</form>
				</div>
			</div>

		</div>




			<div class="summaryContent">
				<h3 class="sumaryHeader">Wie ist die geplante Arbeitszeit?</h3>
				<div class="editIcon">
					<p>{{$randstad->page4zeit}}	</p>

					@if ($randstad->page4schicht === 'Schicht')
					<p>Schichtbereitschaft wird vorausgesetzt.</p>
					@endif

					@if ($randstad->page4wochen === 'Wochen')
					<p>Der Mitarbeiter soll auch an Wochenenden arbeiten.</p>
					@endif


					<a class="icon"></a>

					<div class="resume-hidden mt_2">
						<form action="/page4" method="POST">
							@csrf
						<div class="flexRow">
							<div class="form-item mb_2">
								<label class="radioContainer wsInputCont labelBigText" for="ws_vollzeit">Vollzeit
									<input type="radio" id="ws_vollzeit" name="radio2" value="Vollzeit" {{$randstad->page4zeit === 'Vollzeit' ? 'checked' : ''}} />
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="form-item mb_2">
								<label class="radioContainer wsInputCont labelBigText" for="ws_teilzeit">Teilzeit
									<div class="infoIcon infoIconTwo"><img src="img/Information_icon_blue_rgb.svg" alt="">
										<div class="infoBox infoBoxTwo">
											Der Mitarbeiter arbeitet maximal 30h/Woche
										</div>
									</div>
									<input type="radio" id="ws_teilzeit" name="radio2" value="Teilzeit" {{$randstad->page4zeit === 'Teilzeit' ? 'checked' : ''}}  />
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
						<h3 class="optional">Optional:</h3>
						<div class="form-item-inline-block tick mb_1-5">
							<label class="checkbox labelBigText flexCheckbox wsInputCont">
								<div class="infoIcon infoIconTwo"><img src="img/Information_icon_blue_rgb.svg" alt="">
									<div class="infoBox infoBoxTwo">
										Der Mitarbeiter wird wechselnde Arbeitszeiten haben.
									</div>
								</div>
							<input type="checkbox" name="schicht" value="Schicht" {{$randstad->page4schicht === 'Schicht' ? 'checked' : ''}} />
							<span>Schichtbereitschaft wird vorausgesetzt.</span>
							</label>
							</div>

							<div class="form-item tick">
								<label class="checkbox labelBigText flexCheckbox wsInputCont">
									<input type="checkbox" name="wochen" value="Wochen" {{$randstad->page4wochen === 'Wochen' ? 'checked' : ''}}>
									<span>Der Mitarbeiter soll auch an Wochenenden arbeiten.</span>
								</label>
								</div>
						<button class="mt_2 rd-button wsStoreButton hideButton" type="submit">save </button>
						</form>
					</div>

				</div>
			</div>



			<div class="summaryContent">
				<h3 class="sumaryHeader">Welche Anforderungen haben Sie an den/die Mitarbeiter?</h3>
				<div class="editIcon">
					<p>
						{{ $randstad->page5anforderungen }}
					</p>


					@if ($randstad->page5webseite || $randstad->page5fileupload)
					<h4 style="margin-top: 1em">Sie haben bereits ein fertiges Stellenprofil?</h4>
					@if ($randstad->page5fileupload)
					<p>
						Uploaded file: <a target="_blank" href='{{asset("storage/files/$randstad->page5fileupload")}}'>{{ $randstad->page5fileupload }}</a>
					</p>
					@endif
					@if ($randstad->page5webseite)
					<p>
						ausgewählte Website: <a href="http://{{ $randstad->page5webseite }}" target="_blank">{{ $randstad->page5webseite }}</a>
					</p>
					@endif



					@endif

					<a class="icon"></a>

					<div class="resume-hidden mt_2">
						<form action="/page5" method="POST" enctype="multipart/form-data">
							@csrf
						<div class="form-item wsInputCont mb_3-5">
							<label for="anforderungen">Ihre Anforderungen *</label>
							<textarea name="anforderungen" id="anforderungen" cols="30" rows="10">{{ old('anforderungen', $randstad->page5anforderungen)}}</textarea>
							@if ($errors->has('anforderungen'))
							<p class="errorMessage">Please choose Vollzeit or Teilzeit</p>
						@endif
						</div>

					<h3 class="color2">Sie haben bereits ein fertiges Stellenprofil?</h3>

					<div class="buttons mt_2 wsInputCont">
						<label for="file-upload" class="custom-file-upload">
							Datei auswählen &nbsp; <i class="fas fa-download"></i>
						</label>
						<input id="file-upload" name="file" type="file" onchange="processSelectedFiles(this)"/>

						<p class="labelBigText">
							oder
						</p>
						<input id="ws_anforderungenLink" name="webseite" class="webseite-auswahlen" type="text" placeholder="Webseite eingeben" value="{{$randstad->page5webseite ?? ''}}"/>



					</div>
					<p class="mb_5 mt_2 file-hidden summaryContent">Selected file: <span id="soubor"></span></p>
					<button class="mt_2 rd-button wsStoreButton hideButton" type="submit">save </button>
						</form>
				</div>
			</div>
			</div>








		@if ($randstad->page1radio === 'Festanstellung')
				<div class="summaryContent">
				<h3 class="sumaryHeader">Welches Brutto-Jahresgehalt möchten Sie dem Mitarbeiter zahlen?</h3>
			<div class="editIcon">
				@if ($randstad->page6jahresGehalt !== 'null')
				<span class="summaryColor">{{ $randstad->page6jahresGehalt }}</span> &euro; Jahresbruttogehalt
				@else
				<span class="summaryColor">{{ $randstad->page6gehalt }}</span> &euro; pro {{ $randstad->page6stundeMonat }}
				@endif
				@if (session()->has('message'))
				<p class="errorMessage">{{ session()->get('message') }}</p>
					@endif
				 <a class="icon"></a>
				 <div class="resume-hidden mt_2">
					<form action="/page6" method="POST">
						@csrf
					<div class="flexRow">
						<div class="form-item no_bottom_margin wsInputCont">
							<label for="ws_jahresBrutto">Jahresbruttogehalt</label>
							{{-- <input type="text" id="ws_jahresBrutto" class="numFormat1" value="{{ old('jahresBrutto', $randstad->page6jahresGehalt)}}" name="jahresBrutto"  data-validation="required"> --}}

							<select id="ws_jahresBrutto" name="jahresBrutto">
								<option value="null">Bitte auswählen</option>
								<option value="30.000 - 40.000" @if ($randstad->page6jahresGehalt === '30.000 - 40.000') selected @endif>30.000 - 40.000</option>
								<option value="40.000 - 50.000" @if ($randstad->page6jahresGehalt === '40.000 - 50.000') selected @endif>40.000 - 50.000</option>
								<option value="50.000 - 60.000" @if ($randstad->page6jahresGehalt === '50.000 - 60.000') selected @endif>50.000 - 60.000</option>
								<option value="60.000 - 75.000" @if ($randstad->page6jahresGehalt === '60.000 - 75.000') selected @endif>60.000 - 75.000</option>
								<option value="75.000 - 100.000" @if ($randstad->page6jahresGehalt === '75.000 - 100.000') selected @endif>75.000 - 100.000</option>
								<option value="100.000 - 125.000" @if ($randstad->page6jahresGehalt === '100.000 - 125.000') selected @endif>100.000 - 125.000</option>
								<option value="125.000 - 150.000" @if ($randstad->page6jahresGehalt === '125.000 - 150.000') selected @endif>125.000 - 150.000</option>
							</select>

						</div>
					</div>
					<p class="formText">oder</p>
					<div class="flexRow">
						<div class="form-item wsInputCont">

							<input type="text" class="numFormat2" value="{{ old('euro', $randstad->page6gehalt)}}" id="ws_EUR" name="euro" placeholder="EUR" data-validation="required">

						</div>
						<div class="form-item radioButtons flexRow">
							<div class="flexRadio">
								<label class="radioContainer wsInputCont" for="ws_proStunde">pro Stunde
									<input type="radio" id="ws_proStunde" name="gehaltPro" value="Stunde" {{$randstad->page6stundeMonat === 'Stunde' ? 'checked' : ''}}>
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="flexRadio">
								<label class="radioContainer wsInputCont" for="ws_proMonat">pro Monat
									<input type="radio" id="ws_proMonat" name="gehaltPro" value="Monat" {{$randstad->page6stundeMonat === 'Monat' ? 'checked' : ''}}>
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
					</div>

					<button class="mt_2 rd-button wsStoreButton hideButton" type="submit">save </button>

					</form>
			</div>


				</div>




			</div>

			@endif







			<div class="summaryContent">
				<h3 class="sumaryHeader">Wie können wir Sie erreichen?</h3>
				<div class="editIcon">Anrede: {{ $randstad->page9kontaktAnrede }} {{ $randstad->page9vorname }} {{ $randstad->page9nachname }}, {{ $randstad->page9firma }}  <br />
					Land: {{ $randstad->page9kontaktLand }}.  <br />
					Postleizahl: {{ $randstad->page9postleitzahl }}  <br />
					E-Mail Adresse: <a href="mailto:{{ $randstad->page9email }}">{{ $randstad->page9email }}</a> <br>
					Telefon: {{ $randstad->page9telefon }}
					<a class="icon"></a>

					<div class="resume-hidden mt_2">
						<form action="/page9" method="POST">
							@csrf
						<div class="form-item wsInputCont mb_2">
							<label for="ws_kontaktAnrede">Anrede</label>
							<select id="ws_kontaktAnrede" name="kontaktAnrede">
								<option value="none">- Auswählen -</option>
								<option value="Herr" @if ($randstad->page9kontaktAnrede === 'Herr') selected @endif>Herr</option>
								<option value="Frau" @if ($randstad->page9kontaktAnrede === 'Frau') selected @endif>Frau</option>
							</select>

						</div>

						<div class="form-item wsInputCont mb_2">
							<input type="text" id="ws_kontaktVorname" name="kontaktVorname" placeholder="Vorname" value="{{ old('ort', $randstad->page9vorname)}}" />

						</div>
						<div class="form-item wsInputCont mb_2">
							<input type="text" id="ws_kontaktNachname" name="kontaktNachname" placeholder="Nachname *" value="{{ old('ort', $randstad->page9nachname)}}" />

						</div>
						<div class="form-item wsInputCont mb_2">
							<input type="text" id="ws_kontaktFirma" name="kontaktFirma" placeholder="Firma *" value="{{ old('ort', $randstad->page9firma)}}" />

						</div>

						<div class="form-item mb_2 wsInputCont">
							<label for="ws_kontaktLand">Land</label>
							<select id="ws_kontaktLand" name="kontaktLand">
								<option value="Deutschland" @if ($randstad->page9kontaktLand === 'Deutschland') selected @endif>Deutschland</option>
								<option value="Großbritannien" @if ($randstad->page9kontaktLand === 'Großbritannien') selected @endif>Großbritannien</option>
								<option value="Frankreich" @if ($randstad->page9kontaktLand === 'Frankreich') selected @endif>Frankreich</option>
								<option value="Schweiz" @if ($randstad->page9kontaktLand === 'Schweiz') selected @endif>Schweiz</option>
								<option value="Polen" @if ($randstad->page9kontaktLand === 'Polen') selected @endif>Polen</option>
								<option value="Ungarn" @if ($randstad->page9kontaktLand === 'Ungarn') selected @endif>Ungarn</option>
							</select>

						</div>

						<div class="form-item wsInputCont mb_2">
							<input type="text" id="ws_kontaktPLZ" name="kontaktPLZ" placeholder="Postleitzahl *" value="{{ old('ort', $randstad->page9postleitzahl)}}" />
						</div>

						<div class="form-item wsInputCont mb_2">
							<input type="email" id="ws_kontaktEMail" name="kontaktEMail" placeholder="E-Mail Adresse *" value="{{ old('ort', $randstad->page9email)}}">
							@if ($errors->has('kontaktEMail'))
						<p class="errorMessage">Please insert valied email adresse</p>
					@endif
						</div>

						<div class="form-item wsInputCont mb_2">
							<input type="text" id="ws_kontaktTel" name="kontaktTel" placeholder="Telefon" value="{{ old('ort', $randstad->page9telefon)}}" />
						</div>

						<div class="form-item tick">
							<label class="checkbox labelSmallText flexCheckbox wsInputCont">
								<input type="checkbox" id="ws_zustimmungDaten" name="stimme" value="stimme" {{$randstad->page9stimme === 'stimme' ? 'checked' : ''}} />
								<span>Ich stimme der Datenspeicherung zum Zweck der Personalfrage durch Randstad zu. *</span>
							</label>
							</div>
							@if ($errors->has('stimme'))
						<p class="errorMessage">You must agree with our conditions</p>
					@endif

						<button class="mt_2 rd-button wsStoreButton hideButton" type="submit">save </button>
						</form>
					</div>

				</div>
			</div>



			<div class="buttons mt_8">
			<a href="{{ route('page9') }}" class="rd-button-invert wsStoreButton"><i class="fas fa-chevron-left"></i> &nbsp; zurück </a>
				<a href="{{ route('page10') }}" class="rd-button wsStoreButton">Anfrage senden &nbsp; <i class="fas fa-chevron-right"></i></a>

			</div>

			<div class="block">
				<div class="block__wrapper wrapper">
					<div class="block__content">
						<div class="indicator-percentage">
							<div class="indicator-percentage__background">
								<div class="indicator-percentage__amount" style="width: 572px"></div>
							</div>
							<span class="indicator-percentage__percentage">90%</span>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
@endsection

@section('javascript')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="js/flatpickr.min.js"></script>
<script src="js/de.js"></script>
<script src="js/awesomplete.min.js"></script>
<script src="js/cleave.min.js"></script>
	<script>
flatpickr(".datePicker", {
		"locale": "de"
	});


		let icon = document.querySelectorAll('.icon');

			for (let index = 0; index < icon.length; index++) {
				icon[index].addEventListener('click', function(e) {
					e.preventDefault();
					this.nextElementSibling.classList.toggle('resume-show');
				})

			}

			var input = document.getElementById("qualification");
	var awesomplete = new Awesomplete(input, {minChars: 1});
	awesomplete.list = ["Abteilungsleiter Controlling","Automotive","Account Manager","Altenpfleger","Anlagenbau","Bilanzbuchhalter", "Berater","Bestandskontrolle","Buchhalter","Controller","Corporate Controller","Fonds-Controller","FP & A Controller","IT-Controller","Kreditprüfer","Material-Controller","Netzwerk-Controller","Operations Controller","Projektmanager Controlling"];

	let cislo = document.getElementById('number');
	let up = document.getElementById('up');
	let down =document.getElementById('down');
	up.addEventListener('click', function(){
		cislo.value++;
	})
	down.addEventListener('click', function(){
		if(cislo.value > 1) {
			cislo.value--;
		} else {
			cislo.value = 1
		}

	})

/* 	var cleave = new Cleave('.numFormat1', {
delimiter: '․',
numeral: true,
numeralThousandsGroupStyle: 'thousand'
}); */

var cleave = new Cleave('.numFormat2', {
delimiter: '․',
numeral: true,
numeralThousandsGroupStyle: 'thousand'
});

var input = document.getElementById("ws_inlandOrt");
	var awesomland = new Awesomplete(input,{minChars: 1});

	awesomland.list = ["32049, Herford, Kreis, Herford, Nordrhein-Westfalen","32120, Hiddenhausen, Kreis Herford, Nordrhein-Westfalen","37671, Höxter, Kreis Höxter, Nordrhein-Westfalen","32825, Blomberg/Lippe, Kreis Lippe, Nordrhein-Westfalen","48727 Billerbeck, Kreis Coesfeld, Nordrhein-Westfalen","51674 Wiehl, Oberbergischer Kreis, Nordrhein-Westfalen","59969 Hallenberg, Hochsauerlandkreis, Nordrhein-Westfalen"];

	$('#ws_kontaktLand').on('change', function() {
	  if (this.value === 'Deutschland') {
		awesomland.list = ["32049, Herford, Kreis, Herford, Nordrhein-Westfalen","32120, Hiddenhausen, Kreis Herford, Nordrhein-Westfalen","37671, Höxter, Kreis Höxter, Nordrhein-Westfalen","32825, Blomberg/Lippe, Kreis Lippe, Nordrhein-Westfalen","48727 Billerbeck, Kreis Coesfeld, Nordrhein-Westfalen","51674 Wiehl, Oberbergischer Kreis, Nordrhein-Westfalen","59969 Hallenberg, Hochsauerlandkreis, Nordrhein-Westfalen"];
	  }
	  if (this.value === 'Großbritannien') {
		awesomland.list = ["109  Guild Street, LONDON","89  Crown Street, LONDON","47  Nith Street, GLASGOW","99  Nith Street, GLASGOW","121  Park Row, EDINBURGH","56  Nith Street, GLASGOW","74  Iffley Road, BRISTOL"];
	  }
	  if (this.value === 'Frankreich') {
		awesomland.list = ["91  place de Miremont, VILLEPARISIS, Île-de-France","55  Place de la Madeleine, PARIS, Île-de-France","103  rue de la République, LYON, Rhône-Alpes","55  rue des Chaligny, NICE, Provence-Alpes-Côte d","127  rue Beauvau, MARSEILLE, Provence-Alpes-Côte d","37  cours Jean Jaures, BORDEAUX, Aquitaine"];
	  }
	  if (this.value === 'schweiz') {
		autocomplete(land, orteSchweiz);
	  }

});

let fileMessage = document.querySelector('.file-hidden');
let fileName = document.getElementById('soubor');
function processSelectedFiles(fileInput) {
  var files = fileInput.files;
  fileMessage.classList.add('file-show');
  fileName.innerHTML=files[0].name;

}

	</script>

@endsection