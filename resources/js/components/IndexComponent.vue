/ IndexComponent.vue

<template>
  <div>
    <h1>Lists</h1>
    <div class="row">
      <div class="col-md-10"></div>
      <div class="col-md-2">
        <router-link :to="{ name: 'create' }" class="btn btn-primary">Create List</router-link>
      </div>
    </div>
    <br />

    <table class="table table-hover">
      <thead>
        <tr>
          <th id="col-task-title">List title</th>
          <th id="col-desc">List description</th>
          <th id="col-status">Status</th>
          <th id="col-action">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="post in posts" :key="post.id">
          <td>{{ post.title }}</td>
          <td>{{ post.body }}</td>
          <td>
            <input type="checkbox" class="done" name="done" v-model="post.done" disabled />
          </td>

          <!-- Bouton + modal -->
          <td>
            <button
              :data-id="post.id"
              type="button"
              class="btn btn-primary modal-button btn-task"
              data-toggle="modal"
              data-target="#listModal"
            >Tasks</button>
          </td>

          <!-- Bouton + modal  end-->
          <td>
            <router-link :to="{name: 'edit', params: { id: post.id }}" class="btn btn-primary">Edit</router-link>
          </td>
          <td>
            <button class="btn btn-danger butdel" @click.prevent="deletePost(post.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
    <div
      class="modal fade"
      id="listModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">List of tasks</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="contenu"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
</template>

<style>
th {
  text-align: center;
  background-color: rgb(236, 230, 230);
}
td {
  font-family: "Libre Baskerville", serif;
}

#col-task-title {
  width: 20%;
  text-align: left;
}

#col-action {
  width: 5%;
}

#col-desc {
  width: 50%;
}
#col-status {
  width: 15%;
  text-align: left;
}
.done {
  transform: scale(1.5);
}

table {
  border-top: 2px solid rgb(236, 230, 230);
}
tr:nth-child(even) {
  background: rgb(236, 230, 230);
}
tr:nth-child(odd) {
  background: rgb(180, 176, 176);
}

td:nth-child(2) {
  text-align: center;
}
.butdel {
  background-color: rgb(194, 37, 37);
  border: 1px solid white;
}
.butdel:hover {
  background-color: white;
  border: 1px solid rgb(194, 37, 37);
  color: rgb(194, 37, 37);
}
.task {
  color: black !important;
  list-style: none;
  font-size: 15px;
  font-family: "Libre Baskerville", serif;
  text-align: center;
  margin-bottom: 20px;
}

.titleTask {
  color: black !important;
  list-style: none;
  text-align: center;
  margin-bottom: 20px;
}

.modal-title {
  text-align: center !important;
  font-family: "Calistoga", cursive;
  font-size: 30px;
}

.checkState {
  transform: scale(1.5);
  margin-left: 50%;
}

.btn-task {
  background-color: rgb(5, 32, 53);
  border: 1px solid white;
}
.btn-task:hover {
  background-color: white;
  border: 1px solid rgb(5, 32, 53);
  color: rgb(5, 32, 53);
}

.modal-header {
  background-color: rgb(5, 32, 53);
  color: white;
}

.close {
  color: white !important;
}
</style>

<script>
export default {
  data() {
    return {
      posts: []
    };
  },
  created() {
    let uri = "http://localhost/api/posts";
    this.axios.get(uri).then(response => {
      this.posts = response.data.data;
    });
  },
  mounted() {
    const modal = document.querySelector("#contenu");
    const buttons = document.querySelector(".modal-button");
    $("#listModal").on("shown.bs.modal", e => {
      let id = e.relatedTarget.attributes[0].nodeValue;
      modal.innerHTML = "";

      this.posts.forEach(post => {
        if (post.id == id) {
          if (post.title_task_1 == null) {
            post.title_task_1 = "";
          }
          if (post.task_1 == null) {
            post.task_1 = "";
          }

          if (post.title_task_2 == null) {
            post.title_task_2 = "";
          }
          if (post.task_2 == null) {
            post.task_2 = "";
          }

          if (post.title_task_3 == null) {
            post.title_task_3 = "";
          }
          if (post.task_3 == null) {
            post.task_3 = "";
          }

          if (post.task_1_done == 1) {
            modal.innerHTML += `<li class='titleTask'>${post.title_task_1}</li><li class='task'>${post.task_1}</li><input type='checkbox'  class="checkState checktest" checked disabled>`;
          } else {
            modal.innerHTML += `<li class='titleTask'>${post.title_task_1}</li><li class='task'>${post.task_1}</li><input type='checkbox' class="checkState checktest" style="text-align-center" disabled>`;
          }

          if (post.task_2_done == 1) {
            modal.innerHTML += `<li class='titleTask'>${post.title_task_2}</li><li class='task'>${post.task_2}</li><input type='checkbox' class="checkState checktest2" checked disabled>`;
          } else {
            modal.innerHTML += `<li class='titleTask'>${post.title_task_2}</li><li class='task'>${post.task_2}</li><input type='checkbox' class="checkState checktest2" disabled>`;
          }

          if (post.task_3_done == 1) {
            modal.innerHTML += `<li class='titleTask'>${post.title_task_3}</li><li class='task'>${post.task_3}</li><input type='checkbox' class="checkState checktest3" checked disabled>`;
          } else {
            modal.innerHTML += `<li class='titleTask'>${post.title_task_3}</li><li class='task'>${post.task_3}</li><input type='checkbox' class="checkState checktest3" disabled>`;
          }

          if (post.title_task_1 == "" && post.task_1 == "") {
            let test = true;
            if (test == true) {
              document.querySelector(".checktest").style.display = "none";
            }
          }

          if (post.task_2 == "" && post.title_task_2 == "") {
            let test2 = true;
            if (test2 == true) {
              document.querySelector(".checktest2").style.display = "none";
            }
          }

          if (post.task_3 == "" && post.title_task_3 == "") {
            var test3 = true;
            if (test3 == true) {
              document.querySelector(".checktest3").style.display = "none";
            }
          }
        }
      });
    });
  },
  methods: {
    deletePost(id) {
      let uri = `http://localhost/api/post/delete/${id}`;
      this.axios.delete(uri).then(response => {
        this.posts.splice(this.posts.indexOf(id), 1);
      });
    }
  }
};
</script>
