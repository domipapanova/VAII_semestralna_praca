<?php
/** @var Array $data */
?>

<section class="vh-100" style="background-color: #BFD9C3;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registrácia</p>

                                <form name="registrationForm"  method="post" class="mx-1 mx-md-4" action="?c=registration&a=store"  onsubmit="return validateRegistration()" >
                                    <p id="main_output" hidden></p>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <p id="firstName_input" hidden></p>
                                            <input type="text" name="firstName" id="form3Example1c" class="form-control"  />
                                            <label class="form-label" for="form3Example1c">Meno</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <p id="lastName_input" hidden></p>
                                            <input type="text" name="lastName" id="form3Example2c" class="form-control" />
                                            <label class="form-label" for="form3Example1c">Priezvisko</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <p id="login_input" hidden></p>
                                            <input type="text" name="login" class="form-control"  />
                                            <label class="form-label" for="form3Example1c">* Login</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <p id="email_input" hidden></p>
                                            <input type="text" name="email" class="form-control" placeholder="name@example.com" />
                                            <label class="form-label" for="form3Example3c">* Email</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <p id="phone_input" hidden></p>
                                            <input type="text" name="phoneNumber" id="form3Example5c" class="form-control" placeholder="+421" />
                                            <label class="form-label" for="form3Example3c">Telefónne číslo</label>
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <p id="pswd_input" hidden></p>
                                            <input type="password" name="password" id="form3Example6c" class="form-control" />
                                            <label class="form-label" for="form3Example4c">* Heslo</label>
                                        </div>
                                    </div>


                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-success">Zaregistruj ma</button>
                                    </div>

                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="./public/images/signup2.webp"
                                     class="img-fluid" alt="Sample image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>