<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\HargaBarang;
use App\SewaAlat;
use App\JasaKonstruksi;
use App\SetAtribut;
use App\User;

use App\Classes\CommunityBPS;
use DOMDocument;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AtributController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $username;
    public $user;
    // public function __construct()
    // {
    //     $this->middleware(function ($request, $next) {
    //         $this->user = \Auth::user();
    //         return $next($request);
    //     });
    // }

    public function cek(Request $request)
    {
         require "classes/communitybps.php";
        // $communitybps = new CommunityBPS('bps7206', 'olimas205');

         $communitybps = new CommunityBPS($request->input('account')['username'], $request->input('account')['password']);

         //ini ga bisa
        
        //  $this->username->save();
        
        
        // $user = new User;
        // $user->name = 'Imam';
        // $user->email = $request->input('account')['username'] . '@bps.go.id';        
        // $user->email_verified_at = now();
        // $user->password =  Hash::make($request->input('account')['password']);
        // $user->remember_token = Str::random(10);
        // $user->save();


        // $this->username = $request->input('account')['username'];
        
        // dd($user);
        dd('asda');
        dd($request->input('account')['username']);
        dd($this->username);
      
        
        //  return true;
         

         
    }
    public function index()
    {
        //salah tempat cuy
        $setatribut = new SetAtribut;
        $setatributs = $setatribut->get();

        $user = Auth::user();
        // dd('asdads');
        
        // require "classes/communitybps.php";
        // For Windows, if anybody is interested, uncomment the following line (by removing the ;) from php.ini
        // ;extension=php_curl.dll
        // $communitybps = new CommunityBPS('bps7206', 'olimas205');
  
 
        //bisa
        //getprofil
        // $a= $communitybps->getprofil($communitybps);
        // 340058779
        // dd($a['nama']);
        // dd($communitybps->username);
        // $a = $this->username;
        // dd($a);

        return View('home', compact('setatributs', 'user'));
    }

    public function index2(Request $request)
    {
        //
        dd($request);
        // return View('menu');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function atribut_create()
    {
        $user = Auth::user();
        return View('Atribut.atribut-c', compact( 'user'));
    }


    public function harga_barang_create($id)
    {
        $id=$id;
        $user = Auth::user();
        return View('Beranda.hargabarang', compact('id', 'user'));
    }

    public function sewa_alat_create($id)
    {
        $id=$id;
        $user = Auth::user();
        return View('Beranda.sewaalat', compact('id', 'user'));
    }

    public function jasa_konstruksi_create($id)
    {
        $id=$id;
        $user = Auth::user();
        return View('Beranda.jasakonstruksi', compact('id', 'user'));
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function atribut_store(Request $request){
        
        $setatribut = new SetAtribut;
        $setatribut->nama_set_atribut = $request->input('setatribut')['nama_atribut'];
       
        $setatribut->save();
    }







    public function harga_barang_store(Request $request, $id){
        
        
       
       $hargabarang = new HargaBarang;
       $hargabarang->jenis_barang = $request->input('hargabarang')['jenis_barang'];
       $hargabarang->kualitas_barang = $request->input('hargabarang')['kualitas_barang'];
       
       if ($request->input('hargabarang')['satuan_standar'] != NULL) {
        $hargabarang->satuan_standar = $request->input('hargabarang')['satuan_standar'];
       }else{
        $hargabarang->satuan_standar = 'tanpa satuan standar';   
       }
       
       if ($request->input('hargabarang')['merk']) {
        $hargabarang->merk = 'bermerk';
       }else{
        $hargabarang->merk = 'tanpa merk';   
       }

       if ($request->input('hargabarang')['satuansetempat'] != NULL) {
        $hargabarang->satuan_setempat = $request->input('hargabarang')['satuansetempat'];
       }else{
        $hargabarang->satuan_setempat = 'tanpa satuan setempat';   
       }

       //ukuran satuan setempat
       if ($request->input('hargabarang')['panjang']) {
        $hargabarang->panjang = 'panjang';
       }else{
        $hargabarang->panjang = 'tanpa panjang';   
       }
       

       if ($request->input('hargabarang')['lebar']) {
        $hargabarang->lebar = 'lebar';
       }else{
        $hargabarang->lebar = 'tanpa lebar';   
       }
       
       if ($request->input('hargabarang')['tinggi']) {
        $hargabarang->tinggi = 'tinggi';
       }else{
        $hargabarang->tinggi = 'tanpa tinggi';   
       }

       if ($request->input('hargabarang')['berat']) {
        $hargabarang->berat = 'berat';
       }else{
        $hargabarang->berat = 'tanpa berat';   
       }

       if ($request->input('hargabarang')['konversi']) {
        $hargabarang->konversi = 'konversi';
       }else{
        $hargabarang->konversi = 'tanpa konversi';   
       }
       

       if ($request->input('hargabarang')['harga_setempat']) {
        $hargabarang->harga_satuan_setempat = 'harga satuan setempat';
       }else{
        $hargabarang->harga_satuan_setempat = 'tanpa harga satuan setempat';   
       }
       
       if ($request->input('hargabarang')['harga_standar']) {
        $hargabarang->harga_satuan_standar = 'harga satuan standar';
       }else{
        $hargabarang->harga_satuan_standar = 'tanpa harga satuan standar';   
       }


       


       $hargabarang->set_id = $id;
       $hargabarang->save();

       
    }

    public function sewa_alat_store(Request $request, $id){
        
        $sewaalat = new SewaAlat;
        $sewaalat->jenis_barang = $request->input('sewaalat')['jenis_barang'];
        $sewaalat->kualitas_barang = $request->input('sewaalat')['kualitas_barang'];
        $sewaalat->set_id = $id;
        $sewaalat->save();
    }

    public function jasa_konstruksi_store(Request $request, $id){
        
        $jasakonstruksi = new JasaKonstruksi;
        $jasakonstruksi->jasa_konstruksi = $request->input('jasakonstruksi')['jasa_konstruksi'];
        $jasakonstruksi->set_id = $id;
        $jasakonstruksi->save();
    }



    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    public function show($id)
    {
        
        $hargabarang = new HargaBarang;
        $hargabarangs = $hargabarang->where('set_id', $id)->get();
        
        $sewaalat = new SewaAlat;
        $sewaalats = $sewaalat->where('set_id', $id)->get();

        $jasakonstruksi = new JasaKonstruksi;
        $jasakonstruksis = $jasakonstruksi->where('set_id', $id)->get();

        $setatribut = new SetAtribut;
        $setatributs = $setatribut->where('id', $id)->get();
        $id=$id;
     
        return View('Home.beranda', compact('hargabarangs', 'sewaalats', 'jasakonstruksis', 'id', 'setatributs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function atribut_destroy($id)
    {
        $setatributs = new SetAtribut;
        $setatribut = $setatributs->where('id', $id)->delete();

    }

    public function harga_barang_destroy($id)
    {
        $hargabarangs = new HargaBarang;
        $hargabarang = $hargabarangs->where('id', $id)->delete();

        // return redirect()->route('show');
    }

    public function sewa_alat_destroy($id)
    {
        $sewaalats = new SewaAlat;
        $sewaalat = $sewaalats->where('id', $id)->delete();

        // return redirect()->route('show');
        // return View('Atribut.atribut-c');
    }

    
    public function jasa_konstruksi_destroy($id)
    {
        $jasakonstruksis = new JasaKonstruksi;
        $jasakonstruksi = $jasakonstruksis->where('id', $id)->delete();

        // return redirect()->route('show');
        // return View('Atribut.atribut-c');
    }

    public function atribut_update(Request $request, $id)
    {
   
        $atributs = new SetAtribut;
        $atribut = $atributs->where('id', $id)->first();
     
      
        $atribut->nama_set_atribut = $request->nama_set_atribut;
             
        $atribut->save();
        
    }

    public function sewa_alat_update(Request $request, $id)
    {
   
        $sewaalats = new SewaAlat;
        $sewaalat = $sewaalats->where('id', $id)->first();
     
      
        $sewaalat->jenis_barang = $request->jenis_barang;
        $sewaalat->kualitas_barang = $request->kualitas_barang;

      
        $sewaalat->save();
        
    }

    public function jasa_konstruksi_update(Request $request, $id)
    {
   
        $jasakonstruksis = new JasaKonstruksi;
        $jasakonstruksi = $jasakonstruksis->where('id', $id)->first();
     
      
        $jasakonstruksi->jasa_konstruksi = $request->jasa_konstruksi;
        $jasakonstruksi->save();
        
    }

    public function harga_barang_update(Request $request, $id)
    {
        // dd($request);
        $hargabarangs = new HargaBarang;
        $hargabarang = $hargabarangs->where('id', $id)->first();
        
        $hargabarang->jenis_barang = $request->jenis_barang;
        $hargabarang->kualitas_barang = $request->kualitas_barang;

        if ($request->satuan_standar != false) {
           $hargabarang->satuan_standar = $request->satuan_standar;
        } else {
            $hargabarang->satuan_standar = 'tanpa satuan standar';
        }

        if ($request->merk) {
            $hargabarang->merk = 'bermerk';
        } else {
            $hargabarang->merk = 'tanpa merk';
        }

        if ($request->satuan_setempat != false) {
            $hargabarang->satuan_setempat = $request->satuan_setempat;
        } else {
            $hargabarang->satuan_setempat = 'tanpa satuan setempat';
        }
        
        if ($request->panjang) {
            $hargabarang->panjang = 'panjang';
        } else {
            $hargabarang->panjang = 'tanpa panjang';
        }

        if ($request->lebar) {
            $hargabarang->lebar = 'lebar';
        } else {
            $hargabarang->lebar = 'tanpa lebar';
        }

        if ($request->tinggi) {
            $hargabarang->tinggi = 'tinggi';
        } else {
            $hargabarang->tinggi = 'tanpa tinggi';
        }

        if ($request->berat) {
            $hargabarang->berat = 'berat';
        } else {
            $hargabarang->berat = 'tanpa berat';
        }

        if ($request->konversi) {
            $hargabarang->konversi = 'konversi';
        } else {
            $hargabarang->konversi = 'tanpa konversi';
        }

        if ($request->harga_satuan_setempat) {
            $hargabarang->harga_satuan_setempat = 'harga satuan setempat';
        } else {
            $hargabarang->harga_satuan_setempat = 'tanpa harga satuan setempat';
        }

        if ($request->harga_satuan_standar) {
            $hargabarang->harga_satuan_standar = 'harga satuan standar';
        } else {
            $hargabarang->harga_satuan_standar = 'tanpa harga satuan standar';
        }

        
        $hargabarang->save();


        
        
        

    }

    public function masadit($id)
    {
        $setatributs = new SetAtribut;
        $setatribut = $setatributs->where('id', $id)->first();

        $sewaalats = new SewaAlat;
        $sewaalat = $sewaalats->where('set_id', $id)->first();

        $jasakonstruksis = new JasaKonstruksi;
        $jasakonstruksi = $jasakonstruksis->where('set_id', $id)->first();

        $hargabarangs = new HargaBarang;
        $hargabarang = $hargabarangs->where('set_id', $id)->first();

        return View('Home.tes', compact('hargabarang', 'sewaalat', 'jasakonstruksi', 'setatribut'));
        // return View()
    }

    
}
