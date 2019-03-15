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
                            <!-- <v-select
                                v-model="select"
                                v-validate="'required'"
                                :items="items"
                                :error-messages="errors.collect('select')"
                                label="Select"
                                data-vv-name="select"
                                required
                                ></v-select> -->
                            <v-checkbox v-model="satuanstandar_x" v-validate="'required'" :error-messages="errors.collect('satuanstandar')"
                                value="1" label="Satuan Standar" data-vv-name="checkbox" type="checkbox" class="ma-0 pa-0"></v-checkbox>
                            <v-checkbox v-model="merk_x" v-validate="'required'" :error-messages="errors.collect('merk')"
                                value="1" label="Merk" data-vv-name="checkbox" type="checkbox" class="ma-0 pa-0"></v-checkbox>
                            <v-checkbox v-model="hargasetempat_x" v-validate="'required'" :error-messages="errors.collect('hargasetempat')"
                                value="1" label="Harga per Satuan Setempat (Rp)" data-vv-name="checkbox" type="checkbox"
                                required class="ma-0 pa-0"></v-checkbox>
                            <v-checkbox v-model="hargastandar_x" v-validate="'required'" :error-messages="errors.collect('hargastandar')"
                                value="1" label="Harga per Satuan Standar (Rp)" data-vv-name="checkbox" type="checkbox"
                                required class="ma-0 pa-0"></v-checkbox>

                            <v-btn @click="submit" color="success">submit</v-btn>
                            <v-btn @click="clear" color="info">clear</v-btn>
                        </form>
                    </v-app>
                </vs-card>
            </vs-col>
        </vs-row>

        {{id}}
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
            items: [
                'Item 1',
                'Item 2',
                'Item 3',
                'Item 4'
            ],
            satuanstandar: null,
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

                        // .then(function () {
                        //     Vue.swal({
                        //         title: 'Yeay, berhasil!',
                        //         html: 'item telah ditambahkan',
                        //         type: 'success',
                        //         timer: 5000,
                        //         confirmButtonText: 'Ok'
                        //     })
                        // }).then(function () {
                        //         axios.get(('/home/beranda/' + this.id))
                        //          window.location.href = "/home/beranda/"+ this.id;
                        //     });
                    }
                });


            },
            clear() {
                this.jenisbarang_x = ''
                this.kualitasbarang_x = ''
                this.satuanstandar_x = false
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
                set() {
                    this.$store.state.hargabarang.satuan_standar = true
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
            }

        }
    }

</script>
