/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('equipment-component', require('./components/EquipmentComponent.vue').default);
// Vue.component('formmesh', require('./components/FormMeshComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data:{
    	firmwares:[],
    	loading:false,
    	error: false,
    	query: ''
    },
    methods:{
    	search: function(){
    		//limpa a mensagem de erro 
    		this.error = '';
    		this.firmwares = [];
    		this.loading = [];
    		axios.get('/buscar/?q='+this.query).
    			then((response)=>{
    				//response.data.error ? this.error = response.data.error;
    				this.firmwares = response.data;
            	// The request is finished, change the loading to false again.
            	this.loading = false;
            	this.query = "";
    		});
    	},
    }
});
