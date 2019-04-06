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

          

        

          

          <vs-td :data="data[indextr].username">
           <vs-button color="primary" type="line" icon="visibility" size="small" href="/home/beranda"></vs-button>
           <vs-button color="success" type="line" icon="create" size="small"></vs-button>
           <vs-button color="warning" type="line" icon="launch" size="small"></vs-button>
           <vs-button color="danger" type="line" icon="delete" size="small" @click="deleteRow(data[indextr].id, indextr, tr)"></vs-button>
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
  }),
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
  },
  beforeMount(){
           this.datas_view = this.datas
         },
}
</script>