@extends('layout')

@section('content')
<div id="contentPage4">

	<div class="progressContent">
		<h1 class="position">Welche Anforderungen haben Sie an den/die Mitarbeiter?</h1>

	</div>
	<div class="flexContent">
		<div class="leftBigger">
			<form action="/page5" method="POST" enctype="multipart/form-data">
				@csrf
				@if ($errors->has('anforderungen'))
						<p class="errorMessage">Please fill "Ihre Anforderungen"</p>
					@endif
					<div class="form-item wsInputCont mb_3-5">
						<label for="anforderungen">Ihre Anforderungen *</label>
						<textarea name="anforderungen" id="anforderungen" cols="30" rows="10">{{ old('anforderungen', $randstad->page5anforderungen)}}</textarea>

					</div>

					<h3 class="color2">Sie haben bereits ein fertiges Stellenprofil?</h3>

					<div class="buttons mt_2  wsInputCont">
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
					@if ($randstad->page5fileupload)
				<p class="mb_5 mt_2 summaryContent">Uploaded file: {{ $randstad->page5fileupload }}</p>
					@endif

					<div class="tooltip">
						<div class="tooltip-img-wrapper">
							<div class="tooltip-picture">
								<img src="img/pic_woman_agent.jpg" alt="">
							</div>
						</div>
						<div class="tooltipText">
							<p>Jetzt darf es ein bisschen mehr sein: Verraten Sie uns, die Anforderungen die der Kandidat erfüllen soll und wie sein Aufgabengebiet aussieht. Falls Sie schon eine ausformulierte Stellenbeschreibung besitzen, können Sie sie gerne hochladen oder den Link zur Online-Stellenanzeige eintragen.</p>
						</div>
					</div>


				<div class="buttons mt_8">
					<a href="{{ route('page6') }}" class="rd-button-invert wsStoreButton hideButton"><i class="fas fa-chevron-left"></i> &nbsp; zurück </a>
					<button class="rd-button wsStoreButton hideButton" type="submit">weiter &nbsp; <i class="fas fa-chevron-right"></i></button>
					<a href="page-zusammenfassung.html" class="rd-button wsStoreButton editButton">zurück zur Zusammenfassung &nbsp; <i class="fas fa-chevron-right"></i></a>

				</div>
			</form>

				<div class="block">
					<div class="block__wrapper wrapper">
						<div class="block__content">
							<div class="indicator-percentage">
								<div class="indicator-percentage__background">
									<div class="indicator-percentage__amount" style="width: 382px"></div>
								</div>
								<span class="indicator-percentage__percentage">60%</span>
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
	let fileMessage = document.querySelector('.file-hidden');
let fileName = document.getElementById('soubor');
function processSelectedFiles(fileInput) {
  var files = fileInput.files;
  fileMessage.classList.add('file-show');
  fileName.innerHTML=files[0].name;

}

</script>
@endsection