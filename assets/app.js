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
        $('#success-block').addClass('hidden');
        $('#success-message').html('');
        var load_div = '#my-content';
        var title = $(this).data('title');
        if (title == undefined) {
            title = "CI";
        }
        load_view(load_div, title, $(this).attr('href'));
    });

    $(document).on("submit", ".ajax-form", function(e) {
        e.preventDefault();
        this_form = $(this);
        //show_miniloading(this_form);
        this_form.find('.custom-error').html("");

        $.ajax({
            url: this_form.attr('action'),
            data: this_form.serialize(),
            type: "post",
            dataType: "json",
            success: function(res) {
                //hide_miniloading(this_form);
                if (res.error == true) {
                    $.each(res.display_errors, function(error_id, html) {
                        $('#' + error_id).html(html);
                    });
                } else {
                    //s_title and s_text canbe used in pnotify
                    //https://sciactive.github.io/pnotify/
                    if (res.eval_script != undefined) {
                        eval(res.eval_script);
                    }
                    $('#success-message').html(res.s_text);
                    $('#success-block').removeClass('hidden');
                }
            }
        });
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