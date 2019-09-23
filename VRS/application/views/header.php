<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Header.
    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <?php
        session_start();

        $con = new mysqli("localhost","root","","car");

        if($con = mysqli_connect("localhost", "root", "", "car"))
        {
        }

        else
        {
            print "<br/><br/><br/><br/>";
            print "<font color = 'red'> Could not connect to the database. </font>";
        }
    ?>
</head>

<body style="background-color: white;" data-spy="scroll" data-offset="4" data-target=".navbar">
    <div id = "container">
        <nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: black;">
        
            <a class="navbar-brand" href="index.php">
                <img src="indexResources/logo.png" alt="logo" style="width: 100px; height: 50px;">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">  
                <ul class="navbar-nav">
                    
                    <li class="nav-item">
                        <font color="black">~~~</font>
                    </li>

                    <li class="nav-item" style="font-size: 20px; font-weight: bolder;">
                        <a class="nav-link" href="home.php">
                            <?php 
                                $con = new mysqli("localhost","root","","car");
                                $stmt = $con->prepare($sql = "SELECT he1 FROM header"); 
                                $stmt -> execute();
                                $stmt ->bind_result($he1);
                                $stmt ->fetch(); 
                                print"$he1";
                            ?>   
                        </a>
                    </li>

                    <?php
                        if (isset($_SESSION['check']))
                        {
                            $con = new mysqli("localhost","root","","car");
                            $stmt = $con->prepare($sql = "SELECT he2 FROM header"); 
                            $stmt -> execute();
                            $stmt ->bind_result($he2);
                            $stmt ->fetch(); 

                            print"<li class='nav-item'> <font color='black'> ~~~ </font></li>
                                <li class='nav-item' style='font-size: 20px; font-weight: bolder;'>
                                    <a class='nav-link' href='selectmodel.php'> $he2 </a>
                                </li>";
                        }
                    ?>

                    <li class="nav-item">
                        <font color="black">~~~</font>
                    </li>

                    <li class="nav-item" style="font-size: 20px; font-weight: bolder;">
                        <a class="nav-link" href="tech.php">
                            <?php 
                                $con = new mysqli("localhost","root","","car");
                                $stmt = $con->prepare($sql = "SELECT he3 FROM header"); 
                                $stmt -> execute();
                                $stmt ->bind_result($he3);
                                $stmt ->fetch(); 
                                print"$he3";
                            ?>
                        </a>
                    </li>

                    <li class="nav-item">
                        <font color="black">~~~</font>
                    </li>

                    <li class="nav-item" style="font-size: 20px; font-weight: bolder;">
                        <a class="nav-link" href="about.php">
                            <?php 
                                $con = new mysqli("localhost","root","","car");
                                $stmt = $con->prepare($sql = "SELECT he4 FROM header"); 
                                $stmt -> execute();
                                $stmt ->bind_result($he4);
                                $stmt ->fetch(); 
                                print"$he4";
                            ?>
                        </a>
                    </li>

                    <li class="nav-item">
                        <font color="black">~~~</font>
                    </li>

                    <li class="nav-item dropdown" style="font-size: 20px; background-color: brown; font-weight: bolder;">
                        <?php
                            if (isset($_SESSION['check']))
                            {
                            $userA = $_SESSION["transfer"];
                            $con = new mysqli("localhost","root","","car");
                            $stmt = $con->prepare($sql = "SELECT fname FROM userinfo WHERE username = '$userA'"); 
                            $stmt -> execute();
                            $stmt ->bind_result($he5);
                            $stmt ->fetch(); 
                            print"<a class='nav-link dropdown-toggle' href='#'' id='navbardrop' data-toggle='dropdown'> 
                                    Hello, $he5 </a>
                                    <div class='dropdown-menu' style = 'background-color: grey;'>
                                    <a class='dropdown-item' href='profile.php'>Profile</a>
                                    <a class='dropdown-item' href='sessiondelete.php'>Log Out</a>
                                    </div>
                                    ";
                            } 

                            else
                            {
                            $con = new mysqli("localhost","root","","car");
                            $stmt = $con->prepare($sql = "SELECT he5 FROM header"); 
                            $stmt -> execute();
                            $stmt ->bind_result($he5);
                            $stmt ->fetch(); 
                            print"<a class='nav-link' href='landingbay.php'> $he5 </a>";
                            }
                        ?>
                    </li>

                    <li class="nav-item">
                        <font color="black">~</font>
                    </li>


                    <li class="nav-item" style="font-size: 20px; font-weight: bolder;">
                        <a class="nav-link">
                            <?php
                                date_default_timezone_set('America/New_York');
                                
                                print date('l, F j');
                            ?>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>