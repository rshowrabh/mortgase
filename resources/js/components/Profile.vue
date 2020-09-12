<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <v-form ref="form" lazy-validation>
          <v-text-field v-model="form.email" label="E-mail" required></v-text-field>
          <v-text-field v-model="form.phone" :counter="15" label="Phone" required></v-text-field>

          <v-text-field
            :append-icon="show3 ? 'mdi-eye' : 'mdi-eye-off'"
            :type="show3 ? 'text' : 'password'"
            name="input-10-2"
            label="Password"
            hint="At least 8 characters"
            value="wqfasds"
            class="input-group--focused"
            @click:append="show3 = !show3"
            v-model="form.password"
            placeholder="blank to unchange"
          ></v-text-field>

          <v-btn color="success" class="mr-4" @click="validate()">Submit</v-btn>
        </v-form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
    show: false,
    show1: false,
    show2: true,
    show3: false,
    show4: false,
    form: {},
  }),

  methods: {
    initialize() {
      try {
        axios.get("/api/agent").then((response) => {
          console.log(response.data);
          this.form = response.data.data;
        });
      } catch (error) {
        console.log(error);
      }
    },
    validate() {
      axios
        .put("/api/agent/" + this.form.id, {
          ...this.form,
        })
        .then((response) => {
          Toast.fire({
            icon: "success",
            title: "Agent Updated Successfully",
          });
          this.initialize();
        })
        .catch((error) => {
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
  created() {
    this.initialize();
    this.getUrl();
  },
};
</script>
