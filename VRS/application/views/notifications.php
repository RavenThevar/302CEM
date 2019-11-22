</br>
</br>
</br>
</br>

<div class="jumbotron">
    <div class="container">
       
        <h1><font color="#e9ecef">..........................................</font><b><u>NOTIFICATIONS</b></u></h1>
        </br>

        <?php
            $query = $this->db->get('booking');
            $query2 = $this->db->get('venue');

            foreach ($query->result() as $row)
            {
                if($row->booking_user_id == $_SESSION['transfer'])
                {
                    foreach ($query2->result() as $row2)
                    {
                        if ($row->booking_venue_id == $row2->venue_id)
                        {
                            $venueN = $row2->venue_name;
                            $due = $row2->venue_expiry;
                        }
                    }
                        $time = $row->booking_date;
                    
                        if ($row->booking_notify == 0)
                        {
                            echo "<li type='square'>You have booked <font color='green'><b>[$venueN]</b></font> on <font color='green'><b>[$time]</b></font> and it is due on <font color='green'><b>[$due]</b></font> </li></br>";   
                        }

                        else
                        {
                            echo "<li type='square'>You have cancelled <font color='red'><b>[$venueN]</b></font> on <font color='red'><b>[$time]</b></font> </li></br>";
                        }
                    
                }
            }
        ?>

    </div>
</div>
