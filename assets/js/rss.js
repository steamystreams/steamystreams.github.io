/*
        "DO WHAT THE FUCK YOU WANT TO" PUBLIC LICENSE (WTFPL)
                Version sqrt(-1), April, 2012

Copyright (C) 2012 WickedCoder <wickedcoder@hotmail.com>

Everyone is permitted to copy and distribute verbatim or modified
copies of this license document, and changing it is allowed as long
as the name is changed.

           DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
  TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION

 0. You just DO WHAT THE FUCK YOU WANT TO.
*/

/*
USAGE:
        <p id="feedPanel" rssurl="<url to RSS feed>"
            feedcount="<number of feeds to display>">
*/

$(function () {
    $("p#feedPanel").feedMe({
        feedUrl: $("p#feedPanel").attr('https://www.eporner.com/sitemap/feeds/eporner_hq_427x240_rss.xml'),
        feedCount: $("p#feedPanel").attr('200')
    });
});

jQuery.fn.feedMe = function () {
    var e = $(this[0]);
    var args = arguments[0] || {};

    $.ajax({
        url: document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=' + args.feedCount + '&callback=?&q='
        + encodeURIComponent(args.feedUrl),
        dataType: 'json',
        crossDomain: 'false',
        beforeSend: function () {
            $(e).empty()
            .append("<img style=\"clear:both;float:left;padding-left:70px;\" src=\"images/blog-load.gif\" alt=\"loading feeds...\" />");
        },
        error: function () {
            $(e).empty()
            .append("<span style=\"clear:both;float:left;font-size:x-small;padding-left:10px;\">An error occured retrieving feeds.</span>");
        },
        success: function (data) {
            items = data.responseData.feed.entries;
            var html = '';
            for (var i = 0; i < items.length; i++) {
                html += "<p style=\"padding: 0px 50px 0px 0px;\">";
                html += "<a href='javascript:void(0);' onclick=\"javascript:document.location='" + items[i].link + "';\">" + items[i].title + "</a>";
                html += "<span style=\"clear:both; float:left; font-size:x-small; border-bottom:1px dotted #4E4739; padding-bottom: 10px; padding-top: 10px;\">"
                + items[i].contentSnippet + "</span>";
                html += "</p>";
            }
            $(e).empty().append(html);
        }
    });
}

