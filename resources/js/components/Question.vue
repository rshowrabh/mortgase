<template>
  <div style="width:90%">
    <v-stepper v-model="e1">
      <v-stepper-header>
        <template v-for="n in steps">
          <v-stepper-step
            :color="agent.color_system"
            :key="`${n}-step`"
            :complete="e1 > n"
            :step="n"
            editable
          >Step {{ n }}</v-stepper-step>

          <v-divider v-if="n !== steps" :key="n"></v-divider>
        </template>
      </v-stepper-header>

      <v-stepper-items class="pb-5">
        <v-stepper-content :step="1">
          <v-card class="mb-12 mt-5 border" color="lighten-1" height="auto">
            <v-row align="center" justify="center">
              <v-col cols="12" md="5">
                <v-form ref="form">
                  <v-textarea solo name="input-7-4" label="Tell Us About Your Self"></v-textarea>
                </v-form>
              </v-col>
              <v-col cols="12" md="7">
                <v-form ref="form">
                  <v-img src="/dist/img/photo2.png" aspect-ratio="1.7" contain></v-img>
                </v-form>
              </v-col>
            </v-row>
          </v-card>
        </v-stepper-content>

        <v-action class="pb-12 ml-5">
          <v-btn class="white--text" :color="agent.color_system" @click="nextStep(n)">Continue</v-btn>

          <v-btn text>Cancel</v-btn>
        </v-action>
      </v-stepper-items>
    </v-stepper>
  </div>
</template>


<script>
export default {
  data() {
    return {
      agent: {},
      form: "",
      e1: 1,
      steps: 5,
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
    nextStep(n) {
      if (n === this.steps) {
        this.e1 = 1;
      } else {
        this.e1 = n + 1;
      }
    },
    getAgentData() {
      axios.get("api/get_agent_data").then((response) => {
        this.agent = response.data.data;
      });
    },
  },
  created() {
    this.getAgentData();
  },
};
</script>