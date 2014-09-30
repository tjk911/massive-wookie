
<form class="row" id="inputform" enctype="multipart/form-data" class="well" style="width:300px;">
<label><strong>Name:</strong> <i>marker title</i></label>
<input type="text" class="small-3 columns" placeholder="Required" id="name" name="name" />
<label><strong>Email:</strong> <i>never shared</i></label>
<input type="text" class="small-3 columns" placeholder="Required" id="email" name="email" />
<label><strong>Description:</strong></label>
<input type="text" class="small-3 columns" placeholder="Optional" id="description" name="description" />
<label><strong>Date & Time:</strong></label>
<input id="eventCalendar" type="text" data-date-time />
<input style="display: none;" type="text" id="lat" name="lat" value="'+ e.latlng.lat.toFixed(6)+'" />
<input style="display: none;" type="text" id="lng" name="lng" value="'+ e.latlng.lng.toFixed(6)+'" /><br><br>
<div class="row">
  <div class="small-6 columns center"><button type="button" class="btn small" onclick="insertUser()">Submit</button></div>
</div>
</form>