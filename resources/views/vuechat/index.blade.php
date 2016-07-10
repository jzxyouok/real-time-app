<!DOCTYPE html>
<html>
<head>
    <title>Real-Time Laravel with Pusher</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,200italic,300italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://d3dhju7igb20wy.cloudfront.net/assets/0-4-0/all-the-things.css" />
    <meta id="csrf_token" name="csrf_token" content="{{ csrf_token() }}">
    
    <style>
         /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #f5f5f5;
      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }

      ul {
        list-style: none
      }
    </style>

</head>
<body>
<div id="wrap">
    <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="" width=41 height=30></a>
                </div>
                
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"> <a href=""><span class="glyphicon glyphicon-home"
                         aria-hidden="true"></span> Home</a></li>
                        <li><a href="{{ route('vuechat.about') }}"><span class="glyphicon glyphicon-info-sign"
                         aria-hidden="true"></span> About</a></li>
                        <li><a href="{{ route('vuechat.contact') }}"><i class="fa fa-envelope-o"></i> Contact</a></li>
                    </ul>         
                </div>
            </div>

        </nav>

    <div>
        <h1>Logged in as: {{ $user->name }}</h1>
    </div>
    
    <h1 class="text-center">Real time chat app using vue and pusher</h1>
    
    <div class="row">
        <friends></friends>
    </div>
    
    <!-- <template id="userToggle">
        <div v-for="friend in list" class="col-md-3 col-md-offset-1">
            <p v-show="friend.online_status === 0">(Offline)</p>
            <p v-show="friend.online_status === 1">(Online)</p>

            <button type="button" class="btn btn-danger btn-lg">@{{ friend.name }}</button>
        </div>
    </template> -->
    

    <!-- <div class="row">       
        <div class="col-md-6 panel panel-success nopadding ">
            <div class="panel-heading">
                <h4 class="titletextgreen">Online Users</h4>  
            </div>
            <div class="panel-body"> -->
                <!--User Media Goes Here
                <!-- <div v-for="user in users" class="media" v-show="user.status === 'Online' ">
                    <status :user="user"></status>
                </div>
            </div>
        </div>

        <template id="logged-in-status">     
            <a class="pull-left" href="">
                <img class="media-object" alt="" src="/images/profile.png">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><a @click="setChatBox">@{{ user.name }}</a></h4>
            </div>
        </template>

        <div class="col-md-6 panel panel-danger nopadding ">
            <div class="panel-heading">
                <h4 class="titletextgreen">Offline Users</h4>  
            </div>
            <div class="panel-body">
                <div v-for="user in users" class="media" v-show="user.status === 'Offline' ">
                    <status :user="user"></status>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4" v-for="user in users">
        <chatbox :user="user" v-show="user.status === 'Online' "></chatbox>
    </div>
</div>

<template id="chatbox">
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Chat - @{{ user.name }} - @{{ user.status }}
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li><a href=""><span class="glyphicon glyphicon-refresh">
                            </span>Refresh</a></li>
                            <li><a href=""><span class="glyphicon glyphicon-ok-sign">
                            </span>Available</a></li>
                            <li><a href=""><span class="glyphicon glyphicon-remove">
                            </span>Busy</a></li>
                            <li><a href=""><span class="glyphicon glyphicon-time"></span>
                                Away</a></li>
                            <li class="divider"></li>
                            <li><a href=""><span class="glyphicon glyphicon-off"></span>
                                Sign Out</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="chat">
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li> 
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</template> -->

   <!--  <div id="footer" class="row" style="margin-top:150px">
      <div class="container">
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
    </div>
</div> -->

    
    <script src="js/main.js"></script>
    <script>
        // new Vue({
        //     el: 'body',

        //     data: {
        //         users: [
        //             { name: 'User 1', status: 'Offline'},
        //             { name: 'User 2', status: 'Offline'},
        //             { name: 'User 3', status: 'Offline'}
        //         ]
        //     },

        //     components: {
        //         user: {
        //             template: '#user-toggle-template',

        //             props: ['user'],

        //             methods: {
        //                 setStatus: function () {
        //                     if(this.user.status == 'Online') {
        //                         this.user.status = 'Offline';
        //                     }
                            
        //                     else if(this.user.status == 'Offline'){
        //                         this.user.status = 'Online';   
        //                     }
        //                 }
        //             }
        //         },

        //         status: {
        //             template: '#logged-in-status',

        //             props: ['user'],

        //             methods: {
        //                 setChatBox: function() {
        //                     alert(this.user.name + ' is currently ' + this.user.status);
        //                 }
        //             }
        //         },

        //         chatbox: {
        //             template: '#chatbox',

        //             props: ['user']
        //         }
        //     }
        // });
    </script>
</body>
</html>
