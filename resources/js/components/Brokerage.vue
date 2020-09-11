<template>
  <v-data-table :headers="headers" :items="desserts" sort-by="calories" class="elevation-1">
    <template v-slot:top>
      <v-toolbar flat color="white">
        <v-toolbar-title>All User List</v-toolbar-title>
        <v-divider class="mx-4" inset vertical></v-divider>
        <v-spacer></v-spacer>
        <v-dialog v-model="dialog" max-width="50%">
          <template v-slot:activator="{ on, attrs }">
            <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">New Brokerage</v-btn>
          </template>
          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>

            <v-card-text>
              <v-container>
                <v-row>
                  <v-col cols="12" sm="6" md="6">
                    <v-text-field v-model="editedItem.name" label="Name"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="6">
                    <v-text-field v-model="editedItem.email" label="email"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="6">
                    <v-text-field
                      :append-icon="show3 ? 'mdi-eye' : 'mdi-eye-off'"
                      :type="show3 ? 'text' : 'password'"
                      name="input-10-2"
                      label="password"
                      hint="At least 8 characters"
                      value="wqfasds"
                      class="input-group--focused"
                      @click:append="show3 = !show3"
                      v-model="editedItem.password"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="6">
                    <v-text-field
                      :type="show3 ? 'text' : 'number'"
                      v-model="editedItem.phone"
                      label="Phone"
                      @click:append="show3 = !show3"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="6">
                    <v-text-field
                      v-model="editedItem.broker_name"
                      label="Broker Name"
                      @click:append="show3 = !show3"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="6">
                    <v-text-field
                      v-model="editedItem.broker_license"
                      label="Broker License"
                      @click:append="show3 = !show3"
                    ></v-text-field>
                  </v-col>

                  <v-col cols="12" sm="6" md="6">
                    <v-file-input show-size label="Logo" @change="selectFile"></v-file-input>
                  </v-col>

                  <v-col cols="12" sm="6" md="6">
                    <v-checkbox v-model="editedItem.lock_color" label="Lock logo and color"></v-checkbox>
                  </v-col>
                  <v-col cols="12" sm="6" md="6">
                    <v-file-input show-size label="Picture" @change="selectFilePicture"></v-file-input>
                  </v-col>
                  <v-col cols="12" sm="12" md="6">
                    Banner Color
                    <v-color-picker v-model="editedItem.banner_color" flat></v-color-picker>
                  </v-col>
                  <v-col cols="12" sm="12" md="6">
                    Body Color
                    <v-color-picker v-model="editedItem.body_color" flat></v-color-picker>
                  </v-col>
                  <v-col cols="12" sm="12" md="6">
                    Button Color
                    <v-color-picker v-model="editedItem.button_color" flat></v-color-picker>
                  </v-col>
                </v-row>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
              <v-btn color="blue darken-1" text @click="editedIndex == -1 ? save() : update()">Save</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
        <v-dialog v-model="dialog_view" max-width="50%">
          <v-card class="mx-auto" max-width="70%">
            <v-img v-bind:src="'/storage/images/' + editedItem.picture" height="200px"></v-img>

            <v-card-title>
              {{editedItem.name}}
              <v-spacer></v-spacer>
              <v-avatar>
                <v-img v-bind:src="'/storage/images/' + editedItem.broker.logo" width="50px"></v-img>
              </v-avatar>
            </v-card-title>

            <v-card-subtitle>{{editedItem.email}}</v-card-subtitle>

            <v-btn icon @click="show = !show">
              <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
            </v-btn>

            <v-expand-transition>
              <div v-show="show">
                <v-card-text>
                  <p>Phone: {{editedItem.phone}}</p>
                  <p>Broker Name: {{editedItem.broker_name}}</p>
                  <p>Broker License: {{editedItem.broker_license}}</p>
                  <p>Agent License Number: {{editedItem.agent_license_number}}</p>
                  <p>
                    Color:
                    <v-btn depressed large :color="editedItem.button_color">Text</v-btn>
                  </p>
                  <p>Lock Logo and Color: {{editedItem.lock_color == 0 ?'False': 'True' }}</p>
                </v-card-text>
              </div>
            </v-expand-transition>
          </v-card>
        </v-dialog>
      </v-toolbar>
    </template>
    <template v-slot:item.actions="{ item }">
      <v-icon small class="mr-2" @click="handleClick(item)">mdi-view-dashboard</v-icon>
      <v-icon small class="mr-2" @click="editItem(item)">mdi-pencil</v-icon>
      <v-icon small @click="deleteItem(item)">mdi-delete</v-icon>
    </template>
    <template v-slot:no-data>
      <v-btn color="primary" @click="initialize">Reset</v-btn>
    </template>
  </v-data-table>
