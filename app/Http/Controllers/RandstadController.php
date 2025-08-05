<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Randstad;
use Illuminate\Routing\Controller as BaseController;

class RandstadController extends BaseController
{
    public function page1() {

            $randstad = Randstad::where('id', 1)->first();
            return view('page1', ['randstad' => $randstad]);


    }

    public function page1store() {
        if(Randstad::where('id', 1)->first()) {
            request()->validate([
                'radio1' => 'required'
            ]);

            $this->saveRandstad('page1radio', 'radio1');

			if(strpos(url()->previous(), 'resume') !== false) {
				return redirect()->route('resume');
			} else {
			return redirect('page6');
			}
        } else {
            request()->validate([
                'radio1' => 'required'
            ]);
            $randstad = new Randstad;
            $randstad->page1radio = request('radio1');
			$randstad->save();

			if(strpos(url()->previous(), 'resume') !== false) {
				return redirect()->route('resume');
			} else {
			return redirect()->route('page7');
			}
        }


    }

    public function page2() {
        $randstad = Randstad::where('id', 1)->first();
        return view('page2', ['randstad' => $randstad]);
    }

    public function page2store() {
		if(Randstad::where('id', 1)->first()) {
			request()->validate([
				'qualification' => 'required'
			]);

			$this->saveRandstad('page2position', 'qualification');

			if(strpos(url()->previous(), 'resume') !== false) {
				return redirect()->route('resume');
			} else {
			return redirect()->route('page2');
			}
		}

		else {
			request()->validate([
				'qualification' => 'required'
			]);
			$randstad = new Randstad;
			$randstad->page2position = request('qualification');
			$randstad->save();

			if(strpos(url()->previous(), 'resume') !== false) {
				return redirect()->route('resume');
			} else {
			return redirect()->route('page2');
			}
		}



	}


    public function page3() {
        $randstad = Randstad::where('id', 1)->first();
        return view('page3', ['randstad' => $randstad]);
    }

    public function page3store() {
        request()->validate([
            'number' => 'required'
        ]);
        $this->saveRandstad('page3mitarbeitern', 'number');

		if(strpos(url()->previous(), 'resume') !== false) {
			return redirect()->route('resume');
		} else {
			return redirect()->route('page3');
		}

    }

    public function page4() {
        $randstad = Randstad::where('id', 1)->first();
        return view('page4', ['randstad' => $randstad]);
    }

    public function page4store() {
        request()->validate([
            'radio2' => 'required'
        ]);
        $randstad = Randstad::where('id', 1)->first();
        $randstad->page4zeit = request('radio2');
		$randstad->page4schicht = request('schicht');
		$randstad->page4wochen = request('wochen');
		$randstad->save();


		if(strpos(url()->previous(), 'resume') !== false) {
			return redirect()->route('resume');
		} else {
		return redirect()->route('page7');
		}
    }

    public function page5() {
        $randstad = Randstad::where('id', 1)->first();
        return view('page5', ['randstad' => $randstad]);
    }

    public function page5store(Request $request) {
        request()->validate([
            'anforderungen' => 'required'
        ]);
        $randstad = Randstad::where('id', 1)->first();
        $randstad->page5anforderungen = request('anforderungen');
        $randstad->page5webseite = request('webseite');
        if($request->hasFile('file')) {
            $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('files', $filename, 'public');
            $randstad->page5fileupload = $filename;
        }
		$randstad->save();

		if(strpos(url()->previous(), 'resume') !== false) {
			return redirect()->route('resume');
		} elseif ($randstad->page1radio === 'Festanstellung') {
			return redirect()->route('page8');
		} else {
			return redirect()->route('page9');
		}

    }

    public function page6() {
        $randstad = Randstad::where('id', 1)->first();
        return view('page6', ['randstad' => $randstad]);
    }

