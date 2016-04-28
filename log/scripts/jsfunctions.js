$("#loglist").hide();

var layerBoat = null;
var layerBoatctx = null;
var layerCompasheading = null;
var layerCompasheadingctx = null;
var layerWaypoint = null;
var layerWaypointctx = null;
var layerTWD = null;
var layerTWDctx = null;
var layerHeading = null;
var layerHeadingctx = null;

var showMap = false;
var layerCanvasctx = null;
var pingCanvasctx = null;
var layerCanvas = null;
var pingCanvas = null;
var boat = null;
var mainsail = null;
var jib = null;
var rudder = null;
var wind = null;
var compass = null;
var heading = null;

var waypoint = null;
var tacking = null;
var ping = null;
var compasHeading = null;
var trueWindDirection = null;


var vHEADING = 0;
var vWIND = 0;
var vSAIL = 0;
var vRUDDER = 0;
var vWAYPOINT = 0;
var vCTS = 0;
var vTACKING = 0;
var vCompasHeading = 0;
var vTWD =

layerBoat = document.getElementById("layerBoat");
layerBoatctx = layerBoat.getContext("2d");
layerCompasheading = document.getElementById("layerCompasheading");
layerCompasheadingctx = layerCompasheading.getContext("2d");
layerWaypoint = document.getElementById("layerWaypoint");
layerWaypointctx = layerWaypoint.getContext("2d");
layerTWD = document.getElementById("layerTWD");
layerTWDctx = layerTWD.getContext("2d");

layerHeading = document.getElementById("layerHeading");
layerHeadingctx = layerHeading.getContext("2d");
layerCanvas = document.getElementById("layerCanvas");
layerCanvasctx = layerCanvas.getContext("2d");
pingCanvas = document.getElementById("pingCanvas");
pingCanvasctx = pingCanvas.getContext("2d");

ping = new Image();
ping.src = "images/ping.png";
boat = new Image();
boat.src = "images/boat.png";
mainsail = new Image();
mainsail.src = "images/mainsail.png";
jib = new Image();
jib.src = "images/jib.png";
rudder = new Image();
rudder.src = "images/rudder.png";
wind = new Image();
wind.src = "images/windArrow.png";
compass = new Image();
compass.src = "images/compass.png";
heading = new Image();
heading.src = "images/headingArrow.png";
waypoint = new Image();
waypoint.src = "images/waypointArrow.png";
tacking = new Image();
tacking.src = "images/tacking.png";
compasHeading = new Image();
compasHeading.src = "images/compasHeading.png";
trueWindDirection = new Image();
trueWindDirection.src = "images/trueWindDirection.png";

pingCanvasctx.drawImage(ping,0,0);

$(function() {
   $( "#boatDataGps" ).draggable();
   $( "#boatDataCourse" ).draggable();
   $( "#boatDataWindSensor" ).draggable();
   $( "#boatDataSystem" ).draggable();
   $( "#boatDataCompass" ).draggable();
});

$(document).ready(function() {
  document.getElementById("map").disabled = true;
  document.getElementById("map").style.visibility = "hidden";
     var table = $('#datalog').dataTable( {
          "scrollY":          "200px",
          "scrollCollapse":   true,
          "paging":           true,
          "bFilter":           false,
     });

     $("#loglist").show();
});


function hideShowMapBoat() {
 if(showMap == true) {
   document.getElementById("map").disabled = true;
   document.getElementById("map").style.visibility = "hidden";
   document.getElementById("boatCanvas").disabled = false;
   document.getElementById("boatCanvas").style.visibility = "visible";
   showMap = false;
 }
 else{
   document.getElementById("map").disabled = false;
   document.getElementById("map").style.visibility = "visible";
   document.getElementById("boatCanvas").disabled = true;
   document.getElementById("boatCanvas").style.visibility = "hidden";
   showMap = true;
 }
}

