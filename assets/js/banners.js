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

  getBanners();

  function getBanners() {
    
    db.collection('banners').onSnapshot(snapshot => {
      setupbannerss(snapshot.docs);
    });
  
    const setupbannerss = (data) => {
      const banners = [];
      const bannersId = [];
      data.forEach(doc => {
        banners.push(doc.data());
        bannersId.push(doc.id);
      });
      var tr;
      var toAppend = '';
      
      for (var i = 0; i < banners.length; i++) {
          tr = $('<tr role="row"/>');
          tr.append("<td><img src=" + banners[i].image + " alt='banner' widht='100px' height='50px'></td>");
          if (banners[i].active == 'true') {
            var BannerStatus = 'Show';
          } else {
            var BannerStatus = 'Hide';
          }
          tr.append("<td>" + BannerStatus + "</td>");
          tr.append("<td><button class='btn btn-warning btn-sm btn-pill' id=" + bannersId[i] + " onclick='editBan(this.id);'>Edit</button></td>");
          tr.append("<td><button class='btn btn-danger btn-sm btn-pill btn-delete' id=" + bannersId[i] + " onclick='deletBan(this.id);'>Delete</button></td>");
          $('.bannersTable tbody').append(tr);
      }
      if ( $.fn.dataTable.isDataTable( '#bannersTable' ) ) {
          table = $('#bannersTable').DataTable();
      }
      else {
          table = $('#bannersTable').DataTable( {
              paging : true,
              info: true,
              lengthChange: true,
              bFilter: true,
              autoWidth: true
          } );
      }
    };
  }

  function editBan(clicked_id) {
    $('#Etestid').val(clicked_id);
      db.collection('banners').doc(clicked_id).get().then(snapshot => {
          Output(snapshot.data());
      })
    }
    async function Output(showImage) {
      document.getElementById("Eimageid").src=showImage.image;
      $('#Etestimage').val(showImage.image);
      $('#UpdateBannerModel').modal('show');
    }

    function deletBan(clicked_id) {
      db.collection('banners').doc(clicked_id).get().then(snapshot => {
        DOutput(snapshot.data());
      })
      $('#testid').val(clicked_id);
    }
    async function DOutput(showImage) {
      document.getElementById("imageid").src=showImage.image;
      $('#DeleteBanner').modal('show');
    }

  const storageRef = firebase.storage().ref('banners');

  const bannerForm = document.querySelector('#bannerForm');
  bannerForm.addEventListener('submit', (e) => {
      e.preventDefault();

    // get user info
    const status = bannerForm['banner-status'].value;
    const file = document.getElementById('file').files[0]
    const thisRef = storageRef.child(file.name)

    thisRef.put(file).then(res=>{
      storageRef.child(file.name).getDownloadURL().then(url=>{
        db.collection('banners').add({
          active: status,
          image: url
        });
      })
    }).then(() => {
      $("#tbodyid").empty();
      bannerForm.reset();
      bannerForm.querySelector('.error').innerHTML = ''
    }).catch(err => {
      bannerForm.querySelector('.error').innerHTML = err.message;
    });
  });

  const editBannerForm = document.querySelector('#editBannerForm');
  editBannerForm.addEventListener('submit', (e) => {
      e.preventDefault();

    // get user info
    const testid = editBannerForm['Etestid'].value;
    const testimage = editBannerForm['Etestimage'].value;
    const status = editBannerForm['banner-status'].value;

        db.collection('banners').doc(testid).set({
          active: status,
          image: testimage
        }).then(() => {
      editBannerForm.reset();
      $("#tbodyid").empty();
      $('#UpdateBannerModel').modal('hide');
      getBanners();
    });
  });

  const DeleteBannerForm = document.querySelector('#DeleteBannerForm');
  DeleteBannerForm.addEventListener('submit', (e) => {
      e.preventDefault();

    // get user info
    const testid = DeleteBannerForm['testid'].value;
        db.collection('banners').doc(testid).delete().then(() => {
          $("#tbodyid").empty();
          $('#DeleteBanner').modal('hide');
          getBanners();
        });
  });