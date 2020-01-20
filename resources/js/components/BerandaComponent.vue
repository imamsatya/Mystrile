<template>
    <div class="animated fadeIn">
        <div>
            <br>

            <vs-row vs-justify="left">
                <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="12">
                    <vs-card actionable class="cardx">
                        <div slot="header">
                            <span>
                                <vs-breadcrumb style="font-size: 16px" separator="chevron_right" :color="colorz" :items="
                                      [
                                        {
                                          title: 'Home',
                                          url: '/home',
                                          disabled: true,
                                        
                                        },
                                        {
                                          title: this.setatributs[0].nama_set_atribut,
                                          url: '/home/atribut'+this.id,
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
        props: ['hargabarangs', 'sewaalats', 'jasakonstruksis', 'id', 'setatributs'],
        data: () => ({
            colorx: 'warning',
            colory: 'dark',
            colorz: '#D81B60',
            // hargabarang: this.hargabarangs,
            dialog: false,

            activePrompt: false,
            activePrompt2: false,
            val: '',
            valMultipe: {
                value1: '',
                value2: ''
            },

        }),

        computed: {
            validName() {
                return (this.valMultipe.value1.length > 0 && this.valMultipe.value2.length > 0)
            }
        },
        methods: {
            acceptAlert(color) {
                this.$vs.notify({
                    color: 'success',
                    title: 'Accept Selected',
                    text: 'Lorem ipsum dolor sit amet, consectetur'
                })
            },
            close() {
                this.$vs.notify({
                    color: 'danger',
                    title: 'Closed',
                    text: 'You close a dialog!'
                })
            },
        }


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