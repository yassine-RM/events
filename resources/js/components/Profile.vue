<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 offset-md-3">
        <div class="text-center">
          <h3>
            <i class="fa fa-user" aria-hidden="true">Profile</i>
            <button class="btn btn-warning btn-sm float-right" @click.prevent="getForm()">
              <i class="fa fa-edit"></i> Modifier
            </button>
          </h3>
          <div>
            <img class="rounded-circle" width="100" height="100" :src="'/storage/'+userN.image" alt />
          </div>
          <p>Nom :{{ userN.nom }}</p>
          <p>Email :{{ userN.email }}</p>
        </div>

        <form v-if="open">
          <div class="form-group">
            <label for="nom">Nom</label>
            <input
              type="text"
              id="nom"
              name="nom"
              class="form-control is-invalid"
              v-model="userN.nom"
            />
            <div class="invalid-feedbak">{{ errors.nom[0]}}</div>
          </div>

          <div class="form-group">
            <button class="btn btn-info btn-sm btn-block" @click.prevent="editUser()">Modifier</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["user"],
  data() {
    return {
      userN: this.user,
      open: false,
      errors: []
    };
  },
  methods: {
    getForm: function() {
      this.open = !this.open;
    },
    editUser: function() {
      axios
        .put("/user/" + this.userN.id, this.userN.nom)
        .then(result => {
          this.errors = "";
          console.log("success modification");
        })
        .catch(error => {
          console.log("error modification", error.response.data.errors);
          this.errors = error.response.data.errors;
        });
    }
  }
};
</script>
