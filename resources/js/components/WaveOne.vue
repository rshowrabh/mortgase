<template>
  <v-stepper v-model="e1">
    <v-stepper-items>
      <v-stepper-content step="1">
        <v-card class="mb-12" height="auto">
          <v-row align="center" justify="center">
            <v-col cols="12" md="12">
              <h1>
                Will you live there, or is this an investment
                property?
              </h1>
              <v-radio-group v-model="user.a" :mandatory="false">
                <v-radio label="My Own Home " value="My Own Home "></v-radio>
                <v-radio label="Investment Property " value="Investment Property "></v-radio>
              </v-radio-group>
            </v-col>
          </v-row>
        </v-card>

        <v-btn
          class="icon_button"
          :disabled="!user.a"
          :color="this.color"
          @click="e1 = e1 +1"
        >Continue</v-btn>

        <v-btn text>Cancel</v-btn>
      </v-stepper-content>
      <v-stepper-content step="2">
        <v-card class="mb-12" height="auto">
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
        <v-card class="mb-12" height="auto">
          <v-row align="center" justify="center">
            <v-col cols="12" md="12">
              <h2 class="mx-auto">How much of a down payment do you have?</h2>
              <v-form ref="form">
                <v-text-field placeholder="Ex-$1000" v-model="user.c"></v-text-field>
              </v-form>
            </v-col>
          </v-row>
        </v-card>

        <v-btn
          class="icon_button"
          :disabled="!user.c"
          :color="this.color"
          @click="e1 = e1 +1"
        >Continue</v-btn>

        <v-btn @click="e1 = e1 -1" text>Cancel</v-btn>
      </v-stepper-content>
      <v-stepper-content step="4">
        <v-card class="mb-12" height="auto">
          <v-row align="center" justify="center">
            <v-col cols="12" md="12">
              <h2 class="mx-auto">Which city are you looking to buy in?</h2>
              <v-form ref="form">
                <v-text-field placeholder="Ex. Toronto" v-model="user.d"></v-text-field>
              </v-form>
            </v-col>
          </v-row>
        </v-card>

        <v-btn
          class="icon_button"
          :disabled="!user.d"
          :color="this.color"
          @click="e1 = e1 +1"
        >Continue</v-btn>

        <v-btn @click="e1 = e1 -1" text>Cancel</v-btn>
      </v-stepper-content>

      <v-stepper-content step="5">
        <v-card class="mb-12 stepper" height="auto">
          <h2>What are the source of your downpayments ?</h2>
          <p>Please select all that apply</p>
          <v-row align="center" justify="center">
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">Bank account</p>

                <v-checkbox :color="this.color" v-model="user.e" value="Bank account"></v-checkbox>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">Investment account</p>

                <v-checkbox :color="this.color" v-model="user.e" value="Investment account"></v-checkbox>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">A gift from family</p>

                <v-checkbox :color="this.color" v-model="user.e" value="A gift from family"></v-checkbox>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">RRSP withdrawal</p>

                <v-checkbox :color="this.color" v-model="user.e" value="RRSP withdrawal"></v-checkbox>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">Sales of asset</p>

                <v-checkbox :color="this.color" v-model="user.e" value="Sales of asset"></v-checkbox>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">Sales of existing property</p>

                <v-checkbox :color="this.color" v-model="user.e" value="Sales of existing property"></v-checkbox>
              </div>
            </v-col>
          </v-row>
        </v-card>
        <v-btn :disabled="!user.e" :color="this.color" @click="e1 = e1+1">Continue</v-btn>

        <v-btn @click="e1 = el -1" text>Cancel</v-btn>
        <v-bottom-navigation>
          <v-btn>
            <span>
              In case of joint application, the downpayments is
              the combined ammount the two borrowers will be
              contributing
            </span>
            <v-icon :color="this.color">mdi-led-on</v-icon>
          </v-btn>
        </v-bottom-navigation>
      </v-stepper-content>
      <v-stepper-content step="6">
        <v-card class="mb-12 stepper" height="auto">
          <p>Another box ticked</p>
          <h2>What are the details of your downpayment source</h2>
          <v-row align="center" justify="center">
            <v-col cols="12" md="12">
              <div class="text-center">
                <div class="text_div">
                  <p>Total Downpayments Ammount</p>
                  <h3>$50,000</h3>
                </div>
                <v-col class="pr-4">
                  <v-slider
                    v-model="user.f"
                    class="align-center"
                    max="50000"
                    min="5000"
                    hide-details
                    :thumb-color="color"
                    thumb-label="always"
                  >
                    <template v-slot:append>
                      <v-text-field
                        v-model="user.f"
                        class="mt-0 pt-0"
                        hide-details
                        single-line
                        type="number"
                        style="width:150px"
                      ></v-text-field>
                    </template>
                  </v-slider>
                </v-col>
              </div>
              <v-expansion-panels popout class="border-1 my-2">
                <v-expansion-panel>
                  <v-expansion-panel-header>
                    Bank Account
                    <span class="color-grey">$250000</span>
                    <template v-slot:actions>
                      <v-icon color="error ml-5">mdi-alert-circle</v-icon>
                    </template>
                  </v-expansion-panel-header>
                  <v-expansion-panel-content>
                    <v-text-field value="$25000"></v-text-field>
                  </v-expansion-panel-content>
                </v-expansion-panel>
              </v-expansion-panels>
              <v-expansion-panels popout>
                <v-expansion-panel>
                  <v-expansion-panel-header>
                    A gift from family
                    <span class="color-grey">$250000</span>
                    <template v-slot:actions>
                      <v-icon color="error ml-5">mdi-alert-circle</v-icon>
                    </template>
                  </v-expansion-panel-header>
                  <v-expansion-panel-content>
                    <v-text-field value="$25000"></v-text-field>
                  </v-expansion-panel-content>
                </v-expansion-panel>
              </v-expansion-panels>

              <v-expansion-panels popout class="border-1 my-2">
                <v-expansion-panel>
                  <v-expansion-panel-header>Other sources</v-expansion-panel-header>
                  <v-expansion-panel-content>
                    <v-row align="center" justify="center">
                      <v-col cols="12" md="3">
                        <div class="text-center icon">
                          <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                          <p class="mt-3" style="color:#000">Investment Account</p>

                          <v-checkbox
                            :color="this.color"
                            v-model="user.f.a"
                            value="Investment Account"
                          ></v-checkbox>
                        </div>
                      </v-col>
                      <v-col cols="12" md="3">
                        <div class="text-center icon">
                          <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                          <p class="mt-3" style="color:#000">RSRP withdrawal</p>

                          <v-checkbox
                            :color="this.color"
                            v-model="user.f.a"
                            value="RSRP withdrawal"
                          ></v-checkbox>
                        </div>
                      </v-col>
                      <v-col cols="12" md="3">
                        <div class="text-center icon">
                          <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                          <p class="mt-3" style="color:#000">Sale of asset</p>

                          <v-checkbox :color="this.color" v-model="user.f.a" value="Sale of asset"></v-checkbox>
                        </div>
                      </v-col>
                      <v-col cols="12" md="3">
                        <div class="text-center icon">
                          <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                          <p class="mt-3" style="color:#000">Sale of existing property</p>

                          <v-checkbox
                            :color="this.color"
                            v-model="user.f.a"
                            value="Sale of existing property"
                          ></v-checkbox>
                        </div>
                      </v-col>
                    </v-row>
                  </v-expansion-panel-content>
                </v-expansion-panel>
              </v-expansion-panels>
            </v-col>
          </v-row>
        </v-card>
        <v-btn
          class="icon_button"
          :disabled="!user.f"
          :color="this.color"
          @click="e1 = e1 + 1"
        >Continue</v-btn>

        <v-btn text @click="e1 = e1 -1">Cancel</v-btn>
      </v-stepper-content>
      <v-stepper-content step="7">
        <v-card class="mb-12 stepper" height="auto">
          <h2>How will you use the property?</h2>
          <v-row align="center" justify="center">
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">Primary Resident</p>

                <v-checkbox :color="this.color" v-model="user.g" value="Primary Resident"></v-checkbox>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">Secondary Home</p>

                <v-checkbox :color="this.color" v-model="user.g" value="Secondary Home"></v-checkbox>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">Investment Property</p>

                <v-checkbox :color="this.color" v-model="user.g" value="Investment Property"></v-checkbox>
              </div>
            </v-col>
          </v-row>
        </v-card>
        <v-btn
          class="icon_button"
          :disabled="!user.g"
          :color="this.color"
          @click="e1 = e1+1"
        >Continue</v-btn>

        <v-btn text @click="e1 = e1-1">Cancel</v-btn>
      </v-stepper-content>
      <v-stepper-content step="8">
        <v-card class="mb-12">
          <v-row justify="center" align="center">
            <v-col md="12">
              <h1>
                Are you canadian citizen
                <br />or parmanent resident
              </h1>
              <v-radio-group v-model="user.h">
                <v-radio
                  class="p-3 border"
                  label="Imediate Signed a purchange Agreement"
                  value="Imediate Signed a purchange Agreement"
                ></v-radio>
                <br />
                <v-radio
                  class="p-3 border"
                  label="ASAP! Found a house /offer pending"
                  value="ASAP! Found a house /offer pending"
                ></v-radio>
                <br />
                <v-radio class="p-3 border" label="Within 30 days" value="Within 30 days"></v-radio>
                <v-text-field
                  v-if="user.h == 'Within 30 days'"
                  placeholder="Please enter the address of the property being purchase. "
                  v-model="user.h.a"
                ></v-text-field>
                <br />
                <v-radio class="p-3 border" label="2-3 Months" value="2-3 Months"></v-radio>
                <br />
                <v-radio class="p-3 border" label="3-6 Months" value="3-6 Months"></v-radio>
                <br />
                <v-radio class="p-3 border" label="6+ Months" value="6+ Months"></v-radio>
                <br />
                <v-radio
                  class="p-3 border"
                  label="No time frame I am researching frame"
                  value="No time frame I am researching frame"
                ></v-radio>
              </v-radio-group>
            </v-col>
          </v-row>
        </v-card>
        <v-btn
          :disabled="!user.h"
          class="icon_button"
          :color="this.color"
          @click="e1 = e1+1"
        >Continue</v-btn>

        <v-btn text @click="e1 = e1-1">Back</v-btn>
      </v-stepper-content>
      <v-stepper-content step="9">
        <v-card class="mb-12">
          <v-row justify="center" align="center">
            <v-col md="12">
              <h1>Are you a first home buyer</h1>
              <v-radio-group v-model="user.i" row>
                <div class="text-center icon mr-3">
                  <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                  <!-- <p class="mt-3" style="color:#000">Yes</p> -->

                  <v-radio class="ml-5" :color="this.color" label="Yes" value="Yes"></v-radio>
                </div>
                <div class="text-center icon">
                  <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                  <!-- <p class="mt-3" style="color:#000">Yes</p> -->

                  <v-radio class="ml-5" :color="this.color" label="No" value="No"></v-radio>
                </div>
              </v-radio-group>
            </v-col>
          </v-row>
        </v-card>
        <v-btn
          :disabled="!user.i"
          class="icon_button"
          :color="this.color"
          @click="e1 = e1+1"
        >Continue</v-btn>

        <v-btn text @click="e1 = e1-1">Back</v-btn>
      </v-stepper-content>
      <v-stepper-content step="10">
        <v-card class="mb-12 stepper" height="auto">
          <p>Lets review steves</p>
          <h2>Your mortgage info summary</h2>
          <v-row align="center" justify="center">
            <v-col cols="12" md="12">
              <div class="text-center">
                <div class="text_div">
                  <p>Your mortgage info summary</p>
                  <h3>$50,000</h3>
                </div>
              </div>
            </v-col>
            <v-col class="pr-4">
              <v-slider
                v-model="user.k"
                class="align-center"
                max="50000"
                min="5000"
                hide-details
                :thumb-color="color"
                thumb-label="always"
              >
                <template v-slot:append>
                  <v-text-field
                    v-model="user.k"
                    class="mt-0 pt-0"
                    hide-details
                    single-line
                    type="number"
                    style="width:150px"
                  ></v-text-field>
                </template>
              </v-slider>
            </v-col>
            <v-col cols="12" md="10">
              <v-card class="mx-auto">
                <div class="question_k p-5">
                  <h3>How do you calculate your total mortgage ammount</h3>

                  <p>
                    Purchase price
                    <span class="float-right">$50,000</span>
                  </p>
                  <p>
                    Downpayments
                    <span class="float-right">
                      <v-btn class="p-0 m-0" style="box-shadow:none;background:transparent;">
                        <v-icon :color="this.color">mdi-minus</v-icon>
                      </v-btn>$25,000
                    </span>
                  </p>
                  <hr />
                  <p>
                    Morgage Requested
                    <span class="float-right">
                      <v-btn class="p-0 m-0" style="box-shadow:none;background:transparent;">
                        <v-icon :color="this.color">mdi-equal</v-icon>
                      </v-btn>$25,000
                    </span>
                  </p>
                </div>
              </v-card>
            </v-col>
          </v-row>
        </v-card>
        <v-btn
          class="icon_button"
          :disabled="!user.k"
          :color="this.color"
          @click="e1 = e1 + 1"
        >Continue</v-btn>

        <v-btn text @click="e1 = e1 -1">Cancel</v-btn>
      </v-stepper-content>
      <v-stepper-content step="11">
        <v-card class="mb-12 stepper" height="auto">
          <p>Lets review steves</p>
          <h2>Your mortgage info summary</h2>
          <v-row align="center" justify="center">
            <v-col cols="12" md="11">
              <v-card class="mx-auto">
                <div class="row pt-5">
                  <div class="col-5 mx-auto">
                    <p>Now we are going to ask you about your employment status, your workplace if you have one, and any other source of income. Make sure you have the information on hand and you will be able to move through this section swiftly!</p>
                    <button @click="e1 = e1 +1 " class="btn mt-2 text-white btn-round">Continue</button>
                  </div>
                  <div class="col-7 mx-auto">
                    <img class="img-fluid" src="/dist/img/photo2.png" alt />
                  </div>
                </div>
              </v-card>
            </v-col>
          </v-row>
        </v-card>
      </v-stepper-content>
      <!-- <v-stepper-content step="11">
        <v-card class="mb-12 stepper" height="auto">
          <p>Now the first question</p>
          <h2>What is your emplyment status</h2>
          <v-row align="center" justify="center">
            <v-col cols="12" md="11">
              <v-card class="mx-auto">
                <v-radio-group>

                </v-radio-group>
              </v-card>
            </v-col>
          </v-row>
        </v-card>
      </v-stepper-content>-->
    </v-stepper-items>
  </v-stepper>
</template>

<script>
export default {
  data() {
    return {
      e1: 1,
      steps: 11,
      color: localStorage.getItem("broker_button"),
      agent: {},
      user: {
        q1: {},
        q2: {},
        q3: {},
        q4: "",
        q6: "",
        q_e: [],
        f: 10000,
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
<style scoped>
.icon {
  height: 150px;
  width: 150px;
  text-align: center;
  border: 2px dashed #000;
  padding-top: 30px;
}
.icon_button {
  padding-top: 10px;
  color: #fff;
}
.stepper .v-input--selection-controls {
  position: absolute !important;
  top: 0px;
}
.text_div {
  padding: 15px;
  text-align: center;
  border: 1px dashed #000;
}
</style>
