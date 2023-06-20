<template>
  <div class="form-wrapper">
    <h3>Login</h3>
    <form @submit.prevent="login" action="">
      <div v-if="errors" class="errors">
        <p v-for="(error, field) in errors" :key="field">
          {{error[0]}}
        </p>
      </div>
      <input type="text" v-model="form.username" placeholder="Username" /><br>
      <input type="password" v-model="form.password" placeholder="Password" /><br>
      <button>Login</button>
      <router-link to="/register" class="link">Register</router-link>
    </form>
  </div>
</template>

<script>
import authService from '@/services/auth.service'

export default {
  name: 'LoginView',
  data() {
    return {
      form: {
        username: '',
        password: '',
      },
      errors: null,
    }
  },
  methods: {
    async login() {
      const { success, errors } = await authService.login(this.form)
      if (success) {
        this.$router.push({name: 'home'})
      } else {
        this.errors = errors
      }
    },
  },
}
</script>

<style lang="scss" scoped>

</style>
