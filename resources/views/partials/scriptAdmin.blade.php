  <!-- Backdrop for expanded sidebar -->
  <div class="sidebar-backdrop" id="sidebarBackdrop" data-toggle="sidebar"></div>

  <!-- Main Scripts -->
  <script src="{{ asset('assetsAdmin/js/script.min.js') }}"></script>
  <script src="{{ asset('assetsAdmin/js/app.min.js') }}"></script>


  <!-- Plugins -->
  <script src="{{ asset('assetsAdmin/js/script.min.js') }}"></script>
  <script src="{{ asset('assetsAdmin/js/app.min.js') }}"></script>
  <!-- Main Scripts -->
  <script src="{{ asset('assetsAdmin/js/script.min.js') }}"></script>
  <script src="{{ asset('assetsAdmin/js/app.min.js') }}"></script>

  <!-- Plugins -->
  <script src="{{ asset('assetsAdmin/plugins/summernote/summernote-bs4.min.js') }}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" integrity="sha512-DUC8yqWf7ez3JD1jszxCWSVB0DMP78eOyBpMa5aJki1bIRARykviOuImIczkxlj1KhVSyS16w2FSQetkD4UU2w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>




  <!-- Plugins -->
  <script src="{{ asset('assetsAdmin/plugins/noty/noty.min.js') }}"></script>
  <script src="{{ asset('assetsAdmin/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('assetsAdmin/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('assetsAdmin/plugins/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('assetsAdmin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('assetsAdmin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
  <script language="JavaScript" type="text/javascript" src="{{ asset('assetsAdmin/js/jquery-1.2.6.min.js') }}"></script>
  <script language="JavaScript" type="text/javascript" src="{{ asset('assetsAdmin/js/jquery-ui-personalized-1.5.2.packed.js') }}">
  </script>
  <!-- Main Scripts -->
  <script src="{{ asset('assetsAdmin/js/script.min.js') }}"></script>
  <script src="{{ asset('assetsAdmin/js/app.min.js') }}"></script>

  <!-- Plugins -->
  <script src="{{ asset('assetsAdmin/plugins/summernote/summernote-bs4.min.js') }}"></script>

  <script language="JavaScript" type="text/javascript" src="{{ asset('/js/sprinkle.js') }}"></script>
  <script charset="utf-8" src="http://code.jquery.com/jquery-X.Y.Z.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
  <!--boxicon link-->
  <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>

  {{-- <script type="text/javascript">
      var url = "{{ route('LangChange') }}";
      $(".Langchange").change(function() {
          window.location.href = url + "?lang=" + $(this).val();
      });
  </script> --}} 


  <script type="text/javascript">
      var table = $('#datatable').DataTable();
      $(document).ready(function() {
          table.on('click', '.edit', function() {
              $tr = $(this).closest('tr');
              if ($($tr).hasClass('child')) {
                  $tr = $tr.prev('.parent');
              }
              var data = table.row($tr).data();
              console.log(data);
              $('#name').val(data[2]);
              $('#updateform').attr('action', '/categories/' + data[1]);
              $('#updatecategory').modal('show');
          });
      });


      $(document).ready(function() {
          table.on('click', '.editsector', function() {
              $tr = $(this).closest('tr');
              if ($($tr).hasClass('child')) {
                  $tr = $tr.prev('.parent');
              }
              var data = table.row($tr).data();
              console.log(data);
              $('#name').val(data[2]);
              $('#updateFormFector').attr('action', '/sectors/' + data[1]);
              $('#updateSector').modal('show');
          });

      });
  </script>
  <script type="text/javascript">
      $(document).ready(function() {
          $(".checkcategory").change(function() {
              var status = $(this).prop('checked') == true ? 1 : 0;
              var id = $(this).data('id');
              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: '/updateCategory',
                  data: {
                      'status': status,
                      'id': id
                  },
                  success: function() {
                      console.log('cool le grand julio !');
                  }
              });
          });
      });
  </script>
  <script type="text/javascript">
      $(document).ready(function() {
          $(".checksoctor").change(function() {
              var status = $(this).prop('checked') == true ? 1 : 0;
              var id = $(this).data('id');
              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: '/updateSector',
                  data: {
                      'status': status,
                      'id': id
                  },
                  success: function() {
                      console.log('cool le grand julio !');
                  }
              });

          });
      });
  </script>



  <script>
      $(() => {

          function run_sparkline() {
              $('.sparkline-data').text('').sparkline('html', {
                  width: '100%',
                  height: 20,
                  lineColor: gray,
                  fillColor: false,
                  tagValuesAttribute: 'data-value'
              })
          }
          // Run sparkline when the document view (window) has been resized
          App.resize(() => {
              run_sparkline()
          })()
          // Run sparkline when the sidebar updated (toggle collapse)
          document.addEventListener('sidebar:update', () => {
              run_sparkline()
          })

          // Global Chart configuration
          Chart.defaults.global.elements.rectangle.borderWidth = 1 // bar border width
          Chart.defaults.global.elements.line.borderWidth = 1 // line border width
          Chart.defaults.global.maintainAspectRatio =
              false // disable the maintain aspect ratio in options then it uses the available height

          // Monthly Sales
          new Chart('monthlySalesChart', {
              type: 'line',
              data: {
                  labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                  datasets: [{
                          label: 'Last year',
                          backgroundColor: Chart.helpers.color(gray).alpha(0.1).rgbString(),
                          borderColor: gray,
                          fill: 'start',
                          data: [65, 59, 80, 81, 56, 55, 40]
                      },
                      {
                          label: 'This year',
                          backgroundColor: Chart.helpers.color(blue).alpha(0.1).rgbString(),
                          borderColor: blue,
                          fill: 'start',
                          data: [28, 48, 40, 19, 86, 27, 90]
                      }
                  ]
              },
              options: {
                  tooltips: {
                      mode: 'index',
                      intersect: false
                      // Interactions configuration: https://www.chartjs.org/docs/latest/general/interactions/
                  }
              }
          })

          // Sales Revenue Map
          $('#vmap').vectorMap({
              map: 'usa_en',
              showTooltip: true,
              backgroundColor: '#fff',
              color: '#d1e6fa',
              colors: {
                  fl: blue,
                  ca: blue,
                  tx: blue,
                  wy: blue,
                  ny: blue
              },
              selectedColor: '#00cccc',
              enableZoom: false,
              borderWidth: 1,
              borderColor: '#fff',
              hoverOpacity: .85
          })

          // Today Sales
          new Chart('barChart2', {
              type: 'horizontalBar',
              data: {
                  labels: ['6am', '10am', '1pm', '4pm', '7pm', '10pm'],
                  datasets: [{
                          label: 'Today',
                          backgroundColor: Chart.helpers.color(cyan).alpha(0.3).rgbString(),
                          borderColor: cyan,
                          data: [20, 60, 50, 45, 50, 60]
                      },
                      {
                          label: 'Yesterday',
                          backgroundColor: Chart.helpers.color(yellow).alpha(0.3).rgbString(),
                          borderColor: yellow,
                          data: [10, 40, 30, 40, 55, 25]
                      }
                  ]
              },
              options: {
                  tooltips: {
                      mode: 'index',
                      intersect: false
                  },
                  scales: {
                      xAxes: [{
                          ticks: {
                              beginAtZero: true
                          }
                      }]
                  }
              }
          })

          // Reload card event
          document.querySelector('#transaction-history').addEventListener('card:reload', function() {
              var thisCard = this
              // reload transaction history...
              setTimeout(() => { // do nothing for a second (this is only for demo)
                  App.stopCardLoader(thisCard) // when done, run this function
              }, 1000)
          })
          document.querySelector('#new-customers').addEventListener('card:reload', function() {
              var thisCard = this
              // reload new customers..
              setTimeout(() => { // do nothing for a second (this is only for demo)
                  App.stopCardLoader(thisCard) // when done, run this function
              }, 1000)
          })
          document.querySelector('#today-sales').addEventListener('card:reload', function() {
              var thisCard = this
              // reload today sales..
              setTimeout(() => { // do nothing for a second (this is only for demo)
                  App.stopCardLoader(thisCard) // when done, run this function
              }, 1000)
          })

      })
  </script>
  <script>
      $(() => {

          /***************** SIMPLE DEFAULT NOTIFICATION *****************/
          $('#notyDefault').click(function() {
              new Noty({
                  text: '<h5>Hi there!</h5>This is a simple notification.',
                  timeout: 2000 // 2000 miliseconds (2 seconds)
              }).show()
          })

          /***************** SIMPLE SUCCESS NOTIFICATION *****************/
          $('#notySuccess').click(function() {
              new Noty({
                  type: 'success',
                  text: '<h5>Hi there!</h5>This is a simple success notification.',
                  timeout: 2000
              }).show()
          })

          /***************** SIMPLE INFO NOTIFICATION *****************/
          $('.info').click(function() {
              new Noty({
                  type: 'info',
                  text: '<h5>Info !</h5>The status category was changed.',
                  timeout: 2000
              }).show()
          })

          /***************** SIMPLE INFO NOTIFICATION *****************/
          $('#notyInfo').click(function() {
              new Noty({
                  type: 'info',
                  text: '<h5>Hi there!</h5>This is a simple info notification.',
                  timeout: 2000
              }).show()
          })

          /***************** SIMPLE WARNING NOTIFICATION *****************/
          $('#notyWarning').click(function() {
              new Noty({
                  type: 'warning',
                  text: '<h5>Hi there!</h5>This is a simple warning notification.',
                  timeout: 2000
              }).show()
          })

          /***************** SIMPLE ERROR NOTIFICATION *****************/
          $('#notyError').click(function() {
              new Noty({
                  type: 'error',
                  text: '<h5>Hi there!</h5>This is a simple error notification.',
                  timeout: 2000
              }).show()
          })

          /***************** TOP POSITION *****************/
          $('#notyTop').click(function() {
              new Noty({
                  layout: 'top',
                  text: '<div class="text-center"><h5>Hi there!</h5>This is a simple top notification.</div>',
                  timeout: 2000
              }).show()
          })

          /***************** TOP LEFT POSITION *****************/
          $('#notyTopLeft').click(function() {
              new Noty({
                  layout: 'topLeft',
                  text: '<div class="text-center"><h5>Hi there!</h5>This is a simple topLeft notification.</div>',
                  timeout: 2000
              }).show()
          })

          /***************** TOP CENTER POSITION *****************/
          $('#notyTopCenter').click(function() {
              new Noty({
                  layout: 'topCenter',
                  text: '<div class="text-center"><h5>Hi there!</h5>This is a simple topCenter notification.</div>',
                  timeout: 2000
              }).show()
          })

          /***************** TOP RIGHT POSITION *****************/
          // topRight is used as default layout, so you don't need to include the layout: "topRight" option
          $('#notyTopRight').click(function() {
              new Noty({
                  text: '<div class="text-center"><h5>Hi there!</h5>This is a simple topRight notification.</div>',
                  timeout: 2000
              }).show()
          })

          /***************** CENTER POSITION *****************/
          $('#notyCenter').click(function() {
              new Noty({
                  layout: 'center',
                  text: '<div class="text-center"><h5>Hi there!</h5>This is a simple center notification.</div>',
                  timeout: 2000
              }).show()
          })

          /***************** CENTER LEFT POSITION *****************/
          $('#notyCenterLeft').click(function() {
              new Noty({
                  layout: 'centerLeft',
                  text: '<div class="text-center"><h5>Hi there!</h5>This is a simple centerLeft notification.</div>',
                  timeout: 2000
              }).show()
          })

          /***************** CENTER RIGHT POSITION *****************/
          $('#notyCenterRight').click(function() {
              new Noty({
                  layout: 'centerRight',
                  text: '<div class="text-center"><h5>Hi there!</h5>This is a simple centerRight notification.</div>',
                  timeout: 2000
              }).show()
          })

          /***************** BOTTOM POSITION *****************/
          $('#notyBottom').click(function() {
              new Noty({
                  layout: 'bottom',
                  text: '<div class="text-center"><h5>Hi there!</h5>This is a simple bottom notification.</div>',
                  timeout: 2000
              }).show()
          })

          /***************** BOTTOM LEFT POSITION *****************/
          $('#notyBottomLeft').click(function() {
              new Noty({
                  layout: 'bottomLeft',
                  text: '<div class="text-center"><h5>Hi there!</h5>This is a simple bottomLeft notification.</div>',
                  timeout: 2000
              }).show()
          })

          /***************** BOTTOM CENTER POSITION *****************/
          $('#notyBottomCenter').click(function() {
              new Noty({
                  layout: 'bottomCenter',
                  text: '<div class="text-center"><h5>Hi there!</h5>This is a simple bottomCenter notification.</div>',
                  timeout: 2000
              }).show()
          })

          /***************** BOTTOM RIGHT POSITION *****************/
          $('#notyBottomRight').click(function() {
              new Noty({
                  layout: 'bottomRight',
                  text: '<div class="text-center"><h5>Hi there!</h5>This is a simple bottomRight notification.</div>',
                  timeout: 2000
              }).show()
          })

          /***************** WITH ICON *****************/
          $('#notyIcon').click(function() {
              new Noty({
                  type: 'success',
                  text: '<div class="media">\
                                      <span><i class="material-icons">check_circle_outline</i></span>\
                                      <div class="media-body ml-3">\
                                        <h5>Hi there!</h5>This is a success notification with icon.\
                                      </div>\
                                    </div>',
                  timeout: 2000
              }).show()
          })

          /***************** WITH MEDIA *****************/
          $('#notyMedia').click(function() {
              new Noty({
                  text: '<div class="media">\
                                      <img src="../img/user.svg" width="50" height="50" class="rounded-circle">\
                                      <div class="media-body ml-3">\
                                        <h5>Welcome Admin</h5>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum impedit, corporis veritatis aut ex corrupti necessitatibus eveniet sed ipsa inventore\
                                      </div>\
                                    </div>',
                  timeout: 2000
              }).show()
          })

          /***************** CONFIRM DIALOGS *****************/
          $('#notyConfirm').click(function(e) {
              new Noty({
                  text: '<h5>Are you sure want to remove this data ?</h5>',
                  buttons: [
                      Noty.button('YES', 'btn btn-sm btn-danger rounded-0', function(n) {
                          n.close() // close noty
                          // YOUR ACTION HERE

                          // If done, show success notification
                          new Noty({
                              type: 'success',
                              text: 'Data successfully removed !',
                              timeout: 2000
                          }).show()
                      }),
                      Noty.button('CANCEL', 'btn btn-sm btn-light rounded-0', function(n) {
                          n.close() // close noty
                      })
                  ]
              }).show()
          })

          /***************** STICKY *****************/
          // just remove timeout function
          $('#notySticky').click(function() {
              new Noty({
                  text: '<h5>Hi there!</h5>This is a simple sticky notification. Click to remove this notification',
              }).show()
          })

          /***************** CLOSE BUTTON *****************/
          $('#notyCloseButton').click(function() {
              new Noty({
                  type: 'info',
                  text: '<h5>Hi there!</h5>This is a simple info notification. Close this notification by clicking the button on the top right',
                  closeWith: ['button']
              }).show()
          })

          /***************** NO PROGRESSBAR *****************/
          $('#notyNoProgressBar').click(function() {
              new Noty({
                  type: 'info',
                  text: '<h5>Hi there!</h5>This is a simple info notification. This notification will closed in 3 seconds without progress bar',
                  closeWith: ['button'],
                  timeout: 3000,
                  progressBar: false
              }).show()
          })

      })
  </script>
  <script>
      $(() => {

          App.checkAll()

          // Focus to 'To input' when modal shown
          $('#composeModal').on('shown.bs.modal', () => {
              document.querySelector('#mailTo').focus()
          })

          // Text editor
          $('#summernote-editor').summernote({
              dialogsInBody: true,
              height: 150,

              placeholder: 'Write your message here',
              toolbar: [
                  ['font', ['bold', 'underline', 'italic']],
                  ['insert', ['link', 'picture']],
              ],
          })

          // Toggle Starred / Unstarred
          for (const el of document.querySelectorAll('.btn-starred')) {
              const tr = el.closest('tr')
              const starred = tr.classList.contains('starred')
              el.title = starred ? 'Starred' : 'Not starred' // fill title
              starred ? el.classList.add('active') : el.classList.remove('active') // toggle 'active' class
              el.addEventListener('click', function() {
                  tr.classList.toggle('starred') // toggle 'starred' class
                  el.title = this.classList.contains('active') ? 'Not starred' : 'Starred' // update title
              })
          }

          // Select options
          for (const el of document.querySelectorAll('[data-toggle="mail-checkbox"]')) {
              el.addEventListener('click', function() {
                  const allcb =
                      'tr > td:first-child input[type="checkbox"], tr > th:first-child input[type="checkbox"]'
                  for (const el of this.closest('table').querySelectorAll(allcb)) {
                      el.checked && el.click() // uncheck all
                  }
                  let selector
                  switch (this.dataset.check) {
                      case 'all':
                          selector = allcb;
                          break;
                      case 'read':
                          selector = 'tbody tr:not(.unread) > td:first-child input[type="checkbox"]';
                          break;
                      case 'unread':
                          selector = 'tbody tr.unread > td:first-child input[type="checkbox"]';
                          break;
                      case 'starred':
                          selector = 'tbody tr.starred > td:first-child input[type="checkbox"]';
                          break;
                      case 'unstarred':
                          selector = 'tbody tr:not(.starred) > td:first-child input[type="checkbox"]';
                          break;
                  }
                  for (const cb of this.closest('table').querySelectorAll(selector)) {
                      !cb.checked && cb.click()
                  }
              })
          }

          // Show mail content
          const tabPane = document.querySelector('#tab-content-mail').querySelectorAll('.tab-pane')
          for (const el of document.querySelectorAll('.list-mail-item-subject')) {
              el.addEventListener('click', function(e) {
                  for (const tp of tabPane) {
                      tp.setAttribute('hidden', true) // hide all tab pane
                  }
                  document.querySelector('#mail-content').removeAttribute('hidden') // unhide mail-content
                  e.preventDefault()
              })
          }

          // Back to inbox list
          for (const el of document.querySelectorAll('.to-inbox')) {
              el.addEventListener('click', function(e) {
                  for (const tp of tabPane) {
                      tp.removeAttribute('hidden') // unhide all tab pane
                  }
                  document.querySelector('#mail-content').setAttribute('hidden',
                      true) // hide mail-content
                  e.preventDefault()
              })
          }

      })
  </script>
