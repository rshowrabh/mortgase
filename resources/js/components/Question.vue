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
        <v-card class="mb-12">
          <v-row align="center" justify="center">
            <v-col cols="12" md="5">
              <h4 class="mx-auto text-center">Ok great!</h4>
              <h2 class="mx-auto">What is your legal name?</h2>
              <v-form ref="form">
                <v-text-field v-model="user.q1.title" label="Title"></v-text-field>
                <v-text-field v-model="user.q1.first_name" label="Legal First Name"></v-text-field>
                <v-text-field v-model="user.q1.middle_name" label="Middle Initial (optional)"></v-text-field>
                <v-text-field v-model="user.q1.last_name" label="Legal Last Name"></v-text-field>
              </v-form>
            </v-col>
          </v-row>
        </v-card>

        <v-btn
          :disabled="!user.q1.title || !user.q1.first_name || !user.q1.middle_name || !user.q1.last_name"
          class="white--text"
          :color="this.color"
          @click="e1 = 2"
        >Continue</v-btn>

        <v-btn text>Cancel</v-btn>
      </v-stepper-content>

      <v-stepper-content step="2">
        <v-card class="mb-12">
          <v-row justify="center" align="center">
            <v-col md="6">
              <h1>
                Are you canadian citizen
                <br />or parmanent resident
              </h1>
              <v-radio-group v-model="user.q2" row>
                <v-radio label="Yes" value="yes"></v-radio>
                <v-radio label="No" value="no"></v-radio>
              </v-radio-group>
            </v-col>
          </v-row>
        </v-card>
        <v-btn :disabled="!user.q2" class="white--text" :color="this.color" @click="e1 = 3">Continue</v-btn>

        <v-btn text @click="e1 = 1">Back</v-btn>
      </v-stepper-content>

      <v-stepper-content step="3">
        <v-card class="mb-12" height="auto">
          <v-row align="center" justify="center">
            <v-col cols="12" md="5">
              <h4 class="mx-auto text-center">Ok great!</h4>
              <h2 class="mx-auto">What is address?</h2>
              <v-form ref="form">
                <v-text-field v-model="user.q3.street_no" label="Street No"></v-text-field>
                <v-text-field v-model="user.q3.street_name" label="Street  Name"></v-text-field>
                <v-text-field v-model="user.q3.direction" label="Direction(optional)"></v-text-field>
                <v-text-field v-model="user.q3.unit_no" label="Unit No (optional)"></v-text-field>
                <v-text-field v-model="user.q3.city" label="City"></v-text-field>
                <v-text-field v-model="user.q3.province" label="Province"></v-text-field>
                <v-text-field v-model="user.q3.postal_code" label="Postal Code"></v-text-field>
                <v-text-field v-model="user.q3.country" label="Country"></v-text-field>
              </v-form>
            </v-col>
          </v-row>
        </v-card>

        <v-btn
          :disabled="!user.q3.street_no || !user.q3.street_name || !user.q3.unit_no || !user.q3.city || !user.q3.province || !user.q3.postal_code || !user.q3.country"
          class="white--text"
          :color="this.color"
          @click="e1 = 4"
        >Continue</v-btn>

        <v-btn @click="e1 = 2" text>Back</v-btn>
      </v-stepper-content>
      <v-stepper-content step="4">
        <v-card class="mb-12" height="auto">
          <v-row align="center" justify="center">
            <v-col cols="12" md="5">
              <h2 class="mx-auto my-2">What is date of birth?</h2>
              <v-date-picker :color="this.color" v-model="user.q4"></v-date-picker>
            </v-col>
          </v-row>
        </v-card>

        <v-btn :disabled="!user.q4" class="white--text" :color="this.color" @click="e1 = 5">Continue</v-btn>

        <v-btn text @click="e1 =3">Back</v-btn>
      </v-stepper-content>
      <v-stepper-content step="5">
        <v-card class="mb-12" height="auto">
          <v-row align="center" justify="center">
            <v-col cols="12" md="5">
              <h1>What is your marital Status</h1>
              <v-radio-group v-model="user.q6" :mandatory="false">
                <v-radio label="Married" value="married"></v-radio>
                <v-radio label="Single" value="single"></v-radio>
              </v-radio-group>
            </v-col>
          </v-row>
        </v-card>

        <v-btn
          :disabled="!user.q6"
          class="white--text"
          :color="this.color"
          @click="sendData"
        >Continue</v-btn>

        <v-btn text @click="e1 =4">Back</v-btn>
      </v-stepper-content>

      <v-stepper-content step="6">
        <v-card class="mb-12" height="auto">
          <h1>Do you have any dependents</h1>
          <v-row align="center" justify="center">
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-btn
                  class="icon_button"
                  data-toggle="tooltip"
                  title="Your Text here"
                  @click="q7(1)"
                  :color="this.color"
                >Mortgase PreApproval</v-btn>
              </div>
            </v-col>

            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-btn
                  class="icon_button"
                  data-toggle="tooltip"
                  title="Your Text here"
                  @click="q7(2)"
                  :color="this.color"
                >New Home Purchage</v-btn>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-btn
                  class="icon_button"
                  data-toggle="tooltip"
                  title="Your Text here"
                  @click="q7(3)"
                  :color="this.color"
                >
                  Refinancing my
                  <br />Existing Mortgage
                </v-btn>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-btn
                  class="icon_button"
                  data-toggle="tooltip"
                  title="Your Text here"
                  @click="q7(4)"
                  :color="this.color"
                >
                  Home Equity Line of
                  <br />Credit
                </v-btn>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-btn
                  class="icon_button"
                  data-toggle="tooltip"
                  title="Your Text here"
                  @click="q7(5)"
                  :color="this.color"
                >
                  Second Mortgage/
                  <br />Debt consolidation
                </v-btn>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-btn
                  class="icon_button"
                  data-toggle="tooltip"
                  title="Your Text here"
                  @click="q7(6)"
                  :color="this.color"
                >Reverse Mortgage</v-btn>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-btn
                  class="icon_button"
                  data-toggle="tooltip"
                  title="Your Text here"
                  :color="this.color"
                >
                  Mortgage Plus Heloc
                  <br />Combo
                </v-btn>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-btn
                  class="icon_button"
                  data-toggle="tooltip"
                  title="Your Text here"
                  @click="q7(7)"
                  :color="this.color"
                >Transfer My Mortgage</v-btn>
              </div>
            </v-col>
          </v-row>
        </v-card>
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
      body_color: localStorage.getItem("body_color"),
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
      axios
        .post("api/client_question/wave_one/store", {
          q7: val,
        })
        .then((response) => {
          console.log(response.data);
          window.location = response.data.url;
        });
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
<style scoped>
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
  color: #fff;
}
.v-application--wrap {
  min-height: 0px;
}
</style>
