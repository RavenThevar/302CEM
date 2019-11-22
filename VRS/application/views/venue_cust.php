</br>
</br>
</br>

<div class="container">
    <div class="row">
        <h1>Book Venue:</h1>
    </div>

    <form name = "venueCustChange" method = "POST">
        <div class="col-lg-2">
            <div class="form-group">
                <label for="vID">#Venue ID:</label>
                <input type="text" class="form-control" id="vID" placeholder="e.g: 22" name="vID">
            </div>

            <div class="form-group">
                <label for="vE">#Book Until:</label>
                <input type="text" class="form-control" id="vE" placeholder="e.g: 12/12/2019" name="vE">
            </div>
        </div>
        </br>
        <div class="col-lg-2">
            <button type="submit" class="btn btn-outline-primary">BOOK</button>
        </div>

    </form>

    <?php
        if(isset ($_POST['vID']))
        {
            $data1 = array
                (
                'venue_avail' => 0,
                'venue_expiry' => $_POST['vE']
                );
            $this->db->set($data1);
            $this->db->where('venue_id', $_POST['vID']);
            $this->db->update('venue');

            $data3 = array
                (
                'booking_venue_id' => $_POST['vID'],
                'booking_user_id' => $_SESSION["transfer"],
                'booking_notify' => 0
                );
            $this->db->insert('booking', $data3);

            print "</br>
            <div class = 'container'>
             <font color = 'green'> You have successfully booked this venue. </font>
            </div>
            </br>
           ";

            $page = $_SERVER['PHP_SELF'];
            $sec = "2";
            header("Refresh: $sec; url=$page");
        }
    ?>

</div>

</br>
</br>

<div class ="container">
    <div row>
        <h1>Available Venues:</h1>
    </div>
    <table class="table table-hover table-striped table-bordered">
        
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Capacity</th>
                <th>Location</th>
                <th>Availability</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                $query = $this->db->get('venue');

                foreach ($query->result() as $row)
                {
                    if ($row->venue_avail == 1)
                    {
                        echo "<tr>";
                        echo"<td><font color='black'>$row->venue_id</font></td>";
                        echo"<td><font color='black'>$row->venue_name</font></td>";
                        echo"<td><font color='black'>$row->venue_capacity</font></td>";
                        echo"<td><font color='black'>$row->venue_location</font></td>";
                        echo"<td><font color='green'><b>AVAILABLE</b></font></td>";
                    }
                }   
                    echo "</tr>";
            ?>
        </tbody>

    </table>    

</div>

</br>
</br>

     