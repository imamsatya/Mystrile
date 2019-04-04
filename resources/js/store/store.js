import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);


const setatribut = {
    state:{
        nama_atribut:'',
    }
}

const hargabarang = {
    state:{
        jenis_barang:'',
        kualitas_barang:'',
        satuan_standar:'',
        merk:false,
        satuansetempat:'',
        panjang:false,
        lebar: false,
        tinggi: false,
        berat: false,
        konversi:false,
        harga_setempat:false,
        harga_standar:false,
       
    }
}

const sewaalat={
    state:{
        jenis_barang:'',
        kualitas_barang:''
    },
    mutations:{
        updateJenisBarang(state, jenis_barang){
            state.jenis_barang = jenis_barang
        }
    }
}

const jasakonstruksi={
    state:{
        jasa_konstruksi:''
    }
}


export const store = new Vuex.Store({
    modules: {
        setatribut: setatribut,
        hargabarang: hargabarang,
        sewaalat: sewaalat,
        jasakonstruksi: jasakonstruksi
    },
    state:{
        loader:false
    },
    mutations:{
        LOADER(state,payload){
            state.loader = payload;
        },
        
    }
})