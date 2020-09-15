require("./bootstrap");

window.Vue = require("vue");

//Import Vue Filter
require("./filter");

//Import progressbar
require("./progressbar");

//Setup custom events
require("./customEvents");

require("./custom");

import vuetify from "./vuetify";

import VTooltip from "v-tooltip";

Vue.use(VTooltip);
Vue.config.productionTip = false;

//Import View Router
import VueRouter from "vue-router";
Vue.use(VueRouter);

//Import Sweetalert2
import swal from "sweetalert2";
window.swal = swal;

const Toast = swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: toast => {
        toast.addEventListener("mouseenter", swal.stopTimer);
        toast.addEventListener("mouseleave", swal.resumeTimer);
    }
});
window.Toast = Toast;

//Import v-from
import {
    Form,
    HasError,
    AlertError
} from "vform";
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

//Routes
import {
    routes
} from "./routes";

//Register Routes
const router = new VueRouter({
    routes,
    mode: "hash"
});

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component("question", require("./components/Question.vue").default);
Vue.component("wave_one", require("./components/WaveOne.vue").default);
Vue.component("vue-stepper", require("./components/VueStepper.vue").default);

Vue.component(
    "passport-clients",
    require("./components/passport/Clients.vue").default
);

Vue.component(
    "passport-authorized-clients",
    require("./components/passport/AuthorizedClients.vue").default
);

Vue.component(
    "passport-personal-access-tokens",
    require("./components/passport/PersonalAccessTokens.vue").default
);

const app = new Vue({
    el: "#app",
    router,
    vuetify
});
