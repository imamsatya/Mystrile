<template>
  <div>
      <br>
      <vs-button type="gradient" color="danger" :href="'/home/atribut/'+id+'/jasa_konstruksi/create'">Tambah Jasa</vs-button>
      <br>
     
    <vs-table :sst="true" :data="datas_view" max-items="10" pagination search stripe v-model="selected" @selected="handleSelected"
      >
      <template slot="header">
        <h3>
          Jasa Konstruksi
        </h3>
      </template>
      <template slot="thead">
        <vs-th style="font-size: 14px" sort-key="jenis_jasa">
          Jasa Konstruksi
        </vs-th>

        <vs-th style="font-size: 14px" sort-key="satuan_unit">
          Satuan Unit
        </vs-th>
       
        <vs-th style="font-size: 14px">
            Aksi
        </vs-th>
        
      </template>

      <template slot-scope="{data}">
        <!-- <vs-tr :state="indextr == 2 || indextr == 5?'success':indextr == 6?'danger':null" :key="indextr" v-for="(tr, indextr) in data" > -->
            <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data">
          <vs-td :data="data[indextr].jenis_jasa">
            {{data[indextr].jenis_jasa}}
           
          </vs-td>

           
          <vs-td :data="data[indextr].satuan_unit">
            {{data[indextr].satuan_unit}}
           
          </vs-td>

          

        

          

          <vs-td :data="data[indextr].id">
           <!-- <vs-button color="primary" type="line" icon="visibility" size="small" href="/home/atribut"></vs-button> -->
           <vs-button color="success" type="line" icon="create" size="small" @click="activePrompt2(indextr, data[indextr].id)"></vs-button>


           <!-- <vs-button color="warning" type="line" icon="launch" size="small"></vs-button> -->
           <vs-button color="danger" type="line" icon="delete" size="small" @click="deleteRow(data[indextr].id, indextr, tr)"></vs-button>

            <div>
                            <div class="centerx con-exemple-prompt">
                                

                                <vs-popup class="holamundo"  style="color:rgb(25,112,255)" @vs-close="close" title="Edit Jasa Konstruksi" :active.sync="activePrompt2x">
                                      <div class="con-exemple-prompt">
                                          <vs-input label="Jasa Konstruksi" placeholder="Jasa Konstruksi" :danger="danger"
                                              danger-text="Jasa konstruksi tidak boleh kosong"
                                              v-model="edited_value.jenis_jasa" name="jasa_konstruksi_new" />
                                              <br>
                                          

                                              <vs-select
                                                class="selectExample"
                                                label="Satuan Unit"
                                                v-model="select1"
                                                >
                                                
                                                  <vs-select-item :key="index" :value="item.value" :text="item.text" v-for="(item,index) in options1" />
                                                </vs-select>
                                                <br>
                                                <br>

                                                <vs-button @click="acceptAlert(data[indextr].id, indextr, data[indextr])"  style="width: 70px" type="gradient" 
                                                         
                                                         >Update
                                                        </vs-button>

                                          <vs-alert :vs-active="!validName" color="danger" vs-icon="new_releases">
                                              Fields can not be empty please enter the data
                                          </vs-alert>


                                      </div>
                                </vs-popup>
                            </div>
                        </div>
          </vs-td>

          
        </vs-tr>
      </template>
    </vs-table>
  </div>
</template>

<script>
export default {
  props: ['datas', 'id'],
  data:()=>({
    items: [
                'O-H',
                'Titik',
               
            ],
            select:'',
      select1:2,
       options1:[
        {text:'O-H',value:0},
        {text:'Titik',value:1},
      ],
    colorz: '#D81B60',
    danger:false,
    checkBox3:true,
     selected:[],
    datas_view:[],
     datas_before_edit: '',

    id_selected:'',
    index_selected:'',
    edited_value: {
                jenis_jasa: '',
                satuan_unit: ''
            },

            activePrompt: false,
            activePrompt2x: false,
  }),
  computed: {
            validName() {
                return (this.edited_value.jenis_jasa.length > 0 )
                // return (true)
            },
  },
  methods: {
     handleSelected(tr) {
                this.$vs.notify({
                    title:`${tr.jenis_jasa}`,
                    text:`<div style="color:white"> Satuan Unit : ${tr.satuan_unit} </div>`
                })
             }
             ,
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
                    if (result.value){
                        const idx = this.datas_view.indexOf(data)
                    console.log(data)
                    
                    axios.delete('/home/atribut/' + id + '/jasa_konstruksi/delete')
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
                  } 
                }
                
              
                
                // .then(response => this.datas.splice(index, 1));

            },
             activePrompt2(index, id) {
                for (let index = 0; index < this.datas_view.length; index++) {
                  const element = this.datas_view[index];
                  console.log(element.id)
                  if (id == element.id) {
                    this.id_selected = id
                this.index_selected = index
                console.log(id, index, this.id_selected, this.index_selected)
                this.activePrompt2x = true
                this.edited_value.jenis_jasa = this.datas_view[index].jenis_jasa
                this.edited_value.satuan_unit = this.datas_view[index].satuan_unit
                if (this.edited_value.satuan_unit == "O-H") {
                  this.select1 = 0 
                }else{
                  this.select1 = 1
                }
                  } 
                }
                
                
            },
            cancelForm() {
                this.activePrompt2x = false
                this.edited_value.jenis_jasa = ''
                this.edited_value.satuan_unit = ''

                Object.assign(this.datas_view, this.datas_before_edit)
                // this.datas_view = Object.assign({}, this.datas_before_edit);

                 this.$vs.notify({
                    color: 'danger',
                    title: 'Closed',
                    text: '<div style="color:white">Ga jadi di edit!</div>'
                })
            },
            acceptAlert(id, index, data) {
                // var a = this.jasa_konstruksi_update(id, index, data)
                // console.log();
                
                //  id index id_selected
                 console.log(id, this.id_selected, index, this.index_selected, this.select1);
                this.datas_view[this.index_selected].jenis_jasa = this.edited_value.jenis_jasa
                if (this.select1 == 0) {
                  this.edited_value.satuan_unit = "O-H"
                }else{
                  this.edited_value.satuan_unit = "Titik"
                }
                if (this.edited_value.jenis_jasa != '') {
                   this.datas_view[this.index_selected].satuan_unit = this.edited_value.satuan_unit
                axios.post('/home/atribut/' + this.id_selected + '/jasa_konstruksi/update', this.edited_value)
                this.activePrompt2x = false;
                this.$vs.notify({
                    color: 'success',
                    title: 'Updated !!!',
                    text: '<div style="color:white">Data berhasil di update :) </div>',
                })
                }else{
                  this.danger = true,
                   this.$vs.notify({
                    color: 'danger',
                    title: 'Error !!!',
                    text: '<div style="color:white">Ada error </div>',
                })
                }
            },
            close() {
                this.$vs.notify({
                    color: 'danger',
                    title: 'Closed',
                    text: '<div style="color:white">Ga jadi di edit!</div>'
                })
            },
  },
  beforeMount(){
           this.datas_view = this.datas
         },
         mounted() {
            this.datas_before_edit = Object.assign({}, this.datas)
        },

}
</script>