<template>
	<div v-for="friend in list" class="col-md-3 col-md-offset-1">
            <p v-show="friend.online_status === 0">(Offline)</p>
            <p v-show="friend.online_status === 1">(Online)</p>

            <button type="button" class="btn btn-danger btn-lg">{{ friend.name }}</button>
        </div>
</template>


<script>
export default  {
	data() {
		return {
			list: []
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
		}
	}
}

</script>