<?php  



function query($query)
{
    global $conn;
    $result=mysqli_query($conn,$query);
    $rows=[];
    while($row= mysqli_fetch_assoc($result))
    {
        $rows[]=$row;
    }
    return $rows;
}

function users($id_user)
{
  
     $query="SELECT * FROM users WHERE
        id_user ='$id_user';";
        return query($query);
      
      
}

function times( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return  $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}

?>