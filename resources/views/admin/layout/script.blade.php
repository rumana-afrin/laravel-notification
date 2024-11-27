  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/js/jquery.3.7.1.min.js') }}"></script>

  <script src="{{ asset('assets/admin/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/admin/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/admin/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/admin/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/admin/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/admin/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/admin/vendor/php-email-form/validate.js') }}"></script>

  <!-- Toastr JS File -->
  <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
  <!-- sweetalert  JS File -->
  <script src="{{ asset('assets/sweetalert/sweetalert2.all.js') }}"></script>
  <script src="{{ asset('assets/sweetalert/sweetalert2.all.min.js') }}"></script>
  <script src="{{ asset('assets/sweetalert/sweetalert2.js') }}"></script>
  <script src="{{ asset('assets/sweetalert/sweetalert2.min.js') }}"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/common.js') }}"></script>
  <script src="{{ asset('assets/admin/js/main.js') }}"></script>

  <script>
      $(document).ready(function() {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
      });
  </script>
  <script>
      "use strict"
      @if (Session::has('success'))
          toastr.success("{{ session('success') }}");
      @endif
      @if (Session::has('error'))
          toastr.error("{{ session('error') }}");
      @endif
      @if (Session::has('info'))
          toastr.info("{{ session('info') }}");
      @endif
      @if (Session::has('warning'))
          toastr.warning("{{ session('warning') }}");
      @endif

      @if (@$errors->any())
          @foreach ($errors->all() as $error)
              toastr.error("{{ $error }}");
          @endforeach
      @endif
  </script>

  <script>
      document.addEventListener('DOMContentLoaded', function() {
          console.log("Document is ready");

          function approve(notifyType, id) {
              console.log('Notification type:', notifyType);

              // Check if type contains namespace and adjust comparison as needed
              if (notifyType.includes('NewItemNotification')) {
                //   alert("New item notification");
                  return `/web/admin/item/${id}`;
              }

              // Default URL if type doesn't match
              return '#';
          }





          const adminId = "{{ auth()->user()->id }}";
          const notificationBadge = document.querySelector('.badge-number');
          const notificationList = document.querySelector('#notificationList');

          // Function to fetch and render all notifications
          function fetchAllNotifications() {
              axios.get('/web/admin/fetch-notifications')
                  .then(response => {
                      const notifications = response.data;
                      console.log("All notifications:", notifications);

                      let notificationItems = '';
                      notifications.forEach(notification => {
                          const notificationItem = `
                            <li class="notification-item">
                                <i class="bi bi-exclamation-circle text-warning"></i>
                                <div>
                                    <a class="custom-link" href="${approve(notification.type, notification.message.id)}">
                                        <h4>${notification.message.message}</h4>
                                         <p>${notification.message.title ? notification.message.title : ""}</p>
                                         <p>${notification.message.name ? notification.message.name : ""}</p>
                                        <p>${notification.time}</p>
                                    </a>
                                </div>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                        `;
                          notificationItems += notificationItem;
                      });
                      notificationList.innerHTML = notificationItems;
                  })
                  .catch(error => {
                      console.error('Error fetching notifications:', error);
                  });
          }

          // Function to listen for new user notifications
          function newUser() {
              window.Echo.private(`new-user.${adminId}`)
                  .listen('.NewUserRegistered', (e) => {
                      notificationBadge.textContent = parseInt(notificationBadge.textContent) + 1;
                      // console.log("New user notification received:", e.message);
                      fetchAllNotifications();
                  });
          }

          // Function to listen for new item notifications
          function newItem() {
              window.Echo.private(`App.Models.User.${adminId}`)
                  .subscribed(() => {
                      console.log('Subscribed to new-item channel');
                  })
                  .notification((notification) => {
                      // console.log(notification); // Display real-time notification data
                      notificationBadge.textContent = parseInt(notificationBadge.textContent) + 1;
                      fetchAllNotifications();
                  })
                  .error((error) => {
                      console.error('Error in subscribing to new-item:', error);
                  });
          }

          // Call the functions to set up listeners
          newUser();
          newItem();

          // Initial fetch of notifications
          fetchAllNotifications();
      });
  </script>


  {{-- ----final output------// /web/admin/item/${notification.id}---- --}}
  {{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log("Document is ready");
        const adminId = "{{ auth()->user()->id }}";

        // Real-time notification listener
        window.Echo.private(`new-user.${adminId}`)
            .listen('.NewUserRegistered', (e) => {
                const notificationBadge = document.querySelector('.badge-number');

                // Increment badge count for each new notification
                notificationBadge.textContent = parseInt(notificationBadge.textContent) + 1;

                console.log("New user notification received:", e.message);
                fetchAllNotifications(); // Refresh notifications list
            });

        // Function to fetch and render all notifications
        function fetchAllNotifications() {
            const notificationList = document.querySelector('#notificationList');

            axios.get('/web/admin/fetch-notifications')
                .then(response => {
                    const notifications = response.data;
                    console.log("All notifications:", notifications);

                    let notificationItems = '';
                    // Populate dropdown with all notifications
                    notifications.forEach(notification => {
                        const notificationItem = `
                            <li class="notification-item">
                                <i class="bi bi-exclamation-circle text-warning"></i>
                                <div>
                                    <a class="custom-link" href="#">
                                        <h4>${notification.message.message}</h4>
                                        <p>${notification.time}</p>
                                    </a>
                                </div>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                        `;
                        notificationItems += notificationItem;
                    });
                    notificationList.innerHTML = notificationItems;
                })
                .catch(error => {
                    console.error('Error fetching notifications:', error);
                });
        }

        // Badge click event to load and show all notifications
        document.querySelector('.badge-number').addEventListener('click', function() {
            fetchAllNotifications();
        });

        // Initial fetch for unread notification count only
        axios.get('/web/admin/fetch-notifications')
            .then(response => {
                const notifications = response.data;

                // Filter unread notifications and update badge count
                const unreadCount = notifications.filter(n => !n.read).length;
                document.querySelector('.badge-number').textContent = unreadCount;
            })
            .catch(error => {
                console.error('Error fetching notifications:', error);
            });
    });
</script> --}}

  {{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        //-----------------------------
        fetchAllNotifications();
        console.log("document is ready");
        const adminId = "{{ auth()->user()->id }}";
        if (window.Echo) {
            window.Echo.private(`App.Models.User.${adminId}`)
                .subscribed(() => {
                    console.log('Subscribed to new-item channel');
                })
                .notification((notification) => {
                    console.log(notification); // Display real-time notification data
                    const notifications = response.data;
                    const badgeElement = document.querySelector('.badge-number');
                    const notificationList = document.querySelector('.notifications');

                    badgeElement.textContent = notifications.length;
                    fetchAllNotifications();
                })
                .error((error) => {
                    console.error('Error in subscribing to new-item:', error);
                });
        } else {
            console.error('Echo is not defined');
        }


        //   ------------------------------
        // Function to fetch and render all notifications
        function fetchAllNotifications() {
            const notificationList = document.querySelector('#notificationList');

            axios.get('/web/admin/fetch-notifications')
                .then(response => {
                    const notifications = response.data;
                    console.log("All notifications:", notifications);

                    let notificationItems = '';
                    // Populate dropdown with all notifications
                    notifications.forEach(notification => {
                        const notificationItem = `
                          <li class="notification-item">
                              <i class="bi bi-exclamation-circle text-warning"></i>
                              <div>
                                  <a class="custom-link" href="#">
                                      <h4>${notification.message.item_id}</h4>
                                      <p>${notification.message.title}</p>
                                  </a>
                              </div>
                          </li>
                          <li><hr class="dropdown-divider"></li>
                      `;
                        notificationItems += notificationItem;
                    });
                    notificationList.innerHTML = notificationItems;
                })
                .catch(error => {
                    console.error('Error fetching notifications:', error);
                });
        }

        // Badge click event to load and show all notifications
        document.querySelector('.badge-number').addEventListener('click', function() {
            fetchAllNotifications();
        });

        // Initial fetch for unread notification count only
        axios.get('/web/admin/fetch-notifications')
            .then(response => {
                const notifications = response.data;

                // Filter unread notifications and update badge count
                const unreadCount = notifications.filter(n => !n.read).length;
                document.querySelector('.badge-number').textContent = unreadCount;
            })
            .catch(error => {
                console.error('Error fetching notifications:', error);
            });
    });
</script> --}}

  {{-- ----final output---------- --}}
