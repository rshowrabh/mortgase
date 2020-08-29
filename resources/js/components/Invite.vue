<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Invite Via Email</div>

          <div class="card-body">
            <v-card-text>
              <v-col cols="12" sm="6" md="6">
                <v-text-field v-model="form.email" label="email"></v-text-field>
              </v-col>
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn :disabled="submited" color="success" @click="send">Send</v-btn>
            </v-card-actions>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      submited: false,
      form: {},
    };
  },
  methods: {
    send() {
      this.submited = true;
      axios
        .post("/invite", {
          ...this.form,
        })
        .then((response) => {
          Toast.fire({
            icon: "success",
            title: "Agent Created Successfully",
          });
          this.submited = false;
        })
        .catch((error) => {
          this.submited = false;
          let obj = error.response.data.errors;
          Object.keys(obj).forEach(function (key) {
            console.log(obj[key][0]);
            Toast.fire({
              icon: "error",
              title: obj[key][0],
            });
          });
        });
    },
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