    public function page6store() {
        $randstad = Randstad::where('id', 1)->first();
        $randstad->page6jahresGehalt = request('jahresBrutto');
        $randstad->page6gehalt = request('euro');
		$randstad->page6stundeMonat = request('gehaltPro');

/* 		dd($randstad->page6gehalt); */
		if ($randstad->page6jahresGehalt !== 'null' && $randstad->page6gehalt !== null) {

			$randstad->page6jahresGehalt = 'null';
			$randstad->page6gehalt = null;
			$randstad->page6stundeMonat = null;
			$randstad->save();
			if(strpos(url()->previous(), 'resume') !== false) {
				return redirect()->route('resume')->with('message', 'You can choose only Jahresbruttogehalt or Gehalt');
			} else {
			return redirect()->route('page8')->with('message', 'You can choose only Jahresbruttogehalt or Gehalt');
			}

		}
		elseif ($randstad->page6jahresGehalt !== 'null' && $randstad->page6gehalt === null) {

			$randstad->page6jahresGehalt = request('jahresBrutto');
			$randstad->page6gehalt = '';
			$randstad->page6stundeMonat = '';
			$randstad->save();
			if(strpos(url()->previous(), 'resume') !== false) {
				return redirect()->route('resume');
			} else {
			return redirect()->route('page9');
			}

		}
		elseif($randstad->page6jahresGehalt === 'null' && $randstad->page6gehalt !== null && $randstad->page6stundeMonat === null) {

			$randstad->page6jahresGehalt = 'null';
			$randstad->page6gehalt = request('euro');
			$randstad->page6stundeMonat = request('gehaltPro');
			$randstad->save();
			if(strpos(url()->previous(), 'resume') !== false) {
				return redirect()->route('resume')->with('message', 'Please choose "pro Stunde" or "pro Monat"');
			} else {
			return redirect()->route('page8')->with('message', 'Please choose "pro Stunde" or "pro Monat"');
			}

		}
		elseif($randstad->page6jahresGehalt === 'null' && $randstad->page6gehalt !== null) {

			$randstad->page6jahresGehalt = 'null';
			$randstad->page6gehalt = request('euro');
			$randstad->page6stundeMonat = request('gehaltPro');
			$randstad->save();
			if(strpos(url()->previous(), 'resume') !== false) {
				return redirect()->route('resume');
			} else {
			return redirect()->route('page9');
			}

		}


        /* if ($randstad->page6jahresGehalt && $randstad->page6gehalt) {
            return redirect()->route('page8')->with('message', 'You can choose only Jahresbruttogehalt or Gehalt');
        } elseif ($randstad->page6jahresGehalt && $randstad->page6stundeMonat !==null) {
            $randstad->page6stundeMonat = '';
            $randstad->save();
            return redirect()->route('page8')->with('message', 'You can choose "pro Stunde" or "pro Monat" only  when Gehalt field is filled');
        } elseif ($randstad->page6jahresGehalt === null && $randstad->page6gehalt && $randstad->page6stundeMonat === null) {
            $randstad->page6jahresGehalt = '';
            $randstad->save();
             return redirect()->route('page8')->with('message', 'Please choose "pro Stunde" or "pro Monat"');
        }  else {
            $randstad->save();
        } */

        return redirect()->route('page9');
    }

    public function page7() {
        $randstad = Randstad::where('id', 1)->first();
        return view('page7', ['randstad' => $randstad]);
    }

    public function page7store() {
        request()->validate([
            'datumStart' => 'required'
        ]);
        $randstad = Randstad::where('id', 1)->first();
        $randstad->page7datumStart = request('datumStart');
        $randstad->page7datumEnd = request('datumEnd');
        $randstad->save();

		if(strpos(url()->previous(), 'resume') !== false) {
			return redirect()->route('resume');
		} else {
		return redirect()->route('page5');
		}
    }

    public function page8() {
        $randstad = Randstad::where('id', 1)->first();
        return view('page8', ['randstad' => $randstad]);
    }

    public function page8store() {
        request()->validate([
            'ort' => 'required'
        ]);

        $randstad = Randstad::where('id', 1)->first();
        $randstad->page8land = request('land');
        $randstad->page8ort = request('ort');
		$randstad->save();

		if(strpos(url()->previous(), 'resume') !== false) {
			return redirect()->route('resume');
		} else {
		return redirect()->route('page4');
		}
    }

    public function page9() {
        $randstad = Randstad::where('id', 1)->first();
        return view('page9', ['randstad' => $randstad]);
    }

    public function page9store() {
        request()->validate([
            'stimme' => 'required',
			'kontaktNachname' => 'required',
			'kontaktFirma' => 'required',
			'kontaktPLZ' => 'required',
			'kontaktEMail' => 'email:rfc,dns'

        ]);
        $randstad = Randstad::where('id', 1)->first();
        $randstad->page9kontaktAnrede = request('kontaktAnrede');
        $randstad->page9vorname = request('kontaktVorname');
        $randstad->page9nachname = request('kontaktNachname');
        $randstad->page9firma = request('kontaktFirma');
        $randstad->page9kontaktLand = request('kontaktLand');
        $randstad->page9postleitzahl = request('kontaktPLZ');
        $randstad->page9email = request('kontaktEMail');
        $randstad->page9telefon = request('kontaktTel');
        $randstad->page9branche = request('kontaktBranche');
        $randstad->page9weitereBranche = request('kontaktBrancheWeitere');
        $randstad->page9stimme = request('stimme');
        $randstad->save();

        return redirect()->route('resume');
    }



    public function resume() {
        $randstad = Randstad::where('id', 1)->first();
        return view('resume', ['randstad' => $randstad]);
    }

