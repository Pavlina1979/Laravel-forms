@extends('layout')

@section('content')
<div id="contentPage4">

	<div class="progressContent">
		<h1 class="position">Für welche Stelle/Position suchen Sie Mitarbeiter?</h1>
		<!-- <div class="progressBar">

			<div class="roundGauge" data-percent="10">

				<svg viewBox="0 0 120 120">
					<circle class="roundGaugeBase" r="52" cx="60" cy="60"></circle>
					<circle class="roundGaugeArc" transform="rotate(-90 60 60)" r="52" cx="60" cy="60" style="stroke-dasharray: 33px, 352px;"></circle>

				</svg>
				 <div class="gaugePercentage"></div>
			</div>

			  <p class="prograssBarText">Anforderungen</p>
		</div> -->

	</div>
	<div class="flexContent">
		<div class="leftBigger">
			<form action="/page2" method="POST">
				@csrf
				@if ($errors->has('qualification'))
					<p class="errorMessage">Please choose your position</p>
				@endif
					<div class="form-item wsInputCont mb_7">

						<input class="@if ($errors->has('qualification')) inputerror @endif" type="text" id="qualification" class="awesomplete" value="{{$randstad->page2position ?? ''}}" name="qualification" placeholder="Qualifikation eingeben und/oder auswählen">
					</div>



					<div class="tooltip">
						<div class="tooltip-img-wrapper">
							<div class="tooltip-picture">
								<img src="img/pic_woman_agent.jpg" alt="">
							</div>
						</div>
						<div class="tooltipText">
							<p>Los geht's: Bitte tragen Sie den Namen der Position ein, der die Qualifikation des Mitarbeiters am besten beschreibt. Idealerweise benutzen Sie eine allgemeine Job-Bezeichnung.</p>
						</div>
					</div>
					<div class="buttons mt_8">
						{{-- <a href="{{ route('home') }}" class="rd-button-invert wsStoreButton hideButton"><i class="fas fa-chevron-left"></i> &nbsp; zurück </a> --}}
						<button class="rd-button wsStoreButton hideButton" type="submit">weiter &nbsp; <i class="fas fa-chevron-right"></i></button>



					</div>
			</form>




				{{-- <div class="buttons mt_8">
				<a href="{{ route('home') }}" class="rd-button-invert wsStoreButton hideButton"><i class="fas fa-chevron-left"></i> &nbsp; zurück </a>
					<a href="page-anzahl.html" class="rd-button wsStoreButton hideButton">weiter &nbsp; <i class="fas fa-chevron-right"></i></a>
					<a href="page-zusammenfassung.html" class="rd-button wsStoreButton editButton">zurück zur Zusammenfassung &nbsp; <i class="fas fa-chevron-right"></i></a>

				</div> --}}
				<div class="block">
					<div class="block__wrapper wrapper">
						<div class="block__content">
							<div class="indicator-percentage">
								<div class="indicator-percentage__background">
									<div class="indicator-percentage__amount" style="width: 0"></div>
								</div>
								<span class="indicator-percentage__percentage">0%</span>
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
<script>
	var input = document.getElementById("qualification");
	var awesomplete = new Awesomplete(input, {minChars: 1});
	awesomplete.list = ["Abteilungsleiter Controlling","Automotive","Account Manager","Altenpfleger","Anlagenbau","Bilanzbuchhalter", "Berater","Bestandskontrolle","Buchhalter","Controller","Corporate Controller","Fonds-Controller","FP & A Controller","IT-Controller","Kreditprüfer","Material-Controller","Netzwerk-Controller","Operations Controller","Projektmanager Controlling"];
</script>
@endsection