function drawBoat() {
      var radians = Math.PI/180;
     var jibdir = 1;
     if (vWIND > 180 && vWIND < 210) {
          jibdir = -1;
     }
     if (vWIND >= 0 && vWIND < 150) {
          jibdir = -1;
     }
     var maindir = 1;
     if (vWIND < 180) {
          maindir = -1;
     }

     layerBoatctx.clearRect(0,0,layerBoat.width,layerBoat.height);
     layerBoatctx.save();
     layerCompasheadingctx.clearRect(0,0,layerCompasheading.width,layerCompasheading.height);
     layerCompasheadingctx.save();
     layerWaypointctx.clearRect(0,0,layerWaypoint.width,layerWaypoint.height);
     layerWaypointctx.save();
     layerTWDctx.clearRect(0,0,layerTWD.width,layerTWD.height);
     layerTWDctx.save();
     layerHeadingctx.clearRect(0,0,layerHeading.width,layerHeading.height);
     layerHeadingctx.save();
     layerCanvasctx.clearRect(0,0,layerCanvas.width,layerCanvas.height);
     layerCanvasctx.save();
     if(vTACKING === 1) {
          layerCanvasctx.drawImage(tacking,0,0);
          layerHeadingctx.drawImage(tacking,0,0);
          layerTWDctx.drawImage(tacking,0,0);
          layerWaypointctx.drawImage(tacking,0,0);
          layerCompasheadingctx.drawImage(tacking,0,0);
          layerBoatctx.drawImage(tacking,0,0);
     }

     layerBoatctx.drawImage(compass,0,0);
     layerBoatctx.translate(layerBoat.width/2, layerBoat.height/2);
     layerCompasheadingctx.drawImage(compass,0,0);
     layerCompasheadingctx.translate(layerTWD.width/2, layerTWD.height/2);
     layerWaypointctx.drawImage(compass,0,0);
     layerWaypointctx.translate(layerTWD.width/2, layerTWD.height/2);
     layerTWDctx.drawImage(compass,0,0);
     layerTWDctx.translate(layerTWD.width/2, layerTWD.height/2);
     layerHeadingctx.drawImage(compass,0,0);
     layerHeadingctx.translate(layerHeading.width/2, layerHeading.height/2);
     layerCanvasctx.drawImage(compass,0,0);
     layerCanvasctx.translate(layerCanvas.width/2, layerCanvas.height/2);

     layerHeadingctx.rotate(vCTS*radians);
     layerHeadingctx.drawImage(heading,-layerCanvas.width/2,-layerCanvas.width/2);

     //true wind direction
     layerTWDctx.rotate(vTWD*radians);
     layerTWDctx.drawImage(trueWindDirection,-layerCanvas.width/2,-layerCanvas.width/2);

     layerWaypointctx.rotate(vWAYPOINT*radians);
     layerWaypointctx.drawImage(waypoint,-layerCanvas.width/2,-layerCanvas.width/2);

     // compas heading
     layerCanvasctx.rotate((vCompasHeading-vWAYPOINT)*radians);
     layerCanvasctx.drawImage(compasHeading,-layerCanvas.width/2,-layerCanvas.width/2);

     layerCanvasctx.rotate((vHEADING-vCompasHeading)*radians);
     layerCanvasctx.drawImage(boat,-layerCanvas.width/2,-layerCanvas.height/2);

     layerCanvasctx.rotate((vWIND)*radians);
     layerCanvasctx.drawImage(wind,-layerCanvas.width/2,-layerCanvas.width/2);

     layerCanvasctx.rotate((maindir*vSAIL-vWIND)*radians);
     layerCanvasctx.drawImage(mainsail,-layerCanvas.width/2,-layerCanvas.width/2);
     layerCanvasctx.rotate((-maindir*vSAIL)*radians);
     layerCanvasctx.translate(0,-layerCanvas.height/6);
     layerCanvasctx.rotate(jibdir*vSAIL*radians);
     layerCanvasctx.drawImage(jib,-layerCanvas.width/2,-layerCanvas.width/2);
     layerCanvasctx.rotate(-jibdir*vSAIL*radians);
     layerCanvasctx.translate(0,(layerCanvas.height/6)+(layerCanvas.height/3.6));
     layerCanvasctx.rotate(vRUDDER*radians);
     layerCanvasctx.drawImage(rudder,-layerCanvas.width/2,-layerCanvas.width/2);

     layerBoatctx.restore();
     layerCompasheadingctx.restore();
     layerWaypointctx.restore();
     layerCanvasctx.restore();
     layerHeadingctx.restore();
     layerTWDctx.restore();

     layerBoat.style.width = 500 + 'px';
     layerBoat.style.height = 500 + 'px';
     layerCompasheading.style.width = 500 + 'px';
     layerCompasheading.style.height = 500 + 'px';
     layerWaypoint.style.width = 500 + 'px';
     layerWaypoint.style.height = 500 + 'px';
     layerTWD.style.width = 500 + 'px';
     layerTWD.style.height = 500 + 'px';
     layerHeading.style.width = 500 + 'px';
     layerHeading.style.height = 500 + 'px';
     layerCanvas.style.width = 500 + 'px';
     layerCanvas.style.height = 500 + 'px';
     pingCanvas.style.width = 500 + 'px';
     pingCanvas.style.height = 500 + 'px';

     $("#pingCanvas").hide().fadeIn(50, function() {
          $("#pingCanvas").fadeOut(350);
     });
}

