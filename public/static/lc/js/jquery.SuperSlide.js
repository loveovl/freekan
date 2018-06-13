

$(document).ready(function() {
        $("#bofangyuan").mouseover(function (){  
            $("#bofangyuan").show();  
        }).mouseout(function (){  
            $("#bofangyuan").hide();  
        });  
});  

$(document).ready(function() {
	$(".js-site").click(function() {
	$("#bofangyuan").slideToggle("slow");
	});
});

$(document).ready(function() {
    $("li.menuli").click(function() {
    $("#bofangyuan").css('display','none'); 
    })
});

$(document).ready(function() {
    $("#bofangyuan li").bind("click", function() {
        var e = $(this).index(),
            a = $(".top-list-ji > div");
        $(this).removeClass().addClass("menuli current").siblings().removeClass().addClass("menuli");
		a.fadeToggle(1000);
		a.hide();
        a.eq(e).show()
    })
});
$(document).ready(function() {
    $("#bofangyuan li").bind("click", function() {
        var e = $(this).index(),
            a = $("#button > a");
        $(this).removeClass().addClass("menu_class current").siblings().removeClass().addClass("menu_class");
        a.hide();
        a.eq(e).show()
    })
});


function hideText(e, conLen, str1, str2) {
    textBox = document.getElementById(e);
    if ("" == conText) {
        conText = textBox.innerHTML
    }
    if (navigator.appName.indexOf("Explorer") > -1) {
        if (textBox.innerText.length < conLen) {
            return
        }
        textBox.innerHTML = textBox.innerText.substr(0, conLen)
    } else {
        if (textBox.textContent.length < conLen) {
            return
        }
        textBox.innerHTML = textBox.textContent.substr(0, conLen)
    }
    textBox.innerHTML += '...</div><a class="aShowAll" href="javascript:;" onclick="showText(\'' + e + "','" + conLen + "', '" + str1 + "', '" + str2 + '\');return false" target="_self">展开全部' + str1 + "</a>"
}
function showText(e, conLen, str1, str2) {
    textBox = document.getElementById(e);
    textBox.innerHTML = conText + '</div><a class="aHideAll" href="javascript:;" onclick="hideText(\'' + e + "', '" + conLen + "', '" + str1 + "', '" + str2 + '\');return false" target="_self">收起全部' + str2 + "</a>"
}