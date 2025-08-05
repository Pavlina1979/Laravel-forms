@extends('layout')

@section('content')
<div id="contentPage4">

	<div class="progressContent">
		<h1 class="position">Welches Brutto-Jahresgehalt möchten Sie dem Mitarbeiter zahlen?</h1>


	</div>


	<div class="flexContent">
		<div class="left">
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
				<div class="flexRow mb_7">
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

				@if (session()->has('message'))
				<p class="errorMessage">{{ session()->get('message') }}</p>
					@endif

				<div class="tooltip">
					<div class="tooltip-img-wrapper">
						<div class="tooltip-picture">
							<img src="img/pic_woman_agent.jpg" alt="">
						</div>
					</div>
					<div class="tooltipText">
						<p>Transparenz ist uns wichtig. Das zu erwartende Gehalt ist für den Kandidaten ein wichtiger von vielen Bausteinen.</p>
					</div>
				</div>


				<div class="buttons mt_8">
					<a href="{{ route('page7') }}" class="rd-button-invert wsStoreButton hideButton"><i class="fas fa-chevron-left"></i> &nbsp; zurück </a>
					<button class="rd-button wsStoreButton hideButton" type="submit">weiter &nbsp; <i class="fas fa-chevron-right"></i></button>
					{{-- <a href="{{ route('page7') }}" class="skip-button hideButton">überspringen</a> --}}

				</div>
			</form>

				<div class="block">
					<div class="block__wrapper wrapper">
						<div class="block__content">
							<div class="indicator-percentage">
								<div class="indicator-percentage__background">
									<div class="indicator-percentage__amount" style="width: 445px"></div>
								</div>
								<span class="indicator-percentage__percentage">70%</span>
							</div>
						</div>
					</div>
				</div>

		</div>
	</div>
</div>

@endsection


@section('javascript')
<script src="js/cleave.min.js"></script>
<script>


/* var cleave = new Cleave('.numFormat1', {
delimiter: '․',
numeral: true,
numeralThousandsGroupStyle: 'thousand'
}); */

var cleave = new Cleave('.numFormat2', {
delimiter: '․',
numeral: true,
numeralThousandsGroupStyle: 'thousand'
});


</script>
@endsection