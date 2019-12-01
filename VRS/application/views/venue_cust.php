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
                <label for="vID9">#Venue ID:</label>
                <input type="text" class="form-control" id="vID9" placeholder="e.g: 22" name="vID9">
            </div>

            <div class="form-group">
                <label for="vE9">#Book Until:</label>
                <input type="text" class="form-control" id="vE9" placeholder="e.g: 12/12/2019" name="vE9">
            </div>
        </div>
        </br>
        <div class="col-lg-2">
            <button type="submit" class="btn btn-outline-primary">BOOK</button>
        </div>

    </form>

    <?php
        if (isset ($_POST["vID9"]))
        {
            if (is_numeric($_POST["vID9"]))
            {
                $data1 = array
                (
                'venue_avail' => 0,
                'venue_expiry' => $_POST["vE9"]
                );
                $this->db->set($data1);
                $this->db->where('venue_id', $_POST["vID9"]);
                $this->db->update('venue');

                $data3 = array
                    (
                    'booking_venue_id' => $_POST["vID9"],
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

            else
            {
                print "</br>
                <div class = 'container'>
                <font color = 'red'> Invalid option entered for the aboved entries!</font>
                </div>
                </br>
                ";

                $page = $_SERVER['PHP_SELF'];
                $sec = "2";
                header("Refresh: $sec; url=$page");
            }
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

     