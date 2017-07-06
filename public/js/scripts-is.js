var app = 0;

$(document).ready(function() {
    app = new NewsBoard();
});

function NewsBoard() {
    var months = ["Janvāris", "Februāris", "Marts", "Aprīlis", "Maijs", "Jūnijs", "Jūlijs", "Augusts", "Septembris", "Oktobris", "Novembris", "Decembris"];
    var loaded = new Date();
    /* {"Pages":[{
            "ID": int,
            "Type": str,
            "Title": str,
            "Data": {
                "url": str
            },
            "StartDate": int,
            "EndDate": int
        }]}
    * */
    var dh = {page: 0, Pages: [], iteration: 0, new: []};
    var nb = this;
    var updateTimer = null; // ? update on the last page
    var switchTimer = null;


    function init() {
        nb.update();
        setTimeout(function() {
            nb.switch();
        }, 1000);
    }

    nb.switch = function() {
        if (loaded.getDate() != (new Date()).getDate()) {
            location.reload();
        }

        if (dh.iteration == 0 && dh.new.Pages && dh.new.Pages.length) { // Loading new data to primary container
            // Removing removed pages
            for (var i in dh.Pages) {
                var remove = true;
                for (var j in dh.new.Pages) {
                    if (dh.Pages[i].id == dh.new.Pages[j].id) remove = false;
                }
                if (remove == true) {
                    $("#content div[data-id="+dh.Pages[i].id+"]").remove();
                    //console.log(dh.Pages[i].id+" removed");
                }
            }
            // Append new & update old
            for (var i in dh.new.Pages) {
                var append = true;
                for (var j in dh.Pages) {
                    if (dh.new.Pages[i].id == dh.Pages[j].id) {
                        append = false;
                        $("#content div[data-id="+dh.Pages[j].id+"]").css({"background-image": "url('"+dh.new.Pages[i].url+"')"});
                    }
                }
                if (append == true) {
                    $("#content").append($("<div>").attr({"data-id": dh.new.Pages[i].id}).css({"background-image": "url('"+dh.new.Pages[i].url+"')"}));
                    //console.log(dh.new.Pages[i].id+" added");
                }
            }

            dh.Pages = dh.new.Pages;
            dh.new = [];
        }

        if (dh.Pages.length) {
            nb.display(dh.Pages[dh.page]);
            dh.page = (dh.page+1) % dh.Pages.length;
        }

        dh.iteration = (dh.iteration+1) % (dh.Pages.length ? dh.Pages.length : 1);

        switchTimer = setTimeout(function () {
            nb.switch();
        }, 15000);
    };

    nb.display = function(page) {
        $("#content div").addClass("disabled");
        $("#content div[data-id="+page.id+"]").removeClass("disabled");
        //$("#content").css({"background-image": "url('"+page.Data.url+"')"});
    };

    nb.update = function() {
        nb.request({}, function(data) {
            if (data.Pages) {
                dh.new.Pages = [];
                for (var i in data.Pages) {
                    data.Pages[i].url = '/storage/'+data.Pages[i].url;
                    dh.new.Pages.push(data.Pages[i]);
                }
            }
            /*
            dh.new.pages.sort(function(a, b) {
                return parseInt(a) - parseInt(b);
            });
            */

        });
    };

    nb.request = function(options, callback) {
        $.ajax({
            url: config.url,
            type: "GET",
            dataType: "JSON",
            data: options,
            success: function(data, tst, xhr) {
                process(data);
                if (callback != undefined) {
                    callback(data, tst, xhr);
                }
            },
            error: function(xhr, txt, err) {

            },
            complete: function (xhr, tst) {
                //if (options.Act == "get") {
                    updateTimer = setTimeout(function () {
                        nb.update();
                    },  300000); // 5 min
                //}
            }
        });
    };

    function process(data) {
        if (!dh.Pages) dh.Pages = [];
    }

    function formatTime(time) {
        return ((time.getHours() < 10) ? "0"+time.getHours() : time.getHours())+":"+((time.getMinutes() < 10) ? "0"+time.getMinutes() : time.getMinutes());
    }

    function dayStart(time) { // Rewires timestamp without milliseconds
        var d = new Date(time*1000);
        d.setHours(0);
        d.setMinutes(0);
        d.setSeconds(0);
        return d.getTime()/1000;
    }

    nb.spitDH = function() {
        console.log(dh);
    };

    init();
}