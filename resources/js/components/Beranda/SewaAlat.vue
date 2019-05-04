<template>
    <div>
        <br>
        <vs-button type="gradient" color="danger" :href="'/home/beranda/'+id+'/sewa_alat/create'">Tambah Sewa Alat
        </vs-button>
        <br>
        <vs-table :data="datas_view" max-items="10" pagination search>
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
                <!-- <vs-tr :state="indextr == 2 || indextr == 5?'success':indextr == 6?'danger':null" :key="indextr"             v-for="(tr, indextr) in data"> -->
                    <vs-tr :key="indextr" v-for="(tr, indextr) in data">
                    <vs-td :data="data[indextr].jenis_barang">
                        {{data[indextr].jenis_barang}}
                    </vs-td>

                    <vs-td :data="data[indextr].kualitas_barang">
                        {{data[indextr].kualitas_barang}}
                    </vs-td>

                    <vs-td :data="data[indextr].id">

                        
                        <vs-button @click="activePrompt2(indextr, data[indextr].id)" color="success" type="line" icon="create"
                            size="small">
                        </vs-button>

                        
                        <vs-button color="danger" type="line" icon="delete" size="small"
                            @click="deleteRow(data[indextr].id, indextr, tr)">
                        </vs-button>
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
            datas_before_edit: '',
            
            // edit
            id_selected:'',
            index_selected:'',
            dialog: false,
            edited_value: {
                jenis_barang: '',
                kualitas_barang: ''
            },

            activePrompt: false,
            activePrompt2x: false,
            val: '',
            valMultipe: {
                value1: '',
                value2: ''
            },
        }),
        computed: {
            validName() {
                return (this.edited_value.jenis_barang.length > 0 && this.edited_value.kualitas_barang.length > 0)
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
            jenis_barang_update(id, index, data) {
                var value = event.target.value;
                const idx = this.datas_view.indexOf(data)
                console.log(id, index)
                this.edited_value.jenis_barang = value

                // this.datas_view[index].jenis_barang = value;
                // var a = value;
                // return a;

                // console.log(value)

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
            updateJenisBarang(e) {
                this.$store.commit('updateJenisBarang', e.taget.value)
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

                        axios.delete('/home/beranda/' + id + '/sewa_alat/delete')
                            .then(this.datas_view.splice(index, 1));
    
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