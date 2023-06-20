<template>
  <div id="default-layout">
    <navbar-layout :user="user"/>
    <router-view />
  </div>
</template>

<script>
import NavbarLayout from '@/layouts/NavbarLayout.vue'
import authService from '@/services/auth.service'

export default {
  name: 'DefaultLayout',
  data() {
    return {
      user: {},
    }
  },
  beforeMount() {
    this.user = {
      username: authService.getUsername()
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
