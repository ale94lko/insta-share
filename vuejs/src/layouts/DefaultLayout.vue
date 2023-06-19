<template>
  <div id="default-layout">
    <navbar-layout :user="user"/>
    <router-view />
  </div>
</template>

<script>
import NavbarLayout from '@/layouts/NavbarLayout.vue'

export default {
  name: 'DefaultLayout',
  data() {
    return {
      user: {},
    }
  },
  components: { NavbarLayout },
}
</script>

<style lang="scss" scoped>
  #default-layout {
    padding-top: 50px;
  }
</style>
