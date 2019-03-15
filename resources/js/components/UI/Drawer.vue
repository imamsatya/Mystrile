<template>
  <div class="page-container ">
    <md-app style="
    background: #ecf0f1">
      <md-app-toolbar class="pink darken-1" md-elevation="0">
        <md-button class="md-icon-button" @click="toggleMenu" v-if="!menuVisible">
          <md-icon style="color:white">menu</md-icon>
        </md-button>
        <span class="md-title white--text" >Mas Adit App</span>

        <div class="md-toolbar-section-end" >
          
        <md-button @click="showSidepanel = true" class="white--text">  User</md-button>
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

          <md-list-item md-expand>
            <md-icon>videogame_asset</md-icon>
            <span class="md-list-item-text">Games</span>

            <md-list slot="md-expand">
              <md-list-item class="md-inset"><a href="">Console</a></md-list-item>
              <md-list-item class="md-inset"><a href="">Console</a></md-list-item>
              <md-list-item class="md-inset"><a href="">Console</a></md-list-item>
            </md-list>
          </md-list-item>

          <md-list-item>
            <md-icon>delete</md-icon>
            <span class="md-list-item-text">Trash</span>
          </md-list-item>

          <md-list-item>
            <md-icon>error</md-icon>
            <span class="md-list-item-text">Spam</span>
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
    data: () => ({
      menuVisible: false
    }),
    methods: {
      toggleMenu () {
        this.menuVisible = !this.menuVisible
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