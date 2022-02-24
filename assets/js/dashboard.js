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
    const auth = firebase.auth();
    const db = firebase.firestore();

    // update firestore settings
    db.settings({ timestampsInSnapshots: true });

    db.collection('users').onSnapshot(snapshot => {
        var totalUsersNo = snapshot.size;
        $("#totalUsersNo").html(totalUsersNo);
    });

    db.collection('reports').onSnapshot(snapshot => {
        var totalReportsNo = snapshot.size;
        $("#totalReportsNo").html(totalReportsNo);
    });

    db.collection('bookings').orderBy('patient_details.name').onSnapshot(snapshot => {
        setupUsers(snapshot.docs);
        var totalBookinsNo = snapshot.size;
        $("#totalBookinsNo").html(totalBookinsNo);
    });
    const setupUsers = (data) => {
        const booking = [];
        data.forEach(doc => {
            booking.push(doc.data());
        });
        var tr;
        var toAppend = '';
        for (var i = 0; i < booking.length; i++) {
            tr = $('<tr role="row"/>');
            tr.append("<td>" + booking[i].patient_details.name + "</td>");
            tr.append("<td>" + booking[i].payment + "</td>");
            tr.append("<td>" + booking[i].total_amount + "</td>");
            var status = booking[i].status;
            
            if (status == 'In Process') {
                tr.append("<td><span class='badge badge-warning'>" + status + "</span></td>");
            } else if (status == 'Confirmed')
            {
                tr.append("<td><span class='badge badge-success'>" + status + "</span></td>");
            } else if (status == 'Sample Taken')
            {
                tr.append("<td><span class='badge badge-primary'>" + status + "</span></td>");
            } else if (status == 'Delivered')
            {
                tr.append("<td><span class='badge badge-info'>" + status + "</span></td>");
            } else if (status == 'Cancelled')
            {
                tr.append("<td><span class='badge badge-danger'>" + status + "</span></td>");
            }
            var datemade = booking[i].created_at;
            let result = datemade.replace("T", ", ");
            
            tr.append("<td>" + result + "</td>");
            $('.driversTable tbody').append(tr);
        }
        if ( $.fn.dataTable.isDataTable( '#driversTable' ) ) {
            table = $('#driversTable').DataTable();
        }
        else {
            table = $('#driversTable').DataTable( {
                paging : true,
                info: true,
                lengthChange: true,
                bFilter: true,
                autoWidth: true
            } );
        }
    };