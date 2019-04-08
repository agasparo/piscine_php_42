window.onload = function() {
    var files = 0;
    var rage = setInterval(() => check_rage(files), 100);
	var timerId;
	let newWindow;
	if(document.getElementById('search')) {
    	document.getElementById('search').onclick = function() {
    		document.getElementById('is_seraching').style.display = 'block';
    		var a = 0;
    		timerId = setInterval(() => a = search_place(a), 1000);
    	}
	}
	
	document.getElementById('stop_search').onclick = function() {
	    document.getElementById('is_seraching').style.display = 'none';
	    clearInterval(timerId);
	    $.post("stop.php", function(data) {
	       console.log(data); 
	    });
	}

	function search_place(nb) {
		var txt = document.getElementById('search_text');
		$.post("add.php", function(data) {
			console.log(data);
			if (data != "") {
				var txt = document.getElementById('search_text');
				txt.innerText = 'adversaire trouve';
				clearInterval(timerId);
				$.post("redirect.php", {infos:data}, function(data) {
					console.log(data);
					document.getElementById('is_seraching').style.display = 'none';
					newWindow = window.open(data,'Popup','height='+screen.height+',width='+screen.width+',scrollbars=yes,location=0,resizable=0');
					newWindow.focus();
					files = data;
                    var i = 0;
                    newWindow.onunload = function() {
                    	i++;
                    	if (i == 2) {
                    	    i++;
                      	   $.post("rage_quit.php", {file:files}, function(data) {
    	                   });
                    	}
                    };
				});
			}
		});
		if (nb == 3) {
			txt.innerText = 'Recherche de joueur ...';
			return (0);
		} else if (nb == 2) {
			txt.innerText = 'Recherche de joueur ..';
			return (3);
		} else if (nb == 1) {
			txt.innerText = 'Recherche de joueur .';
			return(2);
		} else {
			txt.innerText = 'Recherche de joueur';
			return (1);
		}
	}
	
	function check_rage() {
	    if (files != 0) {
	        $.post("rage_quit_check.php", {file:files}, function(data) {
	            if (data != "") {
	                setTimeout(function() {
	                    var str = newWindow.location.href;
	                    var res;
	                    if (str)
                            res = str.match("gg");
                        //console.log(res);
    	                if (res == undefined) {
    	                    //console.log('rage');
    	                    clearInterval(rage);
    	                    newWindow.location = "final_score.php?ids="+files+"&res=1";
    	                    setTimeout(function() {
    	                        $.post("suppr_file.php", {file:files}, function(data) {
    	                            console.log(data);
    	                        });
    	                    }, 5000);
    	                } else {
    	                    console.log('fin de partie');
    	                    setTimeout(function() {
    	                        $.post("suppr_file.php", {file:files}, function(data) {
    	                            console.log(data);
    	                        });
    	                    }, 5000);
    	                }
	                }, 2000);
	                clearInterval(rage);
	            }
    	    });
	    }
	}
}