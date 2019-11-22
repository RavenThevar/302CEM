<?php

    namespace application\views;

    class Names
    {
        public $dub;

        public function set_whether_it_is_a_string($peek)
        {
            $this->dub = $peek;
        }

        public function get_whether_it_is_a_string()
        {
            return $this->dub;
        }

    }

?>

</br>
</br>
</br>

<div class="container">
    <div class="row">
        <h1>Change Venue Status To Available - [ADMIN]</h1>
    </div>

    <form name = "venueChange" method = "POST">
        <div class="col-lg-2">
            <div class="form-group">
                <label for="vID">#Venue ID:</label>
                <input type="text" class="form-control" id="vID" placeholder="e.g 22" name="vID">
            </div>
        </div>

        </br>
        <div class="col-lg-2">
            <button type="submit" class="btn btn-outline-primary">ALTER</button>
        </div>

    </form>

    <?php
        if(isset ($_POST['vID']))
        {
               if (is_numeric($_POST['vID']))
               {
                $data4 = array
                    (
                    'venue_avail' => 1,
                    'venue_expiry' => "N/A"
                    );
                $this->db->set($data4);
                $this->db->where('venue_id', $_POST['vID']);
                $this->db->update('venue');

                $data8 = array
                    (
                        'booking_notify' => 1
                    );
                $this->db->set($data8);
                $this->db->where('booking_venue_id', $_POST['vID']);
                $this->db->update('booking');
        
                print "</br>
                <div class = 'container'>
                <font color = 'green'> The records has been successfully altered. </font>
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
        <h1>Your Existing Venues - [ADMIN]</h1>
    </div>
    <table class="table table-hover table-striped table-bordered">
        
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Capacity</th>
                <th>Location</th>
                <th>Availability</th>
                <th>Booked By (User ID)</th>
                <th>Expires On</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                $query = $this->db->get('venue');
                $query2 = $this->db->get('booking');

                foreach ($query->result() as $row)
                {
                    echo "<tr>";
                
                   if ($row->venue_avail == 0)
                    {
                        echo"<td><font color='red'><b>$row->venue_id</b></font></td>";
                        echo"<td><font color='red'><b>$row->venue_name</b></font></td>";
                        echo"<td><font color='red'><b>$row->venue_capacity</b></font></td>";
                        echo"<td><font color='red'><b>$row->venue_location</b></font></td>";
                        echo"<td><font color='red'><b>BOOKED</b></font></td>";
                        
                        foreach ($query2->result() as $row2)
                        {
                            if ($row->venue_id == $row2->booking_venue_id && $row2->booking_notify == 0)
                            {
                                echo"<td><font color='red'><b>$row2->booking_user_id</b></font></td>";
                            }
                        }

                        echo"<td><font color='red'><b>$row->venue_expiry</b></font></td>";
                    }
        
                    else
                    {
                        echo"<td><font color='green'><b>$row->venue_id</b></font></td>";
                        echo"<td><font color='green'><b>$row->venue_name</b></font></td>";
                        echo"<td><font color='green'><b>$row->venue_capacity</b></font></td>";
                        echo"<td><font color='green'><b>$row->venue_location</b></font></td>";
                        echo"<td><font color='green'><b>AVAILABLE</b></font></td>";
                        echo"<td><font color='green'><b>N/A</b></font></td>";
                        echo"<td><font color='green'><b>$row->venue_expiry</b></font></td>";
                    }
                }   
                    echo "</tr>";
            ?>
        </tbody>

    </table>    

</div>