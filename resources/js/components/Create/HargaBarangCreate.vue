<template>
    <div>
        <br>

        <vs-row vs-justify="left">
            <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="12">
                <vs-card actionable class="cardx">
                    <div slot="header">
                        <span>
                            <vs-breadcrumb style="font-size: 16px" separator="chevron_right" :color="colorz" :items="
                                      [
                                        {
                                          title: 'Home',
                                          url: '/home',
                                          disabled: true,
                                        
                                        },
                                        {
                                          title: 'Beranda',
                                          url: '/home/beranda/'+this.id,
                                          
                                        },
                                        {
                                          title: 'Harga Barang',
                                          
                                          
                                        },
                                        {
                                          title: 'Create',
                                          url: '/home/beranda',
                                          active: true
                                          
                                        },
                                      ]">
                            </vs-breadcrumb>
                        </span>
                    </div>
                </vs-card>
            </vs-col>
        </vs-row>

        <vs-row vs-justify="left">
            <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="12">
                <vs-card actionable class="cardx">
                    <div slot="header">
                        <br>
                        <h3>
                            Tambah Harga Barang
                        </h3>
                        <br>

                        <hr>
                    </div>


                    <v-app>
                        <!-- @on-complete="onComplete" -->
                        <form style="padding-left: 30px" method="POST">
                            <v-text-field v-model="jenisbarang_x" v-validate="'required'" :error-messages="errors.collect('jenisbarang')"
                                label="Jenis Barang" data-vv-name="jenisbarang" required></v-text-field>
                            <v-text-field v-model="kualitasbarang_x" v-validate="'required'" :error-messages="errors.collect('kualitasbarang')"
                                label="Kualitas Barang" data-vv-name="kualitasbarang" required></v-text-field>
                          
                            <v-checkbox v-model="satuanstandar_t" color="blue" :error-messages="errors.collect('satuanstandar')"  
                                value="1" label="Satuan Standar"  type="checkbox" class="ma-0 pa-0"></v-checkbox>
                                
                                <v-text-field style="padding-left: 30px;" v-if="satuanstandar_t == 1" v-model="satuanstandar_x" v-validate="'required'"  :error-messages="errors.collect('satuanstandar')"
                                label="Satuan Standar" data-vv-name="satuanstandar" class="ma-0" required></v-text-field>


                            <v-checkbox v-model="merk_x" color="blue"  
                                value="1" label="Merk"  type="checkbox" class="ma-0 pa-0"></v-checkbox>

                                
                            <v-checkbox v-model="satuansetempat_t" color="blue"  :error-messages="errors.collect('satuansetempat')"  
                                value="1" label="Satuan setempat (buah, truk, dus, zak, lemar, rol, dll)" 
                                type="checkbox"  class="ma-0 pa-0"></v-checkbox>

                                <v-text-field style="padding-left: 30px;" v-if="satuansetempat_t == 1" v-model="satuansetempat_x" v-validate="'required'"  :error-messages="errors.collect('satuansetempat')"
                                label="Satuan Setempat" data-vv-name="satuansetempat" class="ma-0" required></v-text-field>
                            
                            
                            <!-- ukuran satuan setempat -->
                            <vs-list style="padding-left: 20px">
                                <vs-list-header title="Ukuran Satuan Setempat" style="font-size: 12px;"></vs-list-header>

                                <v-checkbox v-model="panjang_x" color="blue"  
                                    value="1" label="Panjang (m)"  type="checkbox"  class="ma-0 pa-0"></v-checkbox>

                                <v-checkbox v-model="lebar_x" color="blue"  
                                    value="1" label="Lebar (m)"  type="checkbox"  class="ma-0 pa-0"></v-checkbox>

                                <v-checkbox v-model="tinggi_x" color="blue"  
                                    value="1" label="Tinggi (m)"  type="checkbox"  class="ma-0 pa-0"></v-checkbox>

                                <v-checkbox v-model="berat_x" color="blue" 
                                    value="1" label="Berat (kg)"  type="checkbox"  class="ma-0 pa-0"></v-checkbox>
                            </vs-list>
                            <hr>
                            <br>




                            <!-- ukuran satuan setempat -->
                            <v-checkbox v-model="konversi_x" color="blue"  
                                value="1" label="Konversi Satuan Setempat ke Satuan Standar" 
                                type="checkbox"  class="ma-0 pa-0"></v-checkbox>

                            <v-checkbox v-model="hargasetempat_x" color="blue"  
                                value="1" label="Harga per Satuan Setempat (Rp)"  type="checkbox"
                                 class="ma-0 pa-0"></v-checkbox>
                            <v-checkbox v-model="hargastandar_x" color="blue" 
                                value="1" label="Harga per Satuan Standar (Rp)"  type="checkbox"
                                 class="ma-0 pa-0"></v-checkbox>

                            <v-btn @click="submit" color="success">submit</v-btn>
                            <v-btn @click="clear" color="info">clear</v-btn>
                        </form>
                    </v-app>
                </vs-card>
            </vs-col>
        </vs-row>

        
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
        props: ['id'],
        data: () => ({
            colorz: '#D81B60',
            jenisbarang: '',
            kualitasbarang: '',
            idx: 1,
            select: null,
            merk_t:null,
            satuanstandar_t:null,
            satuansetempat_t:null,
            items: [
                'Item 1',
                'Item 2',
                'Item 3',
                'Item 4'
            ],
            merk: null,
            hargasetempat: null,
            hargastandar: null,

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

        mounted() {
            this.$validator.localize('en', this.dictionary)
        },

        methods: {

            submit() {
                this.seen = true;
                this.$store.state.loader = true;
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
                        axios.post(('/home/beranda/' + this.id + '/harga_barang/create'), {
                                hargabarang: this.$store.state.hargabarang,
                            })

                            .then(function () {
                                Vue.swal({
                                    title: 'Yeay, berhasil!',
                                    html: 'item telah ditambahkan',
                                    type: 'success',
                                    timer: 5000,
                                    confirmButtonText: 'Ok'
                                }).then(function () {
                                    // axios.get(('/home/beranda/' + this.id))
                                    window.location.href = '/home/beranda/' + _this.id;
                                })
                            });
                    }
                });


            },
            clear() {
                this.jenisbarang_x = ''
                this.kualitasbarang_x = ''
                this.satuanstandar_x = ''
                this.merk_x = null
                this.hargasetempat_x = false
                this.hargastandar_x = false
                this.$validator.reset()
            }
        },
        computed: {
            jenisbarang_x: {
                set(val) {
                    this.$store.state.hargabarang.jenis_barang = val
                },
                get() {
                    return this.$store.state.hargabarang.jenis_barang
                }
            },
            kualitasbarang_x: {
                set(val) {
                    this.$store.state.hargabarang.kualitas_barang = val
                },
                get() {
                    return this.$store.state.hargabarang.kualitas_barang
                }
            },
            satuanstandar_x: {
                set(val) {
                    this.$store.state.hargabarang.satuan_standar = val
                },
                get() {
                    return this.$store.state.hargabarang.satuan_standar
                }
            },
            merk_x: {
                set() {
                    this.$store.state.hargabarang.merk = true
                },
                get() {
                    return this.$store.state.hargabarang.merk
                }
            },
            hargasetempat_x: {
                set() {
                    this.$store.state.hargabarang.harga_setempat = true
                },
                get() {
                    return this.$store.state.hargabarang.harga_setempat
                }
            },
            hargastandar_x: {
                set() {
                    this.$store.state.hargabarang.harga_standar = true
                },
                get() {
                    return this.$store.state.hargabarang.harga_standar
                }
            },
            panjang_x: {
                set() {
                    this.$store.state.hargabarang.panjang = true
                },
                get() {
                    return this.$store.state.hargabarang.panjang
                }
            },
            lebar_x: {
                set() {
                    this.$store.state.hargabarang.lebar = true
                },
                get() {
                    return this.$store.state.hargabarang.lebar
                }
            },
            tinggi_x: {
                set() {
                    this.$store.state.hargabarang.tinggi = true
                },
                get() {
                    return this.$store.state.hargabarang.tinggi
                }
            },
            berat_x: {
                set() {
                    this.$store.state.hargabarang.berat = true
                },
                get() {
                    return this.$store.state.hargabarang.berat
                }
            },
            konversi_x: {
                set() {
                    this.$store.state.hargabarang.konversi = true
                },
                get() {
                    return this.$store.state.hargabarang.konversi
                }
            },
            satuansetempat_x: {
                set(val) {
                    this.$store.state.hargabarang.satuansetempat = val
                },
                get() {
                    return this.$store.state.hargabarang.satuansetempat
                }
            },
            

        }
    }

</script>

