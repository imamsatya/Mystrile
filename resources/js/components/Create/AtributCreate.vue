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
                                          title: 'Atribut',
                                          url: '/home',
                                          
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
                            Tambah Atribut
                        </h3>
                        <br>

                        <hr>
                    </div>
                    <v-app>
                        <form>
                            <v-text-field v-model="atribut_x" v-validate="'required'" :error-messages="errors.collect('jenisbarang')"
                                label="Nama Set Atribut" data-vv-name="jenisbarang" required></v-text-field>




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

        data: () => ({
            colorz: '#D81B60',
            jenisbarang: '',
            kualitasbarang: '',
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
                        required: () => 'Nama Set Atribut tidak boleh kosong',
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
                this.$store.state.loader=true;
                this.$validator.validate().then(result => {
                    if (!result) {
                        // do stuff if not valid.
                        Vue.swal(
                                       'Oops..',
                                        'Ada error :(',
                                        'error',                                        
                                    );
                    } else {
                        axios.post('/home/atribut/create', {
                                setatribut: this.$store.state.setatribut,
                            })

                           .then(function () {
                                Vue.swal({
                                    title: 'Yeay, berhasil!',
                                    html: 'item telah ditambahkan',
                                    type: 'success',
                                    timer: 5000,
                                    confirmButtonText: 'Ok'
                                }).then(function () {
                                    window.location.href = "/home";
                                })
                            });
                    }
                });


            },
            clear() {
                this.atribut_x = ''
                this.kualitasbarang = ''
                this.select = null
                this.checkbox = null
                this.$validator.reset()
            }
        },
        computed:{
          atribut_x: {
                set(val) {
                    this.$store.state.setatribut.nama_atribut = val
                },
                get() {
                    return this.$store.state.setatribut.nama_atribut
                }
            },
        }
    }

</script>
