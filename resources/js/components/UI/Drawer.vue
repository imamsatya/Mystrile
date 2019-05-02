<template>
  <div class="page-container ">
    <md-app style="
    background: #ecf0f1">
      <md-app-toolbar class="pink darken-1" md-elevation="0">
        <md-button class="md-icon-button" @click="toggleMenu" v-if="!menuVisible">
          <md-icon style="color:white">menu</md-icon>
        </md-button>
        <img :src="'/img/MystrileV1_1.png'" width="40px" height="40px" alt="" srcset="">
        <span class="md-title white--text" >Mystrile</span>

        <div class="md-toolbar-section-end" >
          
        <!-- <md-button @click="showSidepanel = true" class="white--text">  User</md-button> -->
        <div class="examplex">
         <vs-dropdown >
      <a class="a-icon" href="#"  style="color:white">
       {{user.name}}  
        <vs-icon class="" icon="expand_more"></vs-icon>
      </a>

      <vs-dropdown-menu>
        <vs-dropdown-item>
          <a href="" @click="logout"> Logout</a>
          
        </vs-dropdown-item>
        
        <!-- <vs-dropdown-item divider>
          Option 3
        </vs-dropdown-item> -->
      </vs-dropdown-menu>
    </vs-dropdown>
        </div>
      </div>
      </md-app-toolbar>

      <md-app-drawer :md-active.sync="menuVisible" md-persistent="mini">
        <md-toolbar class="md-transparent" md-elevation="0">
          <span>Navigation</span>

          <div class="md-toolbar-section-end">
            <md-button class="md-icon-button md-dense" @click="toggleMenu">
              <md-icon>keyboard_arrow_left</md-icon>
            </md-button>
          </div>
        </md-toolbar>

        <md-list>
          <md-list-item>
            <md-icon>home</md-icon>
            <!-- <a href="">Home</a> -->
            <span class="md-list-item-text"> <a href="/home">Home</a></span>
          </md-list-item>

          <!-- <md-list-item md-expand>
            <md-icon>videogame_asset</md-icon>
            <span class="md-list-item-text">Games</span>

            <md-list slot="md-expand">
              <md-list-item class="md-inset"><a href="">Console</a></md-list-item>
              <md-list-item class="md-inset"><a href="">Console</a></md-list-item>
              <md-list-item class="md-inset"><a href="">Console</a></md-list-item>
            </md-list>
          </md-list-item> -->

          <!-- <md-list-item>
            <md-icon>delete</md-icon>
            <span class="md-list-item-text">Trash</span>
          </md-list-item> -->

          <md-list-item>
            <md-icon>error</md-icon>
            <span class="md-list-item-text">About</span>
          </md-list-item>
        </md-list>
      </md-app-drawer>

      <md-app-content md-theme="default-dark">
        <slot></slot>
      </md-app-content>
    </md-app>

    <footer-c></footer-c>
    
  </div>
</template>

<script>
import 'vue-material/dist/theme/default.css'
  export default {
    name: 'PersistentMini',
     props:  ['user'],
    data: () => ({
      menuVisible: false
    }),
    methods: {
      toggleMenu () {
        this.menuVisible = !this.menuVisible
      },
      logout(){
        axios.get('/logout').then(
          window.location.href= "/"
        )
      }
    }
  }
</script>

<style lang="scss" scoped>
  .md-app {
    min-height: 600px;
    border: 1px solid rgba(#000, .12);
  }

   // Demo purposes only
  .md-drawer {
    width: 230px;
    max-width: calc(100vw - 125px);
  }
  
</style>
<style lang="stylus">
.examplex
  display: flex;
  align-items: center;
  justify-content: center;
  .a-icon
    outline: none;
    text-decoration: none !important;
    display: flex;
    align-items: center;
    justify-content: center;
    i
      font-size: 18px;
</style>