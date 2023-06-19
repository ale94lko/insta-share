<template>
  <div id="auth-layout">
    <router-view />
  </div>
</template>

<script>

export default {
  name: 'AuthLayout',
  components: {}
}
</script>

<style lang="scss">
  #auth-layout {
    padding: 50px;

    .form-wrapper {
      background-color: #FFFFFF;
      padding: 20px;
      width: 300px;
      margin: 0 auto;
      border-radius: 4px;
      box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
    }

    form {
      input {
        display: block;
        width: 100%;
        border: 2px solid #E6E6E6;
        padding: 6px 12px;
        transition: all 0.3s;

        &:focus {
          outline: 0;
          border-color: #4FB2C1;
        }
      }

      button {
        outline: 0;
        cursor: pointer;
        border: 1px solid darken(#4FB2C1, 5%);
        background-color: #4FB2C1;
        color: #FFFFFF;
        padding: 6px 12px;
        transition: all 0.3s;

        &:hover {
          background-color: darken(#4FB2C1, 10%);
        }
      }

      .errors {
        margin-bottom: 15px;
        padding: 10px 15px;
        color: #FFFFFF;
        background-color: #FF6969;
        font-size: 12px;

        p {
          margin: 0;
        }
      }

      .link {
        font-size: 80%;
        float: right;
      }
    }
  }
</style>
