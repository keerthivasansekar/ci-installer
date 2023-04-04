<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="./assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="./assets/vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <div class="main">

        <div class="container">
            <form method="POST" id="signup-form" class="signup-form" action="#">
                <div>
                    <h3>General info</h3>
                    <fieldset>
                        <h2>General information</h2>
                        <p class="desc">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
                        <div class="fieldset-content">
                            <div class="logo-container">
                                <img src="./assets/images/dummy-company.png" alt="Dummy Logo" class="logo" />
                            </div>
                            <div class="intro-container">
                                <h5>What is Lorem Ipsum?</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <h5>Why do we use it?</h5>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                <h5>Where does it come from?</h5>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                            </div>
                        </div>
                    </fieldset>

                    <h3>Connect Bank Account</h3>
                    <fieldset>
                        <h2>Connect Bank Account</h2>
                        <p class="desc">Please enter your infomation and proceed to next step so we can build your account</p>
                        <div class="fieldset-content">
                            <div class="form-group">
                                <label for="find_bank" class="form-label">Find Your Bank</label>
                                <div class="form-find">
                                    <input type="text" name="find_bank" id="find_bank" placeholder="Ex. Techcombank" />
                                    <input type="submit" value="Search" class="submit">
                                    <span class="form-icon"><i class="zmdi zmdi-search"></i></span>
                                </div>
                            </div>
                            <div class="choose-bank">
                                <p class="choose-bank-desc">Or choose from these popular bank</p>
                                <div class="form-radio-flex">
                                    <div class="form-radio-item">
                                        <input type="radio" name="choose_bank" id="bank_1" value="bank_1" checked="checked" />
                                        <label for="bank_1"><img src="./assets/images/bank-1.jpg" alt=""></label>
                                    </div>

                                    <div class="form-radio-item">
                                        <input type="radio" name="choose_bank" id="bank_2" value="bank_2" />
                                        <label for="bank_2"><img src="./assets/images/bank-2.jpg" alt=""></label>
                                    </div>

                                    <div class="form-radio-item">
                                        <input type="radio" name="choose_bank" id="bank_3" value="bank_3" />
                                        <label for="bank_3"><img src="./assets/images/bank-3.jpg" alt=""></label>
                                    </div>

                                    <div class="form-radio-item">
                                        <input type="radio" name="choose_bank" id="bank_4" value="bank_4" />
                                        <label for="bank_4"><img src="./assets/images/bank-4.jpg" alt=""></label>
                                    </div>

                                    <div class="form-radio-item">
                                        <input type="radio" name="choose_bank" id="bank_5" value="bank_5" />
                                        <label for="bank_5"><img src="./assets/images/bank-5.jpg" alt=""></label>
                                    </div>

                                    <div class="form-radio-item">
                                        <input type="radio" name="choose_bank" id="bank_6" value="bank_6" />
                                        <label for="bank_6"><img src="./assets/images/bank-6.jpg" alt=""></label>
                                    </div>
                                    
                                    <div class="form-radio-item">
                                        <input type="radio" name="choose_bank" id="bank_7" value="bank_7" />
                                        <label for="bank_7"><img src="./assets/images/bank-7.jpg" alt=""></label>
                                    </div>

                                    <div class="form-radio-item">
                                        <input type="radio" name="choose_bank" id="bank_8" value="bank_8" />
                                        <label for="bank_8"><img src="./assets/images/bank-8.jpg" alt=""></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <h3></h3>
                    <fieldset>
                        <h2></h2>
                        <p class="desc"></p>
                        <div class="fieldset-content">
                            
                        </div>
                    </fieldset>

                    <h3></h3>
                    <fieldset>
                        <h2></h2>
                        <p class="desc"></p>
                        <div class="fieldset-content">
                            
                        </div>
                    </fieldset>

                    <h3></h3>
                    <fieldset>
                        <h2></h2>
                        <p class="desc"></p>
                        <div class="fieldset-content">
                            
                        </div>
                    </fieldset>

                    <h3></h3>
                    <fieldset>
                        <h2></h2>
                        <p class="desc"></p>
                        <div class="fieldset-content">
                            
                        </div>
                    </fieldset>
                </div>
            </form>
        </div>

    </div>

    <!-- JS -->
    <script src="./assets/vendor/jquery/jquery.min.js"></script>
    <script src="./assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="./assets/vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="./assets/vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="./assets/vendor/minimalist-picker/dobpicker.js"></script>
    <script src="./assets/vendor/nouislider/nouislider.min.js"></script>
    <script src="./assets/vendor/wnumb/wNumb.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>