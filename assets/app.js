$(document).ready(function() {
    initial_script();
    $(window).bind('popstate', function(event) {
        var state = event.originalEvent.state;
        if (state != null) {
            maintain_state();
        } else {
            window.location = window.location.href;
        }
    });

    $(document).on("click", ".ajax-view", function(e) {
        e.preventDefault();
        console.log('ajax-view');
        var load_div = '#my-content';
        var title = $(this).data('title');
        if (title == undefined) {
            title = "CI";
        }
        load_view(load_div, title, $(this).attr('href'));
    });
});

function show_loading(element) {
    $(element).html($('#loader').html());
}
function changeUrl(page, url) {
    if (url != window.location.href) {
        if (typeof (history.pushState) != "undefined") {
            if (page != "") {
                document.title = page;
            }
            url = cutBaseUrl(url);
            //url = removeParam('_');
            var obj = {Page: page, Url: url};
            history.pushState(obj, obj.Page, obj.Url);
        }
    } else {
        console.log('nai hua');
    }
}
function cutBaseUrl(url) {
    if (url.indexOf(BASE_URL) >= 0) {
        if (PROJECT_BASE == "") {
            return "/" + url.replace(BASE_URL, "");
        } else {
            return "/" + PROJECT_BASE + '/' + url.replace(BASE_URL, "");
        }
    }
    return url;
}
function maintain_state() {
    var url = window.location.href;
    //var pathname_array = window.location.pathname.split('/');
    load_view('#my-content', 'CI', url);
    initial_script();
}
function initial_script() {
    var url = window.location.href;

    if (url.indexOf("welcome/c1") >= 0) {
        alert('c1 specific script');
    } else if (url.indexOf("welcome/c2") >= 0) {
        alert('c2 specific script');
    }

    //We can also decide based on element exist or not
}

function load_view(load_div, title, url) {
    show_loading(load_div);
    $.ajax({
        url: url,
        success: function(html) {
            changeUrl(title, this.url);
            $(load_div).html(html);
            initial_script();
        }
    });
}