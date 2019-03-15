<template>
    <div>
      <br>
      
        <vs-row vs-justify="left">
            <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="12">
                <vs-card actionable class="cardx" >
                    <div slot="header">     
                        <span>
                          <vs-breadcrumb style="font-size: 16px"  separator="chevron_right" :items="
                              [
                                {
                                  title: 'Home',
                                  url: '/home',
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
                    <div slot="header">
                        <br>
                        <h3>
                            Daftar Atribut
                        </h3>
                        <br>

                        <hr>
                    </div>
                   
                    <vs-button color="danger" type="gradient" href="/home/atribut/create" >Tambah Atribut</vs-button>
                    <vs-table :data="datas" max-items="5" pagination search>
                        <template slot="header">
                            <br>
                            <div style="padding-left: 30px;">
                                <h3>

                                </h3>
                                <hr>
                            </div>
                            <br>
                        </template>
                        <template slot="thead">
                            <vs-th style="font-size: 14px">
                                Nama set atribut
                            </vs-th>
                            <vs-th style="font-size: 14px">
                                Aksi
                            </vs-th>

                        </template>

                        <template slot-scope="{data}">
                            <vs-tr :state="indextr == 2 || indextr == 5?'success':indextr == 6?'danger':null" :key="indextr"
                                v-for="(tr, indextr) in data">
                                <vs-td :data="data[indextr].nama_set_atribut" style="font-size: 12px">
                                    {{data[indextr].nama_set_atribut}}
                                </vs-td>

                                <vs-td :data="data[indextr].id">
                                    <vs-button color="primary" type="line" icon="visibility" size="small" :href="'/home/beranda/'+data[indextr].id"></vs-button>
                                    <vs-button color="success" type="line" icon="create" size="small"></vs-button>
                                    <vs-button color="warning" type="line" icon="launch" size="small"></vs-button>
                                    <vs-button color="danger" type="line" icon="delete" size="small"></vs-button>
                                </vs-td>


                            </vs-tr>
                        </template>
                    </vs-table>
                </vs-card>
            </vs-col>
        </vs-row>

    </div>
</template>

<script>
    export default {
        props: ['datas'],
        data: () => ({
            users: [{
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
            ]
        })
    }

</script>
