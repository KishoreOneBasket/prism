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

  db.collection('reports').onSnapshot(snapshot => {
    setupReports(snapshot.docs);
  });
  const setupReports = (data) => {
    const report = [];
    data.forEach(doc => {
      report.push(doc.data());
    });
    var tr;
    var toAppend = '';
    
    for (var i = 0; i < report.length; i++) {
        tr = $('<tr role="row"/>');
        tr.append("<td>" + report[i].booking_id + "</td>");
        tr.append("<td>" + report[i].test_id + "</td>");
        tr.append("<td>" + report[i].test_name + "</td>");
        tr.append("<td><a href=" + report[i].file_url + " target='_blank'>Show Report</a></td>");
        tr.append("<td>" + report[i].created_at + "</td>");
        $('.reportsTable tbody').append(tr);
    }
    if ( $.fn.dataTable.isDataTable( '#reportsTable' ) ) {
        table = $('#reportsTable').DataTable();
    }
    else {
        table = $('#reportsTable').DataTable( {
            paging : true,
            info: true,
            lengthChange: true,
            bFilter: true,
            autoWidth: true
        } );
    }
  };