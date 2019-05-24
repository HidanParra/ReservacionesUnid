<template>
  <div class="login">
    <card header-text="Iniciar sesión">
      <div class="card-body card-block">
        <form v-on:submit.prevent="login" name="login">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-envelope"></i>
              </div>
              <input
                type="email"
                id="email"
                name="email"
                placeholder="Email"
                class="form-control"
                v-model="email"
              >
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-asterisk"></i>
              </div>
              <input
                type="password"
                id="password"
                name="password"
                placeholder="Password"
                class="form-control"
                v-model="password"
              >
            </div>
          </div>
          <div class="form-actions form-group">
            <button type="submit" class="btn btn-success btn-md">Ingresar</button>
            <button type="submit" class="btn btn-primary btn-md float-right">
              <router-link class="link text-light float-right" :to="{name: 'Register'}">Regístrate</router-link>
            </button>
          </div>
        </form>
      </div>
    </card>
  </div>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      email: "",
      password: ""
    };
  },
  methods: {
    login() {
      let email = this.email;
      let password = this.password;
      this.$store
        .dispatch("login", { email, password })
        .then(() => this.$router.push('/dashboard'))
        .catch(err => console.log(err));
    }
  }
};
</script>

<style lang="scss" scoped>
.card-title {
  padding-left: 20px;
}
</style>