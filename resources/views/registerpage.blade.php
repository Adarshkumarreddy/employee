<!DOCTYPE html>
<html>
   <head>
      <title>Employee</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <style>
        body {
            background-image: url("https://images.unsplash.com/photo-1683444805823-3de8d2fd1c80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw1fHx8ZW58MHx8fHw%3D&auto=format&fit=crop&w=400&q=60");
            background-size: cover; /* adjust to your needs */
            background-position: center center; /* adjust to your needs */
          }
         .error {
                color: red;
                font-size: 14px;
                }
         .card{
            width:500px;
         }
      </style>
   </head>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-6 col-sm-6 mx-auto mt-4">
               <div class="card">
                  <div class="card-body">
                    <h1>employee</h1>
                     <form action="{{route('employee.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                           <label for="name">Name:</label>
                           <input type="text" class="form-control" id="name" name="name" required minlength="3" pattern="[A-Za-z]+" />
                        </div>
                        <div class="form-group">
                           <label for="email">Email:</label>
                           <input type="email" class="form-control" id="email" name="email" required />
                           <span id="email-error"></span>
                        </div>
                        <div class="form-group">
                           <label for="phone">Phone:</label>
                           <input type="tel" class="form-control" id="phone" name="phone" required pattern="[0-9]{10}" />
                           <span id="phone-error"></span>
                        </div>
                        <div class="form-group">
                           <label for="department">Department:</label>
                           <select class="form-control" id="department" name="department" required>
                              <option value="">Select Department</option>
                              <option value="HR">HR</option>
                              <option value="Marketing">Marketing</option>
                              <option value="IT">IT</option>
                              <option value="Finance">Finance</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="remark">Remark:</label>
                           <textarea class="form-control" id="remark" name="remark"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
   <script>
  
      $(document).ready(function() {
        
  // Email validation using regex
  function isValidEmail(email) {
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
  }

  // Phone validation using regex
  function isValidPhone(phone) {
      var phoneRegex = /^\d{10}$/;
      return phoneRegex.test(phone);
  }

  // Check for duplicate email
  $('#email').blur(function() {
      var email = $(this).val();
      if (isValidEmail(email)) {
          $.get('/check-email', { email: email }, function(data) {
              if (data.exists) {
                  $('#email-error').text('Email already exists').addClass('error');
              } else {
                  $('#email-error').text('').removeClass('error');
              }
          });
      } else {
          $('#email-error').text('Invalid email format').addClass('error');
      }
  });

  // Check for duplicate phone
  $('#phone').blur(function() {
      var phone = $(this).val();
      if (isValidPhone(phone)) {
          $.get('/check-phone', { phone: phone }, function(data) {
              if (data.exists) {
                  $('#phone-error').text('Phone already exists').addClass('error');
              } else {
                  $('#phone-error').text('').removeClass('error');
              }
          });
      } else {
          $('#phone-error').text('Invalid phone number').addClass('error');
      }
  });
        // Department validation
        $('#department').on('change', function() {
                var department = $(this).val();
                if (!department) {
                    $('#department-error').text('Department is required.');
                } else {
                    $('#department-error').text('');
                }
            });
});

   </script>
</html>