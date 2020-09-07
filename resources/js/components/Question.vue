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
              <h4 class="mx-auto text-center">Ok great!</h4>
              <h2 class="mx-auto">What is your legal name?</h2>
              <v-form ref="form">
                <v-text-field v-model="user.q_1.title" label="Title"></v-text-field>
                <v-text-field v-model="user.q_1.first_name" label="Legal First Name"></v-text-field>
                <v-text-field v-model="user.q_1.middle_name" label="Middle Initial (optional)"></v-text-field>
                <v-text-field v-model="user.q_1.last_name" label="Legal Last Name"></v-text-field>
              </v-form>
            </v-col>
          </v-row>
        </v-card>

        <v-btn :color="this.color" @click="e1 = 2">Continue</v-btn>

        <v-btn text>Cancel</v-btn>
      </v-stepper-content>

      <v-stepper-content step="2">
        <v-card class="mb-12" color="grey lighten-1"></v-card>
        <v-row justify="center" align="center">
          <v-col md="6">
            <h1>
              Are you canadian citizen
              <br />or parmanent resident
            </h1>
            <v-radio-group v-model="user.q_2" row>
              <v-radio label="Yes" value="yes"></v-radio>
              <v-radio label="No" value="no"></v-radio>
            </v-radio-group>
          </v-col>
        </v-row>

        <v-btn :color="this.color" @click="e1 = 3">Continue</v-btn>

        <v-btn text>Cancel</v-btn>
      </v-stepper-content>

      <v-stepper-content step="3">
        <v-card class="mb-12 mt-5 border" color="lighten-1" height="auto">
          <v-row align="center" justify="center">
            <v-col cols="12" md="5">
              <h4 class="mx-auto text-center">Ok great!</h4>
              <h2 class="mx-auto">What is address?</h2>
              <v-form ref="form">
                <v-text-field v-model="user.q_3.street_no" label="Street No"></v-text-field>
                <v-text-field v-model="user.q_3.street_name" label="Street  Name"></v-text-field>
                <v-text-field v-model="user.q_3.direction" label="Direction(optional)"></v-text-field>
                <v-text-field v-model="user.q_3.unit_no" label="Unit No (optional)"></v-text-field>
                <v-text-field v-model="user.q_3.city" label="City"></v-text-field>
                <v-text-field v-model="user.q_3.province" label="Province"></v-text-field>
                <v-text-field v-model="user.q_3.postal_code" label="Postal Code"></v-text-field>
                <v-text-field v-model="user.q_3.country" label="Country"></v-text-field>
              </v-form>
            </v-col>
          </v-row>
        </v-card>

        <v-btn :color="this.color" @click="e1 = 4">Continue</v-btn>

        <v-btn text>Cancel</v-btn>
      </v-stepper-content>
      <v-stepper-content step="4">
        <v-card class="mb-12 mt-5 border" color="lighten-1" height="auto">
          <v-row align="center" justify="center">
            <v-col cols="12" md="5">
              <h2 class="mx-auto my-2">What is date of birth?</h2>
              <v-date-picker v-model="user.q_4"></v-date-picker>
            </v-col>
          </v-row>
        </v-card>

        <v-btn :color="this.color" @click="e1 = 5">Continue</v-btn>

        <v-btn text>Cancel</v-btn>
      </v-stepper-content>
      <v-stepper-content step="5">
        <v-card class="mb-12 mt-5 border" color="lighten-1" height="auto">
          <v-row align="center" justify="center">
            <v-col cols="12" md="5">
              <h1>What is your marital Status</h1>
              <v-radio-group v-model="user.q_6" :mandatory="false">
                <v-radio label="Married" value="married"></v-radio>
                <v-radio label="Single" value="single"></v-radio>
              </v-radio-group>
            </v-col>
          </v-row>
        </v-card>

        <v-btn :color="this.color" @click="e1 = 6">Continue</v-btn>

        <v-btn text>Cancel</v-btn>
      </v-stepper-content>
      <v-stepper-content step="6">
        <v-card class="mb-12 mt-5 border" color="lighten-1" height="auto">
          <v-row align="center" justify="center">
            <v-col cols="12" md="5">
              <h1>Do you have any dependents</h1>
              <v-select
                label="select"
                v-model="user.q_7"
                :items="['1','2']"
                data-vv-name="select"
                required
              ></v-select>
            </v-col>
          </v-row>
        </v-card>

        <v-btn :color="this.color" @click="e1 = 7">Continue</v-btn>

        <v-btn text>Cancel</v-btn>
      </v-stepper-content>
      <v-stepper-content step="7">
        <v-card class="mb-12 mt-5 border" color="lighten-1" height="auto">
          <v-row align="center" justify="center">
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-btn class="icon_button" :color="this.color">Mortgase PreApproval</v-btn>
              </div>
            </v-col>

            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-btn class="icon_button" :color="this.color">New Home Purchage</v-btn>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-btn class="icon_button" :color="this.color">
                  Refinancing my
                  <br />Existing Mortgage
                </v-btn>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-btn class="icon_button" :color="this.color">
                  Home Equity Line of
                  <br />Credit
                </v-btn>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-btn class="icon_button" :color="this.color">
                  Second Mortgage/
                  <br />Debt consolidation
                </v-btn>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-btn class="icon_button" :color="this.color">Reverse Mortgage</v-btn>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-btn class="icon_button" :color="this.color">
                  Mortgage Plus Heloc
                  <br />Combo
                </v-btn>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-btn class="icon_button" :color="this.color">Transfer My Mortgage</v-btn>
              </div>
            </v-col>
          </v-row>
        </v-card>

        <v-btn :color="this.color" @click="sendData">Submit</v-btn>

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
      steps: 7,
      color: "primary",
      agent: {},
      user: {
        q_1: {},
        q_2: "",
        q_3: {},
        q_4: "",
        q_6: "",
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
    sendData() {
      console.log(this.user);
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