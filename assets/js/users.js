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
  const db = firebase.firestore();

  // update firestore settings
  db.settings({ timestampsInSnapshots: true });

  db.collection('users').onSnapshot(snapshot => {
    setupUsers(snapshot.docs);
  });
  const setupUsers = (data) => {
    const Users = [];
    data.forEach(doc => {
      Users.push(doc.data());
    });
    var tr;
    var toAppend = '';
    
    for (var i = 0; i < Users.length; i++) {
        tr = $('<tr role="row"/>');
        tr.append("<td>" + Users[i].name + "</td>");
        tr.append("<td>" + Users[i].mobile + "</td>");
        tr.append("<td>" + Users[i].device + "</td>");
        $('.usersTable tbody').append(tr);
    }
    if ( $.fn.dataTable.isDataTable( '#usersTable' ) ) {
        table = $('#usersTable').DataTable();
    }
    else {
        table = $('#usersTable').DataTable( {
            paging : true,
            info: true,
            lengthChange: true,
            bFilter: true,
            autoWidth: true
        } );
    }
  };