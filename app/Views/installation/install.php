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

                    <h3>Prerequisites</h3>
                    <fieldset>
                        <h2>Check prerequisite</h2>
                        <p class="desc">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
                        <div class="fieldset-content">
                            <div class="prerequisite-status-container" id="prerequisite-status"></div>
                            <div class="prerequisite-container">
                                <ul class="prerequisite-list">
                                    <li id="phpCheck"></li>
                                    <li id="intlCheck"></li>
                                    <li id="mbstringCheck"></li>
                                    <li id="writableFolderCheck"></li>
                                    <li id="publicFolderCheck"></li>
                                </ul>
                            </div>
                        </div>
                    </fieldset>

                    <h3>Application Config</h3>
                    <fieldset>
                        <h2>Application Configuration</h2>
                        <p class="desc">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
                        <div class="fieldset-content">
                            <div class="form-group">
                                <label for="app_name" class="form-label">Application Name</label>
                                <input type="text" name="app_name" id="app_name" />
                            </div>
                            <div class="form-group">
                                <label for="app_url" class="form-label">Application URL</label>
                                <input type="text" name="app_url" id="app_url" />
                                <span class="text-input">Example :<span> http://example.com/</span></span>
                            </div>
                        </div>
                    </fieldset>

                    <h3>Database Config</h3>
                    <fieldset>
                        <h2>Database configuration</h2>
                        <p class="desc">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
                        <div class="fieldset-content">
                            <div class="form-group">
                                <label for="db_host" class="form-label">Database Host</label>
                                <input type="text" name="db_host" id="db_host" value="localhost"/>
                            </div>
                            <div class="form-group">
                                <label for="db_name" class="form-label">Database Name</label>
                                <input type="text" name="db_name" id="db_name" value="fakery"/>
                            </div>
                            <div class="form-group">
                                <label for="db_user" class="form-label">Database User</label>
                                <input type="text" name="db_user" id="db_user" value="root"/>
                            </div>
                            <div class="form-group">
                                <label for="db_pass" class="form-label">Database Password</label>
                                <input type="text" name="db_pass" id="db_pass" />
                            </div>
                            <div class="form-group">
                                <label for="db_port" class="form-label">Database Port</label>
                                <input type="text" name="db_port" id="db_port" value="3306" />
                            </div>
                            <div class="form-group">
                                <button type="button" id="db_test_connect">Test Connection</button>
                                <span id="test_db_status" class="text-input bliking-text"></span>
                            </div>
                        </div>
                    </fieldset>

                    <h3>Terms & Conditions</h3>
                    <fieldset>
                        <h2>Terms of usage</h2>
                        <p class="desc">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
                        <div class="fieldset-content">
                            <div class="terms-container">
                                <h5>What is Lorem Ipsum?</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <h5>Why do we use it?</h5>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                <h5>Where does it come from?</h5>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                            </div>
                            <div>
                                <input class="terms-checkbox" type="checkbox" name="terms_acceptance" id="terms_acceptance" />
                                <label class="terms-checkbox-label" for="terms_acceptance" class="form-label">I hereby agree to the above mentioned terms and conditions.</label>
                            </div>
                        </div>
                    </fieldset>

                    <h3>Install Application</h3>
                    <fieldset>
                        <h2>Installation</h2>
                        <p class="desc">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
                        <div class="fieldset-content">
                            <div class="installation-container">
                                <ul class="prerequisite-list">
                                    <li>
                                        <img class="prerequisite-check-img" src="./assets/images/check-mark.png" alt="">
                                        <span class="prerequisite-check-text">Create .env file</span>
                                    </li>
                                    <li>
                                        <img class="prerequisite-check-img" src="./assets/images/check-mark.png" alt="">
                                        <span class="prerequisite-check-text">Creating database tables</span>
                                    </li>
                                    <li>
                                        <img class="prerequisite-check-img" src="./assets/images/check-mark.png" alt="">
                                        <span class="prerequisite-check-text">Creating admin user</span>
                                    </li>
                                    <li>
                                        <img class="prerequisite-check-img" src="./assets/images/check-mark.png" alt="">
                                        <span class="prerequisite-check-text">Verifying installation</span>
                                    </li>
                                    <li>
                                        <img class="prerequisite-check-img" src="./assets/images/check-mark.png" alt="">
                                        <span class="prerequisite-check-text">Installation Finished</span>
                                    </li>
                                </ul>
                            </div>
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