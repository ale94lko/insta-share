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
    register() {
      console.log('Register', this.form)
    },
  },
}
</script>

<style lang="scss" scoped>

</style>
