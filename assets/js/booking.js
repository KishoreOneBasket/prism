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

    getBookings();

    function getBookings() {

    db.collection('bookings').onSnapshot(snapshot => {
        const booking = [];
        const bookingId = [];
      snapshot.docChanges().forEach((change) => {
          if (change.type === "added") {
              bookingId.push(change.doc.id);
              booking.push(change.doc.data());
          }
      });

          var tr;
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
            tr.append("<td><button class='btn btn-warning btn-sm btn-pill' id=" + bookingId[i] + " onclick='editBooking(this.id)'>Update</button></td>");
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
        // setupBookings(snapshot.docs);
    });
    const setupBookings = (data) => {
        const booking = [];
        const bookingId = [];
        data.forEach(doc => {
          bookingId.push(doc.id);
          booking.push(doc.data());
        });
        var tr;
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
            tr.append("<td><button class='btn btn-warning btn-sm btn-pill' id=" + bookingId[i] + " onclick='editBooking(this.id)'>Update</button></td>");
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
  }

  function editBooking(params) {
    // console.log(params);
    db.collection('bookings').doc(params).get().then(snapshot => {
        Output(params, snapshot.data());
    })
  }
  async function Output(params, showImage) {
    
    $('#PatientName').val(showImage.patient_details.name);
    $('#PatientBookingId').val(params);
    $('#PatientAge').val(showImage.patient_details.age);
    $('#PatientGender').val(showImage.patient_details.gender);
    $('#PatientAddtess').val(showImage.patient_details.address);
    $('#PaymentStatus').val(showImage.payment);
    $('#PaymentAmount').val(showImage.total_amount);
    document.getElementById("BookingStatus").value = showImage.status;
    // console.log(showImage.tests);

    var tr;
    $("#Ttbodyid").empty();
      for (var i = 0; i < showImage.tests.length; i++) {
          tr = $('<tr role="row"/>');
          tr.append("<td>" + showImage.tests[i].test_id + "</td>");
          tr.append("<td>" + showImage.tests[i].test_name + "</td>");
          tr.append("<td>" + showImage.tests[i].test_price + "</td>");
          var BookingId = params;
          var testNo = i;
          tr.append("<td><input type='button' value='Upload Report' class='uploadReport btn btn-info btn-sm btn-pill' data-tsetid='"+testNo+"' data-bookingid='"+BookingId+"' data-testid='"+showImage.tests[i].test_id+"' data-testname='"+showImage.tests[i].test_name+"' data-testprice='"+showImage.tests[i].test_price+"' /></td>");
          $('.ReportsAddTable tbody').append(tr);
      }
    $('#UpdateBooking').modal('show');
  }
  async function UploadReport(BookingId, TestId, TestName, testNo, testprice) {
    $('#TestNo').val(testNo);
    $('#TestId').val(TestId);
    $('#TestName').val(TestName);
    $('#testprice').val(testprice);
    $('#rBookingId').val(BookingId);
    $('#UpdateBooking').modal('hide');
    $('#UploadReportModel').modal('show');
  }

  $(document).on("click", "input.uploadReport" , function() {
    BookingId = $(this).data("bookingid");
    testNo = $(this).data("tsetid");
    TestId = $(this).data("testid");
    testname = $(this).data("testname");
    testprice = $(this).data("testprice");
    
    UploadReport(BookingId, TestId, testname, testNo, testprice)
  });

  const storageRef = firebase.storage().ref('reports');

  $("#efile").change(function(){
    const file = document.getElementById('efile').files[0]
    const thisRef = storageRef.child(file.name)
    
    thisRef.put(file).then(res=>{
      storageRef.child(file.name).getDownloadURL().then(url=>{
        $('#ReportUrl').val(url);
      })
    });
  });

  const updateBookingForm = document.querySelector('#updateBookingForm');
  updateBookingForm.addEventListener('submit', (e) => {
      e.preventDefault();
      $('#UpdateBooking').modal('hide');
      var BookingStatus1 = document.getElementById("BookingStatus");
      var BookingStatus = BookingStatus1.value;
      const PatientBookingId = updateBookingForm['PatientBookingId'].value;
      db.collection('bookings').doc(PatientBookingId).update({
        status: BookingStatus
      }).then(() => {
        getBookings();
      $("#tbodyid").empty();
        alert('Updated');
      }).catch(err => {
        console.log(err.message);
      });
  });

  const uploadReportForm = document.querySelector('#uploadReportForm');
  uploadReportForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const TestName = uploadReportForm['TestName'].value;
      const TestNo = uploadReportForm['TestNo'].value;
      const TestId = uploadReportForm['TestId'].value;
      const testprice = uploadReportForm['testprice'].value;
      const rBookingId = uploadReportForm['rBookingId'].value;
      const ReportUrl = uploadReportForm['ReportUrl'].value;
      var today = new Date();
      var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
      var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
      var dateTime = date+' '+time;
      const created_at = dateTime;

      // Add a new document with a generated id.
      db.collection("reports").add({
        booking_id: rBookingId,
        created_at: created_at,
        file_url: ReportUrl,
        test_id: TestId,
        test_name: TestName
      })
      .then((docRef) => {
        uploadReportForm.reset();
        $('#UploadReportModel').modal('hide');

        db.collection("bookings").doc(rBookingId).update({
          ['tests.'+TestNo+'.report_id'] : docRef.id,
          ['tests.'+TestNo+'.report_status'] : 'success',
          ['tests.'+TestNo+'.test_id'] : TestId,  
          ['tests.'+TestNo+'.test_name'] : TestName,
          ['tests.'+TestNo+'.test_price'] : testprice
        }).then(() => {
            console.log("Document successfully updated!");
        });
      
      })
      .catch((error) => {
        uploadReportForm.querySelector('.error').innerHTML = err.message;
      });
    });
