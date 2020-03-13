<?php
/**
* Template Name: M Dashbord
*
* @package WordPress
* @subpackage visa_visum
* @since Visa 1.0
*/
get_header();?>
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
 <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">

 <div class="dashboard_top">
    <div class="left_logo">
           <a href="#"><img src="/wp-content/uploads/2020/01/travel_image.png" alt="Travel Image"></a>
        </div><!-- end of left_logo-->
        <div class="top_bar">
            <div class="searchbar"><i class="fa fa-search" aria-hidden="true"></i><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ..."></div>
            <div class="right_bar">
                <a href="#" class="notification"><img src="" alt=""></a>
                <a href="#" class="logout"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span> logout</a>
            </div>
        </div><!-- end of top_bar-->
    </div><!-- end of dashboard_top-->

<div class="dashboard">
  
    <div class="left_dash">
        <h5>Navigation</h5>
        <div class="dashboard_menu">
            <a href="#" class="active"><span><i class="fa fa-shopping-cart"></i> </span>Orders</a>
            <a href="#"><span><i class="fa fa-th-large" aria-hidden="true"></i> </span> Statistics</a>
        </div>
    </div>
    <div class="right_dash">
       
        <div class="dash_menu">
            <div class="menu_title">
                <h3>Visum aanvragen:</h3>
            </div>
            <div class="menu-list">
                <ul class="list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Orders</a></li>
                </ul>
            </div>
        </div>
       

        <div class="table-responsive">
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Status</th>
                    <th>Country</th>
                    <th>Date created</th>
                    <th>Visa Type</th>
                    <th>Company</th>
                    <th>Arrival date</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>01</td>
                    <td><a href="#" class="status green">Completed</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>02</td>
                    <td><a href="#" class="status green">send to client</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>mixed</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>03</td>
                    <td><a href="#" class="status green">send to client</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>sunweb</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>04</td>
                    <td><a href="#" class="status green">send to client</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>05</td>
                    <td><a href="#" class="status orange">Submitted</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>sunweb</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>06</td>
                    <td><a href="#" class="status orange">Submitted</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>sunweb</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>07</td>
                    <td><a href="#" class="status red">Action required</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>mixed</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>08</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Travel4Visa</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>09</td>
                    <td><a href="#" class="status purple">Completed</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>11</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>12</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>13</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>14</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>15</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>16</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>17</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>18</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>19</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>20</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>21</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>22</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>23</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>24</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>25</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>26</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>27</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>28</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>29</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>30</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>31</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>32</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>33</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>34</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>35</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>36</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>37</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>38</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>39</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>40</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>41</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>42</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>43</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>44</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>45</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>46</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>47</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>48</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>49</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>50</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>51</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>52</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>53</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>54</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>55</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>56</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>57</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>58</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>59</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>60</td>
                    <td><a href="#" class="status grey">Received</a></td>
                    <td>Rusland</td>
                    <td>26 nov. 2019 19:14</td>
                    <td>E-visa</td>
                    <td>Traveldocs</td>
                    <td>26 nov. 2019 19:14</td>
                    <td><a href="view" class="view">View<i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
            </tbody>
        </table>

</div>
    </div>
</div>



<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"> </script>
<script type="text/javascript">
// Material Design example
jQuery(document).ready(function($) {
    $('#example').DataTable();
} );
</script>
<?php get_footer(); ?>