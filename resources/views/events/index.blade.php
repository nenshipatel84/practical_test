<!DOCTYPE html>
<head>
    <title>Add Events</title>
</head>
<body>
    <h3>Event List Page</h3>
    <table class="table table-bodred" border="1">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Dates</th>
            <th>Occurences</th>
            <th>Actions</th>

        </thead>
        @foreach ($events as $event_list)
                <tr>
                    <td>{{ $event_list->id }}</td>
                    <td>{{  $event_list->event_title }}</td>
                    <td>{{  $event_list->start_date }} to {{ $event_list->end_date }}</td>
                    <td>
                        @php
                            //frequency type 
                            if($event_list->frequency == 1) {
                                $frequency = "Day";
                            }else if($event_list->frequency == 2) {
                                $frequency = "Week";
                            }else if($event_list->frequency == 3) {
                                $frequency = "Month";
                            }else if($event_list->frequency == 4) {
                                $frequency = "Year";
                            }else{
                                $frequency = "";
                            }
                            //week days type 
                            if($event_list->week_days == 1) {
                                $days = "Sunday";
                            }else if($event_list->week_days == 2) {
                                $days = "Monday";
                            }else if($event_list->week_days == 3) {
                                $days = "Tuesday";
                            }else if($event_list->week_days == 4) {
                                $days = "Wendsday";
                            }else if($event_list->week_days == 5) {
                                $days = "Thursday";
                            }else if($event_list->week_days == 6) {
                                $days = "Friday";
                            }else if($event_list->week_days == 7) {
                                $days = "Saturday";
                            }else{
                                $days = "";
                            }
                            
                            // months 

                            if($event_list->months == 1) {
                                $month = "Month";
                            }else if($event_list->months == 2) {
                                $month = "3 Months";
                            }else if($event_list->months == 3) {
                                $month = "4 Months";
                            }else if($event_list->months == 4) {
                                $month = "6 months";
                            }else if($event_list->months == 5) {
                                $month = "Year";
                            }else{
                                $month = "";
                            }

                            //qty type
                            if($event_list->qty == 1) {
                                $qty = "Every";
                            }else if($event_list->qty == 2) {
                                $qty = "Every Other";
                            }else if($event_list->qty == 3) {
                                $qty = "Every Third";
                            }else if($event_list->qty == 4) {
                                $qty = "Every Fourth";
                            }else if($event_list->qty == 5) {
                                $qty = "First";
                            }else if($event_list->qty == 6) {
                                $qty = "Second";
                            }else if($event_list->qty == 7) {
                                $qty = "Third";
                            }else if($event_list->qty == 8) {
                                $qty = "Fourth";
                            }else{
                                $qty = "";
                            }
                        @endphp
                        @if($month != "")
                            {{ $qty . " " .$days ." Of". $frequency." ". $month}} 
                        @else
                            {{ $days . " " .$qty ." ". $frequency." ". $month}} 
                        @endif
                    </td>
                    <td>
                        <a href="{{ url("view_event_details") }}/{{ $event_list->id }}"><input type="submit" name="view" value="View"></a>&nbsp;&nbsp;
                        <a href="{{ url("edit_event") }}/{{ $event_list->id }}"><input type="submit" name="edit" value="Edit"></a>&nbsp;&nbsp;
                        <a href="{{ url("delete_event") }}/{{ $event_list->id }}"><input type="submit" name="delete" value="Delete"></a>
                    </td>
                </tr>
        @endforeach
    </table>
</body>
</html>