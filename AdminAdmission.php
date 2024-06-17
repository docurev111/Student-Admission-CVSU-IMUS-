<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width", initial-scale="1.0">
        <title>Admin Dashboard</title>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="css/AdminAdmission.css">
        <link rel="stylesheet" href="css/Admintemp.css">
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css"/>
        
    </head>
    <body>
        <div class="sidebar">
            <div class="top">
                <div class="logo">
                    <i class='bx bxs-cog' style="padding-right: 10px;"></i>
                    <span>Admission System</span>
                </div>
                <i class="bx bx-menu" id="btn" style="font-size: 2rem;"></i>
            </div>
            <div class="user">
                <p>Admin Name</p>
            </div>
            <ul>
                <li>
                    <a href="AdminDashboard.html">
                        <i class='bx bxs-home'></i>
                        <span class="nav-item">Home</span>
                    </a>
                    <span class="tooltip">Home</span>
                </li>
                <li>
                    <a href="AdminAdmission.html">
                        <i class='bx bxs-file-blank'></i>
                        <span class="nav-item">Admission</span>
                    </a>
                    <span class="tooltip">Admission</span>
                </li>
                </li>
                <li>
                    <a href="AdminAnnouncement.html">
                        <i class='bx bxs-bell-ring'></i>
                        <span class="nav-item">Announcement</span>
                    </a>
                    <span class="tooltip">Announcement</span>
                </li>   
                <li>
                    <a href="">
                        <i class='bx bxs-exit' ></i>
                        <span class="nav-item">Logout</span>
                    </a>
                    <span class="tooltip">Logout</span>
                </li>
            </ul>
        </div>
        
        <div class="main-content">
            <div class="tophead">
                <div class="toplogo">
                    <img src="images/cvsulogo.png" style="width: 50px; height: 50px;">
                    <H2 style="color: white;">CvSU Imus</H2>
                </div>
            </div>
                <div class="container">
                    <p style="font-size: 20px; font-weight: bold; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; margin: 10px 0px 10px 22px ;">Admissions</p>
                    <div class="white-container">

                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jane Doe</td>
                                <td>Software Engineer</td>
                                <td>San Francisco</td>
                                <td>29</td>
                                <td>2015-03-15</td>
                                <td>$120,000</td>
                            </tr>
                            <tr>
                                <td>John Smith</td>
                                <td>Project Manager</td>
                                <td>New York</td>
                                <td>34</td>
                                <td>2012-07-23</td>
                                <td>$110,000</td>
                            </tr>
                            <tr>
                                <td>Alice Johnson</td>
                                <td>UX Designer</td>
                                <td>Chicago</td>
                                <td>41</td>
                                <td>2018-10-30</td>
                                <td>$95,000</td>
                            </tr>
                            <tr>
                                <td>Robert Brown</td>
                                <td>Data Scientist</td>
                                <td>Boston</td>
                                <td>27</td>
                                <td>2019-06-12</td>
                                <td>$135,000</td>
                            </tr>
                            <tr>
                                <td>Emily Davis</td>
                                <td>Product Manager</td>
                                <td>Seattle</td>
                                <td>32</td>
                                <td>2017-11-08</td>
                                <td>$105,000</td>
                            </tr>
                            <tr>
                                <td>Michael Wilson</td>
                                <td>DevOps Engineer</td>
                                <td>Austin</td>
                                <td>35</td>
                                <td>2016-04-20</td>
                                <td>$115,000</td>
                            </tr>
                            <tr>
                                <td>Sarah Lee</td>
                                <td>Marketing Specialist</td>
                                <td>Denver</td>
                                <td>30</td>
                                <td>2013-09-05</td>
                                <td>$90,000</td>
                            </tr>
                            <tr>
                                <td>David Martinez</td>
                                <td>Sales Manager</td>
                                <td>Los Angeles</td>
                                <td>45</td>
                                <td>2010-02-14</td>
                                <td>$125,000</td>
                            </tr>
                            <tr>
                                <td>Anna Taylor</td>
                                <td>HR Specialist</td>
                                <td>Miami</td>
                                <td>28</td>
                                <td>2020-01-21</td>
                                <td>$85,000</td>
                            </tr>
                            <tr>
                                <td>James Anderson</td>
                                <td>CTO</td>
                                <td>Atlanta</td>
                                <td>48</td>
                                <td>2009-05-17</td>
                                <td>$200,000</td>
                            </tr>
                            <tr>
                                <td>Sarah Lee</td>
                                <td>Marketing Specialist</td>
                                <td>Denver</td>
                                <td>30</td>
                                <td>2013-09-05</td>
                                <td>$90,000</td>
                            </tr>
                            <tr>
                                <td>David Martinez</td>
                                <td>Sales Manager</td>
                                <td>Los Angeles</td>
                                <td>45</td>
                                <td>2010-02-14</td>
                                <td>$125,000</td>
                            </tr>
                            <tr>
                                <td>Anna Taylor</td>
                                <td>HR Specialist</td>
                                <td>Miami</td>
                                <td>28</td>
                                <td>2020-01-21</td>
                                <td>$85,000</td>
                            </tr>
                            <tr>
                                <td>James Anderson</td>
                                <td>CTO</td>
                                <td>Atlanta</td>
                                <td>48</td>
                                <td>2009-05-17</td>
                                <td>$200,000</td>
                            </tr>
                            <tr>
                                <td>Sarah Lee</td>
                                <td>Marketing Specialist</td>
                                <td>Denver</td>
                                <td>30</td>
                                <td>2013-09-05</td>
                                <td>$90,000</td>
                            </tr>
                            <tr>
                                <td>David Martinez</td>
                                <td>Sales Manager</td>
                                <td>Los Angeles</td>
                                <td>45</td>
                                <td>2010-02-14</td>
                                <td>$125,000</td>
                            </tr>
                            <tr>
                                <td>Anna Taylor</td>
                                <td>HR Specialist</td>
                                <td>Miami</td>
                                <td>28</td>
                                <td>2020-01-21</td>
                                <td>$85,000</td>
                            </tr>
                            <tr>
                                <td>James Anderson</td>
                                <td>CTO</td>
                                <td>Atlanta</td>
                                <td>48</td>
                                <td>2009-05-17</td>
                                <td>$200,000</td>
                            </tr>
                            <tr>
                                <td>Sarah Lee</td>
                                <td>Marketing Specialist</td>
                                <td>Denver</td>
                                <td>30</td>
                                <td>2013-09-05</td>
                                <td>$90,000</td>
                            </tr>
                            <tr>
                                <td>David Martinez</td>
                                <td>Sales Manager</td>
                                <td>Los Angeles</td>
                                <td>45</td>
                                <td>2010-02-14</td>
                                <td>$125,000</td>
                            </tr>
                            <tr>
                                <td>Anna Taylor</td>
                                <td>HR Specialist</td>
                                <td>Miami</td>
                                <td>28</td>
                                <td>2020-01-21</td>
                                <td>$85,000</td>
                            </tr>
                            <tr>
                                <td>James Anderson</td>
                                <td>CTO</td>
                                <td>Atlanta</td>
                                <td>48</td>
                                <td>2009-05-17</td>
                                <td>$200,000</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>
                    </table>

                    
                        <!-- jQuery -->
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <!-- Bootstrap JS -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
                        <!-- DataTables JS -->
                        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
                        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
                    
                        <script>
                            new DataTable('#example', {
                            paging: false,
                            scrollCollapse: true,
                            scrollY: '57vh'
                    });
                        </script>
                    </div>
                    
                </div>
        </div>
    </body>

    <script>
        let btn = document.querySelector('#btn')
        let sidebar = document.querySelector('.sidebar')

        btn.onclick = function () {
            sidebar.classList.toggle('active');
        };
    </script>
</html>