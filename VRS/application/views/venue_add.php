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

    <button type="submit" class="btn btn-outline-primary">SUBMIT</button>
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