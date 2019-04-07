<template>
    <div>
        <br>

        <vs-button type="gradient" color="danger" :href="'/home/beranda/'+id+'/harga_barang/create'">Tambah Harga Barang
        </vs-button>
        <br>
        <vs-table :data="datas_view" max-items="5" pagination search>
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
                        <vs-switch color="success" v-if="data[indextr].satuan_setempat != 'tanpa satuansetempat'"
                            disabled="true" v-model="switch3" />
                        <vs-switch color="danger" v-if="data[indextr].satuan_setempat == 'tanpa satuansetempat'"
                            disabled="true" v-model="switch3" />
                    </vs-td>

                    <vs-td :data="data[indextr].panjang">
                        <label for="">{{data[indextr].panjang}}</label>
                        <vs-switch color="success" v-if="data[indextr].panjang != 'tanpa panjang'" disabled="true"
                            v-model="switch3" />
                        <vs-switch color="danger" v-if="data[indextr].panjang == 'tanpa panjang'" disabled="true"
                            v-model="switch3" />
                    </vs-td>

                    <vs-td :data="data[indextr].lebar">
                        <label for="">{{data[indextr].lebar}}</label>
                        <vs-switch color="success" v-if="data[indextr].lebar != 'tanpa lebar'" disabled="true"
                            v-model="switch3" />
                        <vs-switch color="danger" v-if="data[indextr].lebar == 'tanpa lebar'" disabled="true"
                            v-model="switch3" />
                    </vs-td>

                    <vs-td :data="data[indextr].tinggi">
                        <label for="">{{data[indextr].tinggi}}</label>
                        <vs-switch color="success" v-if="data[indextr].tinggi != 'tanpa tinggi'" disabled="true"
                            v-model="switch3" />
                        <vs-switch color="danger" v-if="data[indextr].tinggi == 'tanpa tinggi'" disabled="true"
                            v-model="switch3" />
                    </vs-td>

                    <vs-td :data="data[indextr].berat">
                        <label for="">{{data[indextr].berat}}</label>
                        <vs-switch color="success" v-if="data[indextr].berat != 'tanpa berat'" disabled="true"
                            v-model="switch3" />
                        <vs-switch color="danger" v-if="data[indextr].berat == 'tanpa berat'" disabled="true"
                            v-model="switch3" />
                    </vs-td>

                    <vs-td :data="data[indextr].konversi">
                        <label for="">{{data[indextr].konversi}}</label>
                        <vs-switch color="success" v-if="data[indextr].konversi != 'tanpa konversi'" disabled="true"
                            v-model="switch3" />
                        <vs-switch color="danger" v-if="data[indextr].konversi == 'tanpa konversi'" disabled="true"
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

                                <vs-prompt @vs-cancel="cancelForm"
                                    @vs-accept="acceptAlert(data[indextr].id, indextr, data[indextr].jenis_barang)"
                                    @vs-close="close" :vs-is-valid="validName" :vs-active.sync="activePrompt2x"
                                    vs-title="Edit Sewa Alat" vs-accept-text="Update">

                                    <div class="con-exemple-prompt">
                                        <vs-input label="Jenis Barang" placeholder="Jenis Barang"
                                            v-model="edited_value.jenis_barang" name="jenis_barang_new" />

                                        <vs-input label="Kualitas Barang" placeholder="Kualitas Barang"
                                            v-model="edited_value.kualitas_barang" name="kualitas_barang_new" />

                                           <vs-input label="Jenis Barang" placeholder="Jenis Barang"
                                            v-model="edited_value.jenis_barang" name="jenis_barang_new" />

                                        <vs-input label="Kualitas Barang" placeholder="Kualitas Barang"
                                            v-model="edited_value.kualitas_barang" name="kualitas_barang_new" />

                                             <vs-input label="Jenis Barang" placeholder="Jenis Barang"
                                            v-model="edited_value.jenis_barang" name="jenis_barang_new" />

                                        <vs-input label="Kualitas Barang" placeholder="Kualitas Barang"
                                            v-model="edited_value.kualitas_barang" name="kualitas_barang_new" />

                                             <vs-input label="Jenis Barang" placeholder="Jenis Barang"
                                            v-model="edited_value.jenis_barang" name="jenis_barang_new" />

                                        <vs-input label="Kualitas Barang" placeholder="Kualitas Barang"
                                            v-model="edited_value.kualitas_barang" name="kualitas_barang_new" />

                                             <vs-input label="Jenis Barang" placeholder="Jenis Barang"
                                            v-model="edited_value.jenis_barang" name="jenis_barang_new" />

                                        <vs-input label="Kualitas Barang" placeholder="Kualitas Barang"
                                            v-model="edited_value.kualitas_barang" name="kualitas_barang_new" />

                                             <vs-input label="Jenis Barang" placeholder="Jenis Barang"
                                            v-model="edited_value.jenis_barang" name="jenis_barang_new" />

                                        <vs-input label="Kualitas Barang" placeholder="Kualitas Barang"
                                            v-model="edited_value.kualitas_barang" name="kualitas_barang_new" />

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





    </div>



</template>

<script>
    export default {
        props: ['datas', 'id'],
        data: () => ({

            colorz: '#D81B60',
            // hargabarangs: this.datas,

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
                kualitas_barang: ''
            },

            activePrompt: false,
            activePrompt2x: false,

        }),
        computed: {
            validName() {
                return (this.edited_value.jenis_barang.length > 0 && this.edited_value.kualitas_barang.length > 0)
            },
        },

        methods: {
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

                // .then(response => this.datas.splice(index, 1));

            },
            activePrompt2(index, id) {

                this.id_selected = id
                this.index_selected = index
                console.log(id, index, this.id_selected, this.index_selected)
                this.activePrompt2x = true
                this.edited_value.jenis_barang = this.datas_view[index].jenis_barang
                this.edited_value.kualitas_barang = this.datas_view[index].kualitas_barang

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
            acceptAlert(id, index, data) {
                // var a = this.jenis_barang_update(id, index, data)
                // console.log();

                //  id index id_selected
                console.log(id, this.id_selected, index, this.index_selected);
                this.datas_view[this.index_selected].jenis_barang = this.edited_value.jenis_barang
                this.datas_view[this.index_selected].kualitas_barang = this.edited_value.kualitas_barang
                axios.post('/home/beranda/' + this.id_selected + '/sewa_alat/update', this.edited_value)

                this.$vs.notify({
                    color: 'success',
                    title: 'Updated !!!',
                    text: '<div style="color:white">Data berhasil di update :) </div>',
                })
            },
            close() {
                this.$vs.notify({
                    color: 'danger',
                    title: 'Closed',
                    text: '<div style="color:white">Ga jadi di edit!</div>'
                })
            },
        },

        beforeMount() {
            this.datas_view = this.datas
        },
        mounted() {
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