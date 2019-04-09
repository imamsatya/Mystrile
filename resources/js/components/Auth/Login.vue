<template>
    <v-app style="background-image:url('https://colorlib.com/etc/lf/Login_v4/images/bg-01.jpg');
    background-repeat: no-repeat;
    background-position: center;
  
  background-size: cover;
    ">

        <v-container bg fill-height grid-list-md>
            <v-layout row wrap align-center>
                <vs-row vs-justify="center">
                    <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="8">
                        <!-- <vs-card actionable class="cardx">
                            <div slot="header"> 
                            </div>
                            <div>
                                 <vs-divider border-style="dashed" color="danger">
                                         <h2 style="color:#D81B60;">
                                        Welcome
                                         </h2>
                                    </vs-divider>
                               
                            </div>
                           
                        </vs-card> -->
                        
                        <vs-card actionable class="cardx">
                            <div slot="header">
                                <br>

                                <img :src="'/img/MystrileV1_1.png'" width="100px" height="100px" alt="" srcset="">

                                <br>
                                <br>
                               
                                    <vs-divider border-style="dashed" color="danger">
                                         <h2 style="color:#D81B60;">
                                        Mystrile
                                         </h2>
                                    </vs-divider>

                                
                            </div>
                            <div>
                                <!-- <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span> -->

                                <!-- <v-form style="padding-left: 30px"> -->
                                <v-form>
                                    <v-text-field prepend-icon="person" name="login" label="Username" type="text"
                                        v-model="username">
                                    </v-text-field>
                                    <v-text-field prepend-icon="lock" name="password" label="Password" id="password"
                                        type="password" v-model="password"></v-text-field>
                                </v-form>

                                <br>
                                <br>
                                <!-- <vs-button style="width: 70px" type="gradient" >Update
                                            </vs-button> -->
                                <vs-button style="width: 70px" type="gradient" color="danger" href="/home">Login
                                </vs-button>
                                <br>
                                <br>
                            </div>
                            <!-- <div slot="footer">
                                <vs-row vs-justify="flex-end">
                                    <vs-button type="gradient" color="danger" icon="favorite"></vs-button>
                                    <vs-button color="primary" icon="turned_in_not"></vs-button>
                                    <vs-button color="rgb(230,230,230)" color-text="rgb(50,50,50)" icon="settings">
                                    </vs-button>
                                </vs-row>
                            </div> -->
                        </vs-card>
                        
                    </vs-col>
                </vs-row>
            </v-layout>
        </v-container>
    </v-app>
</template>

<script>
    export default {
        data: () => ({
            colorx: 'warning',
            colory: 'dark',
            colorz: '#D81B60',
            value7: '',
            username: '',
            password: ''
        }),
    }

</script>


<style>

</style>