    /* public function resumeStore(Request $request) {

        $randstad = Randstad::where('id', 1)->first();
        $randstad->page1radio = request('radio1');
        $randstad->page2position = request('qualification');
        $randstad->page3mitarbeitern = request('number');
        $randstad->page4zeit = request('radio2');
		$randstad->page4schicht = request('schicht');
		$randstad->page4wochen = request('wochen');
        $randstad->page5anforderungen = request('anforderungen');
        $randstad->page5webseite = request('webseite');
        $randstad->page6jahresGehalt = request('jahresBrutto');
        $randstad->page6gehalt = request('euro');
        $randstad->page6stundeMonat = request('gehaltPro');
        $randstad->page7datumStart = request('datumStart');
        $randstad->page7datumEnd = request('datumEnd');
        $randstad->page8land = request('land');
        $randstad->page8ort = request('ort');
        $randstad->page9kontaktAnrede = request('kontaktAnrede');
        $randstad->page9vorname = request('kontaktVorname');
        $randstad->page9nachname = request('kontaktNachname');
        $randstad->page9firma = request('kontaktFirma');
        $randstad->page9kontaktLand = request('kontaktLand');
        $randstad->page9postleitzahl = request('kontaktPLZ');
        $randstad->page9email = request('kontaktEMail');
        $randstad->page9telefon = request('kontaktTel');
        $randstad->page9branche = request('kontaktBranche');
        $randstad->page9weitereBranche = request('kontaktBrancheWeitere');
		$randstad->page9stimme = request('stimme');

		if($request->hasFile('file')) {
            $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('files', $filename, 'public');
            $randstad->page5fileupload = $filename;
        }

		if ($randstad->page6jahresGehalt !== 'null' && $randstad->page6gehalt !== null) {

			$randstad->page6jahresGehalt = 'null';
			$randstad->page6gehalt = null;
			$randstad->page6stundeMonat = null;
			$randstad->save();
			return redirect()->route('resume')->with('message', 'You can choose only Jahresbruttogehalt or Gehalt');

		}
		elseif ($randstad->page6jahresGehalt !== 'null' && $randstad->page6gehalt === null) {

			$randstad->page6jahresGehalt = request('jahresBrutto');
			$randstad->page6gehalt = '';
			$randstad->page6stundeMonat = '';
			$randstad->save();
			return redirect()->route('resume');

		}
		elseif($randstad->page6jahresGehalt === 'null' && $randstad->page6gehalt !== null && $randstad->page6stundeMonat === null) {

			$randstad->page6jahresGehalt = 'null';
			$randstad->page6gehalt = request('euro');
			$randstad->page6stundeMonat = request('gehaltPro');
			$randstad->save();
			return redirect()->route('resume')->with('message', 'Please choose "pro Stunde" or "pro Monat"');

		}
		elseif($randstad->page6jahresGehalt === 'null' && $randstad->page6gehalt !== null) {

			$randstad->page6jahresGehalt = 'null';
			$randstad->page6gehalt = request('euro');
			$randstad->page6stundeMonat = request('gehaltPro');
			$randstad->save();
			return redirect()->route('resume');

		}


        $randstad->save();

        return redirect()->back();
    } */

    public function deletePage() {
        return view('delete');
    }

    public function resumeDelete() {
        $randstad = Randstad::where('id', 1)->first();
        $randstad->page1radio = '';
        $randstad->page2position = '';
        $randstad->page3mitarbeitern = 1;
        $randstad->page4zeit = 'Vollzeit';
		$randstad->page4schicht = '';
		$randstad->page4wochen = '';
        $randstad->page5anforderungen = '';
        $randstad->page5fileupload = '';
        $randstad->page5webseite = '';
        $randstad->page6jahresGehalt = '';
        $randstad->page6gehalt = '';
        $randstad->page6stundeMonat = '';
        $randstad->page7datumStart = '';
        $randstad->page7datumEnd = '';
        $randstad->page8land = '';
        $randstad->page8ort = '';
        $randstad->page9kontaktAnrede = '';
        $randstad->page9vorname = '';
        $randstad->page9nachname = '';
        $randstad->page9firma = '';
        $randstad->page9kontaktLand = '';
        $randstad->page9postleitzahl = '';
        $randstad->page9email = '';
        $randstad->page9telefon = '';
        $randstad->page9branche = '';
        $randstad->page9weitereBranche = '';
        $randstad->page9stimme = '';
        $randstad->save();

        return redirect()->route('home');
    }


    protected function saveRandstad($column, $field) {
        $randstad = Randstad::where('id', 1)->first();
        $randstad->$column = request($field);
        $randstad->save();
    }
}
