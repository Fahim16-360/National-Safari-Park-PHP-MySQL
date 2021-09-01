<?php
include_once('database/easyConnection.php');

$output = '';
if(isset($_POST["query"])) {
    $search = mysqli_real_escape_string($con, $_POST["query"]);
    $query = "SELECT * FROM booked WHERE book_by LIKE '%".$search."%'
    OR book_email LIKE '%".$search."%' 
    OR book_contact LIKE '%".$search."%' 
    OR book_tracker LIKE '%".$search."%' 
    OR book_departure LIKE '%".$search."%'";

    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0) {
        $output .= '<div class="table-responsive">
            <table class="table table bordered">
                <tr>
                    <th>Booked By</th>
                    <th>Booked Email</th>
                    <th>Booked Number</th>
                    <th>Booked ID</th>
                    <th>Booked Date</th>
                    <th>Booked Address</th>
                </tr>';
    while($row = mysqli_fetch_array($result)) {
        $output .= '<tr>
                        <td>'.$row["book_by"].'</td>
                        <td>'.$row["book_email"].'</td>
                        <td>'.$row["book_contact"].'</td>
                        <td>'.$row["book_tracker"].'</td>
                        <td>'.$row["book_departure"].'</td> 
                        <td>'.$row["book_address"].'</td>
                    </tr>';
                }
    echo $output;
    } else {
        echo 'Data Not Found';
    }
}

?>
