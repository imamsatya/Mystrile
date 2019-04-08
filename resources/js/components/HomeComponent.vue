<template>
    <div>
      <br>
      
        <vs-row vs-justify="left">
            <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="12">
                <vs-card actionable class="cardx" >
                    <div slot="header">     
                        <span>
                          <vs-breadcrumb style="font-size: 16px"  separator="chevron_right" :items="
                              [
                                {
                                  title: 'Home',
                                  url: '/home',
                                  active: true,
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
                            Daftar Atribut
                        </h3>
                        <br>

                        <hr>
                    </div>
                   
                    <vs-button color="danger" type="gradient" href="/home/atribut/create" >Tambah Atribut</vs-button>
                    <vs-table :data="datas_view" max-items="5" pagination search>
                        <template slot="header">
                            <br>
                            <div style="padding-left: 30px;">
                                <h3>

                                </h3>
                                <hr>
                            </div>
                            <br>
                        </template>
                        <template slot="thead">
                            <vs-th style="font-size: 14px">
                                Nama set atribut
                            </vs-th>
                            <vs-th style="font-size: 14px">
                                Aksi
                            </vs-th>

                        </template>

                        <template slot-scope="{data}">
                            <vs-tr :state="indextr == 2 || indextr == 5?'success':indextr == 6?'danger':null" :key="indextr"
                                v-for="(tr, indextr) in data">
                                <vs-td :data="data[indextr].nama_set_atribut" style="font-size: 12px">
                                    {{data[indextr].nama_set_atribut}}
                                </vs-td>

                                <vs-td :data="data[indextr].id">
                                    <vs-button color="primary" type="line" icon="visibility" size="small" :href="'/home/beranda/'+data[indextr].id"></vs-button>
                                    <vs-button color="success" type="line" icon="create" size="small" @click="activePrompt2(indextr, data[indextr].id)"></vs-button>
                                    <vs-button color="warning" type="line" icon="launch" size="small" :href="'/home/'+data[indextr].id"></vs-button>
                                    <vs-button color="danger" type="line" icon="delete" size="small"
                                    @click="deleteRow(data[indextr].id, indextr, tr)"
                                    ></vs-button>

                                    <div>
                            <div class="centerx con-exemple-prompt">
                                <!-- :vs-is-valid="validName" -->

                                <vs-prompt @vs-cancel="cancelForm"
                                    @vs-accept="acceptAlert(data[indextr].id, indextr, data[indextr].jenis_barang)"
                                    @vs-close="close" :vs-is-valid="validName" :vs-active.sync="activePrompt2x"
                                    vs-title="Edit Set Atribut" vs-accept-text="Update">

                                    <div class="con-exemple-prompt">
                                        <vs-input label="Nama Set Atribut" placeholder="Nama set atribut"
                                            v-model="edited_value.nama_set_atribut" name="jenis_barang_new" />

                                       

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
                </vs-card>
            </vs-col>
        </vs-row>

    </div>
</template>

<script>
    export default {
        props: ['datas'],
        data: () => ({
           datas_view:[],
           id_selected:'',
           index_selected:'',
           edited_value:{
               nama_set_atribut:''
           }
        }),
        computed:{
            validName() {
                return (this.edited_value.nama_set_atribut.length > 0 )
            },
        },
        methods:{
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

                        axios.delete('/home/atribut/' + id + '/delete')
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

                // .then(response => this.datas.splice(index, 1));

            },
            activePrompt2(index, id) {
                
                this.id_selected = id
                this.index_selected = index
                console.log(id, index, this.id_selected, this.index_selected)
                this.activePrompt2x = true
                this.edited_value.nama_set_atribut = this.datas_view[index].nama_set_atribut
                

            },
            cancelForm() {
                this.activePrompt2x = false
                this.edited_value.nama_set_atribut = ''
       

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
                this.datas_view[this.index_selected].nama_set_atribut = this.edited_value.nama_set_atribut
               
                axios.post('/home/atribut/' + this.id_selected + '/update', this.edited_value)

                this.$vs.notify({
                    color: 'success',
                    title: 'Updated !!!',
                    text: '<div style="color:white">Data berhasil di update :) </div>',
                })
            },
        },
        beforeMount() {
            this.datas_view = this.datas
        },
    }

</script>
