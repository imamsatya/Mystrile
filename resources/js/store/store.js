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
        satuan_standar:false,
        merk:false,
        harga_setempat:false,
        harga_standar:false,
    }
}

const sewaalat={
    state:{
        jenis_barang:'',
        kualitas_barang:''
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
        }
    }
})