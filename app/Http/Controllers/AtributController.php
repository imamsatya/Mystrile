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

use Response;

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
        // $communitybps = new CommunityBPS('bps7206', 'blablabla');

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

    public function about()
    {
        $user = Auth::user();
        return View('about', compact('user'));
    }
    public function index()
    {
        //salah tempat cuy
        $setatribut = new SetAtribut;
        $user = Auth::user();
        $setatributs = $setatribut->where('user_id', $user->id)->get();

       
        // dd($user->id);
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
        $user = Auth::user();
        $setatribut->nama_set_atribut = $request->input('setatribut')['nama_atribut'];
        $setatribut->user_id = $user->id; 
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
       
       if ($request->input('hargabarang')['merk'] == 1) {
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
      
       if ($request->input('hargabarang')['panjang'] == 1) {
        $hargabarang->ukuran_panjang = 'panjang';
       }else{
        $hargabarang->ukuran_panjang = 'tanpa panjang';   
       }
       

       if ($request->input('hargabarang')['lebar'] == 1 ) {
        $hargabarang->ukuran_lebar = 'lebar';
       }else{
        $hargabarang->ukuran_lebar = 'tanpa lebar';   
       }
       
       if ($request->input('hargabarang')['tinggi'] == 1 ) {
        $hargabarang->ukuran_tinggi = 'tinggi';
       }else{
        $hargabarang->ukuran_tinggi = 'tanpa tinggi';   
       }

       if ($request->input('hargabarang')['berat'] == 1) {
        $hargabarang->ukuran_berat = 'berat';
       }else{
        $hargabarang->ukuran_berat = 'tanpa berat';   
       }

       if ($request->input('hargabarang')['konversi'] == 1) {
        $hargabarang->konversi_satuan_setempat = 'konversi';
       }else{
        $hargabarang->konversi_satuan_setempat = 'tanpa konversi';   
       }
       

       if ($request->input('hargabarang')['harga_setempat'] == 1) {
        $hargabarang->harga_satuan_setempat = 'harga satuan setempat';
       }else{
        $hargabarang->harga_satuan_setempat = 'tanpa harga satuan setempat';   
       }
       
       if ($request->input('hargabarang')['harga_standar'] == 1) {
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
        $jasakonstruksi->jenis_jasa = $request->input('jasakonstruksi')['jasa_konstruksi'];
        $jasakonstruksi->satuan_unit = $request->input('selected');
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

        $user = Auth::user();
     
        return View('Home.beranda', compact('hargabarangs', 'sewaalats', 'jasakonstruksis', 'id', 'setatributs', 'user'));
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
        $jasakonstruksis = new JasaKonstruksi;
        $jasakonstruksi = $jasakonstruksis->where('set_id', $id)->delete();
        $sewaalats = new SewaAlat;
        $sewaalat = $sewaalats->where('set_id', $id)->delete();
        $hargabarangs = new HargaBarang;
        $hargabarang = $hargabarangs->where('set_id', $id)->delete();
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
        
      
        $jasakonstruksi->jenis_jasa = $request->jenis_jasa;
        $jasakonstruksi->satuan_unit = $request->satuan_unit;
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
            $hargabarang->ukuran_panjang = 'panjang';
        } else {
            $hargabarang->ukuran_panjang = 'tanpa panjang';
        }

        if ($request->lebar) {
            $hargabarang->ukuran_lebar = 'lebar';
        } else {
            $hargabarang->ukuran_lebar = 'tanpa lebar';
        }

        if ($request->tinggi) {
            $hargabarang->ukuran_tinggi = 'tinggi';
        } else {
            $hargabarang->ukuran_tinggi = 'tanpa tinggi';
        }

        if ($request->berat) {
            $hargabarang->ukuran_berat = 'berat';
        } else {
            $hargabarang->ukuran_berat = 'tanpa berat';
        }

        if ($request->konversi) {
            $hargabarang->konversi_satuan_setempat = 'konversi';
        } else {
            $hargabarang->konversi_satuan_setempat = 'tanpa konversi';
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

    public function share($id)
    {
        $setatributs = new SetAtribut;
        $setatribut = $setatributs->where('id', $id)->select('nama_set_atribut')->get();

        $sewaalats = new SewaAlat;
        $sewaalat = $sewaalats->where('set_id', $id)
        ->select('jenis_barang', 
        'kualitas_barang'
        )
        ->get();

        $jasakonstruksis = new JasaKonstruksi;
        $jasakonstruksi = $jasakonstruksis->where('set_id', $id)
        ->select('jenis_jasa', 
        'satuan_unit'
        )
        ->get();

        $hargabarangs = new HargaBarang;
        $hargabarang = $hargabarangs->where('set_id', $id)
        ->select('jenis_barang', 
        'kualitas_barang', 
        'satuan_standar', 
        'merk',
        'satuan_setempat',
        'ukuran_panjang',
        'ukuran_lebar',
        'ukuran_tinggi',
        'ukuran_berat',
        'konversi_satuan_setempat',
        'harga_satuan_setempat',
        'harga_satuan_standar')
        ->get();

        $metadata2 = collect([

            "data_harga"    => [
                               
                                    [
                                        "jenis_barang" => "Tanah Urug",
                                        "kualitas_barang" => "Biasa",
                                        "satuan_standar" => "m3",
                                        "merk" => false,
                                        "satuan_setempat" => true,
                                        "ukuran_panjang" => true,
                                        "ukuran_lebar" => true,
                                        "ukuran_tinggi" => true,
                                        "ukuran_berat" => false,
                                        "konversi_satuan_setempat" => false,
                                        "harga_satuan_setempat" => true,
                                        "harga_satuan_standar" => false,
                                    ],
                                    [
                                        "jenis_barang" => "Tanah Urug 2",
                                        "kualitas_barang" => "Biasa",
                                        "satuan_standar" => "m3",
                                        "merk" => false,
                                        "satuan_setempat" => true,
                                        "ukuran_panjang" => true,
                                        "ukuran_lebar" => true,
                                        "ukuran_tinggi" => true,
                                        "ukuran_berat" => false,
                                        "konversi_satuan_setempat" => false,
                                        "harga_satuan_setempat" => true,
                                        "harga_satuan_standar" => false,
                                    ],
                                ],
            "sewa_alat"     =>[
                                
                                    [
                                        "jenis_barang" => "Excavator PC-200",
                                        "kualitas_barang" => "Kapasitas Bucket 0,8 m3",
                                    ],
                                ],
            "jasa_konstruksi"=>[
                                    [
                                        "jenis_jasa" => "Upah Kepala Tukang",
                                        "satuan_unit" => "O-H"
                                    ]
                                ]
            
           
        ]);

        foreach ($hargabarang as $key => $value) {
            if ($value->merk == 'bermerk') {
                $value->merk = true;
            } else {
                $value->merk = false;
            }

            if ($value->satuan_standar == 'tanpa satuan standar') {
                $value->satuan_standar = false;
            } 

            if ($value->satuan_setempat != 'tanpa satuan setempat') {
                $value->satuan_setempat = true;
            } else {
                $value->satuan_setempat = false;
            }

            if ($value->ukuran_panjang != 'tanpa panjang') {
                $value->ukuran_panjang = true;
            } else {
                $value->ukuran_panjang = false;
            }

            if ($value->ukuran_lebar != 'tanpa lebar') {
                $value->ukuran_lebar = true;
            } else {
                $value->ukuran_lebar = false;
            }


            if ($value->ukuran_tinggi != 'tanpa tinggi') {
                $value->ukuran_tinggi = true;
            } else {
                $value->ukuran_tinggi = false;
            }
            
            if ($value->ukuran_berat != 'tanpa berat') {
                $value->ukuran_berat = true;
            } else {
                $value->ukuran_berat = false;
            }

            if ($value->konversi_satuan_setempat != 'tanpa konversi') {
                $value->konversi_satuan_setempat = true;
            } else {
                $value->konversi_satuan_setempat = false;
            }

            if ($value->harga_satuan_setempat != 'tanpa harga satuan setempat') {
                $value->harga_satuan_setempat = true;
            } else {
                $value->harga_satuan_setempat = false;
            }

            if ($value->harga_satuan_standar != 'tanpa harga satuan standar') {
                $value->harga_satuan_standar = true;
            } else {
                $value->harga_satuan_standar = false;
            }
            
        }
      
        
        // dd($hargabarang);
        $metadata = collect([
            "data_harga"    =>$hargabarang,
            "sewa_alat"     => $sewaalat,
            "jasa_konstruksi"=>$jasakonstruksi
            
           
        ]);
        // dd($metadata3);
        // return View('Home.tes', compact('hargabarang', 'sewaalat', 'jasakonstruksi', 'setatribut'));
        // return View('Home.tes', compact('metadata'));
        return response()->json($metadata); 
        // return View()
    }

    public function getDownload(){
        //PDF file is stored under project/public/download/info.pdf
        $file="./download/Tutorial.pdf";
        return Response::download($file);
    }

    public function import_create(){
   
            $user = Auth::user();
        return View('importx', compact('user'));
    }

    public function import_store(Request $request){
        dd($request);
    }

    
}
