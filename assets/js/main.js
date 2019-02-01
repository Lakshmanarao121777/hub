


document.getElementsByClassName("container")[0].style.padding="0 20px 100px 0";
var acc = document.getElementsByClassName("has-dropdown");
for (var i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
}
function openSideNav(){
    $('#sidenavsss').html('<span class="c" onclick="closeSideNav()"> Menu &times; </span>');
    $(".sidebar_left").removeClass(' hidden-sm hide');
}
function closeSideNav(){
    $('#sidenavsss').html('<span class="c" onclick="openSideNav()"> Menu &#9776; </span>');
    $(".sidebar_left").addClass(' hidden-sm hide');
}
function openTopNav(){
    $('#topnavsss').html('<span class="c" onclick="closeTopNav()"> Menu &times; </span>');
    $(".topnav_menu").removeClass(' hidden-sm hide');
}
function closeTopNav(){
    $('#topnavsss').html('<span class="c" onclick="openTopNav()"> Menu &#9776; </span>');
    $(".topnav_menu").addClass(' hidden-sm hide');
}
$(function () { // this replaces document.ready
    $(window).on("load", function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
        $('img').each(function () {
            if (!this.complete || typeof this.naturalWidth == "undefined" || this.naturalWidth == 0) {
                this.src = '../../assets/images/logo.png';
            }
        });
        $("#favicon").attr("href", "../../assets/images/logo.png");
    });
});
function sortTable(n,tables) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById(tables);
    switching = true;
    dir = "asc"; 
    while (switching) {
      switching = false;
      rows = table.rows;
      for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
          if (Number(x.innerHTML) > Number(y.innerHTML)) {
            shouldSwitch = true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
          if (Number(x.innerHTML) < Number(y.innerHTML)) {
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        switchcount ++; 
      } else {
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }
function numberToEnglish(n, custom_join_character) {

    var string = n.toString(),
        units, tens, scales, start, end, chunks, chunksLen, chunk, ints, i, word, words;

    var and = custom_join_character || 'and';

    /* Is number zero? */
    if (parseInt(string) === 0) {
        return 'zero';
    }

    /* Array of units as words */
    units = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];

    /* Array of tens as words */
    tens = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

    /* Array of scales as words */
    scales = ['', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion', 'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quatttuor-decillion', 'quindecillion', 'sexdecillion', 'septen-decillion', 'octodecillion', 'novemdecillion', 'vigintillion', 'centillion'];

    /* Split user arguemnt into 3 digit chunks from right to left */
    start = string.length;
    chunks = [];
    while (start > 0) {
        end = start;
        chunks.push(string.slice((start = Math.max(0, start - 3)), end));
    }

    /* Check if function has enough scale words to be able to stringify the user argument */
    chunksLen = chunks.length;
    if (chunksLen > scales.length) {
        return '';
    }

    /* Stringify each integer in each chunk */
    words = [];
    for (i = 0; i < chunksLen; i++) {

        chunk = parseInt(chunks[i]);

        if (chunk) {

            /* Split chunk into array of individual integers */
            ints = chunks[i].split('').reverse().map(parseFloat);

            /* If tens integer is 1, i.e. 10, then add 10 to units integer */
            if (ints[1] === 1) {
                ints[0] += 10;
            }

            /* Add scale word if chunk is not zero and array item exists */
            if ((word = scales[i])) {
                words.push(word);
            }

            /* Add unit word if array item exists */
            if ((word = units[ints[0]])) {
                words.push(word);
            }

            /* Add tens word if array item exists */
            if ((word = tens[ints[1]])) {
                words.push(word);
            }

            /* Add 'and' string after units or tens integer if: */
            if (ints[0] || ints[1]) {

                /* Chunk has a hundreds integer or chunk is the first of multiple chunks */
                if (ints[2] || !i && chunksLen) {
                    words.push(and);
                }

            }

            /* Add hundreds word if array item exists */
            if ((word = units[ints[2]])) {
                words.push(word + ' hundred');
            }

        }

    }

    return words.reverse().join(' ');

}
function SendToPhp(inp, uri) {
    var k;
    var params;
    for (i = 0; i < inp.length; i++) {
        if (i == 0) { params = 'v' + i + '=' + inp[i]; } else { params = params + '&v' + i + '=' + inp[i]; }
    }
    //var params ='tab='+v1+'&batchno='+v2+'&medicin_name='+v3+'&exp_date='+v4+'&mfg_name='+v5+'&recived='+v6+'&sign_1='+v7+'&remarks='+v8;
    var httpc = new XMLHttpRequest(); // simplified for clarity
    var url = uri;
    httpc.open("POST", url, false); // sending as POST
    httpc.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    httpc.setRequestHeader("Content-Length", inp.length);
    httpc.onreadystatechange = function () {
        if (httpc.readyState == 4 && httpc.status == 200) {
            //alert(httpc.responseText);
            k = httpc.responseText;
        }
    }
    httpc.send(params);
    return k;
}

function datePickerSet(idname, minmax, valDate) {
    $(idname).attr(minmax, valDate);
}

function datepickerCurrentDate() {
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if (month < 10)
        month = '0' + month.toString();
    if (day < 10)
        day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    return maxDate;
}

function selectionListDisplay(id, text) {
    $("#" + id).html(text);
}

function snackbar(text) {
  var y = document.getElementsByClassName("snackbars");
  var z = document.getElementById("snackbars");
  var yz = document.getElementsByClassName("snackbar").length;
  y[0].style.display = "block";
  text += '<span class="closebtn" onclick="this.parentElement.style.display=\'none\';"><span class="fa fa-times"> </span> </span>';
  var isd='snackbar_'+yz;
  z.innerHTML =z.innerHTML+'<div id="'+isd+'" class="snackbar">'+text+' </div>';
  var x = document.getElementById(isd);
  x.style.display = "block";
  for(var i=0;i<=yz;i++){
      setTimeout(function () {
         document.getElementById("snackbar_"+yz).style.display="none"; 
        }, 5000);
  }    
}
function login(usertype) {
    var uname = document.forms[usertype + '_login']['username'].value;
    var passwd = document.forms[usertype + '_login']['password'].value;
    if (usertype == 'emp') {
        utype = 'EMP_LOGIN';
    } else {
        utype = 'STU_LOGIN';
    }

    var values = [utype, uname, passwd];
    var msg = SendToPhp(values, "php/controllers/login.php");
    snackbar(msg);
    window.location.href = "app/"; 
}

function reg_sub(uid, udesignation, dept) {
    var form_data = $(".sub_registrion").serialize();
    var res = (form_data.replace("+", " ")).split("&");
    var values = [];

    for (var i = 0; i <= (res.length + 4); i++) {
        if (i == 0) { values[i] = "register_subjects"; } else if (i == 1) { values[i] = res.length - 2; } else if (i == 2) { values[i] = uid; } else if (i == 3) { values[i] = udesignation; } else if (i == 4) { values[i] = dept; } else {
            values[i] = res[i - 5];
            var ress = values[i].split("=");
            kk = ress[1];
            values[i] = kk.replace("+", " ");
        }
    }
    var msg = SendToPhp(values, "../../php/controllers/AcadamicDepartments.php");
    //alert(msg);
    window.loaction.href = "./";
}

function serachuid(hodDept, hodid, hoddesignation) {
    var idnumber = document.forms['serachid']['searchingid'].value;
    var values = ["Basic_UserDetails", idnumber, hodDept, hodid, hoddesignation];
    var msg = SendToPhp(values, "../../php/controllers/AcadamicDepartments.php");
    selectionListDisplay("sub", msg);
}