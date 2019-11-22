// EditComponent.vue

<template>
  <div>
    <h1>Edit List</h1>
    <form @submit.prevent="updatePost">
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
          <div>
            <label for="done">Done</label>
            <input type="checkbox" class="done" name="done" v-model="post.done" />
          </div>
        </div>
      </div>

      <!--Task 1 -->

      <section id="taskdisnone">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="form-group">
              <h2>Task 1</h2>
              <label>Task title:</label>
              <input type="text" class="form-control" v-model="post.title_task_1" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="form-group">
              <label>Task description:</label>
              <textarea class="form-control" v-model="post.task_1" rows="5"></textarea>
            </div>
            <div>
              <label for="done">Done</label>
              <input type="checkbox" class="done" name="done" v-model="post.task_1_done" />
            </div>
          </div>
        </div>

        <!--Task 2-->

        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="form-group">
              <h2>Task 2</h2>
              <label>Task title:</label>
              <input type="text" class="form-control" v-model="post.title_task_2" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="form-group">
              <label>Task description:</label>
              <textarea class="form-control" v-model="post.task_2" rows="5"></textarea>
            </div>
            <div>
              <label for="done">Done</label>
              <input type="checkbox" class="done" name="done" v-model="post.task_2_done" />
            </div>
          </div>
        </div>

        <!--Task 3-->

        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="form-group">
              <h2>Task 3</h2>
              <label>Task title:</label>
              <input type="text" class="form-control" v-model="post.title_task_3" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="form-group">
              <label>Task description:</label>
              <textarea class="form-control" v-model="post.task_3" rows="5"></textarea>
            </div>
            <div>
              <label for="done">Done</label>
              <input type="checkbox" class="done" name="done" v-model="post.task_3_done" />
            </div>
          </div>
        </div>
      </section>
      <br />
      <br />
      <div class="form-group but">
        <button class="btn btn-primary butcreat">Update</button>
      </div>
    </form>
    <div class="task-btn">
      <button id="showtask" class="butcreat" v-on:click="display">Show Tasks</button>
    </div>
  </div>
</template>

<style>
input,
textarea {
  box-shadow: 0 8px 6px -6px black;
  font-family: "Libre Baskerville", serif;
}
a {
  font-family: "Calistoga", cursive;
  background-color: rgb(5, 32, 53) !important;
  border: 1px solid white !important;
}
a:hover {
  background-color: white !important;
  border: 1px solid rgb(5, 32, 53) !important;
  color: rgb(5, 32, 53) !important;
}

li a:hover {
  background-color: rgb(5, 32, 53) !important;
  border: none !important;
  color: white !important;
}

h2 {
  text-align: center;
  font-weight: bold;
  font-family: "Calistoga", cursive;
}

#taskdisnone {
  display: none;
}

#showtask {
  color: white;
  border-radius: 7%;
  padding: 7px;
  margin-bottom: 1%;
  margin-left: 1%;
}
</style>

<script>
import { Script } from "vm";
export default {
  data() {
    return {
      post: {}
    };
  },
  created() {
    let uri = `http://localhost/api/post/edit/${this.$route.params.id}`;
    this.axios.get(uri).then(response => {
      this.post = response.data;
    });
  },

  methods: {
    updatePost() {
      let uri = `http://localhost/api/post/update/${this.$route.params.id}`;
      this.axios.post(uri, this.post).then(response => {
        this.$router.push({ name: "posts" });
      });
    },

    display: function() {
      document.getElementById("taskdisnone").style.display = "block";
    }
  }
};
// let title1 = this.posts[0].title_task_1;
//   let task_title1 = this.posts[0].task_1;
//   let done1 = this.posts[0].task_1_done;
//   let title2 = this.posts[0].title_task_2;
//   let task_title2 = this.posts[0].task_2;
//   let done2 = this.posts[0].task_2_done;
//   let title3 = this.posts[0].title_task_3;
//   let task_title3 = this.posts[0].task_3;
//   let done3 = this.posts[0].task_3_done;
//   modal.innerHTML = "<li>${title1}</li>";
</script>
  