<template>
    <div>
        <br>

        <vs-button type="gradient" color="danger" :href="'/home/beranda/'+id+'/harga_barang/create'">Tambah Harga Barang
        </vs-button>
        <!-- {{datas_view}} -->
        <br>
        <vs-table :data="datas_view" max-items="10" pagination search>
            <template slot="header">
                <h3>
                    Harga Barang
                </h3>
            </template>

            <template slot="thead">
                <vs-th style="font-size: 14px">
                    Jenis Barang
                </vs-th>
                <vs-th style="font-size: 14px">
                    Kualitas Barang
                </vs-th>
                <vs-th style="font-size: 14px">
                    Satuan Standar
                </vs-th>
                <vs-th style="font-size: 14px">
                    Merk
                </vs-th>
                <vs-th style="font-size: 14px">
                    Satuan Setempat
                </vs-th>
                <vs-th style="font-size: 14px">
                    Panjang
                </vs-th>
                <vs-th style="font-size: 14px">
                    Lebar
                </vs-th>
                <vs-th style="font-size: 14px">
                    Tinggi
                </vs-th>
                <vs-th style="font-size: 14px">
                    Berat
                </vs-th>
                <vs-th style="font-size: 14px">
                    Konversi
                </vs-th>
                <vs-th style="font-size: 14px">
                    Harga per Satuan Setempat
                </vs-th>
                <vs-th style="font-size: 14px">
                    Harga per Satuan Standar
                </vs-th>
                <vs-th style="font-size: 14px">
                    Aksi
                </vs-th>

            </template>

            <template slot-scope="{data}">
                <!-- <vs-tr :state="indextr == 2 || indextr == 5?'success':indextr == 6?'danger':null" :key="indextr" v-for="(tr, indextr) in data" > -->
            
                <vs-tr :key="indextr" v-for="(tr, indextr) in data">
                    <vs-td :data="data[indextr].jenis_barang">
                        {{data[indextr].jenis_barang}}
                        <!-- {{tr}} -->
                        ---
                     
                    </vs-td>

                    <vs-td :data="data[indextr].kualitas_barang">
                        {{data[indextr].kualitas_barang}}
                    </vs-td>

                    <vs-td :data="data[indextr].satuan_standar">
                        <label for="">{{data[indextr].satuan_standar}}</label>
                        <vs-switch color="success" v-if="data[indextr].satuan_standar != 'tanpa satuan standar'"
                            disabled="true" v-model="switch3" />
                        <vs-switch color="danger" v-if="data[indextr].satuan_standar == 'tanpa satuan standar'"
                            disabled="true" v-model="switch3" />
                    </vs-td>

                    <vs-td :data="data[indextr].merk">
                        <label for="">{{data[indextr].merk}}</label>
                        <vs-switch color="success" v-if="data[indextr].merk != 'tanpa merk'" disabled="true"
                            v-model="switch3" />
                        <vs-switch color="danger" v-if="data[indextr].merk == 'tanpa merk'" disabled="true"
                            v-model="switch3" />
                    </vs-td>

                    <vs-td :data="data[indextr].satuan_setempat">
                        <label for="">{{data[indextr].satuan_setempat}}</label>
                        <vs-switch color="success" v-if="data[indextr].satuan_setempat != 'tanpa satuan setempat'"
                            disabled="true" v-model="switch3" />
                        <vs-switch color="danger" v-if="data[indextr].satuan_setempat == 'tanpa satuan setempat'"
                            disabled="true" v-model="switch3" />
                    </vs-td>

                    <vs-td :data="data[indextr].ukuran_panjang">
                        <label for="">{{data[indextr].ukuran_panjang}}</label>
                        <vs-switch color="success" v-if="data[indextr].ukuran_panjang != 'tanpa panjang'" disabled="true"
                            v-model="switch3" />
                        <vs-switch color="danger" v-if="data[indextr].ukuran_panjang == 'tanpa panjang'" disabled="true"
                            v-model="switch3" />
                    </vs-td>

                    <vs-td :data="data[indextr].ukuran_lebar">
                        <label for="">{{data[indextr].ukuran_lebar}}</label>
                        <vs-switch color="success" v-if="data[indextr].ukuran_lebar != 'tanpa lebar'" disabled="true"
                            v-model="switch3" />
                        <vs-switch color="danger" v-if="data[indextr].ukuran_lebar == 'tanpa lebar'" disabled="true"
                            v-model="switch3" />
                    </vs-td>

                    <vs-td :data="data[indextr].ukuran_tinggi">
                        <label for="">{{data[indextr].ukuran_tinggi}}</label>
                        <vs-switch color="success" v-if="data[indextr].ukuran_tinggi != 'tanpa tinggi'" disabled="true"
                            v-model="switch3" />
                        <vs-switch color="danger" v-if="data[indextr].ukuran_tinggi == 'tanpa tinggi'" disabled="true"
                            v-model="switch3" />
                    </vs-td>

                    <vs-td :data="data[indextr].ukuran_berat">
                        <label for="">{{data[indextr].ukuran_berat}}</label>
                        <vs-switch color="success" v-if="data[indextr].ukuran_berat != 'tanpa berat'" disabled="true"
                            v-model="switch3" />
                        <vs-switch color="danger" v-if="data[indextr].ukuran_berat == 'tanpa berat'" disabled="true"
                            v-model="switch3" />
                    </vs-td>

                    <vs-td :data="data[indextr].konversi_satuan_setempat">
                        <label for="">{{data[indextr].konversi_satuan_setempat}}</label>
                        <vs-switch color="success" v-if="data[indextr].konversi_satuan_setempat != 'tanpa konversi'" disabled="true"
                            v-model="switch3" />
                        <vs-switch color="danger" v-if="data[indextr].konversi_satuan_setempat == 'tanpa konversi'" disabled="true"
                            v-model="switch3" />
                    </vs-td>


                    <vs-td :data="data[indextr].harga_satuan_setempat">

                        <label for="">{{data[indextr].harga_satuan_setempat}}</label>
                        <vs-switch color="success" disabled="true"
                            v-if="data[indextr].harga_satuan_setempat != 'tanpa harga satuan setempat'"
                            v-model="switch3" />
                        <vs-switch color="danger" disabled="true"
                            v-if="data[indextr].harga_satuan_setempat == 'tanpa harga satuan setempat'"
                            v-model="switch3" />
                    </vs-td>

                    <vs-td :data="data[indextr].harga_satuan_standar">
                        <label for="">{{data[indextr].harga_satuan_standar}}</label>
                        <vs-switch color="success" disabled="true"
                            v-if="data[indextr].harga_satuan_standar != 'tanpa harga satuan standar'"
                            v-model="switch3" />
                        <vs-switch color="danger" disabled="true"
                            v-if="data[indextr].harga_satuan_standar == 'tanpa harga satuan standar'"
                            v-model="switch3" />

                    </vs-td>



                    <vs-td :data="data[indextr].id">
                        <!-- <vs-button color="primary" type="line" icon="visibility" size="small" href="/home/beranda"></vs-button> -->
                        <vs-button color="success" type="line" icon="create" size="small"
                            @click="activePrompt2(indextr, data[indextr].id)"></vs-button>
                        <!-- <vs-button color="warning" type="line" icon="launch" size="small"></vs-button> -->
                        <vs-button color="danger" type="line" icon="delete" size="small"
                            @click="deleteRow(data[indextr].id, indextr, tr)"></vs-button>
                        <div>
                            <div class="centerx con-exemple-prompt">
                                <!-- :vs-is-valid="validName" -->

                                <!-- <vs-prompt @vs-cancel="cancelForm"
                                    @vs-accept="acceptAlert(data[indextr].id, indextr, data[indextr].jenis_barang)"
                                    @vs-close="close" :vs-is-valid="validName" :vs-active.sync="activePrompt2x"
                                    vs-title="Edit Sewa Alat" vs-accept-text="Update">

                                    <div class="con-exemple-prompt">
                                       
                                    </div>
                                </vs-prompt> -->

                                <!-- popup -->
                                <vs-popup title="Edit Harga Barang" :active.sync="activePrompt2x"
                                    style="color:rgb(25,112,255)" @vs-close="close">
                                   
                                    <v-app style="padding-left: 30px">
                                        <form v-on:submit.prevent="submit(data[indextr].id, indextr)">



                                            <v-text-field v-model="edited_value.jenis_barang" v-validate="'required'"
                                                :error-messages="errors.collect('jenisbarang')" label="Jenis Barang"
                                                data-vv-name="jenisbarang" required></v-text-field>

                                            <v-text-field v-model="edited_value.kualitas_barang" v-validate="'required'"
                                                :error-messages="errors.collect('kualitasbarang')"
                                                label="Kualitas Barang" data-vv-name="kualitasbarang" required>
                                            </v-text-field>

                                            <v-checkbox v-model="satuanstandar_t" input-value="true" value color="blue"
                                                :error-messages="errors.collect('satuanstandar')" label="Satuan Standar"
                                                type="checkbox" class="ma-0 pa-0"></v-checkbox>

                                            <v-text-field style="padding-left: 30px;" v-if="satuanstandar_t == true"
                                                v-model="edited_value.satuan_standar" v-validate="'required'"
                                                :error-messages="errors.collect('satuanstandar')" label="Satuan Standar"
                                                data-vv-name="satuanstandar" class="ma-0" required></v-text-field>


                                            <v-checkbox color="blue" v-model="edited_value.merk" input-value="true"
                                                value label="Merk" type="checkbox" class="ma-0 pa-0"></v-checkbox>


                                            <v-checkbox v-model="satuansetempat_t" color="blue"
                                                :error-messages="errors.collect('satuansetempat')" input-value="true"
                                                value label="Satuan setempat (buah, truk, dus, zak, lemar, rol, dll)"
                                                type="checkbox" class="ma-0 pa-0"></v-checkbox>

                                            <v-text-field style="padding-left: 30px;" v-if="satuansetempat_t == true"
                                                v-model="edited_value.satuan_setempat" v-validate="'required'"
                                                :error-messages="errors.collect('satuansetempat')"
                                                label="Satuan Setempat" data-vv-name="satuansetempat" class="ma-0"
                                                required></v-text-field>


                                            <!-- ukuran satuan setempat -->
                                            <vs-list style="padding-left: 20px">
                                                <vs-list-header title="Ukuran Satuan Setempat" style="font-size: 12px;">
                                                </vs-list-header>

                                                <v-checkbox v-model="edited_value.panjang" color="blue"
                                                    input-value="true" value label="Panjang (m)" type="checkbox"
                                                    class="ma-0 pa-0"></v-checkbox>

                                                <v-checkbox v-model="edited_value.lebar" color="blue" input-value="true"
                                                    value label="Lebar (m)" type="checkbox" class="ma-0 pa-0">
                                                </v-checkbox>

                                                <v-checkbox v-model="edited_value.tinggi" color="blue"
                                                    input-value="true" value label="Tinggi (m)" type="checkbox"
                                                    class="ma-0 pa-0"></v-checkbox>

                                                <v-checkbox v-model="edited_value.berat" color="blue" input-value="true"
                                                    value label="Berat (kg)" type="checkbox" class="ma-0 pa-0">
                                                </v-checkbox>
                                            </vs-list>
                                            <hr>
                                            <br>




                                            <!-- ukuran satuan setempat -->
                                            <v-checkbox v-model="edited_value.konversi" color="blue" input-value="true"
                                                value label="Konversi Satuan Setempat ke Satuan Standar" type="checkbox"
                                                class="ma-0 pa-0"></v-checkbox>

                                            <v-checkbox v-model="edited_value.harga_satuan_setempat" color="blue"
                                                input-value="true" value label="Harga per Satuan Setempat (Rp)"
                                                type="checkbox" class="ma-0 pa-0"></v-checkbox>
                                            <v-checkbox v-model="edited_value.harga_satuan_standar" color="blue"
                                                input-value="true" value label="Harga per Satuan Standar (Rp)"
                                                type="checkbox" class="ma-0 pa-0"></v-checkbox>

                                            <vs-button style="width: 70px" type="gradient" >Update
                                            </vs-button>
                                            <!-- <vs-button style="width: 70px" type="gradient">clear</vs-button> -->

                                            <!-- <v-btn @click="submit" color="success">submit</v-btn>
                            <v-btn @click="clear" color="info">clear</v-btn> -->
                                        </form>
                                    </v-app>
                                </vs-popup>
                            </div>
                        </div>

                    </vs-td>


                </vs-tr>
            </template>
        </vs-table>
        <!-- edit -->

       


    </div>



