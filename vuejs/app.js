// This is accessable from local
var app = new Vue({

    el: "#app",
    data: {
        newUser: { username: "", email: ""},
        dbRef: null,
        users: [],
        selectedUser: {}

    },
    methods: {
        addnewUser: function(){
            // console.log(app.newUser);
            app.dbRef.push(this.newUser);
            this.newUser = { username: "", email: ""};
        },
        deleteUser: function(key){
            console.log(key);
            this.dbRef.child(key).remove();
        },
        updateUser: function(){
            // console.log(this.selectedUser.val);
            this.dbRef.child(this.selectedUser.key).update(this.selectedUser.val);
            this.selectedUser = {};
        }
    },
    mounted: function(){
        // console.log("mounted")

        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyCSeC46t2IOVDIqhDQ48bA5WfykV-FdvYI",
            authDomain: "vue-firebase-crud-app.firebaseapp.com",
            databaseURL: "https://vue-firebase-crud-app.firebaseio.com",
            projectId: "vue-firebase-crud-app",
            storageBucket: "",
            messagingSenderId: "1098996033141",
            appId: "1:1098996033141:web:86a5f90dd204cb04"
        };
        // Initialize Firebase
        var firebaseApp = firebase.initializeApp(firebaseConfig);
        this.dbRef = firebaseApp.database().ref('users');

        var currentInstance = this;

        this.dbRef.on("value", function(snapshot){
            currentInstance.users = [];
            snapshot.forEach(function(childSnapshot){
                // console.log(childSnapshot.val());
                currentInstance.users.push({key: childSnapshot.key, val: childSnapshot.val()});
            });
        });
    }
});