<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Proizvodi;

use App\Models\Kosarica;

use App\Models\Narudzba;



class HomeController extends Controller
{
    public function index()
    {
        $proizvodi=Proizvodi::paginate(9);
        return view('home.userpage',compact('proizvodi'));
    }
    public function redirect()
    {
            $usertype=Auth::user()->usertype;

            if($usertype=='1')
            {

                return view('admin.home');
            }
            else
                {
                    $proizvodi=Proizvodi::paginate(10);
                    return view('home.userpage',compact('proizvodi'));
                }

    
        
    }

    public function vise_o_proizvodi($id)
    {

        $proizvodi=proizvodi::find($id);

        return view('home.vise_o_proizvodi',compact('proizvodi'));
    }

    public function dodaj_kosaricu(Request $request,$id)
    {
        if(Auth::id())
        {
            $user=Auth::user();

            $proizvodi=proizvodi::find($id);

            $kosarica=new kosarica;

            $kosarica->name=$user->name;

            $kosarica->email=$user->email;

            $kosarica->mobitel=$user->mobitel;

            $kosarica->adresa=$user->adresa;

            $kosarica->user_id=$user->id;

            $kosarica->naziv_proizvoda=$proizvodi->naziv;

            if($proizvodi->popust!=null)

            {
                $kosarica->cijena=$proizvodi->popust * $request->količina;
            }

            else
            {
                $kosarica->cijena=$proizvodi->cijena * $request->količina;
            }

            

            $kosarica->slika=$proizvodi->slika;

            $kosarica->proizvodi_id=$proizvodi->id;

            $kosarica->količina=$request->količina;

            $kosarica->save();

            return redirect()->back();

            
        }

        else
        {
            return redirect('login');
        }
    }

    public function prikazi_kosaricu()
    {
        if(Auth::id())
        {

            $id=Auth::user()->id;

            $kosarica=kosarica::where('user_id','=',$id)->get();

            return view('home.prikazi_kosaricu',compact('kosarica'));

        }

        else
        {
            return redirect('login');
        }

        
    }

    public function ukloni_kosaricu($id)
    {

        $kosarica=kosarica::find($id);

        $kosarica->delete();

        return redirect()->back();
    }

    public function placanje_preuzimanjem()
    {
        $user=Auth::user();

        $userid=$user->id;

        $data=kosarica::where('user_id','=',$userid)->get();

        foreach($data as $data)
        {
            $narudzba=new narudzba;

            $narudzba->name=$data->name;

            $narudzba->email=$data->email;

            $narudzba->mobitel=$data->mobitel;

            $narudzba->adresa=$data->adresa;

            $narudzba->user_id=$data->user_id;

            $narudzba->naziv_proizvoda=$data->naziv_proizvoda;

            $narudzba->cijena=$data->cijena;

            $narudzba->količina=$data->količina;

            $narudzba->slika=$data->slika;

            $narudzba->proizvodi_id=$data->proizvodi_id;

            $narudzba->status_placanja='Plaćanje preuzimanjem';

            $narudzba->status_isporuke='U tijeku';

            $narudzba->save();


            $kosarica_id=$data->id;

            $kosarica=kosarica::find($kosarica_id);

            $kosarica->delete();

        }

        return redirect()->back()->with('message','Primili smo vašu narudžbu. Uskoro ćemo vas kontaktirati...');

    }

    public function trazi_proizvode(Request $request)
    {

        $search_text=$request->search;
        
        $proizvodi=proizvodi::where('naziv','LIKE','%'.$search_text.'%')->orWhere('kategorije','LIKE','%'.$search_text.'%')->paginate(10);

        return view('home.userpage',compact('proizvodi'));
    }

    public function proizvode()
    {

        $proizvodi=proizvodi::paginate(9);

        return view('home.svi_proizvode',compact('proizvodi'));
    }

    public function proizvode_trazi(Request $request)
    {

        $search_text=$request->search;
        
        $proizvodi=proizvodi::where('naziv','LIKE','%'.$search_text.'%')->orWhere('kategorije','LIKE','%'.$search_text.'%')->paginate(10);

        return view('home.svi_proizvode',compact('proizvodi'));
    }

    public function kontakt()
    {
        return view('home.kontakt');
    }

    public function o_nama()
    {
        return view('home.o_nama');
    }


}
