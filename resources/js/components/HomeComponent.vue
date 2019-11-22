// HomeComponent.vue

<template>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card card-default sign">
        <div class="card-header signup">Sign up</div>

        <div class="card-body signin">Sign in</div>
      </div>
    </div>
  </div>
</template>

<style>
.sign {
  margin-bottom: 30px;
  font-family: "Calistoga", cursive;
  background-color: rgb(5, 32, 53);
  color: white;
  font-size: 30px;
  text-align: center;
}

.signup {
  border-bottom: 3px solid white;
}

.signup:hover {
  color: rgb(5, 32, 53);
  background-color: white;
}

.signin:hover {
  color: rgb(5, 32, 53);
  background-color: white;
}
</style>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  }
};
</script>

