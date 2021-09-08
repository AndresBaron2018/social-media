

require('./bootstrap');

window.Vue = require('vue');

Vue.component("v-select", vSelect);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import Vue from "vue";
import vSelect from "vue-select";

import Admin from './components/admin/roles/Index.vue'
import Seller from './components/seller/Index.vue'
import api from './components/client/api/Index.vue'

// User
import PersonalInformation from './components/user/components/forms/PersonalInformation.vue'

new Vue({
	el: '#app',

	components: {
		Admin,
        Seller,
        api,
        PersonalInformation
	}
})