</template>

<script>
export default {
  data: () => ({
    show: false,
    show1: false,
    show2: true,
    show3: false,
    show4: false,
    password: "Password",
    dialog: false,
    dialog_view: false,
    headers: [
      {
        text: "id",
        align: "start",
        sortable: false,
        value: "id",
      },
      { text: "name", value: "name" },
      { text: "email", value: "email" },
      { text: "Actions", value: "actions", sortable: false },
    ],
    desserts: [],
    editedIndex: -1,
    editedItem: {
      name: "",
      email: "",
      password: "",
      picture: "picture.png",
      broker: {
        logo: "logo.png",
      },
      banner_color: "#FFFFFFF",
      body_color: "#FFFFFFF",
      button_color: "#FFFFFFF",
      lock_color: false,
    },
    defaultItem: {
      name: "",
      email: "",
      password: "",
      picture: "picture.png",
      banner_color: "#FFFFFFF",
      body_color: "#FFFFFFF",
      button_color: "#FFFFFFF",
      lock_color: false,
      broker: {
        logo: "logo.png",
      },
    },
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New Item" : "Edit Item";
    },
  },

  watch: {
    dialog(val) {
      val || this.close();
    },
    dialog_view(val) {
      val || this.close();
    },
  },

  created() {
    this.initialize();
  },

  methods: {
    handleClick(item) {
      this.editedIndex = this.desserts.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog_view = true;
    },
    selectFilePicture(e) {
      console.log(e);

      let reader = new FileReader();
      reader.onload = (eV) => {
        this.editedItem.picture = eV.target.result;
      };
      reader.readAsDataURL(e);
    },

    selectFile(e) {
      let reader = new FileReader();
      reader.onload = (eV) => {
        this.editedItem.logo = eV.target.result;
      };
      reader.readAsDataURL(e);
    },
    initialize() {
      try {
        axios.get("/api/broker/").then((response) => {
          console.log(response.data);
          this.desserts = [...response.data];
        });
      } catch (error) {
        console.log(error);
      }
    },

    editItem(item) {
      this.editedIndex = this.desserts.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },

    deleteItem($id) {
      swal
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        })
        .then((willDelete) => {
          if (willDelete.value) {
            axios.delete("api/users/" + $id.id).then(() => {
              swal.fire("Deleted!", "Your file has been deleted.", "success");
              this.initialize();
            });
          } else {
            swal.fire("Your imaginary file is safe!");
          }
        });
    },

    close() {
      this.dialog = false;
      this.dialog_view = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    save() {
      axios
        .post("/api/broker/", {
          ...this.editedItem,
        })
        .then((response) => {
          Toast.fire({
            icon: "success",
            title: "Agent Created Successfully",
          });
          this.initialize();
          this.close();
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
          setTimeout(() => {
            Toast.fire({
              icon: "error",
              title: "fill all items",
            });
          }, 1000);
        });
    },
    update() {
      axios
        .put("/api/users/" + this.editedItem.id, {
          ...this.editedItem,
        })
        .then((response) => {
          Toast.fire({
            icon: "success",
            title: "Agent Updated Successfully",
          });
          this.initialize();
          this.close();
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
};
</script>
<style>
.v-dialog {
  box-shadow: none !important;
}
</style>