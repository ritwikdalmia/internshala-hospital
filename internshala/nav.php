
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<!-- fontawesome icons
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
    <script src="https://kit.fontawesome.com/2715ab056d.js" crossorigin="anonymous"></script>

</head>



        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header mt-4">
                <h3>Team tech wizard</h3>
            </div>

            <ul class="list-unstyled components">
                <p><i class="fa fa-fw fa-home"></i> &nbsp;Home</p>
                <li>
                    <a href="profile.php"><i class="fa fa-fw fa-users"></i>&nbsp;Profile</a>
                </li>
                
                
                <li>
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-fw fa-user"></i>&nbsp;Services</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu1">
                        <li>
                        <a href="welcome.php"><i class="fa fa-fw fa-users"></i>&nbsp;Main Menu </a>
                        </li>
                        <li>
                        <a href="view_application_request.php"><i class="fa fa-regular fa-credit-card"></i>&nbsp;View request</a>
                        </li>
                        <li>
                        <a href="view_request.php"><i class="fa fa-solid fa-piggy-bank"></i>&nbsp;Request Sample</a>
                        </li>
                        
                    </ul>
                </li>


                





                <li>
                    <a href="#"><i class="fa-solid fa-gear"></i>&nbsp;Setting</a>
                </li>
                
            </ul>

            <ul class="list-unstyled CTAs">
                
                <li>
                    <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid ">
                  

                    <button type="button" id="sidebarCollapse" class="btn btn-info mt-0">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <a class="navbar-brand" href="#">user Panel</a>
                    <a class="navbar-brand" href="#"><?php echo $_SESSION['login_username']?></a>
                                            
                          
                         
                        </div>
                      
                   
            
            </nav>

 

        
        <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
 

