@extends('layout')

@section('content')
<div id="contentPage4">

	<div class="progressContent">
		<h1 class="position">Wie ist die geplante Arbeitszeit?</h1>

	</div>
	<div class="flexContent">
		<div class="leftBigger">

			<form action="/page4" method="POST">
				@csrf
				@if ($errors->has('radio2'))
					<p class="errorMessage">Please choose Vollzeit or Teilzeit</p>
				@endif
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

{{-- <h3 class="color2 mb_2">...arbeiten.</h3> --}}
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

<div class="form-item tick mb_7">
	<label class="checkbox labelBigText flexCheckbox wsInputCont">
		<input type="checkbox" name="wochen" value="Wochen" {{$randstad->page4wochen === 'Wochen' ? 'checked' : ''}}>
		<span>Der Mitarbeiter soll auch an Wochenenden arbeiten.</span>
	</label>
	</div>



				<div class="tooltip">
					<div class="tooltip-img-wrapper">
						<div class="tooltip-picture">
							<img src="img/pic_woman_agent.jpg" alt="">
						</div>
					</div>
					<div class="tooltipText">
						<p>Je besser wir über Ihre Anforderungen bescheid wissen, desto zielgerichteter können wir Kandidaten für Sie suchen und vorschlagen.</p>
					</div>
				</div>

				<div class="buttons mt_8">
					<a href="{{ route('page5') }}" class="rd-button-invert wsStoreButton hideButton"><i class="fas fa-chevron-left"></i> &nbsp; zurück </a>
					<button class="rd-button wsStoreButton hideButton" type="submit">weiter &nbsp; <i class="fas fa-chevron-right"></i></button>
					<a href="page-zusammenfassung.html" class="rd-button wsStoreButton editButton">zurück zur Zusammenfassung &nbsp; <i class="fas fa-chevron-right"></i></a>

				</div>
			</form>

				<div class="block">
					<div class="block__wrapper wrapper">
						<div class="block__content">
							<div class="indicator-percentage">
								<div class="indicator-percentage__background">
									<div class="indicator-percentage__amount" style="width: 318px"></div>
								</div>
								<span class="indicator-percentage__percentage">50%</span>
							</div>
						</div>
					</div>
				</div>

		</div>
	</div>
</div>

@endsection