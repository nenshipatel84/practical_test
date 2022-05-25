<!DOCTYPE html>
<head>
    <title>Edit Events</title>
</head>
<style>
     .error{
        color: red;
    }
</style>
<body>
    <h3>Edit Events</h3>
    <form method="post" action="{{ url('edit_event') }}/{{$details->id}}" name="edit_events"/>
    @csrf
        <div>
            <label>Event Title : </label>
            <input type="text" name="name" class="form-control" value="{{ $details->event_title}}"/>
        </div>
        <br/>
        <div>
            <label>Event Start Date : </label>
            <input type="date" name="sdate" class="form-control" value="{{ $details->start_date}}"/>
        </div>
        <br/>
        <div>
            <label>Event End Date : </label>
            <input type="date" name="edate" class="form-control" value="{{ $details->end_date}}"/>
        </div>
        <br/>
        
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
$("form[name='edit_events']").validate({
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
 
}
});
})
</script>
