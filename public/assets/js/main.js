"use strict";

window.addEventListener("load", function () {
    var markDownEl = document.querySelector(".editor > .right > pre");
    new MediumEditor(".editor > .left", {
        toolbar: {
            buttons: ['bold', 'anchor', "unorderedlist"]
        },
        extensions: {
            markdown: new MeMarkdown(function (md) {
                markDownEl.textContent = md;
            })
        }
    });
});