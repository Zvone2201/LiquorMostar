<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategorije;

use App\Models\Proizvodi;

use App\Models\Narudzba;

class AdminController extends Controller
{
    public function view_kategorije()
    {
        $data=kategorije::all();

        return view('admin.kategorije',compact('data'));
    }

    public function add_kategorije(Request $request)
    {

        $data=new kategorije;

        $data->naziv_kategorije=$request->kategorije;

        $data->save();

        return redirect()->back()->with('message','Kategorija uspješno dodana');

        
    }

    public function izbriši_kategorije($id)
    {
        $data=kategorije::find($id);

        $data->delete();

        return redirect()->back()->with('message','Kategorija je uspješno izbrisana');

    }

    public function view_proizvodi()
    {
        $kategorije=kategorije::all();
        return view('admin.proizvodi',compact('kategorije'));
    }

    public function add_proizvodi(Request $request)
    {

        $proizvodi=new proizvodi;

        $proizvodi->naziv=$request->naziv;

        $proizvodi->opis=$request->opis;

        $proizvodi->cijena=$request->cijena;

        $proizvodi->količina=$request->količina;

        $proizvodi->popust=$request->popust;

        $proizvodi->kategorije=$request->kategorije;



        $slika=$request->slika;

        $slikaname=time().'.'.$slika->getClientOriginalExtension();

        $request->slika->move('proizvodi',$slikaname);

        $proizvodi->slika=$slikaname;

        $proizvodi->save();

        return redirect()->back()->with('message','Proizvod je uspješno dodan');

    }

    public function prikazi_proizvodi()
    {

        $proizvodi=proizvodi::all();
        return view('admin.prikazi_proizvodi',compact('proizvodi'));
    }

    public function izbrisi_proizvodi($id)
    {
        $proizvodi=proizvodi::find($id);

        $proizvodi->delete();

        return redirect()->back()->with('message','Proizvod je uspješno izbrisan');
    }

    public function uredi_proizvodi($id)
    {
        $proizvodi=proizvodi::find($id);

        $kategorije=kategorije::all();

        return view('admin.uredi_proizvodi',compact('proizvodi','kategorije'));
    }

    public function uredi_proizvodi_potvrdi(Request $request,$id)
    {

        $proizvodi=proizvodi::find($id);

        $proizvodi->naziv=$request->naziv;
        $proizvodi->opis=$request->opis;
        $proizvodi->cijena=$request->cijena;
        $proizvodi->popust=$request->popust;
        $proizvodi->kategorije=$request->kategorije;
        $proizvodi->količina=$request->količina;
        $slika=$request->slika;

        if($slika)

        {

            $slikaname=time().'.'.$slika->getClientOriginalExtension();

            $request->slika->move('proizvodi',$slikaname);
    
            $proizvodi->slika=$slikaname;

        }


        $proizvodi->save();

        return redirect()->back()->with('message','Proizvod je uspješno uređen');
    }

    public function narudzba()
    {   
        $narudzba=narudzba::all();
        return view('admin.narudzba',compact('narudzba'));
    }

    public function isporuceno($id)
    {
     
        $narudzba=narudzba::find($id);

        $narudzba->status_isporuke="Isporučeno";

        $narudzba->status_placanja='Plačeno';

        $narudzba->save();

        return redirect()->back();
    }
}   
