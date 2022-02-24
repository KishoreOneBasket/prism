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

  db.collection('failed_payments').onSnapshot(snapshot => {
    setupfPayment(snapshot.docs);
  });
  const setupfPayment = (data) => {
    const fPayment = [];
    console.log(fPayment);
    data.forEach(doc => {
      fPayment.push(doc.data());
    });
    var tr;
    var toAppend = '';
    
    for (var i = 0; i < fPayment.length; i++) {
        tr = $('<tr role="row"/>');
        tr.append("<td>" + fPayment[i].payment_id + "</td>");
        tr.append("<td>" + fPayment[i].user_id + "</td>");
        tr.append("<td>" + fPayment[i].total_amount + "</td>");
        tr.append("<td>" + fPayment[i].status + "</td>");
        tr.append("<td>" + fPayment[i].created_at + "</td>");
        $('.fPaymentTable tbody').append(tr);
    }
    if ( $.fn.dataTable.isDataTable( '#fPaymentTable' ) ) {
        table = $('#fPaymentTable').DataTable();
    }
    else {
        table = $('#fPaymentTable').DataTable( {
            paging : true,
            info: true,
            lengthChange: true,
            bFilter: true,
            autoWidth: true
        } );
    }
  };