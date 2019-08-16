<html>
    
    <head>
        
        <title>curd-vuejs2-firebase</title>
        <link rel="icon" href="vuejs_logo.png" type="image/gif" sizes="16x16">
        <link rel="stylesheet" type="text/css" href="css/styles.css">

        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/6.4.0/firebase-app.js"></script>

        <!-- TODO: Add SDKs for Firebase products that you want to use
             https://firebase.google.com/docs/web/setup#config-web-app -->
        <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>
 
    </head>

    <body>

        <div id="app">

            <div class="container">

                <p class="txtCenter">
                    <input type="text" placeholder="Username" v-model="newUser.username">
                    <input type="text" placeholder="Email" v-model="newUser.email">
                    <button class="add" @click="addnewUser()">Add</button>
                </p>

                <br>
                <hr>
                <br>

                <table>
                    <tr>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <tr v-for="user in users">
                        <td>
                            <input type="text" name="" v-if="selectedUser.key == user.key" v-model="selectedUser.val.username">
                            <p v-else>
                                {{ user.val.username }}
                            </p>
                        </td>
                        <td>
                            <input type="text" name="" v-if="selectedUser.key == user.key" v-model="selectedUser.val.email">
                            <p v-else>
                                {{ user.val.email }}
                            </p>
                        </td>
                        <td>
                            <button class="edit" @click="selectedUser = user" v-if="selectedUser.key != user.key">Edit</button>

                            <button class="edit" @click="updateUser(user.key)" v-else>Done</button>
                        </td>
                        <td><button class="delete" @click="deleteUser(user.key);">Delete</button></td>
                    </tr>
                </table>

            </div>

        </div>

        <script type="text/javascript" src="vuejs/vue.js"></script>
        <script type="text/javascript" src="vuejs/app.js"></script>
    </body>

</html>