<template>
  <div>
      <br>
      <vs-button type="gradient" color="danger" :href="'/home/beranda/'+id+'/jasa_konstruksi/create'">Tambah Jasa</vs-button>
      <br>
    <vs-table :data="datas_view" max-items="5" pagination search>
      <template slot="header">
        <h3>
          Jasa Konstruksi
        </h3>
      </template>
      <template slot="thead">
        <vs-th style="font-size: 14px">
          Jasa Konstruksi
        </vs-th>
       
        <vs-th style="font-size: 14px">
            Aksi
        </vs-th>
        
      </template>

      <template slot-scope="{data}">
        <vs-tr :state="indextr == 2 || indextr == 5?'success':indextr == 6?'danger':null" :key="indextr" v-for="(tr, indextr) in data" >
          <vs-td :data="data[indextr].jasa_konstruksi">
            {{data[indextr].jasa_konstruksi}}
          </vs-td>

          

        

          

          <vs-td :data="data[indextr].id">
           <!-- <vs-button color="primary" type="line" icon="visibility" size="small" href="/home/beranda"></vs-button> -->
           <vs-button color="success" type="line" icon="create" size="small" @click="activePrompt2(indextr, data[indextr].id)"></vs-button>


           <!-- <vs-button color="warning" type="line" icon="launch" size="small"></vs-button> -->
           <vs-button color="danger" type="line" icon="delete" size="small" @click="deleteRow(data[indextr].id, indextr, tr)"></vs-button>

            <div>
                            <div class="centerx con-exemple-prompt">
                                <!-- :vs-is-valid="validName" -->

                                <vs-prompt @vs-cancel="cancelForm"
                                    @vs-accept="acceptAlert(data[indextr].id, indextr, data[indextr].jasa_konstruksi)"
                                    @vs-close="close" :vs-is-valid="validName" :vs-active.sync="activePrompt2x"
                                    vs-title="Edit Jasa Konstruksi" vs-accept-text="Update">

                                    <div class="con-exemple-prompt">
                                        <vs-input label="Jenis Barang" placeholder="Jenis Barang"
                                            v-model="edited_value.jasa_konstruksi" name="jasa_konstruksi_new" />

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
  </div>
</template>

<script>
export default {
  props: ['datas', 'id'],
  data:()=>({
    colorz: '#D81B60',
    users:[
      {
        "id": 1,
        "name": "Leanne Graham",
        "username": "Bret",
        "email": "Sincere@april.biz",
        "website": "hildegard.org",
      },
      {
        "id": 2,
        "name": "Ervin Howell",
        "username": "Antonette",
        "email": "Shanna@melissa.tv",
        "website": "anastasia.net",
      },
      {
        "id": 3,
        "name": "Clementine Bauch",
        "username": "Samantha",
        "email": "Nathan@yesenia.net",
        "website": "ramiro.info",
      },
      {
        "id": 4,
        "name": "Patricia Lebsack",
        "username": "Karianne",
        "email": "Julianne.OConner@kory.org",
        "website": "kale.biz",
      },
      {
        "id": 5,
        "name": "Chelsey Dietrich",
        "username": "Kamren",
        "email": "Lucio_Hettinger@annie.ca",
        "website": "demarco.info",
      },
      {
        "id": 6,
        "name": "Mrs. Dennis Schulist",
        "username": "Leopoldo_Corkery",
        "email": "Karley_Dach@jasper.info",
        "website": "ola.org",
      },
      {
        "id": 7,
        "name": "Kurtis Weissnat",
        "username": "Elwyn.Skiles",
        "email": "Telly.Hoeger@billy.biz",
        "website": "elvis.io",
      },
      {
        "id": 8,
        "name": "Nicholas Runolfsdottir V",
        "username": "Maxime_Nienow",
        "email": "Sherwood@rosamond.me",
        "website": "jacynthe.com",
      },
      {
        "id": 9,
        "name": "Glenna Reichert",
        "username": "Delphine",
        "email": "Chaim_McDermott@dana.io",
        "website": "conrad.com",
      },
      {
        "id": 10,
        "name": "Clementina DuBuque",
        "username": "Moriah.Stanton",
        "email": "Rey.Padberg@karina.biz",
        "website": "ambrose.net",
      }
    ],
    checkBox3:true,
    switch3:true,
    switch5:true,
    switch4:false,
    switch2:true,
    datas_view:[],
     datas_before_edit: '',

    id_selected:'',
    index_selected:'',
    edited_value: {
                jasa_konstruksi: '',
                kualitas_barang: ''
            },

            activePrompt: false,
            activePrompt2x: false,
  }),
  computed: {
            validName() {
                return (this.edited_value.jasa_konstruksi.length > 0 )
                // return (true)
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
                    if (result.value){
                        const idx = this.datas_view.indexOf(data)
                    console.log(data)
                    
                    axios.delete('/home/beranda/' + id + '/jasa_konstruksi/delete')
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
                this.edited_value.jasa_konstruksi = this.datas_view[index].jasa_konstruksi
                
            },
            cancelForm() {
                this.activePrompt2x = false
                this.edited_value.jasa_konstruksi = ''
              

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
                 console.log(id, this.id_selected, index, this.index_selected);
                this.datas_view[this.index_selected].jasa_konstruksi = this.edited_value.jasa_konstruksi
                axios.post('/home/beranda/' + this.id_selected + '/jasa_konstruksi/update', this.edited_value)

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
  beforeMount(){
           this.datas_view = this.datas
         },
         mounted() {
            this.datas_before_edit = Object.assign({}, this.datas)
        },

}
</script>