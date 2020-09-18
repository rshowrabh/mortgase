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
      <v-stepper-content step="12">
        <v-card class="mb-12">
          <v-row justify="center" align="center">
            <v-col md="12">
              <p>Now the first question</p>
              <h1>Whats your current employment status?</h1>
              <v-radio-group v-model="user.l">
                <div class="text-center">
                  <v-btn outlined :color="user.l == 'Employed' ? this.color : ''" class="btn-1">
                    <v-radio
                      off-icon="mdi-checkbox-circle"
                      on-icon="mdi-checkbox-marked-circle"
                      label="Employed"
                      value="Employed"
                      :color="this.color"
                    ></v-radio>
                  </v-btn>
                </div>
                <div class="text-center" :border-color:="this.color">
                  <v-btn :color="user.l == 'Unemployed' ? this.color : ''" outlined class="btn-1">
                    <v-radio
                      off-icon="mdi-checkbox-circle"
                      on-icon="mdi-checkbox-marked-circle"
                      label="Unemployed"
                      value="Unemployed"
                      :color="this.color"
                    ></v-radio>
                  </v-btn>
                </div>
                <div class="text-center" :border-color:="this.color">
                  <v-btn :color="user.l == 'Retired' ? this.color : ''" outlined class="btn-1">
                    <v-radio
                      off-icon="mdi-checkbox-circle"
                      on-icon="mdi-checkbox-marked-circle"
                      label="Retired"
                      value="Retired"
                      :color="this.color"
                    ></v-radio>
                  </v-btn>
                </div>
              </v-radio-group>
            </v-col>
          </v-row>
        </v-card>
        <v-btn
          :disabled="!user.l"
          class="icon_button"
          :color="this.color"
          @click="e1 = e1+1"
        >Continue</v-btn>

        <v-btn text @click="e1 = e1-1">Back</v-btn>
      </v-stepper-content>
      <v-stepper-content step="13">
        <v-card class="mb-12">
          <v-row justify="center" align="center">
            <v-col md="12">
              <p>Thats great</p>
              <h1>What type of employments</h1>
              <v-radio-group v-model="user.m">
                <div class="text-center">
                  <v-btn
                    outlined
                    :color="user.m == 'Commissioned sales' ? this.color : ''"
                    class="btn-1"
                  >
                    <v-radio
                      off-icon="mdi-checkbox-circle"
                      on-icon="mdi-checkbox-marked-circle"
                      label="Commissioned sales"
                      value="Commissioned sales"
                      :color="this.color"
                    ></v-radio>
                  </v-btn>
                </div>
                <div class="text-center" :border-color:="this.color">
                  <v-btn :color="user.m == 'Contract' ? this.color : ''" outlined class="btn-1">
                    <v-radio
                      off-icon="mdi-checkbox-circle"
                      on-icon="mdi-checkbox-marked-circle"
                      label="Contract"
                      value="Contract"
                      :color="this.color"
                    ></v-radio>
                  </v-btn>
                </div>
                <div class="text-center" :border-color:="this.color">
                  <v-btn :color="user.m == 'Full Time' ? this.color : ''" outlined class="btn-1">
                    <v-radio
                      off-icon="mdi-checkbox-circle"
                      on-icon="mdi-checkbox-marked-circle"
                      label="Full Time"
                      value="Full Time"
                      :color="this.color"
                    ></v-radio>
                  </v-btn>
                </div>
                <div class="text-center" :border-color:="this.color">
                  <v-btn :color="user.m == 'Part Time' ? this.color : ''" outlined class="btn-1">
                    <v-radio
                      off-icon="mdi-checkbox-circle"
                      on-icon="mdi-checkbox-marked-circle"
                      label="Part Time"
                      value="Part Time"
                      :color="this.color"
                    ></v-radio>
                  </v-btn>
                </div>
                <div class="text-center" :border-color:="this.color">
                  <v-btn :color="user.m == 'Seasonal' ? this.color : ''" outlined class="btn-1">
                    <v-radio
                      off-icon="mdi-checkbox-circle"
                      on-icon="mdi-checkbox-marked-circle"
                      label="Seasonal"
                      value="Seasonal"
                      :color="this.color"
                    ></v-radio>
                  </v-btn>
                </div>
                <div class="text-center" :border-color:="this.color">
                  <v-btn
                    :color="user.m == 'Self employed' ? this.color : ''"
                    outlined
                    class="btn-1"
                  >
                    <v-radio
                      off-icon="mdi-checkbox-circle"
                      on-icon="mdi-checkbox-marked-circle"
                      label="Self employed"
                      value="Self employed"
                      :color="this.color"
                    ></v-radio>
                  </v-btn>
                </div>
              </v-radio-group>
            </v-col>
          </v-row>
        </v-card>
        <v-btn
          :disabled="!user.m"
          class="icon_button"
          :color="this.color"
          @click="e1 = e1+1"
        >Continue</v-btn>

        <v-btn text @click="e1 = e1-1">Back</v-btn>
      </v-stepper-content>
      <v-stepper-content step="14">
        <v-card class="mb-12">
          <p>Thank you</p>
          <h1>What best describes your field of work, job title and occupation ?</h1>

          <v-row justify="center" align="center">
            <v-col md="7">
              <div class="form-group">
                <select v-model="user.n.a" class="form-control m-3" id="exampleFormControlSelect2">
                  <option selected value="1">Finace, insurance, Real State</option>
                  <option selected value="3">Finace, insurance, Real State</option>
                </select>
                <select v-model="user.n.b" class="form-control m-3" id="exampleFormControlSelect2">
                  <option selected value="1">Fund manager</option>
                  <option selected value="3">Fund manager</option>
                </select>
                <select v-model="user.n.c" class="form-control m-3" id="exampleFormControlSelect2">
                  <option selected value="1">Unknown</option>
                  <option selected value="2">Unknown</option>
                </select>
              </div>
            </v-col>
          </v-row>
        </v-card>
        <v-btn
          :disabled="!user.n"
          class="icon_button"
          :color="this.color"
          @click="e1 = e1+1"
        >Continue</v-btn>

        <v-btn text @click="e1 = e1-1">Back</v-btn>
      </v-stepper-content>
      <v-stepper-content step="15">
        <v-card class="mb-12">
          <p>Thank you</p>
          <h1>Whats your employer name and phone number ?</h1>

          <v-row justify="center" align="center">
            <v-col md="6">
              <v-text-field
                clear-icon="mdi-checkbox-marked-circle"
                clearable
                :color="this.color"
                placeholder="name"
                v-model="user.o.a"
              ></v-text-field>
              <v-text-field
                clear-icon="mdi-checkbox-marked-circle"
                clearable
                :color="this.color"
                placeholder="phone"
                v-model="user.o.b"
              ></v-text-field>
            </v-col>
          </v-row>
        </v-card>
        <v-btn
          :disabled="!user.o"
          class="icon_button"
          :color="this.color"
          @click="e1 = e1+1"
        >Continue</v-btn>

        <v-btn text @click="e1 = e1-1">Back</v-btn>
      </v-stepper-content>
      <v-stepper-content step="16">
        <v-card class="mb-12">
          <p>Thanks we are almost there</p>
          <h1>Whats {{user.o.a}} address ?</h1>

          <v-row justify="center" align="center">
            <v-col md="6">
              <v-text-field
                clear-icon="mdi-checkbox-marked-circle"
                clearable
                :color="this.color"
                placeholder="name"
                v-model="user.p.a"
              ></v-text-field>
              <v-text-field
                clear-icon="mdi-checkbox-marked-circle"
                clearable
                :color="this.color"
                placeholder="phone"
                v-model="user.p.b"
              ></v-text-field>
              <v-text-field
                clear-icon="mdi-checkbox-marked-circle"
                clearable
                :color="this.color"
                placeholder="phone"
                v-model="user.p.c"
              ></v-text-field>
              <v-text-field
                clear-icon="mdi-checkbox-marked-circle"
                clearable
                :color="this.color"
                placeholder="phone"
                v-model="user.p.d"
              ></v-text-field>
              <v-text-field
                clear-icon="mdi-checkbox-marked-circle"
                clearable
                :color="this.color"
                placeholder="phone"
                v-model="user.p.e"
              ></v-text-field>
              <v-text-field
                clear-icon="mdi-checkbox-marked-circle"
                clearable
                :color="this.color"
                placeholder="phone"
                v-model="user.p.f"
              ></v-text-field>
              <v-text-field
                clear-icon="mdi-checkbox-marked-circle"
                clearable
                :color="this.color"
                placeholder="phone"
                v-model="user.p.g"
              ></v-text-field>
              <v-text-field
                clear-icon="mdi-checkbox-marked-circle"
                clearable
                :color="this.color"
                placeholder="phone"
                v-model="user.p.h"
              ></v-text-field>
            </v-col>
          </v-row>
        </v-card>
        <v-btn
          :disabled="!user.p"
          class="icon_button"
          :color="this.color"
          @click="e1 = e1+1"
        >Continue</v-btn>

        <v-btn text @click="e1 = e1-1">Back</v-btn>
      </v-stepper-content>
      <v-stepper-content step="17">
        <v-card class="mb-12">
          <p>Thank you</p>
          <h1>Whats your annula income at {{user.o.a}} ?</h1>

          <v-row justify="center" align="center">
            <v-col md="6">
              <v-text-field
                clear-icon="mdi-checkbox-marked-circle"
                clearable
                :color="this.color"
                placeholder="name"
                v-model="user.q.a"
              ></v-text-field>
              <v-text-field
                clear-icon="mdi-checkbox-marked-circle"
                clearable
                :color="this.color"
                placeholder="Bonous(optional)"
                v-model="user.q.b"
              ></v-text-field>
              <v-text-field
                clear-icon="mdi-checkbox-marked-circle"
                clearable
                :color="this.color"
                placeholder="overtime(optional)"
                v-model="user.q.c"
              ></v-text-field>
            </v-col>
          </v-row>
        </v-card>
        <v-btn
          :disabled="!user.q"
          class="icon_button"
          :color="this.color"
          @click="e1 = e1+1"
        >Continue</v-btn>

        <v-btn text @click="e1 = e1-1">Back</v-btn>
      </v-stepper-content>
      <v-stepper-content step="18">
        <v-card class="mb-12">
          <p>Thank you</p>
          <h1>How long have you worked at {{user.o.a}} ?</h1>

          <v-row justify="center" align="center">
            <v-col md="6">
              <v-text-field
                clear-icon="mdi-checkbox-marked-circle"
                clearable
                :color="this.color"
                placeholder="years"
                v-model="user.r.a"
              ></v-text-field>
              <v-text-field
                clear-icon="mdi-checkbox-marked-circle"
                clearable
                :color="this.color"
                placeholder="month"
                v-model="user.r.b"
              ></v-text-field>
            </v-col>
          </v-row>
        </v-card>
        <v-btn
          :disabled="!user.r"
          class="icon_button"
          :color="this.color"
          @click="e1 = e1+1"
        >Continue</v-btn>

        <v-btn text @click="e1 = e1-1">Back</v-btn>
      </v-stepper-content>
      <v-stepper-content step="19">
        <v-card class="mb-12 stepper" height="auto">
          <p>Okay now one to</p>
          <h2>Do you have anyother source of income</h2>
          <p>Please select all that apply</p>
          <v-row align="center" justify="center">
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-text-field
                  v-if="user.s.includes('Child Support')"
                  v-model="user.u.a"
                  style="width:140px"
                  class="checkbox_text mt-3 ml-1"
                  :color="this.color"
                  autofocus
                  placeholder="annual income"
                ></v-text-field>
                <p class="mt-3" style="color:#000">Child Support</p>

                <v-checkbox :color="this.color" v-model="user.s" value="Child Support"></v-checkbox>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-text-field
                  v-if="user.s.includes('Commission')"
                  v-model="user.u.b"
                  style="width:140px"
                  class="checkbox_text mt-3 ml-1"
                  :color="this.color"
                  autofocus
                  placeholder="annual income $"
                ></v-text-field>

                <p class="mt-3" style="color:#000">Commission</p>

                <v-checkbox :color="this.color" v-model="user.s" value="Commission"></v-checkbox>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-text-field
                  v-if="user.s.includes('Investment')"
                  v-model="user.u.c"
                  style="width:140px"
                  class="checkbox_text mt-3 ml-1"
                  :color="this.color"
                  autofocus
                  placeholder="annual income $"
                ></v-text-field>

                <p class="mt-3" style="color:#000">Investment</p>

                <v-checkbox :color="this.color" v-model="user.s" value="Investment"></v-checkbox>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-text-field
                  v-if="user.s.includes('Part Time Work')"
                  v-model="user.u.d"
                  style="width:140px"
                  class="checkbox_text mt-3 ml-1"
                  :color="this.color"
                  autofocus
                  placeholder="annual income $"
                ></v-text-field>
                <p class="mt-3" style="color:#000">Part Time Work</p>
                <v-checkbox :color="this.color" v-model="user.s" value="Part Time Work"></v-checkbox>
                <v-card-text></v-card-text>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-text-field
                  v-if="user.s.includes('Penstion/Disability')"
                  v-model="user.u.e"
                  style="width:140px"
                  class="checkbox_text mt-3 ml-1"
                  :color="this.color"
                  autofocus
                  placeholder="annual income $"
                ></v-text-field>

                <p class="mt-3" style="color:#000">Penstion/Disability</p>

                <v-checkbox :color="this.color" v-model="user.s" value="Penstion/Disability"></v-checkbox>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-text-field
                  v-if="user.s.includes('RIF/LIF')"
                  v-model="user.u.f"
                  style="width:140px"
                  class="checkbox_text mt-3 ml-1"
                  :color="this.color"
                  autofocus
                  placeholder="annual income $"
                ></v-text-field>

                <p class="mt-3" style="color:#000">RIF/LIF</p>

                <v-checkbox :color="this.color" v-model="user.s" value="RIF/LIF"></v-checkbox>
              </div>
            </v-col>

            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-text-field
                  v-if="user.s.includes('Seasonal Work')"
                  v-model="user.u.g"
                  style="width:140px"
                  class="checkbox_text mt-3 ml-1"
                  :color="this.color"
                  autofocus
                  placeholder="annual income $"
                ></v-text-field>

                <p class="mt-3" style="color:#000">Seasonal Work</p>

                <v-checkbox :color="this.color" v-model="user.s" value="Seasonal Work"></v-checkbox>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />
                <v-text-field
                  v-if="user.s.includes('Sposual Support')"
                  v-model="user.u.h"
                  style="width:140px"
                  class="checkbox_text mt-3 ml-1"
                  :color="this.color"
                  autofocus
                  placeholder="annual income $"
                ></v-text-field>

                <p class="mt-3" style="color:#000">Sposual Support</p>

                <v-checkbox :color="this.color" v-model="user.s" value="Sposual Support"></v-checkbox>
              </div>
            </v-col>
          </v-row>
        </v-card>
        <v-btn
          class="icon_button"
          :disabled="!user.s"
          :color="this.color"
          @click="e1 = e1+1"
        >Continue</v-btn>

        <v-btn @click="e1 = e1 -1" text>Cancel</v-btn>
      </v-stepper-content>
      <v-stepper-content step="20">
        <v-card class="mb-12 stepper" height="auto">
          <p>Lets review steves</p>
          <h2>Your mortgage info summary</h2>
          <v-row align="center" justify="center">
            <v-col cols="12" md="11">
              <v-card class="mx-auto">
                <div class="row pt-5">
                  <div class="col-5 mx-auto">
                    <p>Now we are going to ask you about your employment status, your workplace if you have one, and any other source of income. Make sure you have the information on hand and you will be able to move through this section swiftly!</p>
                    <button @click="e1 = e1 +1 " class="btn mt-2 text-white btn-round">Almost Done</button>
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
      <v-stepper-content step="21">
        <v-card class="mb-12 stepper" height="auto">
          <p>Okay now one to</p>
          <h2>Do you have any of the following assets</h2>
          <p>Please select all that apply</p>
          <v-row align="center" justify="center">
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">Automobiles</p>

                <v-checkbox :color="this.color" v-model="user.x" value="Automobiles"></v-checkbox>
              </div>
            </v-col>

            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">Cash</p>

                <v-checkbox :color="this.color" v-model="user.x" value="Cash"></v-checkbox>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">GIC/Term deposite</p>

                <v-checkbox :color="this.color" v-model="user.x" value="GIC/Term deposite"></v-checkbox>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">Primary Resident</p>
                <v-checkbox :color="this.color" v-model="user.x" value="Primary Resident"></v-checkbox>
                <v-card-text></v-card-text>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">Rental Property</p>

                <v-checkbox :color="this.color" v-model="user.x" value="Rental Property"></v-checkbox>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">RRSP</p>

                <v-checkbox :color="this.color" v-model="user.x" value="RRSP"></v-checkbox>
              </div>
            </v-col>

            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">Secondary Property</p>

                <v-checkbox :color="this.color" v-model="user.x" value="Secondary Property"></v-checkbox>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">Stock/Banf</p>

                <v-checkbox :color="this.color" v-model="user.x" value="Stock/Banf"></v-checkbox>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">Other Assets</p>

                <v-checkbox :color="this.color" v-model="user.x" value="Other Assets"></v-checkbox>
              </div>
            </v-col>
          </v-row>
        </v-card>
        <v-btn
          class="icon_button"
          :disabled="!user.x"
          :color="this.color"
          @click="e1 = e1+1"
        >Continue</v-btn>

        <v-btn @click="e1 = e1 -1" text>Cancel</v-btn>
      </v-stepper-content>
      <v-stepper-content step="22">
        <v-card class="mb-12 stepper" height="auto">
          <p>Okay now one to</p>
          <h2>Do you have any of the following assets</h2>
          <p>Please select all that apply</p>
          <v-row align="center" justify="center">
            <v-col cols="12" md="12">
              <v-expansion-panels popout>
                <v-expansion-panel v-for="(item,i) in user.x" :key="i">
                  <v-expansion-panel-header>{{item}}</v-expansion-panel-header>
                  <v-expansion-panel-content>
                    <v-text-field v-model="user.y.a[i]" placeholder="Cash"></v-text-field>
                    <v-text-field v-model="user.y.b[i]" placeholder="Description"></v-text-field>
                    <div style="display:block">
                      Is this is a join asset
                      <div class="form-check form-check-inline">
                        <input
                          class="form-check-input"
                          type="radio"
                          name="inlineRadioOptions"
                          id="inlineRadio1"
                          value="Yes"
                          v-model="user.y.c[i]"
                        />
                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input
                          class="form-check-input"
                          type="radio"
                          name="inlineRadioOptions"
                          id="inlineRadio2"
                          value="No"
                          v-model="user.y.c[i]"
                        />
                        <label class="form-check-label" for="inlineRadio2">No</label>
                      </div>
                    </div>
                  </v-expansion-panel-content>
                </v-expansion-panel>
              </v-expansion-panels>
            </v-col>
          </v-row>
        </v-card>
        <v-btn
          class="icon_button"
          :disabled="!user.s"
          :color="this.color"
          @click="e1 = e1+1"
        >Continue</v-btn>

        <v-btn @click="e1 = e1 -1" text>Cancel</v-btn>
      </v-stepper-content>
      <v-stepper-content step="23">
        <v-card class="mb-12 stepper" height="auto">
          <p>Okay now one to</p>
          <h2>Do you have any of the following liablities</h2>
          <p>Please select all that apply</p>
          <v-row align="center" justify="center">
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">Alimony</p>

                <v-checkbox :color="this.color" v-model="user.aa" value="Alimony"></v-checkbox>
              </div>
            </v-col>

            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">Child Support</p>

                <v-checkbox :color="this.color" v-model="user.aa" value="Child Support"></v-checkbox>
              </div>
            </v-col>
            <v-col cols="12" md="4">
              <div class="text-center icon">
                <img width="50px" class="img-fluid" src="/dist/img/logo.png" alt />

                <p class="mt-3" style="color:#000">Private debt(eg.to family)</p>

                <v-checkbox
                  :color="this.color"
                  v-model="user.aa"
                  value="Private debt(eg.to family)"
                ></v-checkbox>
              </div>
            </v-col>
          </v-row>
        </v-card>
        <v-btn
          class="icon_button"
          :disabled="!user.aa"
          :color="this.color"
          @click="e1 = e1+1"
        >Continue</v-btn>

        <v-btn @click="e1 = e1 -1" text>Cancel</v-btn>
      </v-stepper-content>
      <v-stepper-content step="24">
        <v-card class="mb-12 stepper" height="auto">
          <p>Okay now one to</p>
          <h2>What are the details of your liablities</h2>
          <v-row align="center" justify="center">
            <v-col cols="12" md="12">
              <v-expansion-panels popout>
                <v-expansion-panel v-for="(item,i) in user.aa" :key="i">
                  <v-expansion-panel-header>{{item}}</v-expansion-panel-header>
                  <v-expansion-panel-content>
                    <v-text-field v-model="user.bb.a[i]" placeholder="Cash"></v-text-field>
                  </v-expansion-panel-content>
                </v-expansion-panel>
              </v-expansion-panels>
            </v-col>
          </v-row>
        </v-card>
        <v-btn
          class="icon_button"
          :disabled="!user.bb"
          :color="this.color"
          @click="e1 = e1+1"
        >Continue</v-btn>

        <v-btn @click="e1 = e1 -1" text>Cancel</v-btn>
      </v-stepper-content>
      <v-stepper-content step="25">
        <v-card class="mb-12 stepper" height="auto">
          <h2>Almost Done</h2>
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
      <v-stepper-content step="26">
        <v-card class="mb-12 stepper" height="auto">
          <h2>Terms and condition</h2>
          <p>Before you can submit your application we need to review the follwoing</p>
          <hr />
          <v-row align="center" justify="center">
            <v-col cols="12" md="11">
              <v-card class="mx-auto">
                <h3>General</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic, magnam expedita excepturi totam illum laudantium saepe, a eligendi ipsam, cum quo corporis id dicta. Deserunt incidunt reprehenderit error itaque rem placeat est veniam. Enim ipsa saepe fugiat perferendis aliquid voluptatem molestias commodi eligendi tempora accusamus modi temporibus illum nihil eos dicta quo rerum iure maiores dolor autem, possimus ex aperiam. Est eos totam eligendi nihil cupiditate sed cum, similique excepturi deleniti quaerat, repellat veritatis quibusdam provident aliquid dolores aliquam sapiente reiciendis saepe, quia modi nostrum suscipit. Eveniet veniam excepturi iure dolores distinctio vero facilis molestias similique minus? Velit dolore nemo cum quisquam quas veritatis itaque distinctio, doloremque molestiae, quidem magnam veniam nisi. Architecto mollitia aliquid dolorem magni minus repellendus illum provident. Minus voluptas odio adipisci blanditiis labore. Quis vitae in ipsum quam facere optio iure culpa quos illum laudantium iste iusto itaque ducimus, recusandae eum ipsam repellat magni nisi debitis dolor dolore nesciunt nobis! Nesciunt sequi corporis ut nemo eum ducimus incidunt, consequuntur quasi rerum dolor quo porro? Accusantium reiciendis tempore iste aut distinctio ex quo quisquam officiis necessitatibus vero quae, expedita aliquam, odit praesentium hic voluptates vitae facere natus repellendus omnis optio totam architecto, perferendis commodi? Consequuntur, culpa molestiae.</p>
              </v-card>
            </v-col>
            <v-col cols="12" md="11">
              <v-card class="mx-auto">
                <p>Almost there</p>
                <h3>We need consent to check your credit.</h3>
                <hr />
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic, magnam expedita excepturi totam illum laudantium saepe, a eligendi ipsam, cum quo corporis id dicta. Deserunt incidunt reprehenderit error itaque rem placeat est veniam. Enim ipsa saepe fugiat perferendis aliquid voluptatem molestias commodi eligendi tempora accusamus modi temporibus illum nihil eos dicta quo rerum iure maiores dolor autem, possimus ex aperiam. Est eos totam eligendi nihil cupiditate sed cum, similique excepturi deleniti quaerat, repellat veritatis quibusdam provident aliquid dolores aliquam sapiente reiciendis saepe, quia modi nostrum suscipit. Eveniet veniam excepturi iure dolores distinctio vero facilis molestias similique minus? Velit dolore nemo cum quisquam quas veritatis itaque distinctio, doloremque molestiae, quidem magnam veniam nisi. Architecto mollitia aliquid dolorem magni minus repellendus illum provident. Minus voluptas odio adipisci blanditiis labore. Quis vitae in ipsum quam facere optio iure culpa quos illum laudantium iste iusto itaque ducimus, recusandae eum ipsam repellat magni nisi debitis dolor dolore nesciunt nobis! Nesciunt sequi corporis ut nemo eum ducimus incidunt, consequuntur quasi rerum dolor quo porro? Accusantium reiciendis tempore iste aut distinctio ex quo quisquam officiis necessitatibus vero quae, expedita aliquam, odit praesentium hic voluptates vitae facere natus repellendus omnis optio totam architecto, perferendis commodi? Consequuntur, culpa molestiae.</p>
              </v-card>
              <v-btn
                type="button"
                data-toggle="modal"
                data-target="#exampleModalCenter"
                :color="this.color"
                class="ma-2 icon_button"
              >Yes I concent</v-btn>

              <v-btn
                @click="e1 = e1 +1 "
                color="blue-grey"
                class="ma-2 black--text"
              >No i dont concent</v-btn>

              <!-- Modal -->
              <div
                class="modal fade"
                id="exampleModalCenter"
                tabindex="-1"
                role="dialog"
                aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Please fill all</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <v-text-field :color="this.color" v-model="user.dd.a" placeholder="Name"></v-text-field>
                      <v-text-field :color="this.color" v-model="user.dd.b" placeholder="Date"></v-text-field>
                      <v-text-field :color="this.color" v-model="user.dd.c" placeholder="Telephone"></v-text-field>
                    </div>
                    <div class="modal-footer">
                      <v-btn
                        class="icon_button"
                        :disabled="!user.dd.c"
                        :color="this.color"
                        @click="e1 = e1+1"
                        data-dismiss="modal"
                      >Continue</v-btn>
                    </div>
                  </div>
                </div>
              </div>
            </v-col>
          </v-row>
        </v-card>
      </v-stepper-content>
      <v-stepper-content step="27">
        <v-card class="mb-12 stepper" height="auto">
          <h2>Concent form</h2>
          <hr />
          <v-row align="center" justify="center">
            <v-col cols="12" md="11">
              <v-card class="mx-auto">
                <h3>Credit Consent</h3>
                <p>I/we warrant and confirm that the information given in the mortgage application form is true and correct and I/we understand that it is being used to determine my/our credit responsibility and to evaluate and respond to my/our request for mortgage financing. You are authorized to obtain any information you may require for these purposes from other sources (including, for example, credit bureau) and each source is hereby authorized to provide you with such information. I/we also understand, acknowledge and agree that the information given in the mortgage application form as well as other information you obtain in relation to my credit history may be disclosed to potential mortgage lenders, mortgage insurers, other service providers, organizations providing technological or other support services required in relation to this application and any other parties with whom I/we propose to have a financial relationship.</p>
              </v-card>
            </v-col>
            <v-col cols="12" md="11">
              <v-card class="mx-auto">
                <h3>Employment Verification</h3>
                <p>
                  Verification Exchange, a service of Canada Workforce Solutions, streamlines the information between employers (data contributors) and verifiers (lenders, government agencies, background screeners, etc.) benefiting the employee- consumer by accelerating the decision process while adding security to the transaction and mitigating risk with real data, direct from the data contributor.
                  I/we warrant and confirm that the information given in the mortgage application form is true and correct and I/we understand that it is being used to determine my/our Employment Verification and to evaluate and respond to my/our request for mortgage financing. You are authorized to obtain any information you may require for these purposes from other sources (including, for example, Employment Verification) and each source is hereby authorized to provide you with such information. I/we also understand, acknowledge and agree that the information given in the mortgage application form as well as other information you obtain in relation to my employment verification may be disclosed to potential mortgage lenders, mortgage insurers, other service providers, organizations providing technological or other support services required in relation to this application and any other parties with whom I/we propose to have a financial relationship. I/we give consent for you to pull and confirm my/our employment using the Verification Exchange service.
                  I/we further acknowledge and agree that each potential mortgage lender, mortgage insurer or service provider to whom you provide the mortgage application and/or my/our personal information is permitted to receive such application and information and maintain records relating to me/us and my/our mortgage application and to hold, use, communicate and disclose personal information from me/us, including my/our Social Insurance Number (SIN) if I/we provide it, and collect information from me/us, you and from third persons, including credit bureau, credit reporting and collection agencies, financial institutions, my/our past and present employers, creditors and tenants, my/our spouse or any other person who has information about me/us for the purposes of recording, evaluating and responding to my/our application for mortgage financing or related activities and I/ we specifically consent to the release and disclosure of personal information by such persons to and among you and each potential mortgage lender, mortgage insurer or other service provider.
                </p>
              </v-card>
            </v-col>
            <v-col cols="12" md="11">
              <v-card class="mx-auto">
                <h3>Consent</h3>
                <p>
                  1. to collect, use, retain and disclose your personal information for seven (7) years following the later of a) the date of your latest application with us, or b) the date on which your loans or mortgages we have arranged for you have expired or been terminated; to inquire about and receive your personal information from: consumer reporting agencies, credit bureaus, real estate appraisers, your bank(s) or other financial institutions with whom you deal, your past mortgage brokers, your present and past employers and other third parties who may have information about your financial status; 2. That the approval or granting of any mortgage by a lender to you, as arranged by Citadel Mortgages is not to be construed or relied on by you as representing the value or condition of any underlying security or representing that you have the ability to repay the arranged mortgage debt;
                  28
                  3. I/we consent to receive commercial electronic messages and other forms of business information, communications and marketing regarding products and services that may be of interest to you; 4. That Citadel Mortgages and our mortgage broker or agent may receive fees or incentives from a lender for arranging a mortgage or loan for you. Fees and incentives include but are not limited to money, points or goods and services. Fees and incentives may vary between lenders for similar products and may also be dependent on the amounts and types of mortgage products originated. 5. That Citadel Mortgages and our agent have not provided you with any investment advice or services and has advised you of the need for independent financial and tax planning advice from a qualified professional. That we have offered you mortgage insurance product and an offer to have a licensed life insurance agent to contact you to review your options. 6. You Authorize Citadel Mortgages to share your information with our Home/Auto/Life Insurance firm to be able to offer you/ us competitive rates on all related products. 7. You authorize Citadel Mortgages to share your information with any referral source of business that you have requested during the mortgage process this applies to all referral sources that Citadel Mortgages offers.
                  A copy of our privacy policy and terms is available on our website: www.citadelmortgages.ca
                  CLIENT EXPRESS CONSENT & ACKNOWLEDGEMENT: I/We hereby acknowledge the information disclosed above and provide my express consent.
                </p>
              </v-card>
            </v-col>

            <v-col cols="12" md="12">
              <v-row>
                <v-col md="8">
                  <v-text-field v-model="user.ee.a" placeholder="Accplicants Name"></v-text-field>
                  <v-text-field v-model="user.eeb" placeholder="Signature"></v-text-field>
                </v-col>
                <v-col md="4">
                  <v-text-field v-model="user.ee.c" placeholder="Date"></v-text-field>
                </v-col>
              </v-row>
              <v-row>
                <v-col md="8">
                  <v-text-field v-model="user.ee.d" placeholder="Co-applicant Name"></v-text-field>
                  <v-text-field v-model="user.ee.e" placeholder="Signature"></v-text-field>
                </v-col>
                <v-col md="4">
                  <v-text-field v-model="user.ee.f" placeholder="Date"></v-text-field>
                </v-col>
              </v-row>Citadel Mortgages. Lic#12993 Head Office: 30 St Patrick Street 4th Floor, Toronto, Ontario M5T 3A3
            </v-col>
            <v-btn
              class="icon_button"
              :disabled="!user.bb"
              :color="this.color"
              @click="e1 = e1+1"
            >Continue</v-btn>

            <v-btn @click="e1 = e1 -1" text>Cancel</v-btn>
          </v-row>
        </v-card>
      </v-stepper-content>
      <v-stepper-content step="28">
        <v-card class="mb-12 stepper" height="auto">
          <h2>Concent form</h2>
          <hr />
          <v-row align="center" justify="center">
            <v-col cols="12" md="11">
              <v-card class="mx-auto">
                <img src="images/concent.jpg" alt />
                <img src="images/concent2.jpg" alt />
              </v-card>
            </v-col>

            <v-btn
              class="icon_button"
              :disabled="!user.bb"
              :color="this.color"
              @click="e1 = e1+1"
            >Continue</v-btn>

            <v-btn @click="e1 = e1 -1" text>Cancel</v-btn>
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
      steps: 25,
      color: localStorage.getItem("broker_button"),
      agent: {},
      user: {
        q1: {},
        q2: {},
        q3: {},
        q4: "",
        q6: "",
        q_e: [],
        n: {
          a: "1",
          b: "1",
          c: "1",
        },
        o: {},
        p: {},
        q: {},
        r: {},
        s: [],
        u: {},
        x: [],
        y: {
          a: {},
          b: {},
          c: {},
        },
        aa: [],
        bb: {
          a: {},
        },
        dd: {},
        ee: {},
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
    // this.getAgentData();
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
.btn-1 {
  height: 100px;
  width: 300px;
  line-height: 100px;
  margin: 10px;
  padding: 20px;
  border: 1px solid none;
}
.checkbox_text {
  position: absolute;
}
</style>
