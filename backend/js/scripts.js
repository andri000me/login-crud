$(function () {
  $(".textarea").summernote();
  // const api_url_morillo_news = "http://morillo.co.id/4dMinMrl/api/news/list.php";
  const queryString=window.location.search;
  const urlParams=new URLSearchParams(queryString);
  const id_projects = urlParams.get("id");
  const id_site_survey = urlParams.get("id");
  const msg = urlParams.get("msg");

  if (msg=='import-success') {
    toastr.success('excel file uploaded successfully');
    // Toast.fire({
    //   icon: 'success',
    //   title: 'excel file uploaded successfully'
    // })
  }

  // console.log(api_url_morillo_news);
  $("#news").dataTable({
    bProcessing: true,
    bServerSide: true,
    //disable order dan searching pada tombol aksi
    columnDefs: [
      {
        targets: [0, 3],
        orderable: false,
        searchable: false,
      },
    ],
    ajax: {
      url: "../pages/news/data.php",
      type: "post", // method  , by default get
      //bisa kirim data ke server
      /*data: function ( d ) {
                  d.jurusan = "3223";
              },*/
      error: function (xhr, error, thrown) {
        console.log(xhr);
      },
    },
  });

  $("#job-status").dataTable({
    bProcessing: true,
    bServerSide: true,
    //disable order dan searching pada tombol aksi
    columnDefs: [
      {
        targets: [0, 2],
        orderable: false,
        searchable: false,
      },
    ],
    ajax: {
      url: "<?= $abs; ?>/backend/pages/job-status/data.php",
      type: "post", // method  , by default get
      //bisa kirim data ke server
      /*data: function ( d ) {
                  d.jurusan = "3223";
              },*/
      error: function (xhr, error, thrown) {
        console.log(xhr);
      },
    },
  });
  $("#job-methods").dataTable({
    bProcessing: true,
    bServerSide: true,
    //disable order dan searching pada tombol aksi
    columnDefs: [
      {
        targets: [0, 2],
        orderable: false,
        searchable: false,
      },
    ],
    ajax: {
      url: "../pages/job-methods/data.php",
      type: "post", // method  , by default get
      //bisa kirim data ke server
      /*data: function ( d ) {
                  d.jurusan = "3223";
              },*/
      error: function (xhr, error, thrown) {
        console.log(xhr);
      },
    },
  });
  $("#brands").dataTable({
    bProcessing: true,
    bServerSide: true,
    //disable order dan searching pada tombol aksi
    columnDefs: [
      {
        targets: [0, 2],
        orderable: false,
        searchable: false,
      },
    ],
    ajax: {
      url: "../pages/brands/data.php",
      type: "post", // method  , by default get
      //bisa kirim data ke server
      /*data: function ( d ) {
                  d.jurusan = "3223";
              },*/
      error: function (xhr, error, thrown) {
        console.log(xhr);
      },
    },
  });
  $("#projects").dataTable({
    responsive: true,
    autoWidth: false,
    bProcessing: true,
    bServerSide: true,
    //disable order dan searching pada tombol aksi
    columnDefs: [
      {
        targets: [0, 4],
        orderable: false,
        searchable: false,
      },
    ],
    ajax: {
      url: "../pages/projects/data.php",
      type: "post", // method  , by default get
      //bisa kirim data ke server
      /*data: function ( d ) {
                  d.jurusan = "3223";
              },*/
      error: function (xhr, error, thrown) {
        console.log(xhr);
      },
    },
  });
  $("#projects-progress").dataTable({
    responsive: true,
    autoWidth: false,
    bProcessing: true,
    bServerSide: true,
    //disable order dan searching pada tombol aksi
    columnDefs: [
      {
        targets: [0, 6],
        orderable: false,
        searchable: false,
      },
    ],
    ajax: {
      url: "../pages/projects-progress/data.php?id_projects=" + id_projects,
      type: "post", // method  , by default get
      //bisa kirim data ke server
      /*data: function ( d ) {
                  d.jurusan = "3223";
              },*/
      error: function (xhr, error, thrown) {
        console.log(xhr);
      },
    },
  });
  $("#invoices").dataTable({
    responsive: true,
    autoWidth: false,
    bProcessing: true,
    bServerSide: true,
    //disable order dan searching pada tombol aksi
    columnDefs: [
      {
        targets: [0, 7],
        orderable: false,
        searchable: false,
      },
    ],
    ajax: {
      url: "../pages/invoices/data.php",
      type: "post", // method  , by default get
      //bisa kirim data ke server
      /*data: function ( d ) {
                  d.jurusan = "3223";
              },*/
      error: function (xhr, error, thrown) {
        console.log(xhr);
      },
    },
  });
  $("#customers").dataTable({
    responsive: true,
    autoWidth: false,
    bProcessing: true,
    bServerSide: true,
    //disable order dan searching pada tombol aksi
    columnDefs: [
      {
        targets: [0, 6],
        orderable: false,
        searchable: false,
      },
    ],
    ajax: {
      url: "../pages/customers/data.php",
      type: "post", // method  , by default get
      //bisa kirim data ke server
      /*data: function ( d ) {
                  d.jurusan = "3223";
              },*/
      error: function (xhr, error, thrown) {
        console.log(xhr);
      },
    },
  });
  $("#site-survey").dataTable({
    responsive: true,
    autoWidth: false,
    bProcessing: true,
    bServerSide: true,
    //disable order dan searching pada tombol aksi
    columnDefs: [
      {
        targets: [0, 6],
        orderable: false,
        searchable: false,
      },
    ],
    ajax: {
      url: "../pages/site-survey/data.php",
      type: "post", // method  , by default get
      //bisa kirim data ke server
      /*data: function ( d ) {
                  d.jurusan = "3223";
              },*/
      error: function (xhr, error, thrown) {
        console.log(xhr);
      },
    },
  });
  $("#site-survey-methods").dataTable({
    responsive: true,
    autoWidth: false,
    bProcessing: true,
    bServerSide: true,
    //disable order dan searching pada tombol aksi
    columnDefs: [
      {
        targets: [0, 3],
        orderable: false,
        searchable: false,
      },
    ],
    ajax: {
      url: "../pages/site-survey-methods/data.php?id_site_survey=" + id_site_survey,
      type: "post", // method  , by default get
      //bisa kirim data ke server
      /*data: function ( d ) {
                  d.jurusan = "3223";
              },*/
      error: function (xhr, error, thrown) {
        console.log(xhr);
      },
    },
  });  
  $("#req-material").dataTable({
    responsive: true,
    autoWidth: false,
    bProcessing: true,
    bServerSide: true,
    //disable order dan searching pada tombol aksi
    columnDefs: [
      {
        targets: [0, 6],
        orderable: false,
        searchable: false,
      },
    ],
    ajax: {
      url: "../pages/req-material/data.php?id_site_survey="+id_site_survey,
      type: "post", // method  , by default get
      //bisa kirim data ke server
      /*data: function ( d ) {
                  d.jurusan = "3223";
              },*/
      error: function (xhr, error, thrown) {
        console.log(xhr);
      },
    },
  });
  $("#req-material-specified").dataTable({
    responsive: true,
    autoWidth: false,
    bProcessing: true,
    bServerSide: true,
    //disable order dan searching pada tombol aksi
    columnDefs: [
      {
        targets: [0],
        orderable: false,
        searchable: false,
      },
    ],
    ajax: {
      url: "../pages/req-material/data-specified.php?id_site_survey="+id_site_survey,
      type: "post", // method  , by default get
      //bisa kirim data ke server
      // data: function ( d ) {
      //   d.id_site_survey = id_site_survey;
      // },
      error: function (xhr, error, thrown) {
        console.log(xhr);
      },
    },
  });
  $("#level").dataTable({
    bProcessing: true,
    bServerSide: true,
    //disable order dan searching pada tombol aksi
    columnDefs: [
      {
        targets: [0, 2],
        orderable: false,
        searchable: false,
      },
    ],
    ajax: {
      url: "../pages/level/data.php",
      type: "post", // method  , by default get
      //bisa kirim data ke server
      /*data: function ( d ) {
                  d.jurusan = "3223";
              },*/
      error: function (xhr, error, thrown) {
        console.log(xhr);
      },
    },
  });
  $("#payments").dataTable({
    bProcessing: true,
    bServerSide: true,
    //disable order dan searching pada tombol aksi
    columnDefs: [
      {
        targets: [0, 2],
        orderable: false,
        searchable: false,
      },
    ],
    ajax: {
      url: "../pages/payments/data.php",
      type: "post", // method  , by default get
      //bisa kirim data ke server
      /*data: function ( d ) {
                  d.jurusan = "3223";
              },*/
      error: function (xhr, error, thrown) {
        console.log(xhr);
      },
    },
  });
  $("#kategori").dataTable({
    responsive: true,
    autoWidth: false,
    bProcessing: true,
    bServerSide: true,
    //disable order dan searching pada tombol aksi
    columnDefs: [
      {
        targets: [0, 3],
        orderable: false,
        searchable: false,
      },
    ],
    ajax: {
      url: "../pages/kategori/data.php",
      type: "post", // method  , by default get
      //bisa kirim data ke server
      /*data: function ( d ) {
                  d.jurusan = "3223";
              },*/
      error: function (xhr, error, thrown) {
        console.log(xhr);
      },
    },
  });
  $("#products").dataTable({
    responsive: true,
    autoWidth: false,
    bProcessing: true,
    bServerSide: true,
    //disable order dan searching pada tombol aksi
    columnDefs: [
      {
        targets: [0, 4],
        orderable: false,
        searchable: false,
      },
    ],
    ajax: {
      url: "../pages/products/data.php",
      // url: "../../data/ajax/produk.php",
      type: "post", // method  , by default get
      //bisa kirim data ke server
      /*data: function ( d ) {
                  d.jurusan = "3223";
              },*/
      error: function (xhr, error, thrown) {
        console.log(xhr);
      },
    },
  });
  $("#user").dataTable({
    responsive: true,
    autoWidth: false,
    bProcessing: true,
    bServerSide: true,
    //disable order dan searching pada tombol aksi
    columnDefs: [
      {
        targets: [0, 6, 7],
        orderable: false,
        searchable: false,
      },
    ],
    ajax: {
      url: "../pages/user/data.php",
      type: "post", // method  , by default get
      //bisa kirim data ke server
      /*data: function ( d ) {
                  d.jurusan = "3223";
              },*/
      error: function (xhr, error, thrown) {
        console.log(xhr);
      },
    },
  });
  $("#example1").DataTable({
    responsive: true,
    autoWidth: false,
    columnDefs: [{
      targets: [0],
      orderable: false,
      searchable: false,
    }]
  });
  $("#example2").DataTable({
    paging: true,
    lengthChange: false,
    searching: false,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
  });
  //Initialize Select2 Elements
  $(".select2").select2();

  //Initialize Select2 Elements
  $(".select2bs4").select2({
    theme: "bootstrap4",
  });
  // $.validator.setDefaults({
  //   submitHandler: function() {
  //     alert("Form successful submitted!");
  //   }
  // });
  $("#quickForm").validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5,
      },
      terms: {
        required: true,
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address",
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long",
      },
      terms: "Please accept our terms",
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
  });
});
