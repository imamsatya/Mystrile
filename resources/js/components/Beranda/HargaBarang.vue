<template>
  <div>
      <br>
      
      <vs-button type="gradient" color="danger" :href="'/home/beranda/'+id+'/harga_barang/create'">Tambah Harga Barang</vs-button>
     <br>
    <vs-table :data="datas" max-items="5" pagination search >
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
        <vs-tr  :key="indextr" v-for="(tr, indextr) in data" >
          <vs-td :data="data[indextr].jenis_barang">
            {{data[indextr].jenis_barang}}
          </vs-td>

          <vs-td :data="data[indextr].kualitas_barang">
            {{data[indextr].kualitas_barang}}
          </vs-td>

        <vs-td :data="data[indextr].satuan_standar">
          <label for="">{{data[indextr].satuan_standar}}</label>
             <vs-switch color="success" v-if="data[indextr].satuan_standar != 'tanpa satuan standar'" disabled="true" v-model="switch3"/>
             <vs-switch color="danger" v-if="data[indextr].satuan_standar == 'tanpa satuan standar'" disabled="true" v-model="switch3"/>
          </vs-td>

          <vs-td :data="data[indextr].merk">
            <label for="">{{data[indextr].merk}}</label>
              <vs-switch color="success" v-if="data[indextr].merk != 'tanpa merk'" disabled="true" v-model="switch3"/>
             <vs-switch color="danger" v-if="data[indextr].merk == 'tanpa merk'" disabled="true" v-model="switch3"/>
          </vs-td>

          <vs-td :data="data[indextr].satuan_setempat">
          <label for="">{{data[indextr].satuan_setempat}}</label>
             <vs-switch color="success" v-if="data[indextr].satuan_setempat != 'tanpa satuansetempat'" disabled="true" v-model="switch3"/>
              <vs-switch color="danger" v-if="data[indextr].satuan_setempat == 'tanpa satuansetempat'" disabled="true" v-model="switch3"/>
          </vs-td>

          <vs-td :data="data[indextr].panjang">
          <label for="">{{data[indextr].panjang}}</label>
             <vs-switch color="success" v-if="data[indextr].panjang != 'tanpa panjang'" disabled="true" v-model="switch3"/>
             <vs-switch color="danger" v-if="data[indextr].panjang == 'tanpa panjang'" disabled="true" v-model="switch3"/>   
          </vs-td>

           <vs-td :data="data[indextr].lebar">
          <label for="">{{data[indextr].lebar}}</label>
             <vs-switch color="success"  v-if="data[indextr].lebar != 'tanpa lebar'" disabled="true" v-model="switch3"/>
               <vs-switch color="danger" v-if="data[indextr].lebar == 'tanpa lebar'" disabled="true" v-model="switch3"/>      
          </vs-td>

          <vs-td :data="data[indextr].tinggi">
          <label for="">{{data[indextr].tinggi}}</label>
             <vs-switch color="success"  v-if="data[indextr].tinggi != 'tanpa tinggi'" disabled="true" v-model="switch3"/>
              <vs-switch color="danger" v-if="data[indextr].tinggi == 'tanpa tinggi'" disabled="true" v-model="switch3"/>  
          </vs-td>

          <vs-td :data="data[indextr].berat">
          <label for="">{{data[indextr].berat}}</label>
             <vs-switch color="success"  v-if="data[indextr].berat != 'tanpa berat'" disabled="true" v-model="switch3"/>
              <vs-switch color="danger" v-if="data[indextr].berat == 'tanpa berat'" disabled="true" v-model="switch3"/>     
          </vs-td>
        
        <vs-td :data="data[indextr].konversi">
          <label for="">{{data[indextr].konversi}}</label>
             <vs-switch color="success"  v-if="data[indextr].konversi != 'tanpa konversi'" disabled="true" v-model="switch3"/>
              <vs-switch color="danger" v-if="data[indextr].konversi == 'tanpa konversi'" disabled="true" v-model="switch3"/>       
          </vs-td>


         <vs-td :data="data[indextr].harga_satuan_setempat">
              
                 <label for="">{{data[indextr].harga_satuan_setempat}}</label>
                 <vs-switch  color="success" disabled="true"  v-if="data[indextr].harga_satuan_setempat != 'tanpa harga satuan setempat'" v-model="switch3"/>
                  <vs-switch  color="danger" disabled="true"  v-if="data[indextr].harga_satuan_setempat == 'tanpa harga satuan setempat'" v-model="switch3"/>
          </vs-td>

          <vs-td :data="data[indextr].harga_satuan_standar">
              <label for="">{{data[indextr].harga_satuan_standar}}</label>
             <vs-switch  color="success" disabled="true"  v-if="data[indextr].harga_satuan_standar != 'tanpa harga satuan standar'" v-model="switch3"/>
                  <vs-switch  color="danger" disabled="true"  v-if="data[indextr].harga_satuan_standar == 'tanpa harga satuan standar'" v-model="switch3"/>
              
          </vs-td>

          
                                                                     
          <vs-td :data="data[indextr].id">
           <vs-button color="primary" type="line" icon="visibility" size="small" href="/home/beranda"></vs-button>
           <vs-button color="success" type="line" icon="create" size="small"></vs-button>
           <vs-button color="warning" type="line" icon="launch" size="small"></vs-button>
           <vs-button color="danger" type="line" icon="delete" size="small"></vs-button>
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
  data:()=>({
  
    colorz: '#D81B60',
    // hargabarangs: this.datas,
    
    checkBox3:true,
    switch3:true,
    switch5:true,
    switch4:false,
    switch2:true,
  })
}
</script>