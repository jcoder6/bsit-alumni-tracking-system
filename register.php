<div class="registration-head">
  <div class="reg-close-btn"><i class="fa-solid fa-xmark"></i></div>
  <div class="logo-container">
    <img src="./assets/images/Logo Psu.PNG" alt="LOGO">
  </div>

  <div class="regis-head-content">
    <h3 class="registration-title">Registration</h3>
    <p class="registration-sub">BSIT Alumni Tracking Management System</p>
  </div>
</div>
<div class="register-form-container">
  <div class="registration-forms">
    <form action="#" method="post" class="bio-info">
      <h4 class="form-title">Biographical Information</h4>

      <div class="form-groups">
        <div class="form-group name">
          <label class="label-name" for="fName">First Name</label>
          <input type="text" name="fName" class="input name-input" placeholder="First name">
        </div>
        <div class="form-group name">
          <label class="label-name" for="fName">Middle Name</label>
          <input type="text" name="mName" class="input name-input" placeholder="Middle name">
        </div>
        <div class="form-group name">
          <label class="label-name" for="fName">Last Name</label>
          <input type="text" name="lName" class="input name-input" placeholder="Last name">
        </div>
      </div>

      <div class="form-groups">
        <div class="form-group contact">
          <label class="label-name" for="contact_number">Contact Number</label>
          <input type="number" name="contact_number" class="input contact-input" placeholder="XXX-XXX-XXXX">
        </div>
        <div class="form-group contact">
          <label class="label-name" for="email_address">Email Address</label>
          <input type="email" name="email_address" class="input contact-input" placeholder="example@gmail.com">
        </div>
      </div>

      <div class="form-groups person">
        <div class="form-group personal">
          <label class="label-name" for="gender">Gender</label>
          <select class="personal-select" name="gender" class="input personal-input">
            <option value="" selected disabled hidden>Choose here</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>

        <div class="form-group personal">
          <label for="birthdate" class="label-name">Birth Date</label>
          <input type="date" class="b-day" name="birthdate">
        </div>

        <div class="form-group personal">
          <label class="label-name" for="status">Status</label>
          <select class="personal-select" name="status" class="input personal-input">
            <option value="" selected disabled hidden>Choose here</option>
            <option value="single">Single</option>
            <option value="married">Married</option>
          </select>
        </div>
      </div>

      <div class="form-groups">
        <div class="form-group contact">
          <label class="label-name" for="house">House#/Street/Brgy.</label>
          <input type="text" name="house" class="input addr1-input" placeholder="#/street/brgy.">
        </div>
        <div class="form-group contact">
          <label class="label-name" for="municipal">Municipality</label>
          <input type="text" name="municipal" class="input addr1-input" placeholder="Municipality">
        </div>
      </div>

      <div class="form-groups">
        <div class="form-group addr2">
          <label class="label-name" for="zip">Zip Code</label>
          <input type="number" name="zip" class="input addr2-input" placeholder="0000">
        </div>
        <div class="form-group addr2">
          <label class="label-name" for="province">Provincial</label>
          <input type="text" name="province" class="input addr2-input" placeholder="Provincial">
        </div>
        <div class="form-group addr2">
          <label class="label-name" for="country">Country</label>
          <input type="text" name="country" class="input addr2-input" placeholder="Country">
        </div>
      </div>
    </form>

    <form action="" method="post" class="educ-info">
      <h4 class="form-title">Educational Information</h4>
      <div class="form-groups">
        <div class="form-group course">
          <label class="label-name" for="course">Course</label>
          <select class="course-select" name="course" class="input course-input">
            <option value="" selected disabled hidden>Choose here</option>
            <option value="bsit">BS Information Technoloy</option>
          </select>
        </div>
        <div class="form-group batch">
          <label class="label-name" for="batch">Batch</label>
          <input type="number" name="batch" class="input batch-input" placeholder="Batch">
        </div>
      </div>
    </form>

    <form action="" method="post" class="employ-info">
      <h4 class="form-title">Employment Information</h4>
      <div class="form-groups">
        <div class="form-group company_name">
          <label class="label-name" for="company_name">Company Name</label>
          <input type="text" name="company_name" class="input company_name-input" placeholder="Company Name">
        </div>
      </div>
      <div class="form-groups">
        <div class="form-group position">
          <label class="label-name" for="position">Position</label>
          <input type="text" name="position" class="input position-input" placeholder="Position">
        </div>
      </div>

      <div class="form-groups">
        <div class="form-group salary-range">
          <label class="label-name" for="salary_range">Salary Range</label>
          <select class="salary-range-select" name="salary_range" class="input salary_range-input">
            <option value="" selected disabled hidden>Choose here</option>
            <option value="0-10,000">0-10,000</option>
            <option value="10,001-50,000">10,001-50,000</option>
            <option value="50,001-100,000">50,001-100,000</option>
            <option value="100,001-200,000">100,001-200,000</option>
            <option value="100,001-200,000">200,001 above</option>
          </select>
        </div>
      </div>
    </form>

    <form action="" method="post" class="acct-info">
      <h4 class="form-title">Registration Account</h4>
      <div class="form-groups">
        <div class="form-group username">
          <label class="label-name" for="username">Username</label>
          <input type="text" name="username" class="input username-input" placeholder="Username">
        </div>
      </div>
      <div class="form-groups">
        <div class="form-group password">
          <label class="label-name" for="password">Password</label>
          <input type="password" name="password" class="input password-input" placeholder="Password">
        </div>
      </div>
      <div class="form-groups">
        <div class="form-group cpassword">
          <label class="label-name" for="cpassword">Confirm Password</label>
          <input type="password" name="cpassword" class="input password-input" placeholder="Confirm Password">
        </div>
      </div>

      <input type="button" value="Register" class="button1 register-btn">
    </form>
  </div>
</div>