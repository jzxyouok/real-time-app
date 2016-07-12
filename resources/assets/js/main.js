var Vue = require('vue');

import Friends from './components/Friends.vue';
import Pusher from 'pusher-js';

Vue.use(require('Vue-resource'));

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrf_token');

new Vue({
	el: 'body',

	components: { Friends }, //<friends>

	ready() {
		this.pusher = new Pusher('7da587dde248e6fd1121');
		this.pusherChannel = this.pusher.subscribe('test-channel');
		this.pusherChannel.bind('App\\Events\\UserEvent', function(message){
			console.log(message);		
		});
	}
});


