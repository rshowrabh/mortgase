<template>
  <v-stepper v-model="e1">
    <v-stepper-header>
      <template v-for="n in steps">
        <v-stepper-step
          :color="color"
          :key="`${n}-step`"
          :complete="e1 > n"
          :step="n"
          editable
        >Step {{ n }}</v-stepper-step>

        <v-divider v-if="n !== steps" :key="n"></v-divider>
      </template>
    </v-stepper-header>

    <v-stepper-items>
      <v-stepper-content step="1">
        <v-card class="mb-12 mt-5 border" color="lighten-1" height="auto">
          <v-row align="center" justify="center">
            <v-col cols="12" md="5">
              <h1>Will you live there, or is this an investment property?</h1>
              <v-radio-group v-model="user.q6" :mandatory="false">
                <v-radio label="My Own Home " value="My Own Home "></v-radio>
                <v-radio label="Investment Property " value="Investment Property "></v-radio>
              </v-radio-group>
            </v-col>
          </v-row>
        </v-card>

        <v-btn :color="this.color" @click="e1 = 2">Continue</v-btn>

        <v-btn text>Cancel</v-btn>
      </v-stepper-content>
      <v-stepper-content step="2">
        <v-card class="mb-12 mt-5 border" color="lighten-1" height="auto">
          <h1>What type of property?</h1>
          <v-row align="center" justify="center">
            <v-col cols="12" md="3">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <br />
                <v-btn
                  @click="q7('Single Family')"
                  class="icon_button"
                  :color="this.color"
                >Single Family</v-btn>
              </div>
            </v-col>
            <v-col cols="12" md="3">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <br />
                <v-btn
                  @click="q7('Multi – Family')"
                  class="icon_button"
                  :color="this.color"
                >Multi – Family</v-btn>
              </div>
            </v-col>
            <v-col cols="12" md="3">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <br />
                <v-btn
                  @click="q7('Condominium')"
                  class="icon_button"
                  :color="this.color"
                >Condominium</v-btn>
              </div>
            </v-col>
            <v-col cols="12" md="3">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <br />
                <v-btn @click="q7('Townhouse')" class="icon_button" :color="this.color">Townhouse</v-btn>
              </div>
            </v-col>
          </v-row>
        </v-card>
      </v-stepper-content>
      <v-stepper-content step="3">
        <v-card class="mb-12 mt-5 border" color="lighten-1" height="auto">
          <v-row align="center" justify="center">
            <v-col cols="12" md="5">
              <h2 class="mx-auto">How much of a down payment do you have?</h2>
              <v-form ref="form">
                <v-text-field placeholder="Ex-$1000" v-model="user.q1.title"></v-text-field>
              </v-form>
            </v-col>
          </v-row>
        </v-card>

        <v-btn :color="this.color" @click="e1 =4">Continue</v-btn>

        <v-btn text>Cancel</v-btn>
      </v-stepper-content>
      <v-stepper-content step="4">
        <v-card class="mb-12 mt-5 border" color="lighten-1" height="auto">
          <v-row align="center" justify="center">
            <v-col cols="12" md="5">
              <h2 class="mx-auto">Which city are you looking to buy in?</h2>
              <v-form ref="form">
                <v-text-field placeholder="Ex. Toronto" v-model="user.q2.title"></v-text-field>
              </v-form>
            </v-col>
          </v-row>
        </v-card>

        <v-btn :color="this.color" @click="e1 =5">Continue</v-btn>

        <v-btn text>Cancel</v-btn>
      </v-stepper-content>
    </v-stepper-items>
  </v-stepper>
</template>


<script>
export default {
  data() {
    return {
      e1: 1,
      steps: 6,
      color: localStorage.getItem("broker_button"),
      agent: {},
      user: {
        q1: {},
        q2: "",
        q3: {},
        q4: "",
        q6: "",
      },
    };
  },
  watch: {
    steps(val) {
      if (this.e1 > val) {
        this.e1 = val;
      }
    },
  },

  methods: {
    q7(val) {
      // axios
      //   .post("api/client_question/wave_one/store", {
      //     q7: val,
      //   })
      //   .then((response) => {
      //     console.log(response.data);
      //     window.location = response.data.url;
      //   });
      console.log(val);
      this.e1 = 3;
    },
    sendData() {
      axios
        .post("api/client_question/wave_one/store", {
          ...this.user,
        })
        .then((response) => {
          console.log(response.data);
          this.e1 = 6;
        });
    },
    getAgentData() {
      axios.get("api/get_agent_data").then((response) => {
        this.agent = response.data.data;
        this.color = response.data.data.color_system;
      });
    },
  },
  created() {
    this.getAgentData();
  },
};
</script>
<style  scoped>
.icon {
  height: 170px;
  width: 270px;
  text-align: center;
  border: 2px solid #000;
  padding: 5px;
  padding-top: 30px;
  border-radius: 50%;
}
.icon_button {
  padding-top: 10px;
}
</style>