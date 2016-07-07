var Vue = require('vue');

import Friends from './components/Friends.vue';

Vue.use(require('Vue-resource'));

new Vue({
	el: 'body',

	components: { Friends }, //<friends>

	ready() {
		alert('ready to go');
	}
});


