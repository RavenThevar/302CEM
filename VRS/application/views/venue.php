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
    <h2>Add Venue - [ADMIN]</h2>
  </div>
  
  </br>
  
  <form name="venue" method="POST">

    <div class="form-group">
      <label for="vName">Venue Name:</label>
      <input type="text" class="form-control" id="vName" placeholder="e.g Mrs Wedding Hall" name="vName">
    </div>

    <div class="form-group">
      <label for="vCapacity">Venue Capacity:</label>
      <input type="text" class="form-control" id="vCapacity" placeholder="e.g 100" name="vCapacity">
    </div>

    <div class="form-group">
      <label for="vLocation">Venue Location:</label>
      <input type="text" class="form-control" id="vLocation" placeholder="e.g Groove Street" name="vLocation">
    </div>

    <button type="submit" class="btn btn-primary">SUBMIT</button>
  </form>

</div>

<?php
    if( isset($_POST['vName']) && isset($_POST['vCapacity']) && isset($_POST['vLocation']) )
    {
        if(is_numeric($_POST['vCapacity']))
        {
            $data2 = array(
                'venue_name' => $_POST['vName'],
                'venue_capacity' => $_POST['vCapacity'],
                'venue_location' => $_POST['vLocation'],
                'venue_avail' => "1",
                'venue_expiry' => "N/A"
                );
            $this->db->insert('venue', $data2);

            print "</br>
                <div class = 'container'>
                    <font color = 'green'> Your record is successfully added.! </font>
                </div>
                ";
        }

        else
        {
            print "</br>
            <div class = 'container'>
                <font color = 'red'> Only numeric is permitted for Venue Capacity.! </font>
            </div>
            ";
        }

        $page = $_SERVER['PHP_SELF'];
        $sec = "2";
        header("Refresh: $sec; url=$page");
    }
?>

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
                            if ($row->venue_id == $row2->booking_venue_id)
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
            <button type="submit" class="btn btn-primary">ALTER</button>
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
                
                $this->db->select('booking_user_id');
                $this->db->where('booking_venue_id', $_POST['vID']);
                $this->db->delete('booking');
        
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

