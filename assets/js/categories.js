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

  getCategories();

function getCategories() {

  db.collection('categories').onSnapshot((snapshot) => {
    setupCategories(snapshot.docs);
  })

  const setupCategories = (data) => {
    const category = [];
    const categoryId = [];
    data.forEach(doc => {
      category.push(doc.data());
      categoryId.push(doc.id);
    });
    var tr;
    var toAppend = '';
    for (var i = 0; i < category.length; i++) {
        tr = $('<tr role="row"/>');
        tr.append("<td>" + category[i].name + "</td>");
        tr.append("<td><img src=" + category[i].image + " alt=" + category[i].name + " widht='100px' height='50px'></td>");
        tr.append("<td><button class='btn btn-warning btn-sm btn-pill' id=" + categoryId[i] + " onclick='editCat(this.id)'>Edit</button></td>");
        tr.append("<td><button class='btn btn-danger btn-sm btn-pill' id=" + categoryId[i] + " onclick='deletCat(this.id)'>Delete</button></td>");
        $('.categoriesTable tbody').append(tr);
    }
    if ( $.fn.dataTable.isDataTable( '#categoriesTable' ) ) {
        table = $('#categoriesTable').DataTable();
    }
    else {
        table = $('#categoriesTable').DataTable( {
            paging : true,
            info: true,
            lengthChange: true,
            bFilter: true,
            autoWidth: true
        } );
    }
  };
}

  function deletCat(clicked_id) {
    db.collection('categories').doc(clicked_id).get().then(snapshot => {
      dOutput(snapshot.data());
    $('#deleteCategoryId').val(snapshot.id);
  })
  }
  async function dOutput(showImage) {
    document.getElementById("imageid").src=showImage.image;
    $('#DeleteCat').modal('show');
  }
  function editCat(clicked_id) {
    db.collection('categories').doc(clicked_id).get().then(snapshot => {
      Output(snapshot.data());
      $('#editCaTestID').val(snapshot.id);
    })
  }
  async function Output(showImage) {
    document.getElementById("Eimageid").src=showImage.image;
    $('#editCaTest').val(showImage.name);
    $('#editCaImage').val(showImage.image);
    $('#UpdateCat').modal('show');
  }

const storageRef = firebase.storage().ref('categories');

const categoriesForm = document.querySelector('#categoriesForm');
categoriesForm.addEventListener('submit', (e) => {
  $('#loading-image').show();
  e.preventDefault();

  // get user info
  const name = categoriesForm['category-name'].value;
  const file = document.getElementById('file').files[0]
  const thisRef = storageRef.child(file.name)

  thisRef.put(file).then(res=>{
    storageRef.child(file.name).getDownloadURL().then(url=>{
      db.collection('categories').doc().set({
        name: name,
        image: url
      }).then(() => {
        $("#tbodyid").empty();
        categoriesForm.reset();
        getCategories();
        $('#loading-image').hide();
      }).catch(err => {
        categoriesForm.querySelector('.error').innerHTML = err.message;
      });
    })
  });
});
const EditCategoriesForm = document.querySelector('#EditCategoriesForm');
EditCategoriesForm.addEventListener('submit', (e) => {
  $('#loading-image').show();
    e.preventDefault();
    // get user info
    const editCaTestID = EditCategoriesForm['editCaTestID'].value;
    const editCaTest = EditCategoriesForm['editCaTest'].value;
    const editCaImage = EditCategoriesForm['editCaImage'].value;

        db.collection('categories').doc(editCaTestID).set({
          name: editCaTest,
          image: editCaImage
        }).then(() => {
        $("#tbodyid").empty();
        EditCategoriesForm.reset();
        $('#loading-image').hide();
        getCategories();
        $('#UpdateCat').modal('hide');
    }).catch(err => {
      EditCategoriesForm.querySelector('.error').innerHTML = err.message;
    });
});
const DeleteCategoriesForm = document.querySelector('#DeleteCategoriesForm');
DeleteCategoriesForm.addEventListener('submit', (e) => {
  $('#loading-image').show();
  e.preventDefault();
  const testid = DeleteCategoriesForm['deleteCategoryId'].value;
    db.collection('categories').doc(testid).delete().then(() => {
      $("#tbodyid").empty();
      $('#DeleteCat').modal('hide');
        $('#loading-image').hide();
        getCategories();
    }).catch(err => {
      DeleteCategoriesForm.querySelector('.error').innerHTML = err.message;
    });
});
