var routeSwitch = false;
var viewportWidth = $(window).width();
var viewportHeight = $(window).height();


(function($) {
    $.fn.parallax = function(options) {
        var windowHeight = $(window).height();

        // Establish default settings
        var settings = $.extend({
            speed        : 0.15
        }, options);
        // Iterate over each object in collection
        return this.each( function() {
            // Save a reference to the element
            var $this = $(this);
            // Set up Scroll Handler
            $(document).scroll(function(){
                console.log(viewportWidth+ " x " + viewportHeight);
                viewportWidth = $(window).width();
                viewportHeight = $(window).height();
                var scrollTop = $(window).scrollTop();
                var offset = $this.offset().top;
                var height = $this.outerHeight();
                // Check if above or below viewport
                if (offset + height <= scrollTop || offset >= scrollTop + windowHeight) {
                return;
                }
                var yBgPosition = Math.round((offset - scrollTop) * settings.speed);
                // Apply the Y Background Position to Set the Parallax Effect

                if(viewportHeight > viewportWidth){
                    $this.css('background-position', 'center  ' + yBgPosition + 'px');  
                }
                else{
                    $this.css('background-position', '100% ' + yBgPosition + 'px');            
                }
            });
        });
    }

}

(jQuery));


$(window).on("orientationchange",function() {

    viewportWidth = $("body").innerWidth();
    viewportHeight = $("body").innerHeight();
    $('#landing').removeAttr( 'style' );
});

