<template>
  <div class="form-wrapper">
    <h3>Register</h3>
    <form @submit.prevent="register" action="">
      <div v-if="errors" class="errors">
        <p v-for="(error, field) in errors" :key="field">
          {{error[0]}}
        </p>
      </div>
      <input type="text" v-model="form.username" placeholder="Username" /><br>
      <input type="text" v-model="form.email" placeholder="Email" /><br>
      <input type="password" v-model="form.password" placeholder="Password" /><br>
      <input type="password" v-model="form.repeatPassword" placeholder="Repeat password" /><br>
      <button>Register</button>
      <router-link to="/login" class="link">Login</router-link>
    </form>
  </div>
</template>

<script>
import authService from '@/services/auth.service'

export default {
  name: 'RegistrationView',
  data() {
    return {
      form: {
        username: '',
        email: '',
        password: '',
        repeatPassword: '',
      },
      errors: null,
    }
  },
  methods: {
    async register() {
      const { success, errors } = await authService.register(this.form)
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
