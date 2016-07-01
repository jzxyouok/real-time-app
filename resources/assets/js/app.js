var Vue = require('vue');
var VueRouter = require('vue-router');

Vue.use(VueRouter);

var App = Vue.extend({});

var router = new VueRouter();

router.map({
  '/': {
    component: require('./components/home.vue')
  },
  '/people/:personId': {
  	name: 'people.show',
    component: require('./components/people.vue')
  }
});

router.start(App, '#app');