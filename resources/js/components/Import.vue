<template>

    <div>
        <!-- <h1>Halo</h1> -->
       
        <v-container bg fill-height grid-list-md>
            <v-layout row wrap align-center>
                <vs-row vs-justify="center">
                    <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="12">
                        <vs-card actionable class="cardx"
                            card-background="linear-gradient(120deg, #7f7fd5, #86a8e7, #91eae4)">
                            <div slot="header">
                          
                                <br>

                                <!-- <vs-divider border-style="dashed" color="danger">
                                    <h2 style="color:#D81B60;" class="animated tada">
                                        Mystrile
                                    </h2>

                                </vs-divider> -->


                            </div>


                            <form action="http://localhost:8000/home/atribut/import_store">
                            <input type="file" name="asdds" id="" >   <br>

                            <vs-button color="success" type="gradient" icon="swap_vert" size="small">import</vs-button>
                            </form>
                            <!-- <vs-upload action="http://localhost:8000/home/atribut/import_store" @on-success="successUpload" /> -->
                            <vs-upload action="https://jsonplaceholder.typicode.com/posts/" @on-success="successUpload" />
                            
                            <br>

                            <div>  
  <b>Import Excel File:</b>  
  <div>  
    <input type="file" class="fileSelect" @change='fileChange($event)' />  
  </div>  
</div>

                        </vs-card>
                    </vs-col>
                </vs-row>
            </v-layout>
        </v-container>
        
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
            filex: null,
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


