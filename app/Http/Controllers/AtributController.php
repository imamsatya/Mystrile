<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HargaBarang;
use App\SewaAlat;
use App\JasaKonstruksi;
use App\SetAtribut;

class AtributController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //salah tempat cuy
        $setatribut = new SetAtribut;
        $setatributs = $setatribut->get();

        return View('home', compact('setatributs'));
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
        return View('Atribut.atribut-c');
    }


    public function harga_barang_create($id)
    {
        $id=$id;
        
        return View('Beranda.hargabarang', compact('id'));
    }

    public function sewa_alat_create($id)
    {
        $id=$id;
        return View('Beranda.sewaalat', compact('id'));
    }

    public function jasa_konstruksi_create($id)
    {
        $id=$id;
        return View('Beranda.jasakonstruksi', compact('id'));
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
       if ($request->input('hargabarang')['merk']) {
        $hargabarang->merk = 'bermerk';
       }else{
        $hargabarang->merk = 'tidak bermerk';   
       }

       if ($request->input('hargabarang')['satuan_standar']) {
        $hargabarang->satuan_standar = 'satuan standar';
       }else{
        $hargabarang->satuan_standar = 'tidak satuan standar';   
       }

       if ($request->input('hargabarang')['harga_setempat']) {
        $hargabarang->harga_satuan_setempat = 'harga_setempat';
       }else{
        $hargabarang->harga_satuan_setempat = 'tidak harga_setempat';   
       }
       
       if ($request->input('hargabarang')['harga_standar']) {
        $hargabarang->harga_satuan_standar = 'harga_standar';
       }else{
        $hargabarang->harga_satuan_standar = 'tidak harga_standar';   
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

        $id=$id;
     
        return View('home.beranda', compact('hargabarangs', 'sewaalats', 'jasakonstruksis', 'id'));
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
}
