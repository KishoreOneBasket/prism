importScripts('https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js');
// Initialize Firebase
var config = {
    apiKey: "AIzaSyBI-0T-lqtnJ1iJBnMeM_9o8BA-1MU7he8",
    authDomain: "prism-lab.firebaseapp.com",
    databaseURL: "https://prism-lab-default-rtdb.firebaseio.com",
    projectId: "prism-lab",
    storageBucket: "prism-lab.appspot.com",
    messagingSenderId: "622079015981",
    appId: "1:622079015981:web:6fb4f21bb6e2b311e1cca4",
    measurementId: "G-FGDYSDH8WD"
};
firebase.initializeApp(config);

// make auth and firestore references
const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification=JSON.parse(payload);
    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(payload.notification.title,notificationOption);
});