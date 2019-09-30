</br>
</br>
</br>

<div class="container">
  <h2>Add Venue - [ADMIN]</h2>
  
  </br>
  
  <form name="venue" method="POST">

    <div class="form-group">
      <label for="email">Venue Name:</label>
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
			'venue_location' => $_POST['vLocation']
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
        <h1> Your Existing Venues - [ADMIN] </h1>
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
                $query2 = $this->db->get('venueavailability');

                foreach ($query->result() as $row)
                {
                    echo "<tr>";
    				echo"<td><font color='black'>$row->venue_id</font></td>";
    				echo"<td><font color='black'>$row->venue_name</font></td>";
    				echo"<td><font color='black'>$row->venue_capacity</font></td>";
                    echo"<td><font color='black'>$row->venue_location</font></td>";

                    $count = $row->venue_id;
                    
                    foreach ($query2->result() as $row2)
                    {
                        if ($count == $row2->venue_id && $row2->venue_avail == 0)
                        {
                            $status = "BOOKED";
                            echo"<td><font color='black'>$status</font></td>";
                        }
        
                        else if ($count == $row2->venue_id && $row2->venue_avail == 1)
                        {
                            $status = "AVAILABLE";
                            echo"<td><font color='black'>$status</font></td>";
                        }
                    }   

                    echo "</tr>";
                }
            ?>
        </tbody>

    </table>    

</div>


