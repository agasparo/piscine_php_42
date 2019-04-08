var currEvent;
var full_path = document.location.href;
var name_path = full_path.substring(full_path.lastIndexOf( "/" ) +1 );
var name_f = name_path.split(';');
var file_to_go = name_f[1];
var ex = file_to_go.split(".");
var path = "txt/"+ex[0]+";"+name_f[0]+".txt";
var file = "txt/"+name_f[0]+";"+ex[0]+".txt";
setInterval(() => get_change(file, path), 50);

function getEvtType(evt) {
    currEvent = evt.type;
    var id = evt.target.id;
	set_change(path, id, currEvent);
    console.log(joue+" "+get_pass);
}
 
function set_change(path, id, event) {
    $.post("traitement.php", {id:id, event:event, file:path}, function(data) {
    });
}

function get_change(file, path) {
    $.post("get_change.php", {file:file}, function(data) {
        if (data != 'rien') {
            document.removeEventListener("click", getEvtType);
            console.log(data);
            var ins = data.split("'");
            var id = ins[1];
            if (document.getElementById(id) != null)
                eval(data);
            document.addEventListener("click", getEvtType);
        }
    });
}

var keys = {};

onkeydown = onkeyup = function (e) {
    e = e || event;
    e.which = e.which || e.keyCode;
  
    keys[e.which] = e.type === 'keydown';

    if (keys[82] && keys[91]) {
        e.preventDefault();
    }
}


document.addEventListener("click", getEvtType);