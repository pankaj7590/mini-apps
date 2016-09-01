var map = null;
var opListCurrent = null;
var index = -1;

function createOperation (type, data)
{
	var newObject = new Object ();

	newObject.type = type;
	newObject.data = data;

	return newObject;
}

function populateListToParis ()
{
	opListToParis = new Array ();
	opListToParis.push (createOperation ("zoomout", 2));
	opListToParis.push (createOperation ("pan", new google.maps.LatLng(48.856667, 2.350833)));
	opListToParis.push (createOperation ("zoomin", 10));
}

function populateListToShanghai ()
{
	opListToShanghai = new Array ();
	opListToShanghai.push (createOperation ("zoomout", 2));
	opListToShanghai.push (createOperation ("pan", new google.maps.LatLng(31.2, 121.5)));
	opListToShanghai.push (createOperation ("zoomin", 10));
}

var panTimeout = -1;
var zoomInTimeout = -1;
var zoomOutTimeout = -1;

function handlePan (i)
{
	map.panTo (opListCurrent[i].data);
	panTimeout = -1;
	setTimeout ("handleZoomEnd()", 1); // incase we don't get the event
}

function handleZoomOut (i)
{
	map.zoomOut (map.getCenter (), true);
	zoomOutTimeout = -1;
	setTimeout ("handleZoomEnd()", 1); // incase we don't get the event
}

function handleZoomIn (i)
{
	map.zoomIn (map.getCenter (), true);
	zoomInTimeout = -1;
	setTimeout ("handleZoomEnd()", 1); // incase we don't get the event
}

function handleOp ()
{
	if (opListCurrent == null || index < 0 || index >= opListCurrent.length)
	{
		index = -1;
		return;
	}

	switch (opListCurrent[index].type)
	{
		case "zoomout":
			if (map.getZoom () > opListCurrent[index].data) 
			{
				if (zoomOutTimeout == -1) // no callbacks in flight
					zoomOutTimeout = setTimeout ("handleZoomOut (" + index + ")", 500);
				return;
			}
			break;
		case "zoomin":
			if (map.getZoom () < opListCurrent[index].data) 
			{
				if (zoomInTimeout == -1) // no callbacks in flight
					zoomInTimeout = setTimeout ("handleZoomIn (" + index + ")", 500);
				return;
			}
			break;
		case "pan":
			if (map.getCenter ().distanceFrom (opListCurrent[index].data) > 30000)
			{
				if (panTimeout == -1) // no callbacks in flight
					panTimeout = setTimeout ("handlePan (" + index + ")", 500);
				return;
			}
			break;
		default:
			break;
	}

	//document.getElementById("log").innerHTML += "<p>step " + index + "</p>";
	index = index + 1;
}

function handleToParis ()
{
	index = 0;
	opListCurrent = opListToParis;
	handleZoomEnd ();
}

function handleToShanghai ()
{
	index = 0;
	opListCurrent = opListToShanghai;
	handleZoomEnd ();
}


function initialize() {
	//if (GBrowserIsCompatible()) 
	//{
		map = new google.maps.Map(document.getElementById("map"),{
				center: {lat: -34.397, lng: 150.644},
				zoom: 6,
				animatedZoom:true
			});
		//map.enableContinuousZoom ();
		map.setCenter(new google.maps.LatLng(31.2, 121.5), 6);
		//map.setUIToDefault();

		populateListToShanghai ();
		populateListToParis ();
		
		google.maps.event.addListener(map, "zoomend", handleZoomEnd);
		google.maps.event.addListener(map, "moveend", handleMoveEnd); // Triggers marker swap, Esa
	//}
}

function handleZoomEnd ()
{
	//document.getElementById("log").innerHTML += "<p>handleZoomEnd " + index + "</p>";
	if (index >= 0)
		handleOp ();
}

function handleMoveEnd ()
{
	//document.getElementById("log").innerHTML += "<p>handleMoveEnd " + index + "</p>";
	if (index >= 0)
		handleOp ();
}
