<template>
    <div class="">
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

        <!-- vuetify -->
        <!-- <div>
            <v-app>
                <v-layout row justify-center>
                    <v-dialog v-model="dialog" persistent max-width="600px">
                        <template v-slot:activator="{ on }">
                            <v-btn color="primary" dark v-on="on">Open Dialog</v-btn>
                        </template>
                        <v-card>
                            <v-card-title>
                                <span class="headline">User Profile</span>
                            </v-card-title>
                            <v-card-text>
                                <v-container grid-list-md>
                                    <v-layout wrap>
                                        <v-flex xs12 sm6 md4>
                                            <v-text-field label="Legal first name*" required></v-text-field>
                                        </v-flex>
                                        <v-flex xs12 sm6 md4>
                                            <v-text-field label="Legal middle name"
                                                hint="example of helper text only on focus"></v-text-field>
                                        </v-flex>
                                        <v-flex xs12 sm6 md4>
                                            <v-text-field label="Legal last name*"
                                                hint="example of persistent helper text" persistent-hint required>
                                            </v-text-field>
                                        </v-flex>
                                        <v-flex xs12>
                                            <v-text-field label="Email*" required></v-text-field>
                                        </v-flex>
                                        <v-flex xs12>
                                            <v-text-field label="Password*" type="password" required></v-text-field>
                                        </v-flex>
                                        <v-flex xs12 sm6>
                                            <v-select :items="['0-17', '18-29', '30-54', '54+']" label="Age*" required>
                                            </v-select>
                                        </v-flex>
                                        <v-flex xs12 sm6>
                                            <v-autocomplete
                                                :items="['Skiing', 'Ice hockey', 'Soccer', 'Basketball', 'Hockey', 'Reading', 'Writing', 'Coding', 'Basejump']"
                                                label="Interests" multiple></v-autocomplete>
                                        </v-flex>
                                    </v-layout>
                                </v-container>
                                <small>*indicates required field</small>
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" flat @click="dialog = false">Close</v-btn>
                                <v-btn color="blue darken-1" flat @click="dialog = false">Save</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </v-layout>
            </v-app>
        </div> -->


        <!-- vuesax -->
        <div>
            <div class="centerx con-exemple-prompt">

                <vs-button @click="activePrompt2 = true" color="primary" type="border">Run prompt inputs</vs-button>

                <vs-prompt @vs-cancel="valMultipe.value1='',valMultipe.value2=''" @vs-accept="acceptAlert"
                    @vs-close="close" :vs-is-valid="validName" :vs-active.sync="activePrompt2" vs-title="Edit Sewa Alat"
                    vs-accept-text="Update">
                    <div class="con-exemple-prompt">

                        <vs-input label="Jenis Barang" placeholder="Jenis Barang" v-model="valMultipe.value1" />
                        <vs-input label="Kualitas Barang" placeholder="Kualitas Barang" v-model="valMultipe.value2" />



                        <vs-alert :vs-active="!validName" color="danger" vs-icon="new_releases">
                            Fields can not be empty please enter the data
                        </vs-alert>
                    </div>
                </vs-prompt>
            </div>
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