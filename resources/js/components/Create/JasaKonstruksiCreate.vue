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
                                          url: '/home/beranda',
                                          
                                        },
                                        {
                                          title: 'Jasa Konstruksi',
                                          
                                          
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
                <vs-card  class="cardx">
                    <div slot="header">
                        <br>
                        <h3>
                            Tambah Jasa Konstruksi
                        </h3>
                        <br>

                        <hr>
                    </div>
                    <v-app>
                        <form>
                            <v-text-field v-model="jasakonstruksi_x" v-validate="'required'" :error-messages="errors.collect('jenisbarang')"
                                label="Jasa Konstruksi" data-vv-name="jenisbarang" required></v-text-field>

                            <v-select
                                v-model="select"
                                v-validate="'required'"
                                :items="items"
                                :error-messages="errors.collect('select')"
                                label="Satuan Unit"
                                data-vv-name="select"
                                required
                                ></v-select>

                            <br>
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
            select: null,
            items: [
                'O-H',
                'Titik',
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
                        required: 'Satuan Unit tidak boleh kosong'
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
                        var _this = this;
                        console.log(this.select)
                        axios.post(('/home/beranda/' + this.id + '/jasa_konstruksi/create'), {
                                jasakonstruksi: this.$store.state.jasakonstruksi,
                                selected: this.select
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
                this.jasakonstruksi_x = ''
                this.kualitasbarang = ''
                this.select = null
                this.checkbox = null
                this.$validator.reset()
            }
        },
        computed: {
            jasakonstruksi_x: {
                set(val) {
                    this.$store.state.jasakonstruksi.jasa_konstruksi = val
                },
                get() {
                    return this.$store.state.jasakonstruksi.jasa_konstruksi
                }
            },
        }
    }

</script>
