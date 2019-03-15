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

          <vs-td :data="data[indextr].jenis_barang">
            {{data[indextr].kualitas_barang}}
          </vs-td>

        <vs-td :data="data[indextr].satuan_standar">
          <label for="">{{data[indextr].satuan_standar}}</label>
             <vs-switch color="success" disabled="true" v-model="switch3"/>
                <!-- <v-flex xs4>
                 <v-checkbox input-value="true" value disabled></v-checkbox>
                </v-flex> -->
                <!-- <label for="">disabled / active</label>
      <vs-switch disabled="true" v-model="switch3"/> -->
          </vs-td>

          <vs-td :data="data[indextr].merk">
            <label for="">{{data[indextr].merk}}</label>
              <vs-switch color="success" disabled="true" v-model="switch3"/>
              <!-- <v-checkbox input-value="true" value disabled></v-checkbox> -->

              <!-- <vs-switch color="dark" vs-icon-on="check_box" vs-icon-off="block" v-model="switch5">
      <span slot="on">YES</span>
      <span slot="off">NO</span>
    </vs-switch> -->
          </vs-td>

         <vs-td :data="data[indextr].harga_satuan_setempat">
              <!-- <v-checkbox input-value="true" value disabled></v-checkbox> -->
               <!-- <vs-switch color="success" v-model="switch2" vs-icon="done"/> -->
                 <!-- <label for="">{{data[indextr].website}}</label> -->
                 <label for="">{{data[indextr].harga_satuan_setempat}}</label>
                 <vs-switch disabled="true" v-model="switch3"/>
          </vs-td>

          <vs-td :data="data[indextr].harga_satuan_standar">
              <label for="">{{data[indextr].harga_satuan_standar}}</label>
              <vs-switch disabled="true" color="danger"  v-model="switch4"/>
              <!-- <v-checkbox input-value="true" value disabled></v-checkbox> -->

              <!-- <v-flex xs10>
                 <v-checkbox input-value="true" value disabled></v-checkbox>
                </v-flex> -->

                <!-- <b-form-checkbox switch v-model="checked" name="check-button" >   
    </b-form-checkbox> -->
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