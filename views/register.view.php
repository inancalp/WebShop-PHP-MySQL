<div class="register-form">
    <h1>Register:</h1>
    <hr>
    <form action="register" method="POST">
        <div class="form-group mb-2">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            
        </div>
        <div class="form-group mb-2">
            <label for="pwd">Password</label>
            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
            <!-- <label for="pwd_retype">Retype Password</label>
            <input type="password" class="form-control" id="pwd_retype" placeholder="Retype Password"> -->
        </div>

        <!-- <div class="form-group mb-2">
            <label for="first_name">Fisrt Name</label>
            <input type="text" class="form-control" id="first_name" placeholder="First Name">
        </div>
        <div class="form-group mb-2">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" placeholder="Last Name">
        </div>
        <div class="form-group mb-2">
            <label for="phone_number">Phone Number</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="123-45-678">
        </div>
        <div class="form-group mb-2">
            <label for="birth_date">Birth Date</label>
            <input type="date" class="form-control" id="birth_date" placeholder="Birth Date">
        </div>
        <div class="form-group mb-2 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <button id="register" name="register" type="submit" class="btn btn-primary">Register</button>
    </form>
</div>