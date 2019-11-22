</br>
</br>
</br>

<div class="container">
    <div class="row">
        <h1>Cancel Your Bookings:</h1>
    </div>

    <form name = "venueCancel" method = "POST">
        <div class="col-lg-2">
            <div class="form-group">
                <label for="vID">#Venue ID:</label>
                <input type="text" class="form-control" id="vID" placeholder="e.g 22" name="vID">
            </div>
        </div>

        </br>
        <div class="col-lg-2">
            <button type="submit" class="btn btn-outline-danger">CANCEL</button>
        </div>

    </form>

    <?php
        if(isset ($_POST['vID']))
        {
               if (is_numeric($_POST['vID']))
               {
                $data11 = array
                    (
                    'venue_avail' => 1,
                    'venue_expiry' => "N/A"
                    );
                $this->db->set($data11);
                $this->db->where('venue_id', $_POST['vID']);
                $this->db->update('venue');

                $data12 = array
                    (
                        'booking_notify' => 1
                    );
                $this->db->set($data12);
                $this->db->where('booking_venue_id', $_POST['vID']);
                $this->db->update('booking');
        
                print "</br>
                <div class = 'container'>
                <font color = 'green'> Your booking(s) has been successfully cancelled.! </font>
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
                    <font color = 'red'> Invalid option entered for the Venue Availability.! </font>
                    </div>
                    </br>
                    ";
               }
        }

    ?>

</div>

</br>
</br>

<div class ="container">
    <div row>
        <h1>Your Booked Venues:</h1>
    </div>
    <table class="table table-hover table-striped table-bordered">
        
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Capacity</th>
                <th>Location</th>
                <th>Due On</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                $query = $this->db->get('booking');
                $query2 = $this->db->get('venue');

                foreach ($query->result() as $row)
                {
                    if ($row->booking_user_id == $_SESSION["transfer"] && $row->booking_notify == 0)
                    {
                        foreach ($query2->result() as $row2)
                        {
                            if ($row->booking_venue_id == $row2->venue_id && $row->booking_notify == 0)
                            {
                                echo "<tr>";
                                echo"<td><font color='black'>$row2->venue_id</font></td>";
                                echo"<td><font color='black'>$row2->venue_name</font></td>";
                                echo"<td><font color='black'>$row2->venue_capacity</font></td>";
                                echo"<td><font color='black'>$row2->venue_location</font></td>";
                                echo"<td><font color='red'><b>$row2->venue_expiry</b></font></td>";    
                            }
                        }
                    }
                }   
                
                echo "</tr>";
            ?>
        </tbody>

    </table>    

</div>
