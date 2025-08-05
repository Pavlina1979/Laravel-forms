@extends('layout')

@section('content')
<div id="contentPage4">
	<div class="progressContent">
		<h1 class="position">Wie viele Mitarbeiter suchen Sie für diese Stelle?</h1>

	</div>
	<div class="flexContent">
		<div class="leftBigger">
			<form action="/page3" method="POST">
				@csrf
					<div class="form-item mb_7">
						<span class="number-wrapper wsInputCont">
							<span id="up"><i class="fas fa-chevron-up"></i></span>
							<span id="down"><i class="fas fa-chevron-down"></i></span>
						<input onkeypress='validate(event)' value="{{$randstad->page3mitarbeitern ?? 1}}" type="number" id="number" min="1" name="number"/>
						</span>
					</div>

					@if ($errors->has('number'))
					<p class="errorMessage">Please enter the number of people you search</p>
				@endif

				<div class="tooltip">
					<div class="tooltip-img-wrapper">
						<div class="tooltip-picture">
							<img src="img/pic_woman_agent.jpg" alt="">
						</div>
					</div>
					<div class="tooltipText">
						<p>Falls Sie für die Stelle mehr als einen Mitarbeiter benötigen, tragen Sie bitte die entsprechende Anzahl ein.</p>
					</div>
				</div>

					<div class="buttons mt_8">
					<a href="{{ route('home') }}" class="rd-button-invert wsStoreButton hideButton"><i class="fas fa-chevron-left"></i> &nbsp; zurück </a>
						<button class="rd-button wsStoreButton hideButton" type="submit">weiter &nbsp; <i class="fas fa-chevron-right"></i></button>
						<a href="page-zusammenfassung.html" class="rd-button wsStoreButton editButton">zurück zur Zusammenfassung &nbsp; <i class="fas fa-chevron-right"></i></a>

					</div>
			</form>




				<div class="block">
					<div class="block__wrapper wrapper">
						<div class="block__content">
							<div class="indicator-percentage">
								<div class="indicator-percentage__background">
									<div class="indicator-percentage__amount" style="width: 64px"></div>
								</div>
								<span class="indicator-percentage__percentage">10%</span>
							</div>
						</div>
					</div>
				</div>

		</div>
	</div>
</div>
@endsection

@section('javascript')
<script>
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

	function validate(evt) {
var theEvent = evt || window.event;

// Handle paste
if (theEvent.type === 'paste') {
  key = event.clipboardData.getData('text/plain');
} else {
// Handle key press
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode(key);
}
var regex = /[0-9]|\./;
if( !regex.test(key) ) {
theEvent.returnValue = false;
if(theEvent.preventDefault) theEvent.preventDefault();
}
}
</script>

@endsection