</template>

<script>
    import Vue from 'vue'
    import VeeValidate from 'vee-validate'

    Vue.use(VeeValidate)
    export default {
        $_veeValidate: {
            validator: 'new'
        },
        props: ['datas', 'id'],
        data: () => ({

            //coba edit
            dialogm1: '',
            dialog: false,

            colorz: '#D81B60',
            // hargabarangs: this.datas,
            satuanstandar_t: null,
            satuansetempat_t: null,

            checkBox3: true,
            switch3: true,
            switch5: true,
            switch4: false,
            switch2: true,
            datas_view: [],
            datas_view: [],
            datas_before_edit: '',

            // edit
            id_selected: '',
            index_selected: '',
            dialog: false,
            edited_value: {
                jenis_barang: '',
                kualitas_barang: '',
                satuan_standar: '',
                merk: '',
                satuan_setempat: '',
                panjang: '',
                lebar: '',
                tinggi: '',
                berat: '',
                konversi: '',
                harga_satuan_setempat: '',
                harga_satuan_standar: '',
            },

            activePrompt: false,
            activePrompt2x: false,

            dictionary: {
                attributes: {
                    email: 'E-mail Address'
                    // custom attributes
                },
                custom: {
                    jenisbarang: {
                        required: () => 'Jenis Barang tidak boleh kosong',
                        max: 'The name field may not be greater than 10 characters'
                        // custom messages
                    },
                    kualitasbarang: {
                        required: () => 'Kualitas Barang tidak boleh kosong',
                        max: 'The name field may not be greater than 10 characters'
                        // custom messages
                    },
                    satuanstandar: {
                        required: () => 'Satuan Standar tidak boleh kosong',
                        max: 'The name field may not be greater than 10 characters'
                        // custom messages
                    },
                    satuansetempat: {
                        required: () => 'Satuan Setempat tidak boleh kosong',
                        max: 'The name field may not be greater than 10 characters'
                        // custom messages
                    },

                    select: {
                        required: 'Select field is required'
                    }
                }
            }

        }),
        computed: {
            validName() {
                return (this.edited_value.jenis_barang.length > 0 && this.edited_value.kualitas_barang.length > 0)
            },
        },

        methods: {
            close() {
                this.$vs.notify({
                    color: 'danger',
                    title: 'Closed',
                    text: '<div style="color:white">Ga jadi di edit!</div>'
                })
            },
            deleteRow(id, index, data) {
                console.log(id)
                for (let index = 0; index < this.datas_view.length; index++) {
                  const element = this.datas_view[index];
                  console.log(element.id)
                  if (id == element.id) {
                    Vue.swal({
                    title: 'Yakin?',
                    text: "Kamu akan menghapusnya selama-lamanya",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya beneran',
                    cancelButtonText: 'Ga jadi!',
                }).then((result) => {
                    if (result.value) {
                        const idx = this.datas_view.indexOf(data)
                        console.log(data)

                        axios.delete('/home/beranda/' + id + '/harga_barang/delete')
                            .then(this.datas_view.splice(index, 1));
                        // .then(Vue.delete(this.datas, idx))
                        // this.$emit('Deleted');


                        if (result.value) {
                            Vue.swal(
                                'Hilang!',
                                'Data berhasil dihapus',
                                'success'
                            )
                        }
                    }


                })
                  } 
                }
                

                // .then(response => this.datas.splice(index, 1));

            },
            activePrompt2(index, id) {
                  for (let index = 0; index < this.datas_view.length; index++) {
                  const element = this.datas_view[index];
                  console.log(element.id)
                  if (id == element.id) {
                      this.id_selected = id
                this.index_selected = index
                console.log(id, index, this.id_selected, this.index_selected)
                this.activePrompt2x = true

                this.edited_value.jenis_barang = this.datas_view[index].jenis_barang
                this.edited_value.kualitas_barang = this.datas_view[index].kualitas_barang

                if (this.datas_view[index].satuan_standar != 'tanpa satuan standar') {
                    this.satuanstandar_t = true
                    this.edited_value.satuan_standar = this.datas_view[index].satuan_standar
                } else {
                    this.satuanstandar_t = false
                    this.edited_value.satuan_standar = ''
                }

                if (this.datas_view[index].merk != 'tanpa merk') {
                    this.edited_value.merk = true
                } else {
                    this.edited_value.merk = false
                }


                if (this.datas_view[index].satuan_setempat != 'tanpa satuan setempat') {
                    this.satuansetempat_t = true
                    this.edited_value.satuan_setempat = this.datas_view[index].satuan_setempat
                } else {
                    this.satuansetempat_t = false
                    this.edited_value.satuan_setempat = ''
                }


                if (this.datas_view[index].ukuran_panjang != 'tanpa panjang') {
                    this.edited_value.panjang = true
                } else {
                    this.edited_value.panjang = false
                }

                if (this.datas_view[index].ukuran_lebar != 'tanpa lebar') {
                    this.edited_value.lebar = true
                } else {
                    this.edited_value.lebar = false
                }

                if (this.datas_view[index].ukuran_tinggi != 'tanpa tinggi') {
                    this.edited_value.tinggi = true
                } else {
                    this.edited_value.tinggi = false
                }

                if (this.datas_view[index].ukuran_berat != 'tanpa berat') {
                    this.edited_value.berat = true
                } else {
                    this.edited_value.berat = false
                }

                if (this.datas_view[index].konversi_satuan_setempat != 'tanpa konversi') {
                    this.edited_value.konversi = true
                } else {
                    this.edited_value.konversi = false
                }

                if (this.datas_view[index].harga_satuan_setempat != 'tanpa harga satuan setempat') {
                    this.edited_value.harga_satuan_setempat = true
                } else {
                    this.edited_value.harga_satuan_setempat = false
                }

                if (this.datas_view[index].harga_satuan_standar != 'tanpa harga satuan standar') {
                    this.edited_value.harga_satuan_standar = true
                } else {
                    this.edited_value.harga_satuan_standar = false
                }


                  } 
                }
                

            },
            cancelForm() {
                this.activePrompt2x = false
                this.edited_value.jenis_barang = ''
                this.edited_value.kualitas_barang = ''

                Object.assign(this.datas_view, this.datas_before_edit)
                // this.datas_view = Object.assign({}, this.datas_before_edit);
                this.$vs.notify({
                    color: 'danger',
                    title: 'Closed',
                    text: '<div style="color:white">Ga jadi di edit!</div>'
                })
            },
            submit(id, index) {
                // var a = this.jenis_barang_update(id, index, data)
                // console.log();

                //  id index id_selected

                console.log(id, this.id_selected, index, this.index_selected);
                this.datas_view[this.index_selected].jenis_barang = this.edited_value.jenis_barang
                this.datas_view[this.index_selected].kualitas_barang = this.edited_value.kualitas_barang

                if (this.satuanstandar_t == true) {
                    this.datas_view[this.index_selected].satuan_standar = this.edited_value.satuan_standar
                } else {
                    this.datas_view[this.index_selected].satuan_standar = 'tanpa satuan standar'
                    this.edited_value.satuan_standar = false
                }

                if (this.edited_value.merk) {
                    this.datas_view[this.index_selected].merk = 'bermerk'
                } else {
                    this.datas_view[this.index_selected].merk = 'tanpa merk'
                }


                // this.datas_view[this.index_selected].merk = this.edited_value.merk
                if (this.satuansetempat_t == true) {
                    this.datas_view[this.index_selected].satuan_setempat = this.edited_value.satuan_setempat
                } else {
                    this.datas_view[this.index_selected].satuan_setempat = 'tanpa satuan setempat'
                    this.edited_value.satuan_setempat = false
                }

                if (this.edited_value.panjang) {
                    this.datas_view[this.index_selected].ukuran_panjang = 'panjang'
                } else {
                    this.datas_view[this.index_selected].ukuran_panjang = 'tanpa panjang'
                }

                if (this.edited_value.lebar) {
                    this.datas_view[this.index_selected].ukuran_lebar = 'lebar'
                } else {
                    this.datas_view[this.index_selected].ukuran_lebar = 'tanpa lebar'
                }

                if (this.edited_value.tinggi) {
                    this.datas_view[this.index_selected].ukuran_tinggi = 'tinggi'
                } else {
                    this.datas_view[this.index_selected].ukuran_tinggi = 'tanpa tinggi'
                }

                if (this.edited_value.berat) {
                    this.datas_view[this.index_selected].ukuran_berat = 'berat'
                } else {
                    this.datas_view[this.index_selected].ukuran_berat = 'tanpa berat'
                }

                if (this.edited_value.konversi) {
                    this.datas_view[this.index_selected].konversi_satuan_setempat = 'konversi'
                } else {
                    this.datas_view[this.index_selected].konversi_satuan_setempat = 'tanpa konversi'
                }

                if (this.edited_value.harga_satuan_setempat) {
                    this.datas_view[this.index_selected].harga_satuan_setempat = 'harga satuan setempat'
                } else {
                    this.datas_view[this.index_selected].harga_satuan_setempat = 'tanpa harga satuan setempat'
                }

                if (this.edited_value.harga_satuan_standar) {
                    this.datas_view[this.index_selected].harga_satuan_standar = 'harga satuan standar'
                } else {
                    this.datas_view[this.index_selected].harga_satuan_standar = 'tanpa harga satuan standar'
                }


                this.$validator.validate().then(result => {
                    if (!result) {
                        // do stuff if not valid.
                        Vue.swal(
                            'Oops..',
                            'Ada error :(',
                            'error',
                        );
                    } else {
                        var _this = this
                        axios.post('/home/beranda/' + this.id_selected + '/harga_barang/update', this
                                .edited_value)

                            .then(function () {
                                this.$vs.notify({
                                    color: 'success',
                                    title: 'Updated !!!',
                                    text: '<div style="color:white">Data berhasil di update :) </div>',
                                })
                            });
                    }
                });








                this.activePrompt2x = false;
            },

        },

        beforeMount() {
            this.datas_view = this.datas
        },
        mounted() {
            this.$validator.localize('en', this.dictionary)
            this.datas_before_edit = Object.assign({}, this.datas)
        },

    }

</script>



<style lang="stylus">
.con-exemple-prompt
  padding 10px;
  padding-bottom 0px;
  .vs-input
    width 100%
    margin-top 10px;
</style>