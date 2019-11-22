// CreateComponent.vue

// CreatePost.vue

<template>
  <div>
    <h1>Create A List</h1>
    <form @submit.prevent="addPost">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="form-group">
            <label>List title:</label>
            <input type="text" class="form-control" v-model="post.title" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="form-group">
            <label>List description:</label>
            <textarea class="form-control" v-model="post.body" rows="5"></textarea>
          </div>
        </div>
      </div>
      <br />
      <div class="form-group but">
        <button class="btn btn-primary butcreat">Create</button>
      </div>
    </form>
  </div>
</template>
<style>
@import url("https://fonts.googleapis.com/css?family=Calistoga&display=swap");
@import url("https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap");

h1 {
  text-align: center;
  font-size: 50px;
  color: rgb(5, 32, 53);
}
.but {
  display: flex;
  justify-content: center;
}
.container {
  border: 1px solid black;
  box-shadow: 3px 3px 3px 5px;
  padding: 0;
  background: rgb(236, 230, 230);
  margin-top: 5%;
  margin-bottom: 5%;
}
.butcreat {
  font-family: "Calistoga", cursive;
  background-color: rgb(5, 32, 53) !important;
  border: 1px solid white !important;
}
.butcreat:hover {
  background-color: white !important;
  border: 1px solid rgb(5, 32, 53) !important;
  color: rgb(5, 32, 53) !important;
}

button,
label,
h1,
th {
  font-family: "Calistoga", cursive;
}
th {
  font-size: 20px;
}
</style>

<script>
export default {
  data() {
    return {
      post: {}
    };
  },
  methods: {
    addPost() {
      let uri = "http://localhost/api/post/create";
      this.axios.post(uri, this.post).then(response => {
        this.$router.push({ name: "posts" });
      });
    }
  }
};
</script>