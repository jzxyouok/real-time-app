<template>
	<div v-for="friend in list" class="col-md-3 col-md-offset-1">	
            <p v-show="friend.online_status === 0">(Offline)</p>
            <p v-show="friend.online_status === 1">(Online)</p>
            <button @click="subscribeToChannel" type="button" class="btn btn-danger btn-lg">{{ friend.name }}</button>
        </div>
</template>


<script>
export default  {
	data() {
		return {
			list: [],
			userName: ''
		};
	},

	created() {
		this.fetchFriends();
	},

	methods: {
		fetchFriends: function() {
			this.$http.get('api/friends').then((friends) => {
				this.$set('list', friends.json())
			}, (friends) => {
				//error callback
			});
		},
		subscribeToChannel: function() {
			this.pusher = new Pusher('7da587dde248e6fd1121');
			this.pusherChannel = this.pusher.subscribe('test_channel');
			console.log(userName);
		}
	}
}

</script>