function updateBoat(data) {
      vHEADING = parseFloat(data.heading);
      vWIND = parseFloat(data.direction);
      vSAIL = parseFloat(data.sail_command_sail);
      vRUDDER = parseFloat(data.rudder_command_rudder);
      vWAYPOINT = parseFloat(data.bearing_to_waypoint);
      vCTS = parseFloat(data.course_to_steer);
      vTACKING = parseFloat(data.cc_tack);
      vCompasHeading = parseFloat(data.heading);
      vTWD = parseFloat(data.true_wind_direction_calc);

     vSAIL = (((vSAIL-3968)/(8000-3968))*60)-60;
     vRUDDER = ((((vRUDDER-3968)/(6912-3968))*90)-45)*-1;
     vWIND = vWIND+180;
     if(vWIND > 360) {
          vWIND = vWIND -360;
     }

}

function map(lati, lon) {
   var latLong = {lat: Number(lati), lng: Number(lon)}
   var mapDiv = document.getElementById("map");
   var map = new google.maps.Map(mapDiv, {
     center: latLong,
     zoom: 14
   });
   var marker = new google.maps.Marker({
     position: latLong,
     map: map,
     title: 'sailingrobots'
   });
}

function getGpsData(data) {
        var dataNames = "";
        var dataValues = "";
        Object.keys(data).forEach(function(key) {
             if(isNaN(key)) {
                  dataNames +="<p>"+key+"</p>";
                  dataValues += "<p>"+data[key]+"</p>";
             }
        });
        $("#dataNameGps").html(dataNames);
        $("#dataValueGps").html(dataValues);
   }

 function getCourse(data) {
         var dataNames = "";
         var dataValues = "";
         Object.keys(data).forEach(function(key) {
              if(isNaN(key)) {
                   dataNames +="<p>"+key+"</p>";
                   dataValues += "<p>"+data[key]+"</p>";
              }
         });
         $("#dataNamesCourse").html(dataNames);
         $("#dataValuesCourse").html(dataValues);
    }

  function getWindsensor(data) {
          var dataNames = "";
          var dataValues = "";
          Object.keys(data).forEach(function(key) {
               if(isNaN(key)) {
                    dataNames +="<p>"+key+"</p>";
                    dataValues += "<p>"+data[key]+"</p>";
               }
          });
          $("#dataNamesWindSensor").html(dataNames);
          $("#dataValuesWindSensor").html(dataValues);
     }
   function getSystem(data) {
           var dataNames = "";
           var dataValues = "";
           Object.keys(data).forEach(function(key) {
                if(isNaN(key)) {
                     dataNames +="<p>"+key+"</p>";
                     dataValues += "<p>"+data[key]+"</p>";
                }
           });
           $("#dataNamesSystem").html(dataNames);
           $("#dataValuesSystem").html(dataValues);
      }
  function getCompas(data) {
          var dataNames = "";
          var dataValues = "";
          Object.keys(data).forEach(function(key) {
               if(isNaN(key)) {
                    dataNames +="<p>"+key+"</p>";
                    dataValues += "<p>"+data[key]+"</p>";
               }
          });
          $("#dataNamesCompass").html(dataNames);
          $("#dataValuesCompass").html(dataValues);
     }



     $(function addRowHandlers() {
          var table = document.getElementById("datalog");
          var rows = table.getElementsByTagName("tr");
          for (i = 0; i < rows.length; i++) {
               var currentRow = table.rows[i];
               var createClickHandler = function(row) {
                    return function() {

                         var data = {
                           sail_command_sail:row.getElementsByTagName("td")[2].innerHTML,
                           rudder_command_rudder:row.getElementsByTagName("td")[3].innerHTML,
                           true_wind_direction_calc:row.getElementsByTagName("td")[7].innerHTML,
                           bearing_to_waypoint:row.getElementsByTagName("td")[17].innerHTML,
                           course_to_steer:row.getElementsByTagName("td")[18].innerHTML,
                           tack:row.getElementsByTagName("td")[19].innerHTML,
                           direction:row.getElementsByTagName("td")[22].innerHTML,
                           heading:row.getElementsByTagName("td")[26].innerHTML,
                         }
                          var gps = {
                              id_gps:row.getElementsByTagName("td")[8].innerHTML,
                              time:row.getElementsByTagName("td")[9].innerHTML,
                              latitude:row.getElementsByTagName("td")[10].innerHTML,
                              speed:row.getElementsByTagName("td")[11].innerHTML,
                              heading:row.getElementsByTagName("td")[12].innerHTML,
                              satellites_used:row.getElementsByTagName("td")[13].innerHTML,
                              longitude:row.getElementsByTagName("td")[14].innerHTML,
                          }
                          var course = {
                            id_course_calculation:row.getElementsByTagName("td")[15].innerHTML,
                            distance_to_waypoint:row.getElementsByTagName("td")[16].innerHTML,
                            bearing_to_waypoint:row.getElementsByTagName("td")[17].innerHTML,
                            course_to_steer:row.getElementsByTagName("td")[18].innerHTML,
                            tack:row.getElementsByTagName("td")[19].innerHTML,
                            going_starboard:row.getElementsByTagName("td")[20].innerHTML,
                          }
                          var windSensor = {
                            id_windsensor:row.getElementsByTagName("td")[21].innerHTML,
                            direction:row.getElementsByTagName("td")[22].innerHTML,
                            speed:row.getElementsByTagName("td")[23].innerHTML,
                            temperature:row.getElementsByTagName("td")[24].innerHTML,
                          }

                          var system = {
                            id_system:row.getElementsByTagName("td")[0].innerHTML,
                            boat_id:row.getElementsByTagName("td")[1].innerHTML,
                            sail_command_sail:row.getElementsByTagName("td")[2].innerHTML,
                            rudder_command_rudder:row.getElementsByTagName("td")[3].innerHTML,
                            sail_servo_position:row.getElementsByTagName("td")[4].innerHTML,
                            rudder_servo_position:row.getElementsByTagName("td")[5].innerHTML,
                          }
                          var compass = {
                            id_compass_model:row.getElementsByTagName("td")[25].innerHTML,
                            heading:row.getElementsByTagName("td")[26].innerHTML,
                            pitch:row.getElementsByTagName("td")[27].innerHTML,
                            roll:row.getElementsByTagName("td")[28].innerHTML,
                          }
                         updateBoat(data);
                         drawBoat();
                         getGpsData(gps);
                         getCourse(course);
                         getWindsensor(windSensor);
                         getSystem(system);
                         getCompas(compass);
                         map(gps.latitude, gps.longitude);
                    };
               };

               currentRow.onclick = createClickHandler(currentRow);
               $("td:first", this).click();
          }
     });

      console.log('              |    |    | \n             )_)  )_)  )_) \n            )___))___))___)\\ \n           )____)____)_____)\\\\ \n         _____|____|____|____\\\\\\\__\n---------\\                   /---------\n  ^^^^^ ^^^^^^^^^^^^^^^^^^^^^\n    ^^^^      ^^^^     ^^^    ^^\n         ^^^^      ^^^');