$(document).ready(function(){

      $('.slider-wrapper').slick({
        prevArrow : $('.prev'),
        nextArrow : $('.next'),
        touchMove: true,
        adaptiveHeight: true,
        touchThreshold: 3
    });



dataset = {club:[
            {"id":0, "name": "B&auml;renzwinger" ,"color":"245,132,102", "last_bus":[ "00","54" ],
                "bus_time": [
                    { "hour" : "18", "minute" : ["44", "54"]}, 
                    { "hour" : "19", "minute" : ["04", "14", "24", "34", "44", "54"]}, 
                    { "hour" : "20", "minute" : ["04", "14", "24", "34", "44"]}], 
                },

            {"id":1, "name": "CountDown" ,"color":"242,112,90", "last_bus":[ "01","00" ],
                "bus_time": [ 
                    { "hour" : "18", "minute": ["50"]},
                    { "hour" : "19", "minute": ["00", "10", "20", "30", "40", "50"]},
                    { "hour" : "20", "minute": ["00", "10", "20", "30", "40", "50"]}], 
                },

            {"id":2, "name": "Borsi 34" ,"color":"240,91,78", "last_bus":[ "00","00" ],
                "bus_time": [
                    { "hour" : "18", "minute": ["50"]}, 
                    { "hour" : "19", "minute": ["00", "10", "20", "30", "40", "50"]}, 
                    { "hour" : "20", "minute": ["00"]}],
                },

            {"id":3, "name": "Traumt&auml;nzer" ,"color":"238,64,61","last_bus":[ "01","14" ],
                "bus_time": [
                    { "hour" : "18", "minute": ["49", "59"]},
                    { "hour" : "19", "minute": ["09", "19", "29", "39", "49", "59"]},
                    { "hour" : "20", "minute": ["09"]}], 
                },
            
            {"id":4, "name": "Kino im Kasten" ,"color":"218,49,62", "last_bus":[ "01","18" ],
                "bus_time": [ 
                    { "hour" : "18", "minute": ["43", "53"]},
                    { "hour" : "19", "minute": ["03", "13", "23", "33", "43", "53"]},
                    { "hour" : "20", "minute": ["03", "13"]}],
                },
            
            {"id":5, "name": "Wu5" ,"color":"200,36,63", "last_bus":[ "01","18" ],
                "bus_time": [ 
                    { "hour" : "18", "minute": ["43", "53"]},
                    { "hour" : "19", "minute": ["03", "13", "23", "33", "43", "53"]}, 
                    { "hour" : "20", "minute": ["03", "13"]}],
                },
            
            {"id":6, "name": "H&auml;ngeMathe" ,"color":"166,34,63", "last_bus": [ "01","25" ], 
                "bus_time": [
                    { "hour" : "18", "minute": ["40", "50"]}, 
                    { "hour" : "19", "minute":  ["00", "10", "20", "30", "40", "50"]},
                    { "hour" : "20", "minute":  ["00", "10", "20"]}],
                },
            
            {"id":7, "name": "Club 11","color":"151,27,69", "last_bus":[ "01","27" ],
                "bus_time": [ 
                    { "hour" : "18", "minute": ["42", "52"]},
                    { "hour" : "19", "minute": ["02", "12", "22", "32", "42", "52"]},
                    { "hour" : "20", "minute": ["02", "12", "22"]}],
                },
            
            {"id":8, "name": "Heinrich-Cotta-Club" ,"color":"124,24,63","last_bus":[ "00","34" ], 
                "bus_time": [ 
                     { "hour" : "18", "minute":["44", "54"]}, 
                     { "hour" : "19", "minute":["04", "14", "24", "34", "44", "54"]}, 
                     { "hour" : "20", "minute":["04", "14", "24"]} ],  
                },
            
            {"id":9, "name": "Gutzkowclub" ,"color":"104,17,58", "last_bus":[ "00","39" ], 
                "bus_time": [ 
                     { "hour" : "18", "minute":["39", "49", "59"]}, 
                     { "hour" : "19", "minute":["09", "19", "29", "39", "49", "59"]}, 
                     { "hour" : "20", "minute":["09", "19", "29"]} ],
                },
            
            {"id":10, "name": "Club Mensa" ,"color":"86,8,52", "last_bus":[ "00","41" ], 
                "bus_time": [ 
                     { "hour" : "18", "minute":["41", "51"]}, 
                     { "hour" : "19", "minute":["01", "11", "21", "31", "41", "51"]}, 
                     { "hour" : "20", "minute":["01", "11", "21", "31"]} ],  
                },
            
            {"id":11, "name": "GAG 18" ,"color":"70,25,52", "last_bus":[ "00","44" ], 
                "bus_time": [ 
                     { "hour" : "18", "minute":["34", "44", "54"]}, 
                     { "hour" : "19", "minute":["04", "14", "24", "34", "44", "54"]}, 
                     { "hour" : "20", "minute":["04", "14", "24", "34"]} ],  
                },
            
            {"id":12, "name": "Novitatis" ,"color":"64,32,55", "last_bus":[ "00","46" ],  
                "bus_time": [ 
                     { "hour" : "18", "minute":["36", "46", "56"]}, 
                     { "hour" : "19", "minute":["06", "16", "26", "36", "46", "51"]}, 
                     { "hour" : "20", "minute":["06", "16", "26", "36"]} ], 
                },
            
            {"id":13, "name": "Aquarium" ,"color":"52,33,52", "last_bus":[ "00","54" ], 
                "bus_time": [ 
                     { "hour" : "18", "minute":["41", "51"]}, 
                     { "hour" : "19", "minute":["01", "11", "21", "31", "41", "51"]}, 
                     { "hour" : "21", "minute":["01", "11", "21", "31", "41"]} ],  
                },
            ],}

for (var i = 0; i < dataset.club.length; i++){

    var sGenerateLabel = "<a style='color:rgb("+ dataset.club[i].color +")'>"+dataset.club[i].name+"</a>";
    var sGenerateNumber = "<span class='number' style='border-color:rgb("+dataset.club[i].color+");color:rgb("+dataset.club[i].color+")'>" + (i+1) + "</span>";
    var colNum = 0;
	

    //<div class='clubsign' id='row" + i "'><span class='number'>sGenerateNumber</span><span class='label'>sGenerateLabel</span></div>

    $(".list").append("<div class='row' id='r" + i + "'><div class='sction group'><div class='col span_1_of_11 '></div><div class='col span_8_of_11 '><span class='number'>" + (i+1) + "</span><span class='label'>" + dataset.club[i].name + "</span></div><div class='col span_1_of_11 closeicon'><div class='open-close-button' style='background-color:"+dataset.club[i].color+"'></div></div><div class='col span_1_of_11 '></div></div>");
	$("#r"+ i).css("background","rgb("+dataset.club[i].color+")");

    $("#r"+ i).append("<div class='section group white offsetLight departurelist'><div class='col span_1_of_11 '></div><div class='col span_2_of_11 lastD'></div><div class='col span_4_of_11 fhour'></div><div class='col span_3_of_11 shour'></div><div class='col span_1_of_11 '></div></div>");

    $( "#r"+ i +" .departurelist .lastD").append("<hr class='white thin'><span class='hour'>"+ dataset.club[i].last_bus[0] + ":" + dataset.club[i].last_bus[1] +"</span><p>f&auml;hrt der letzte Bus an dieser Haltestelle!</p>");

   for (var j = 0; j < dataset.club[i].bus_time.length; j++){
        var col = "fhour"
        if(j%2) col ="shour"
         
            $( "#r"+ i +" .departurelist ."+ col).append("<div class='dRow dR"+j+"'><hr class='white thin'><span class='hour'>"+dataset.club[i].bus_time[j].hour+":</span><span class='minute'></span></div>"); 
             for (var k = 0; k < dataset.club[i].bus_time[j].minute.length; k++){
                $( "#r"+ i +" .group ."+col+" .dR"+j+" .minute").append("<div>"+dataset.club[i].bus_time[j].minute[k]+"</div>");
             }

             if(j == dataset.club[i].bus_time.length-1)
                $( "#r"+ i +" .group ."+col+" .dR"+j+" .minute").append("<div><p>Danach aller<br> 5 Minuten</p></div>"); 
    }


    if((i>=5) && (i<10)) colNum = 1;
    

    if(i > 9) colNum = 2;

    $(".col_" + colNum).append("<div class='clublabel' id='row" + i + "'>" + sGenerateNumber + "<span class='label underline'>" + sGenerateLabel + "</span></div>");
};


$("#busplan").click(function(e) {
  $(".bus-open").toggleClass("open");
if(routeSwitch){
	routeSwitch = false;
	$("#busplan").animate({height: "100px"},400, 'easeInOutCirc');
	$("#imgRoute").animate({opacity:"0"},500);
 }
 else {
 	routeSwitch = true;
	var $selector = $('#busplan');
	$selector.data('oHeight',$selector.height()).css('height','auto').data('nHeight',$selector.height()).height($selector.data('oHeight')).animate({height: $selector.data('nHeight')},400, 'easeInOutCirc');

	$("#imgRoute").animate({opacity:"1"},500);
 }

});


 	$(".row").click(function(event){   
        $(this).toggleClass("open");
        if( $(this).find(".open-close-button").hasClass("listopen"))
        $(this).find(".closeicon").animate({opacity:"0"},500);
    
        else
            $(this).find(".closeicon").animate({opacity:"1"},500);
        
        $(this).find(".open-close-button").toggleClass("listopen");
    });


    $('#landing').parallax({
    speed : 0.4
    });

    $('#drinkImg').parallax({
    speed : 0.3
    });

    $(".navIcon").click(function() {
        $(".naviconUpper").toggleClass("on");
        $(".innerNavicon").toggleClass("on");
        $(".naviconLower").toggleClass("on");
        $(".nav").toggleClass("navOn");
        $(".navlabel").toggleClass("spanOff");
    });


    $(".scroll").click(function(event){     
        event.preventDefault();
        $('html,body').animate({scrollTop:($(this.hash).offset().top)-120}, 500,'easeInOutCirc');
    });

    $(".whiteArrow").click(function(event){     
        event.preventDefault();
        $('html,body').animate({scrollTop:($("#info").offset().top)-70}, 500,'easeInOutCirc');
    });

    $(".darkArrow").click(function(event){     
        event.preventDefault();
        $('html,body').animate({scrollTop:($("#programmSlider").offset().top)-70}, 500,'easeInOutCirc');
    });

    $(".clublabel").click(function(){
        var eID = this.id;
        var slideNum;
        if(eID < 10) {
            slideNum = eID.substring(3,5);
        }
        else {
            slideNum = eID.substring(3,6);
        }
        $('html,body').animate({scrollTop:($(".slider-wrapper").offset().top)-viewportHeight/2}, 500,'easeInOutCirc');

        $(".slider-wrapper").slick('slickGoTo', slideNum);
    });

});


