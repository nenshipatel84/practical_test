<!DOCTYPE html>
<head>
    <title>Event View</title>
</head>
<body>
    <h3>Event View Page</h3>
    <h4>[ {{ $event_name->event_title }}]</h4>
    <table class="table table-bodred" border="1">
        <thead>
            <th>Date</th>
            <th>Day Name</th>
        </thead>
        @foreach ($event_details as $item)
                <tr>
                    @php
                        $date = date("Y-m-d",strtotime($item->created_at));
                        if($item->week_days == 1) {
                                $days = "Sunday";
                            }else if($item->week_days == 2) {
                                $days = "Monday";
                            }else if($item->week_days == 3) {
                                $days = "Tuesday";
                            }else if($item->week_days == 4) {
                                $days = "Wendsday";
                            }else if($item->week_days == 5) {
                                $days = "Thursday";
                            }else if($item->week_days == 6) {
                                $days = "Friday";
                            }else if($item->week_days == 7) {
                                $days = "Saturday";
                            }else if($item->frequency == 1) {
                                $days = "Day";
                            }else if($item->frequency == 2) {
                                $days = "Week";
                            }else if($item->frequency == 3) {
                                $days = "Month";
                            }else if($item->frequency == 4) {
                                $days = "Year";
                            }else{
                                $days = "";
                            }
                    @endphp
                    <td>{{ $date }}</td>
                    <td>{{  $days }}</td>
                   
                </tr>
        @endforeach
    </table>
    <p>Total Recurrence Event : {{ count($event_details) }} </p>
</body>
</html>