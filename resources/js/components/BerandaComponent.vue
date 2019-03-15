<template>
    <div class="">
        <div>
            <br>

            <vs-row vs-justify="left">
                <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="12">
                    <vs-card actionable class="cardx">
                        <div slot="header">
                            <span>
                                <vs-breadcrumb style="font-size: 16px" separator="chevron_right" 
                                    :color="colorz"
                                   :items="
                                      [
                                        {
                                          title: 'Home',
                                          url: '/home',
                                          disabled: true,
                                        
                                        },
                                        {
                                          title: 'Beranda',
                                          url: '/home/beranda'+this.id,
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
                        <!-- <div slot="header">
                            <br>
                            <h3>
                                Daftar Atribut
                            </h3>
                            <br>

                            <hr>
                        </div> -->

                        
                        <vs-tabs color="danger">
                            <vs-tab vs-label="Harga Barang" vs-icon="monetization_on">
                                <div class="con-tab-ejemplo">
                                    <hargabarang-c :datas="hargabarangs" :id="id"></hargabarang-c>
                                </div>
                            </vs-tab>
                            <vs-tab vs-label="Sewa Alat" vs-icon="build">
                                <div class="con-tab-ejemplo">
                                    <sewaalat-c :datas="sewaalats" :id="id"></sewaalat-c>
                                </div>
                            </vs-tab>
                            <vs-tab vs-label="Jasa Konstruksi" vs-icon="domain">
                                <div class="con-tab-ejemplo">
                                    <jasakonstruksi-c :datas="jasakonstruksis" :id="id"></jasakonstruksi-c>
                                </div>
                            </vs-tab>

                        </vs-tabs>
                    </vs-card>
                </vs-col>
            </vs-row>

        </div>
    
    </div>
</template>

<script>
    export default {
        props: ['hargabarangs', 'sewaalats', 'jasakonstruksis', 'id'],
        data: () => ({
            colorx: 'warning',
            colory: 'dark',
            colorz: '#D81B60',
            // hargabarang: this.hargabarangs,
        }),
    }

</script>
