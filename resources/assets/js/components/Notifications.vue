<template>
    <table id="mytable" class="table table-bordred table-striped">

        <thead>
        <th>Time</th>
        <th>Product Name</th>
        <th>User Name</th>
        <th>Number</th>
        <th>Action</th>
        </thead>

    <tbody>
    <tr v-for="unreads in unreadNotifications">
        <td>{{unreads.data.created_at.date}}</td>
        <td>{{unreads.data.product.name}}</td>
        <td>{{unreads.data.user.name}}</td>
        <td>{{unreads.data.room.number}}</td>
        <td><button type="submit" class="btn btn-danger"  @click="markNotificationAsRead">Read</button></td>
    </tr>
    </tbody>
    </table>
</template>

<script>
    export default {
        props:['unreads','userid'],
        data(){
            return{
                unreadNotifications:this.unreads
            }
        },
        methods:{
            markNotificationAsRead(){
                axios.get('/markAsRead');
            }
        },
        mounted() {
            console.log('Component mounted.');
            Echo.private('App.User.' + this.userid)
                .notification((notification) => {
                    console.log(notification.created_at);
                    let newUnreadNotifications = {data:{product:notification.product,user:notification.user,room:notification.room,created_at:notification.created_at}};
                    this.unreadNotifications.push(newUnreadNotifications);
                });
        }
    }
</script>
