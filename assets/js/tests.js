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
  
    getTests();
  
  function getTests() {
  
    db.collection('tests').onSnapshot((snapshot) => {
      setupTests(snapshot.docs);
    })
  
    const setupTests = (data) => {
      const test = [];
      const testId = [];
      data.forEach(doc => {
        test.push(doc.data());
        testId.push(doc.id);
      });
      var tr;
      for (var i = 0; i < test.length; i++) {
          tr = $('<tr role="row"/>');
          tr.append("<td>" + test[i].name + "</td>");
          tr.append("<td>" + test[i].active + "</td>");
          tr.append("<td>" + test[i].cat_name + "</td>");
          tr.append("<td>" + test[i].delivery_time + "</td>");
          tr.append("<td>" + test[i].pre_test_info + "</td>");
          tr.append("<td>" + test[i].price + "</td>");
          tr.append("<td>" + test[i].sample_type + "</td>");
          tr.append("<td><img src=" + test[i].image + " alt=" + test[i].name + " widht='100px' height='50px'></td>");
          tr.append("<td><button class='btn btn-warning btn-sm btn-pill' id=" + testId[i] + " onclick='editTest(this.id);'>Edit</button></td>");
          tr.append("<td><button class='btn btn-danger btn-sm btn-pill' id=" + testId[i] + " onclick='deletTest(this.id);'>Delete</button></td>");
          $('.testsTable tbody').append(tr);
      }
      if ( $.fn.dataTable.isDataTable( '#testsTable' ) ) {
        table = $('#testsTable').DataTable();
      }
      else {
          table = $('#testsTable').DataTable( {
              paging : true,
              pageLength: 5,
              info: true,
              lengthChange: true,
              bFilter: true,
              autoWidth: true
          } );
      }
    };
  }
  function editTest(clicked_id) {
    $('#etestid').val(clicked_id);
    db.collection('tests').doc(clicked_id).get().then(snapshot => {
      EOutput(snapshot.data());
    })
  }
  async function EOutput(showImage) {
    console.log(showImage);
    document.getElementById("eimageid").src=showImage.image;
    $('#etestImage').val(showImage.image);
    $('#etestName').val(showImage.name);
    $('#etestInfo').val(showImage.pre_test_info);
    document.getElementById("etestCategory").value = showImage.cat_name;
    document.getElementById("etestStatus").value = showImage.active;
    $('#etestDelivery').val(showImage.delivery_time);
    $('#etestSample').val(showImage.sample_type);
    $('#etestPrice').val(showImage.price);
    $('#etestDesc').val(showImage.description);

    $('#editTest').modal('show');
  }
  function deletTest(clicked_id) {
    $('#testid').val(clicked_id);
    db.collection('tests').doc(clicked_id).get().then(snapshot => {
      DOutput(snapshot.data());
    })
  }
  async function DOutput(showImage) {
    document.getElementById("imageid").src=showImage.image;
    $('#DeleteTest').modal('show');
  }

  const DeleteTestForm = document.querySelector('#DeleteTestForm');
  DeleteTestForm.addEventListener('submit', (e) => {
      e.preventDefault();

    // get user info
    const testid = DeleteTestForm['testid'].value;
        db.collection('tests').doc(testid).delete().then(() => {
          $("#tbodyid").empty();
          $('#DeleteTest').modal('hide');
          getTests();
        });
  });

  // make auth and firestore references
const dCategoryList = document.querySelector('.dCategory'); 
const guideList = document.querySelector('.guides'); 

db.collection('categories').onSnapshot(snapshot => {
    setupGuides(snapshot.docs);
});
const setupGuides = (data) => {
    if (data.length) {
      let html = '';
      data.forEach(doc => {
        const guide = doc.data();
        const option = `
            <option value="${guide.name}">${guide.name}</option>
        `;
        html += option;
      });
      dCategoryList.innerHTML = html
      guideList.innerHTML = html
    } else {
      dCategoryList.innerHTML = '<option value="">No Categories</option>';
      guideList.innerHTML = '<option value="">No Categories</option>';
    }
  };

  const storageRef = firebase.storage().ref('tests');

const addTestForm = document.querySelector('#addTestForm');
addTestForm.addEventListener('submit', (e) => {
    e.preventDefault();

  // get user info
  const testName = addTestForm['testName'].value;
  const testInfo = addTestForm['testInfo'].value;
  const testCategory = addTestForm['testCategory'].value;
  const testStatus = addTestForm['testStatus'].value;
  const testDelivery = addTestForm['testDelivery'].value;
  const testSample = addTestForm['testSample'].value;
  const testPrice = addTestForm['testPrice'].value;
  const testDesc = addTestForm['testDesc'].value;
  const file = document.getElementById('file').files[0]
  const thisRef = storageRef.child(file.name)

  thisRef.put(file).then(res=>{
    storageRef.child(file.name).getDownloadURL().then(url=>{
      db.collection('tests').doc().set({
        active: testStatus,
        cat_name: testCategory,
        delivery_time: testDelivery,
        description: testDesc,
        image: url,
        name: testName,
        pre_test_info: testInfo,
        price: testPrice,
        sample_type: testSample
      });
    })
  }).then(() => {
    addTestForm.reset();
    addTestForm.querySelector('.error').innerHTML = ''
  }).catch(err => {
    addTestForm.querySelector('.error').innerHTML = err.message;
  });
});
$("#efile").change(function(){
  const file = document.getElementById('efile').files[0]
  const thisRef = storageRef.child(file.name)
  
  thisRef.put(file).then(res=>{
    storageRef.child(file.name).getDownloadURL().then(url=>{
      document.getElementById("eimageid").src=url;
      $('#etestImage').val(url);
    })
  });
});


const dbFirestore = firebase.firestore();
const EditTestForm = document.querySelector('#EditTestForm');
const test = EditTestForm.addEventListener('submit', (err) => {
    err.preventDefault();
  // get user info
  const etestName = EditTestForm['etestName'].value;
  const etestInfo = EditTestForm['etestInfo'].value;
  const etestCategory = EditTestForm['etestCategory'].value;
  const etestStatus = EditTestForm['etestStatus'].value;
  const etestDelivery = EditTestForm['etestDelivery'].value;
  const etestSample = EditTestForm['etestSample'].value;
  const etestPrice = EditTestForm['etestPrice'].value;
  const etestDesc = EditTestForm['etestDesc'].value;
  const etestImage = EditTestForm['etestImage'].value;
  const etestid = EditTestForm['etestid'].value;
  console.log(etestImage);
  dbFirestore.collection('tests').doc(etestid).set({
    active: etestStatus,
    cat_name: etestCategory,
    delivery_time: etestDelivery,
    description: etestDesc,
    image: etestImage,
    name: etestName,
    pre_test_info: etestInfo,
    price: etestPrice,
    sample_type: etestSample
  }).then(() => {
    EditTestForm.reset();
    $("#tbodyid").empty();
    $('#editTest').modal('hide');
    getTests();
  });
});
