// App.vue

<template>
  <div class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark menu">
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link to="/" class="nav-link">Login</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/create" class="nav-link">Create List</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/posts" class="nav-link">Lists</router-link>
        </li>
      </ul>
    </nav>
    <br />
    <transition name="fade">
      <router-view></router-view>
    </transition>
  </div>
</template>

<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-active {
  opacity: 0;
}
.navbar {
  background-color: rgb(5, 32, 53) !important;
}
.menu {
  display: flex;
  justify-content: center;
}
li {
  font-family: "Calistoga", cursive;
  font-size: 30px;
  padding-right: 40px;
  padding-left: 40px;
  color: rgb(211, 29, 29) !important;
}
li a {
  border: none !important;
}
</style>

<script>
export default {};
</script>
