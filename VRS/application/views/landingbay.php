</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>

<div class="container-fluid">
    <div class="row"> 
        <div class="col-lg-6" style="background-color: white;">
            <h1 class="display-1">Login</h1>
            <p class="lead">Login now to start booking venues.</p>
            
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Login">
                LOGIN
            </button>

            <!-- The Modal -->
            <div class="modal fade" id="Login">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Login</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form name="login" method="POST">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color: brown;"><font color="white">Username:</font></span>
                                    </div>
                                    <input type="text" class="form-control" name="user"/>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color: brown;"><font color="white">Password:</font></span>
                                    </div>
                                    <input type="password" class="form-control" name="pass"/>
                                </div>
                                
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="admin"/>
                                    <label class="custom-control-label" for="customCheck">Are you an Admin?</label>
                                </div>

                                <input type="hidden" name="secret" value="true"/>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" style="background-color: brown;">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6" style="background-color: black;">
            <h1 class="display-1"><font color="white">Register</font></h1>
            <p class="lead"><font color="white">New here.? Click to register.</font></p>
            
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Register">
                REGISTER
            </button>

            <!-- The Modal -->
            <div class="modal fade" id="Register">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Register</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form name="register" method="POST">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color: brown;"><font color="white">First Name:</font></span>
                                    </div>
                                    <input type="text" class="form-control" name="fname">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color: brown;"><font color="white">Last Name:</font></span>
                                    </div>
                                    <input type="text" class="form-control" name="lname">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color: brown;"><font color="white">Age:</font></span>
                                    </div>
                                    <input type="text" class="form-control" name="age">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color: brown;"><font color="white">Email:</font></span>
                                    </div>
                                    <input type="text" class="form-control" name="email">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color: brown;"><font color="white">Enter Username:</font></span>
                                    </div>
                                    <input type="text" class="form-control" name="user2">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color: brown;"><font color="white">Enter Password:</font></span>
                                    </div>
                                    <input type="password" class="form-control" name="pass2">
                                </div>
                                    
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color: brown;"><font color="white">Confirm Password:</font></span>
                                    </div>
                                    <input type="password" class="form-control" name="cpass">
                                </div>
                                
                                <input type="hidden" name="secret2" value="true"/>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" style="background-color: brown;">REGISTER</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
  
    <div class="col-lg-6">
        <?php
            $problem = false;

            if(empty($_POST['user']) && isset($_POST['secret']))
            {
                $problem = true;
                print"<br/><font color='red'>Your username is empty.!</font>";
            }

            if (empty($_POST['pass']) && isset($_POST['secret'])) 
            {
                $problem = true;
                print"<br/><font color='red'>Your password is empty.!</font>";
            }

            if($problem == false && isset($_POST['secret']))
            {   
                if (isset($_POST['admin']) && isset($_POST['secret']))
                {                    
                    $countErr = 0;
                    $countErrB = true;

                    $query = $this->db->get('admin');
                    foreach($query->result() as $row)
                    {    
                        if($row->admin_username == $_POST['user'] && $row->admin_password == $_POST['pass'] && isset($_POST['secret']))
                        {
                            $countErrB = false;
                            $User = $_POST['user'];
                            $_SESSION['transfer'] = $_POST['user'];
                            $_SESSION['check'] = true;
                            print"<br/><font color='blue'>Welcome! You are now logged in as [ADMIN]: $User</font>";
    
                            $sec = "2";
                            header("Refresh: $sec; url=http://localhost/VRS/index.php/homepage");
                        }

                        else
                        {
                            $countErr++;
                        }

                    }

                    if ($countErr > 0 && $countErrB == true)
                    {
                        print"<br/><font color='red'>No such admin found on our database.! Try again.!</font>";
                    }
                }
               
                else
                {
                    $countErr2 = 0;
                    $countErr2B = true;

                    $query2 = $this->db->get('user');
                    foreach($query2->result() as $row2)
                    {
                        if($row2->user_id == $_POST['user'] && $row2->user_pass == $_POST['pass'] && isset($_POST['secret']))
                        {
                            $countErr2B = false;
                            $User = $_POST['user'];
                            $_SESSION['transfer'] = $_POST['user'];
                            $_SESSION['check'] = false;
                            print"<br/><font color='blue'>Welcome! You are now logged in as: $User</font>";

                            $sec = "2";
                            header("Refresh: $sec; url=http://localhost/VRS/index.php/homepage");
                        }

                        else
                        {
                            $countErr2++;
                        }

                    }

                    if ($countErr2 > 0 && $countErr2B == true)
                    {
                        print"<br/><font color='red'>No such user found on our database.! Try again.!</font>";
                    }
                }
            }
        ?>
    </div>


    <div class="col-lg-6">
        <?php
            $problem2 = false;

            if(empty($_POST['fname']) && isset($_POST['secret2']))
            {
                $problem2 = true;
                print"<br/><font color='red'>Your First Name is empty.!</font>";
            }

            if(empty($_POST['lname']) && isset($_POST['secret2']))
            {
                $problem2 = true;
                print"<br/><font color='red'>Your Second Name is empty.!</font>";
            }

            if(empty($_POST['age']) && isset($_POST['secret2']))
            {
                $problem2 = true;
                print"<br/><font color='red'>Your Age is empty.!</font>";
            }

            else if (isset($_POST['secret2']) && !is_numeric($_POST['age']))
            {
                $problem2 = true;
                print"<br/><font color='red'>Only numbers are permitted for age.! Try again.!</font>";
            }

            if(empty($_POST['email']) && isset($_POST['secret2']))
            {
                $problem2 = true;
                print"<br/><font color='red'>Your Email is empty.!</font>";
            }

            if(empty($_POST['user2']) && isset($_POST['secret2']))
            {
                $problem2 = true;
                print"<br/><font color='red'>Your Username is empty.!</font>";
            }

            if(empty($_POST['pass2']) && isset($_POST['secret2']))
            {
                $problem2 = true;
                print"<br/><font color='red'>Your Password is empty.!</font>";
            }

            if(empty($_POST['cpass']) && isset($_POST['secret2']))
            {
                $problem2 = true;
                print"<br/><font color='red'>Your Confirm Password is empty.!</font>";
            }

            else if (isset($_POST['secret2']) && $_POST['cpass'] != $_POST['pass2'] )
            {
                $problem2 = true;
                print"<br/><font color='red'>Your Confirm Password does not match your Password.!</font>";
            }

            if($problem2 == false && isset($_POST['secret2']))
            {
                $data6 = array(
                'user_id' => $_POST['user2'],
                'user_pass' => $_POST['pass2']
                );
                $this->db->insert('user', $data6);

                $data7 = array(
                'userinfo_user_id' => $_POST['user2'],
                'userinfo_email' => $_POST['email'],
                'userinfo_fname' => $_POST['fname'],
                'userinfo_lname' => $_POST['lname'],
                'userinfo_age' => $_POST['age']
                );
                $this->db->insert('userinfo', $data7);


                $User = $_POST['user2'];
                $_SESSION['transfer'] = $_POST['user2'];
                $_SESSION['check'] = false;

                print"<br/><font color='blue'>$User, you are now a member of DMW.!</font>";
                print"<br/><font color='blue'>Welcome! You are now logged in as: $User</font>";

                $sec = "2";
                header("Refresh: $sec; url=http://localhost/VRS/index.php/homepage");
            }
        ?>
    </div>
</div>