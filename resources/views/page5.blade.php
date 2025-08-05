@extends('layout')

@section('content')
<div id="contentPage4">

	<div class="progressContent">
		<h1 class="position">Welche Vertragsart bevorzugen Sie?</h1>

	</div>
	<div class="flexContent">
		<div class="leftBigger">




				<form action="/" method="POST">
					@csrf
					@if ($errors->has('radio1'))
					<p class="errorMessage">Please choose one possibility</p>
				@endif
					<div class="form-item mb_2">
						<label class="radioContainer wsInputCont labelBigText" for="ws_arbeitnehmer">Arbeitnehmerüberlassung
							<div class="infoIcon infoIconOne"><img  src="img/Information_icon_blue_rgb.svg" alt="">
								<div class="infoBox infoBoxOne">
									<strong>Arbeitnehmerüberlassung</strong> <br />
									Randstad stellt Ihnen Personal für einen begrenzten Zeitraum zur Verfügung (Zeitarbeit).
								</div>
							</div>

							<input type="radio" id="ws_arbeitnehmer" name="radio1"
							@isset($randstad->page1radio)
							{{$randstad->page1radio === 'Arbeitnehmerüberlassung' ? 'checked' : ''}}
							@endisset
							 value="Arbeitnehmerüberlassung">
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
							<input type="radio" id="ws_festanstellung" name="radio1"
							@isset($randstad->page1radio)
							{{$randstad->page1radio === 'Festanstellung' ? 'checked' : ''}}
							@endisset

							value="Festanstellung">
							<span class="checkmark"></span>
						</label>
					</div>

					<div class="form-item mb_7">
						<label class="radioContainer wsInputCont labelBigText" for="ws_beides">steht noch nicht fest
							<input type="radio" id="ws_beides" name="radio1"
							@isset($randstad->page1radio)
							{{$randstad->page1radio === 'Arbeitnehmerüberlassung und Festanstellung' ? 'checked' : ''}}
							@endisset
							 value="Arbeitnehmerüberlassung und Festanstellung">
							<span class="checkmark"></span>
						</label>
					</div>




				<div class="tooltip">
					<div class="tooltip-img-wrapper">
						<div class="tooltip-picture">
							<img src="img/pic_woman_agent.jpg" alt="">
						</div>
					</div>
					<div class="tooltipText">
						<p>Bei der Arbeitnehmerüberlassung ist der Mitarbeiter bei Randstad angestellt und arbeitet bei Ihnen vor Ort. Wenn Sie Festanstellung bevorzugen übernehmen wir die Kandidatenvorauswahl und Sie stellen den Mitarbeiter selbst ein. Gerne beraten Sie meine Kollegen in einem persönlichen Gespräch.</p>
					</div>
				</div>

					<div class="buttons mt_8">
						<a href="{{ route('page4') }}" class="rd-button-invert wsStoreButton hideButton"><i class="fas fa-chevron-left"></i> &nbsp; zurück </a>
						<button class="rd-button wsStoreButton hideButton" type="submit">weiter &nbsp; <i class="fas fa-chevron-right"></i></button>



					</div>

				</form>




				<div class="block">
					<div class="block__wrapper wrapper">
						<div class="block__content">
							<div class="indicator-percentage">
								<div class="indicator-percentage__background">
								<div class="indicator-percentage__amount" style="width: 254px"></div>
								</div>
								<span class="indicator-percentage__percentage">40%</span>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

</div>
@endsection