/*
The MIT License (MIT)

Copyright (c) 2014 Marco Oderkerk (email: app@oderkerk.de)

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
/* Credits for the Images :
 * Image 1406551975_519926-24_Cloud_Fog by Yannick Lung  https://www.iconfinder.com .
 * Image 1406560283_weather-windy by Mister J https://www.iconfinder.com.
 * Image 1406560538_weather-severe-alert New Moon https://www.iconfinder.com.
 * All other images used in this plugib are from Gregor Cresnar https://www.iconfinder.com .
 */
if(typeof pfad != 'undefined'){            
    
    jQuery( document ).ready(function() {
        readDataFromServer();
});
    
     window.setInterval(readDataFromServer, 120000);
     function generateDisplay(ajaxresult)
     {
          var daten=ajaxresult;               
          var lines = daten.split(" ");  
          drawWetterCanvas(lines);
   
     } 
     /**
      * executes a html file download and parses the data to generateDisplay
      * @returns nothing
      */
     function readDataFromServer()
     {
         try{
          jQuery.get(pfad,generateDisplay,type='text');        
      }
      catch(err)
      {
         alert(err.message); 
      }
     }
     jQuery.ajaxSetup({
            error: function(x, e) {

                if (x.status === 0) {
                    jQuery("#owv_daten").text("Check Your Network. It could be that you have no rights to access the file because the admin doesn't allow cross server scripting.");
                } 
                   else if (x.status === 404) {
                 jQuery("#owv_daten").text('Requested URL not found.');

                } else if (x.status === 500) {
                     jQuery("#owv_daten").text('Internel Server Error.');
                }  else {
                     jQuery("#owv_daten").text('Unknow Error.\n' + x.responseText);
                }
            }
        });

     /**
      * Fills the table with life
      * @param {type} line -> actual weather data
      * @returns {undefined}
      */
     function drawWetterCanvas(line)
     {         
         var stationsname=line[32].split("-")[0].replace("_"," ");
         jQuery("#owv_title").text(stationsname);
         var image = getWeatherIcon(line[48],line[49],line[4]);
         jQuery("#owv_image").attr('src', image);
         jQuery("#owv_image").attr('alt', line[49]);
         jQuery("#owv_caption").text(line[49]);
         jQuery("#owv_temp").text(line[4]);
         jQuery("#owv_temp2").text(convertFahrenheitfromCelsius(line[4]));
         jQuery("#owv_baro").text(line[6]);
         jQuery("#owv_baro2").text(converthPaToInHg(line[6]));
         jQuery("#owv_avgspeed").text(convertktsToKmh(line[1]));
         jQuery("#owv_avgspeed2").text(convertktsToMph(line[1]));
         jQuery("#owv_gusts").text(convertktsToKmh(line[2]));
         jQuery("#owv_gusts2").text(convertktsToMph(line[2]));
         jQuery("#owv_winddir").text(line[3]);
         jQuery("#owv_hum").text(line[5]);
         jQuery("#owv_rain").text(line[10]);
         jQuery("#owv_rain2").text(convertMmToInch(line[10]));
         jQuery("#owv_mrain").text(line[11]);
         jQuery("#owv_mrain2").text(convertMmToInch(line[11]));
         jQuery("#owv_drain").text(line[7]);
         jQuery("#owv_drain2").text(convertMmToInch(line[7]));
         var swversion = line[165].substring(1,line[165].lastIndexOf("!"));
         jQuery("#owv_software").text(swversion);
         jQuery("#owv_ts").text((line[74].concat(" ").concat(line[32].split("-")[1])));         
     }
     /**
      * getting the proper Icon for the weather
      * @param {type} iconnr data from clientraw file 
      * @param {type} descr long text description delivered by clientraw.
      * @param {type} temp temperature for inication hot or cold.
      * @returns {String} path to Image 
      */
     function getWeatherIcon(iconnr,descr,temp)
     {   
         var filename;
         switch (iconnr)
         {
             case "0":
             case "5":
             case "28":    
                 if (descr.search("/night.+/") === -1)
                 {
                    if (parseFloat(temp) <=5.0)
                    {
                      filename="/img/1406463107_Black_Cold.png";  
                    }
                    else
                    {
                       if (parseFloat(temp) <= 29.9)
                       {
                         filename="/img/1406463119_Black_Sun.png";
                       }
                       else
                       {
                         filename="/img/1406463118_Black_Hot.png";
                       }
                   }
                 }
                 else
                 {
                   filename="/img/1406463109_Black_Night_Clear.png";
                 }
                 break;
             case "1":
                 filename="/img/1406463109_Black_Night_Clear.png";
                 break; 
             case "2":
             case "3":
                 if (descr.search("/night.+/") === -1)
                 {
                    filename="/img/1406463114_Black_Clouds.png";
                 }
                 else
                 {
                   filename="/img/1406463100_Black_Night_Cloud.png";
                 }
                 break; 
             case "4":
             case "34":
                 filename="/img/1406463100_Black_Night_Cloud.png";
                 break;
             case "6":
             case "10":
             case "11":
             case "7":
             case "18":
                 filename="/img/1406551975_519926-24_Cloud_Fog.png";
                 break;
             case "13":
             case "9":
             case "19":
                 filename="/img/1406463102_Black_Partly_Sunny.png";
                 break;
             case "14":
             case "15":
             case "12":
                 filename="/img/1406463106_Black_Night_Rain.png";
                 break;
             case "8":
                 filename="/img/1406463113_Black_Storm.png";
                 break;  
             case "20":
             case "21":
             case "22":
                 filename="/img/1406463106_Black_Rain.png";
                 break;    
             case "23":
             case "24":
                 filename="/img/1406463115_Black_Sunny_Rain.png";
                 break;        
             case "16":
             case "25":
             case "27":
             case "26":
                 filename="/img/1406463105_Black_Snow.png";
                 break;
             case "17":
             case "29":
             case "30":
             case "31":
                 filename="/img/1406463121_681178-Black_Thunderstorm.png";
                 break;
             case "32":    
                 filename="/img/1406560538_weather-severe-alert.png";
                  break;    
             case "33":
             case "35":    
                 filename="/img/1406560283_weather-windy.png";
                  break;                 
         }
         var scripts = document.getElementsByTagName('script'); 
         var path =" ";
         for (var i=0;i<scripts.length;i++)
         {
              var thisScript =scripts[i];
              var index = thisScript.src.indexOf("odins_weather_viewer.js");
              if (index > 0)
              {
                 path = thisScript.src.substr(0,index-1);
                 i = scripts.length + 1;
              }
         }         
         return (path +filename);
         //return (window.location.protocol + "//" + window.location.host + "/wp-content/plugins/Odins-Weather-Viewer" +filename);
       
     }  
 }
 /**
     * TC · 1,8 + 32
     * @param {type} celsius
     * @returns {Number} fahrenheit
 */
 function convertFahrenheitfromCelsius(celsius)
 {
        return ((parseFloat(celsius) * 1.8) + 32).toFixed(2);
 }
 /**
  * 1 inHg  =  33.8638866667 hPa
  * @param {type} hPa
  * @returns {Number} inHG
  */
 function converthPaToInHg(hPa)
 {
     return ((parseFloat(hPa)/33.8638866667)).toFixed(2);
 }
 /**
  * 1 kts = 1.851999992797778 km/h
  * @param {type} kts
  * @returns {Number} kmh
  */
 function convertktsToKmh(kts)
 {
     return ((parseFloat(kts)* 1.851999992797778  ) ).toFixed(2);
 }
 /**
  * 1 kts = 1.1507794424914133 mp/h
  * @param {type} kts
  * @returns {Number} mp/h
  */
 function convertktsToMph(kts)
 {
     return ((parseFloat(kts)* 1.1507794424914133)).toFixed(2);
 }
    


/**
 * 1 inch = 25.4 mm
 * @param {type} mm
 * @returns {Number} inch
 */
function convertMmToInch(mm)
{
    return ((parseFloat(mm) / 25.4)).toFixed(2);
}
       