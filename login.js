function createNotice()
{
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block';

}

function login()
{
    document.getElementById('login_light').style.display='block';
    document.getElementById('fade').style.display='block';

}

 
$( init );
 
function init() {
  $('.makeMeDraggable').draggable();
  
 // $('#makeMeDraggable1').draggable();
}

function eventPopup(eventid)
{

  document.getElementById('moreDetails_event_light_'+eventid).style.display='none';
  document.getElementById('event_light_'+eventid).style.display='block';
  document.getElementById('fade').style.display='block';
  //use ajax
  var req = new XMLHttpRequest();
  
  var url ="getEvent.php?eventid="+eventid;
  
  req.onreadystatechange=function()
  {
    if (req.readyState==4 && req.status==200)
    {
        document.getElementById("event_light_"+eventid).innerHTML=req.responseText;
    }
  } 
  req.open("GET", url, true);
  req.send();


}

function mapWidget(address)
{
}

function facebookWidget(facebookPage)
{
}

function twitterWidget(twitteruser, twitterhash)
{
}

function addToCalendar()
{
}

function showMoreEventDetails(eventid)
{

  document.getElementById('event_light_'+eventid).style.display='none';
  document.getElementById('moreDetails_event_light_'+eventid).style.display='block';
  document.getElementById('fade').style.display='block';

  var morebox = document.getElementById('moreDetails_event_light_'+eventid);
  var moredetails_flipbtn = document.getElementById('moredetails_flip');
   
  while (morebox.hasChildNodes()) {
          morebox.removeChild(morebox.lastChild);
  }


  morebox.appendChild(moredetails_flipbtn);
  var req = new XMLHttpRequest();
  
  var url ="getEventDetailsXML.php?eventid="+eventid;
  
  req.onreadystatechange=function()
  {
    if (req.readyState==4 && req.status==200)
    {
        //document.getElementById("moreDetails_event_light_"+eventid).innerHTML=req.responseText;
        var xmlnodes = req.responseXML;
        var title =  xmlnodes.getElementsByTagName("title")[0];
        var desc =  xmlnodes.getElementsByTagName("desc")[0];
        var image = xmlnodes.getElementsByTagName("image")[0];
        var eventstartdate = xmlnodes.getElementsByTagName("eventstartdate")[0];
        var eventstarttime = xmlnodes.getElementsByTagName("eventstarttime")[0];

        var eventenddate = xmlnodes.getElementsByTagName("eventenddate")[0];
        var eventendtime = xmlnodes.getElementsByTagName("eventendtime")[0];

        var place = xmlnodes.getElementsByTagName("place")[0];
        var facebook = xmlnodes.getElementsByTagName("facebook")[0];
        var twitteruser = xmlnodes.getElementsByTagName("twitteruser")[0];
        var twitterhash = xmlnodes.getElementsByTagName("twitterhash")[0];

        var a = document.createElement("div");
        a.innerHTML = title.textContent;
        morebox.appendChild(a);

        a = document.createElement("div");
        a.innerHTML = desc.textContent;
        morebox.appendChild(a);

        a = document.createElement("input");
        a.setAttribute("type","button");
        a.setAttribute("onclick","addToCalendar()");
        a.setAttribute("value", "Add event to calendar");
        morebox.appendChild(a);

        a = document.createElement("div");
        var f = document.createElement("form");
        f.setAttribute("method","POST");
        f.setAttribute("action","sendEmail.php");
        
        var label = document.createElement("label");
        label.innerHTML = "Send me a email remainder: ";
        var i = document.createElement("input");
        i.setAttribute("type","text");
        i.setAttribute("name","emailId");
        var s = document.createElement("input");
        s.setAttribute("type","submit");
        s.setAttribute("value","Send Email");

        f.appendChild(label);
        f.appendChild(i);
        f.appendChild(s);

        a.appendChild(f);
        morebox.appendChild(a);

       a = document.createElement("div");
        a.innerHTML = mapWidget(place.textContent);
        morebox.appendChild(a);

        a = document.createElement("div");
        a.innerHTML = facebookWidget(facebook.textContent);
        morebox.appendChild(a);

        a = document.createElement("div");
        a.innerHTML = twitterWidget(twitteruser.textContent, twitterhash.textContent);
        morebox.appendChild(a); 
 
  
     }

   }
  req.open("GET", url, true);
  req.send();



}



