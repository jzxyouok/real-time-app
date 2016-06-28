<!DOCTYPE html>
<html>
<head>
    <title>Real-Time Laravel with Pusher</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,200italic,300italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://d3dhju7igb20wy.cloudfront.net/assets/0-4-0/all-the-things.css" />
    
</head>
<body>
    <h1>Real time chat app using vue and pusher</h1>
    <div id="userToggle" class="row">
        <div v-for="user in users" class="col-md-4">
            <user :user="user"><user>
        </div>

        <template id="user-toggle-template">
            <p>@{{ user.status }}</p>
            <button @click="setStatus" type="button" class="btn btn-danger btn-lg">@{{ user.name }}</button>
        </template>
    </div>

    <div class="row">       
        <div class="col-md-6 panel panel-success nopadding ">
            <div class="panel-heading">
                <h4 class="titletextgreen">Online Users</h4>  
            </div>
            <div class="panel-body">
              <!--User Media Goes Here -->
            </div>
        </div>
        <div class="col-md-6 panel panel-danger nopadding ">
            <div class="panel-heading">
                <h4 class="titletextgreen">Offline Users</h4>  
            </div>
            <div class="panel-body">
                <div class="media">
                    <a class="pull-left" href="">
                        <img class="media-object" alt="" src="/images/profile.png">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="">User 1</a></h4>
                    </div>
                </div>
                <div class="media">
                    <a class="pull-left" href="">
                        <img class="media-object" alt="" src="/images/profile.png">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="">User 2</a></h4>
                    </div>
                </div>
                <div class="media">
                    <a class="pull-left" href="">
                        <img class="media-object" alt="" src="/images/profile.png">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="">User 3</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <p><a href="">User 1 <i class="fa fa-caret-up" aria-hidden="true"></i></a></p>
        </div>
        <div class="col-md-4">
            <p><a href="">User 2 <i class="fa fa-caret-up" aria-hidden="true"></i></a></p>            
        </div>
        <div class="col-md-4">
            <p><a href="">User 1 <i class="fa fa-caret-up" aria-hidden="true"></i></a></p>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.21/vue.js"></script>

    <script>
        new Vue({
            el: '#userToggle',

            data: {
                users: [
                    { name: 'User 1', status: 'Offline'},
                    { name: 'User 2', status: 'Offline'},
                    { name: 'User 3', status: 'Offline'}
                ]
            },

            components: {
                user: {
                    template: '#user-toggle-template',

                    props: ['user'],

                    methods: {
                        setStatus: function () {
                            if(this.user.status === 'Online') {
                                this.user.status ==='Offline'
                            }

                            if(this.user.status === 'Offline'){
                                this.user.status = 'Online'    
                            }
                        }
                    }
                }
            }

        });
    </script>

 <!-- CHAT BOX -->
    <!-- <div class="row">
         <div class="chat-panel panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-comments fa-fw"></i>
                Chat
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu slidedown">
                        <li>
                            <a href="#">
                                <i class="fa fa-refresh fa-fw"></i> Refresh
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-check-circle fa-fw"></i> Available
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-times fa-fw"></i> Busy
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-clock-o fa-fw"></i> Away
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <i class="fa fa-sign-out fa-fw"></i> Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
    </div> -->


</body>
</html>
