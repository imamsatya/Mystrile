<template>
    <div>
        <br>
        <vs-button type="gradient" color="danger" :href="'/home/beranda/'+id+'/sewa_alat/create'">Tambah Sewa Alat
        </vs-button>
        <br>
        <vs-table :data="datas_view" max-items="5" pagination search>
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
                        <!-- edit -->
                        <vs-button @click="activePrompt2 = true" color="success" type="line" icon="create" size="small">
                        </vs-button>
                        
                        <vs-button color="warning" type="line" icon="launch" size="small"></vs-button>
                        <!-- <vs-button color="danger" type="line" icon="delete" size="small" :href="'/home/beranda/'+data[indextr].id+'/sewa_alat/delete'" method="post"> -->

                        <!-- :key="indextr"   v-for="(tr, indextr) in data" > -->
                        <!-- <vs-button color="danger" type="line" icon="delete" size="small" @click="deleteRow(indextr, tr)"> -->
                        <vs-button color="danger" type="line" icon="delete" size="small"
                            @click="deleteRow(data[indextr].id, indextr, tr)">
                        </vs-button>
                        <div>
                            <div class="centerx con-exemple-prompt">
                                <!-- :vs-is-valid="validName" -->
                                <!-- <vs-prompt @vs-cancel="valMultipe.value1='',valMultipe.value2=''" -->
                                <vs-prompt @vs-cancel="edited_value.jenis_barang='', edited_value.kualitas_barang=''"
                                    @vs-accept="acceptAlert(data[indextr].id, indextr, data[indextr].jenis_barang)" @vs-close="close"
                                    :vs-is-valid="true" :vs-active.sync="activePrompt2 " vs-title="Edit Sewa Alat"
                                    vs-accept-text="Update">

                                    <div class="con-exemple-prompt">

                                        <!-- {{csrfToken()}} -->
                                        <!-- <vs-input label="Jenis Barang" placeholder="Jenis Barang" :value="data[indextr].jenis_barang" @input="updateJenisBarang"  /> -->
                                        <vs-input label="Jenis Barang" placeholder="Jenis Barang"
                                            v-model="data[indextr].jenis_barang" name="jenis_barang_new"
                                            @input="jenis_barang_update(data[indextr].id, indextr, data[indextr].jenis_barang)" />
                                        <vs-input label="Kualitas Barang" placeholder="Kualitas Barang"
                                            v-model="data[indextr].kualitas_barang" name="kualitas_barang_new" />
                                        <!-- v-model="jenisbarang_x" -->
                                        <!-- <vs-input label="Kualitas Barang" placeholder="Kualitas Barang" /> -->




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

    <!-- {{this.datas[0].jenis_barang}} -->
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
            datas_view: [],
            datas_before_edit:'',
            // edit

            dialog: false,
            edited_value:{
                jenis_barang:'',
                kualitas_barang:''
            },

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
            //     cancelForm() {
            // Object.assign(this.datas_view, this.datas_before_edit)
            // },
            jenis_barang_update(id, index, data) {
                var value = event.target.value;
                const idx = this.datas_view.indexOf(data)
                console.log(id, index)
                // this.edited_value.jenis_barang = value

                this.datas_view[index].jenis_barang = value;
                // var a = value;
                // return a;

                // console.log(value)

            },
            acceptAlert(id, index, data) {
                // var a = this.jenis_barang_update(id, index, data)
                // console.log();
                axios.post('/home/beranda/' + id + '/sewa_alat/update',  this.datas_view[index])

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
            updateJenisBarang(e) {
                this.$store.commit('updateJenisBarang', e.taget.value)
            },
            deleteRow(id, index, data) {
                console.log(id)
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

                        axios.delete('/home/beranda/' + id + '/sewa_alat/delete')
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

                // .then(response => this.datas.splice(index, 1));

            },
        },
        beforeMount() {
            this.datas_view = this.datas
        },
        // created() {
        //     this.datas_before_edit = Object.assign({}, this.datas_view)
        // },

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