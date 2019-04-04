<template>
    <div>
        <br>
        <vs-button type="gradient" color="danger" :href="'/home/beranda/'+id+'/sewa_alat/create'">Tambah Sewa Alat
        </vs-button>
        <br>
        <vs-table :data="datas" max-items="5" pagination search>
            <template slot="header">
                <h3>
                    Sewa Alat
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
                    Aksi
                </vs-th>

            </template>

            <template slot-scope="{data}">
                <vs-tr :state="indextr == 2 || indextr == 5?'success':indextr == 6?'danger':null" :key="indextr"
                    v-for="(tr, indextr) in data">
                    <vs-td :data="data[indextr].jenis_barang">
                        {{data[indextr].jenis_barang}}
                    </vs-td>

                    <vs-td :data="data[indextr].kualitas_barang">
                        {{data[indextr].kualitas_barang}}
                    </vs-td>





                    <vs-td :data="data[indextr].id">
                        <vs-button color="primary" type="line" icon="visibility" size="small" href="/home/beranda/">
                        </vs-button>
                        <vs-button @click="activePrompt2 = true" color="success" type="line" icon="create" size="small">
                        </vs-button>


                        <!-- edit -->



                        <vs-button color="warning" type="line" icon="launch" size="small"></vs-button>
                        <vs-button color="danger" type="line" icon="delete" size="small" :href="'/home/beranda/'+data[indextr].id+'/sewa_alat/delete'" method="post">
                        <!-- {{method_field('DELETE')}} -->
                        </vs-button>
                        <div>
                            <div class="centerx con-exemple-prompt" >
                                <vs-prompt @vs-cancel="valMultipe.value1='',valMultipe.value2=''"
                                    @vs-accept="acceptAlert" @vs-close="close" :vs-is-valid="validName"
                                    :vs-active.sync="activePrompt2 " vs-title="Edit Sewa Alat" vs-accept-text="Update">
                                    <div class="con-exemple-prompt">

                                        <!-- <vs-input label="Jenis Barang" placeholder="Jenis Barang" :value="data[indextr].jenis_barang" @input="updateJenisBarang"  /> -->
                                        <vs-input label="Jenis Barang" placeholder="Jenis Barang" v-model="jenisbarang_x" :value="1"/>
                                        <vs-input label="Kualitas Barang" placeholder="Kualitas Barang" v-model="valMultipe.value2" />
                                        <!-- v-model="jenisbarang_x" -->
                                        <vs-input label="Kualitas Barang" placeholder="Kualitas Barang"  />



                                        <vs-alert :vs-active="!validName" color="danger" vs-icon="new_releases">
                                            Fields can not be empty please enter the data
                                        </vs-alert>
                                    </div>
                                </vs-prompt>
                            </div>
                        </div>
                    </vs-td>


                </vs-tr>
            </template>
        </vs-table>

        <!-- edit -->
        <!-- <div>
            <div class="centerx con-exemple-prompt">
                <vs-prompt @vs-cancel="valMultipe.value1='',valMultipe.value2=''" @vs-accept="acceptAlert"
                    @vs-close="close" :vs-is-valid="validName" :vs-active.sync="activePrompt2" vs-title="Edit Sewa Alat"
                    vs-accept-text="Update">
                    <div class="con-exemple-prompt">

                        <vs-input label="Jenis Barang" placeholder="Jenis Barang" v-model="valMultipe.value1" />
                        <vs-input label="Kualitas Barang" placeholder="Kualitas Barang" v-model="valMultipe.value2" />



                        <vs-alert :vs-active="!validName" color="danger" vs-icon="new_releases">
                            Fields can not be empty please enter the data
                        </vs-alert>
                    </div>
                </vs-prompt>
            </div>
        </div> -->
    </div>
</template>

<script>
    export default {
        props: ['datas', 'id'],
        data: () => ({
            colorz: '#D81B60',

            checkBox3: true,
            switch3: true,
            switch5: true,
            switch4: false,
            switch2: true,

            // edit
 
            dialog: false,

            activePrompt: false,
            activePrompt2: false,
            val: '',
            valMultipe: {
                value1: '',
                value2: ''
            },
        }),
        computed: {
            validName() {
                return (this.valMultipe.value1.length > 0 && this.valMultipe.value2.length > 0)
            },

            jenisbarang_x: {
                set(val) {
                    this.$store.state.sewaalat.jenis_barang = val
                },
                get(val) {
                    this.$store.state.sewaalat.jenis_barang = val
                    return this.$store.state.sewaalat.jenis_barang
                }
            },
            kualitasbarang_x: {
                set(val) {
                    this.$store.state.sewaalat.kualitas_barang = val
                },
                get() {
                    return this.$store.state.sewaalat.kualitas_barang
                }
            }
        },
        methods: {
            acceptAlert(color) {



                this.$vs.notify({
                    color: 'success',
                    title: 'Updated !!!',
                    text: 'Data berhasil di update :) ',
                })
            },
            close() {
                this.$vs.notify({
                    color: 'danger',
                    title: 'Closed',
                    text: 'You close a dialog!'
                })
            },
            updateJenisBarang(e){
                this.$store.commit('updateJenisBarang', e.taget.value)
            }
        }


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