<!DOCTYPE html>
<head>
    <title>Add Events</title>
</head>
<style>
    .pull-right{
        margin-left: 84px;
    }
    .error{
        color: red;
    }
</style>
<body>
    <h3>Add Events</h3>
    <form method="post" action="{{ url('store_event') }}" name="add_events"/>
    @csrf
        <div>
            <label>Event Title : </label>
            <input type="text" name="name" class="form-control"/>
        </div>
        <br/>
        <div>
            <label>Event Start Date : </label>
            <input type="date" name="sdate" class="form-control"/>
        </div>
        <br/>
        <div>
            <label>Event End Date : </label>
            <input type="date" name="edate" class="form-control"/>
        </div>
        <br/>
        <div>
            <label>Recurrence : </label>
            <input type="radio" name="r1" class="form-control"/>Repeat&nbsp;
            <select class="form-control" name="qty">
                <option value="">--Select--</option>
                <option value="1">Every</option>
                <option value="2">Every Other</option>
                <option value="3">Every Third</option>
                <option value="4">Every Fourth</option>
            </select>&nbsp;
            <select class="form-control" name="frequency">
                <option value="">--Select--</option>
                <option value="1">Day</option>
                <option value="2">Week</option>
                <option value="3">Month</option>
                <option value="4">Year</option>
            </select>&nbsp;
            <br/>
            <div class="pull-right">
                <input type="radio" name="r1" class="form-control"/>Repeat on the&nbsp;
                <select class="form-control" name="qty1">
                    <option value="">--Select--</option>
                    <option value="5">First</option>
                    <option value="6">Second</option>
                    <option value="7">Third</option>
                    <option value="8">Fourth</option>
                </select>&nbsp;
                <select class="form-control" name="week_days">
                    <option value="">--Select--</option>
                    <option value="1">Sun</option>
                    <option value="2">Mon</option>
                    <option value="3">Tue</option>
                    <option value="4">Wends</option>
                    <option value="5">Tues</option>
                    <option value="6">Fri</option>
                    <option value="7">Sat</option>

                </select>&nbsp;
                <select class="form-control" name="months">
                    <option value="">--Select--</option>
                    <option value="1">Month</option>
                    <option value="2">3 Months</option>
                    <option value="3">4 Months</option>
                    <option value="4">6 Months</option>
                    <option value="5">Year</option>
                </select>&nbsp;&nbsp;
            </div>
        </div>
       <br/> 
        <input type = "submit" name="submit" value="submit"/>
    </form>
</body>
</html>


<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js" > </script> 
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/additional-methods.min.js" >
</script>
<script>
$(function () {
$("form[name='add_events']").validate({
rules:{
    name: {
        required : true
    },
    sdate: {
        required: true
    },
    edate: {
        required:true
    },
    r1 : {
        required:true
    }
},
messages:{
    name:{
        required : "Please enter event title"
    },
    sdate:{
        required : "Please select event start date"
    },
    edate:{
        required : "Please select event end date"
    },
    r1:{
        required : "Please select any event occurrences"
    }   
}
});
})
</script>
