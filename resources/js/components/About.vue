<template>

    <div>
        <!-- <h1>Halo</h1> -->
       
        <v-container bg fill-height grid-list-md>
            <v-layout row wrap align-center>
                <vs-row vs-justify="center">
                    <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="12">
                        <vs-card actionable class="cardx"
                            card-background="linear-gradient(120deg, #7f7fd5, #86a8e7, #91eae4)">
                            <div slot="header">
                                <br>
                                 <!-- <vue-sticker :d="200"></vue-sticker> -->
                                <!-- <vue-sticker :d="200" className="good" prefix="--" /> -->
                                <img :src="'MystrileV1_1.png'" width="100px" height="100px" alt="" srcset="" class="animated tada">

                                <br>
                                <br>

                                <vs-divider border-style="dashed" color="danger">
                                    <h2 style="color:#D81B60;" class="animated tada">
                                        Mystrile
                                    </h2>

                                </vs-divider>


                            </div>

                            
                        
                            <div>
                                <p class="animated fadeIn">Aplikasi ini dibuat untuk mempermudah petugas IKK dalam melakukan pendataan di
                                    lapangan.
                                    Proyek ini dibangun bersama oleh : <br>
                                    Aditya Sudyana, S.S.T. <br>
                                    Imam Satya Wedhatama S.Tr.Stat
                                    <br><br>
                                    Dari Kabupaten Tolitoli</p>
                            </div>
                       

                        </vs-card>
                         <!-- <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="12">
                          <vs-card actionable class="cardx"
                            card-background="linear-gradient(120deg, #7f7fd5, #86a8e7, #91eae4)"> -->
                                <vs-button color="success" type="gradient" href="/download/pdf"  icon="get_app" size="small" style="margin-right:16px;" >Tutorial PDF</vs-button> 
                                
                                
                                  <vs-button color="danger" type="gradient" href="https://youtu.be/DtfywopFHMk"  icon="play_circle_filled" size="small">Video Tutorial</vs-button> 
                                <!-- <a href="https://youtu.be/DtfywopFHMk"> Tutorial Penggunaan Mystrile dan IKK Mobile</a> -->
                              <!-- </vs-card>
                         </vs-col> -->
                    </vs-col>
                </vs-row>
            </v-layout>
        </v-container>
        
    </div>



</template>

<script>

export default {


}

</script>
<style lang="css">
.example--main-image {
    background-image: url('MystrileV1_1.png');
}

.example--backside-image {
    background-image: url('MystrileV1_1.png');
}

.bounce-enter-active {
  animation: bounce-in .5s;
}
.bounce-leave-active {
  animation: bounce-in .5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.5);
  }
  100% {
    transform: scale(1);
  }
}
</style>

