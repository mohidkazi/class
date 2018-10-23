<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin Panel</title>
    <!------------------------------------------------------------------------------------------------------------------ -->
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.js"></script>
    <!------------------------------------------------------------------------------------------------------------------ -->
    <!-- Bootstrap CSS CDN -->
    <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style4.css">
    <link rel="stylesheet" href="css/menu.css">
    <!-- Datatable CDN -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!------------------------------------------------------------------------------------------------------------------->
    <!-- jQuery CDN -->
    <!-- <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
        <!-- Popper.JS -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> -->
        <!-- Bootstrap JS -->
        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> -->
        <!-- Datatable Jquery CDN -->
        <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                /*sidebar animation*/
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
                /*menu icon animation*/
                $("#sidebarCollapse").click(function() {
                    $('.wrapper-menu').toggleClass("open");
                });
            //message display none
            $('#dispnone div').click(function(){
                $('#dispnone').fadeOut();
            });
        });
    </script>
</head>

<body style="background-color: #FFFFFF;">

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Hertzsoft Admin</h3>
                <strong>HA</strong>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="index.php" id="dashboard">
                        <i class="fas fa-chart-line"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="dbatch">
                        <i class="fas fa-briefcase"></i>
                        Batch
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="batch.php" id="batch">
                                <i class="fas fa-briefcase"></i>
                                Batch
                            </a>
                        </li>
                        <li>
                            <a href="add-batch.php" id="addbatch">
                                <i class="fas fa-plus-circle"></i>
                                Add New Batch
                            </a>
                        </li>
                        <li>
                            <a href="timetable.php" id="timetable">
                                <i class="fas fa-table"></i>
                                Time Table
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="dfaculty">
                        <i class="fas fa-chalkboard-teacher"></i>
                        Faculty
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="faculty.php" id="faculty">
                                <i class="fas fa-chalkboard-teacher"></i>
                                Faculty
                            </a>
                        </li>
                        <li>
                            <a href="fsalary.php" id="facultysalary">
                                <i class="fas fa-money-bill-alt"></i>
                                Faculty Salary
                            </a>
                        </li>
                        <li>
                            <a href="add-faculty.php" id="addfaculty">
                                <i class="fas fa-plus-circle"></i>
                                Add New Faculty
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#adm" id="dadmission" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-building"></i>
                        Admission
                    </a>
                    <ul class="collapse list-unstyled" id="adm">
                        <li>
                            <a href="admission.php" id="admission">
                                <i class="fas fa-building"></i>
                                Admission
                            </a>
                        </li>
                        <li>
                            <a href="add-admission.php" id="addadmission">
                                <i class="fas fa-plus-circle"></i>
                                Add Admission Detail
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#studentd" id="dstudent" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-user-graduate"></i>
                        Student
                    </a>
                    <ul class="collapse list-unstyled" id="studentd">
                        <li>
                            <a href="student.php" id="student">
                                <i class="fas fa-user-graduate"></i>
                                Student
                            </a>
                        </li>
                        <li>
                            <a href="attendence.php" id="attendence">
                                <i class="fas fa-file-alt"></i>
                                Attendence
                            </a>
                        </li>
                        <li>
                            <a href="add-testmark.php" id="addtestmark">
                                <i class="fas fa-plus-circle"></i>
                                Add Marks
                            </a>
                        </li>
                        <li>
                            <a href="testmark.php" id="testmark">
                                <i class="fas fa-align-right"></i>
                                Test Marks
                            </a>
                        </li>
                        <li>
                            <a href="payment.php" id="payment">
                                <i class="fas fa-money-bill-alt"></i>
                                Fees
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#exp" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="dexpense">
                     <i class="fas fa-keyboard"></i>
                     Expense
                 </a>
                 <ul class="collapse list-unstyled" id="exp">
                    <li>
                        <a href="expense.php" id="expense">
                            <i class="fas fa-money-bill-alt"></i>
                            Expense
                        </a>
                    </li>
                    <li>
                        <a href="add-expense.php" id="add-expense">
                          <i class="fas fa-plus-circle"></i>
                          Add Expense
                      </a>
                  </li>
              </ul>
          </li>
          <li>
            <a href="#ssmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="supportstaff">
             <i class="fas fa-keyboard"></i>
             Support Staff
         </a>
         <ul class="collapse list-unstyled" id="ssmenu">
            <li>
                <a href="staff.php" id="sstaff">
                 <i class="fas fa-keyboard"></i>
                 Support Staff
             </a>
         </li>
         <li>
            <a href="add-staff.php" id="addstaff">
              <i class="fas fa-plus-circle"></i>
              Add Staff
          </a>
      </li>
  </ul>
</li>
</ul>
<!---------------------------------------------------------------->
<div class="btn" id="clob"><a href="logout.php" style="color: black;">logout</a></div>
<ul class="list-unstyled CTAs">
    <li>
        <a href="#" class="download">button</a>
    </li>
    <li>
        <a href="logout.php" class="article">logout</a>
    </li>
</ul>
</nav>

<!-- Page Content  -->
<div id="content">

    <nav class="navbar navbar-expand-lg navbar-dark btn-blue sticky-top">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-light ">
                        <!-- <i class="fas fa-align-left"></i>
                            <span id="toggle">Toggle</span> -->
                            <div class="wrapper-menu">
                              <div class="line-menu half start btn-blue"></div>
                              <div class="line-menu btn-danger"></div>
                              <div class="line-menu half end btn-blue"></div>
                          </div>
                      </button>
                  </div>
              </nav>