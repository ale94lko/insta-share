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
    login() {
      console.log('Login', this.form)
    },
  },
}
</script>

<style lang="scss" scoped>

</style>
