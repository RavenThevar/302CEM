</br>
</br>
</br>

<div class="container">
  <div class="row">
    <h2>Add Venue - [ADMIN]</h2>
  </div>
  
  </br>
  
  <form name="venue" action= "http://localhost/VRS/index.php/venue" method="POST">

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
        $data2 = array(
			'venue_name' => $_POST['vName'],
			'venue_capacity' => $_POST['vCapacity'],
            'venue_location' => $_POST['vLocation'],
            'venue_avail' => "1"
            );
        $this->db->insert('venue', $data2);

        print "</br>
               <div class = 'container'>
                <font color = 'green'> Your record is successfully added.! </font>
               </div>
              ";
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
            </tr>
        </thead>

        <tbody>
            <?php 
                $query = $this->db->get('venue');

                foreach ($query->result() as $row)
                {
                    echo "<tr>";
    				echo"<td><font color='black'>$row->venue_id</font></td>";
    				echo"<td><font color='black'>$row->venue_name</font></td>";
    				echo"<td><font color='black'>$row->venue_capacity</font></td>";
                    echo"<td><font color='black'>$row->venue_location</font></td>";

                   if ($row->venue_avail == 0)
                    {
                        $status = "BOOKED";
                        echo"<td><font color='black'>$status</font></td>";
                    }
        
                    else if ($row->venue_avail == 1)
                    {
                        $status = "AVAILABLE";
                        echo"<td><font color='black'>$status</font></td>";
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
        <h1>Change Venue Status - [ADMIN]</h1>
    </div>

    <form name = "venueChange" action= "http://localhost/VRS/index.php/venue" METHOD = "POST">
        <div class="col-lg-2">
            <div class="form-group">
                <label for="vID">#Venue ID:</label>
                <input type="text" class="form-control" id="vID" placeholder="e.g 22" name="vID">
            </div>
        </div>

            <div class="form-group; col-lg-3">
                <label for="vStatus">#Venue Availability:</label>
                <input type="text" class="form-control" id="vStatus" placeholder="e.g 0 = Booked , 1 = Available." name="vStatus">
            </div>
        </br>
        <div class="col-lg-2">
            <button type="submit" class="btn btn-primary">ALTER</button>
        </div>

    </form>

    <?php
        if(isset ($_POST['vID']) && isset ($_POST['vStatus']))
        {
            $data3 = array
                (
                'venue_avail' => $_POST['vStatus']
                );
            $this->db->set($data3);
            $this->db->where('venue_id', $_POST['vID']);
            $this->db->update('venue');

            print "</br>
            <div class = 'container'>
             <font color = 'green'> The records has been successfully altered. </font>
            </div>
            </br>
           ";
        }
    ?>

</div>

