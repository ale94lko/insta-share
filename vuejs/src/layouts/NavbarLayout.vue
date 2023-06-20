<template>
  <div class="navbar">
    Welcome {{ user.username }}
    <a href="" @click="logout">Logout</a>
  </div>
</template>

<script>
import authService from '@/services/auth.service'

export default {
  name: 'NavbarLayout',
  props: {
    user: Object,
  },
  methods: {
    logout() {
      authService.logout()
    }
  },
}
</script>

<style lang="scss" scoped>
  .navbar {
    height: 50px;
    position: fixed;
    left: 0;
    top: 0;
    right: 0;
    line-height: 50px;
    background-color: #1F5D6B;
    color: #FFFFFF;
    padding: 0 15px;
    text-align: right;
    transition: font-weight 0.3s;

    a {
      color: #FFFFFF;
    }
  }
</style>
